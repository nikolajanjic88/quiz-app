let current = null;
let svgDoc = null;

let score = 0;
let questions = [];
let currentIndex = 0;

const mapa = document.getElementById("mapa");

const soundCorrect = new Audio('sounds/correct.mp3');
const soundWrong = new Audio('sounds/wrong.mp3');

// =========================
// SVG LOAD
// =========================
mapa.addEventListener("load", function () {
    svgDoc = mapa.contentDocument;

    // insert CSS into SVG
    const style = document.createElement("style");

    style.textContent = `
        .correct {
            fill: green !important;
        }

        .wrong {
            fill: red !important;
        }

        .answer {
            fill: blue !important;
        }
    `;

    svgDoc.querySelector("svg").appendChild(style);

    // click on zones
    svgDoc.querySelectorAll(".zone").forEach(zone => {

        zone.addEventListener("click", function () {
            const clickedId = this.id;
            const correctZone = svgDoc.getElementById(current);

            if (clickedId === current) {
                this.classList.add("correct");
                soundCorrect.play();
                score += 10;
                updateScore();
            }

            else {
                this.classList.add("wrong");
                soundWrong.play();
                if (correctZone) {
                    correctZone.classList.add("answer");
                }
            }

            disableZones(true);

            setTimeout(() => {
                resetMap();

                currentIndex++;

                loadQuestion();

                disableZones(false);

            }, 900);
        });
    });

    startGame();
});


// =========================
// START GAME
// =========================
function startGame() {
    fetch('/api/map-quiz/questions')
        .then(res => res.json())
        .then(data => {

            questions = data;
            currentIndex = 0;
            score = 0;

            updateScore();

            showGameUI();
            loadQuestion();
        });
}


// =========================
// LOAD QUESTION
// =========================
function loadQuestion() {
    if (currentIndex >= questions.length) {
        endGame();
        return;
    }

    const q = questions[currentIndex];

    current = q.slug;

    document.getElementById("question").innerText =
        "Click where " + q.name + " is located:";

    document.getElementById("progress").innerText =
        (currentIndex + 1) + "/" + questions.length;
}


// =========================
// END GAME
// =========================
function endGame() {
    disableZones(true);

    document.getElementById("question").style.display = "none";
    document.querySelector(".info").style.display = "none";
    document.getElementById("map").style.display = "none";

    const endScreen = document.getElementById("endScreen");
    endScreen.style.display = "block";

    document.getElementById("finalScore").innerText =
        `Your score: ${score} / ${questions.length * 10}`;
}


// =========================
// RESTART GAME
// =========================
function restartGame() {
    score = 0;
    currentIndex = 0;

    updateScore();

    document.getElementById("endScreen").style.display = "none";

    showGameUI();

    startGame();
}


// =========================
// RESET MAP
// =========================
function resetMap() {
    svgDoc.querySelectorAll(".zone").forEach(z => {

        z.classList.remove("correct");
        z.classList.remove("wrong");
        z.classList.remove("answer");
    });
}


// =========================
// SCORE
// =========================
function updateScore() {
    document.getElementById("score").innerText = score;
}


// =========================
// DISABLE ZONES
// =========================
function disableZones(state) {
    if (!svgDoc) return;

    svgDoc.querySelectorAll(".zone").forEach(z => {

        z.style.pointerEvents = state ? "none" : "auto";
    });
}


// =========================
// UI HELPERS
// =========================
function showGameUI() {
    document.getElementById("question").style.display = "block";
    document.querySelector(".info").style.display = "flex";
    document.getElementById("map").style.display = "block";
}