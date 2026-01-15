const result = document.getElementById('result');
const input = document.getElementById('guess-input');
const guessQuote = document.getElementById('guess-quote');

let currentQuote = {};
let audio = new Audio();

const soundCorrect = new Audio('/sounds/correct.mp3');
const soundWrong = new Audio('/sounds/wrong.mp3');

function play() {
    result.textContent = '';
    result.className = '';
    input.value = '';

    fetch(gameConfig.apiUrl)
        .then(res => res.json())
        .then(data => {
            currentQuote = data;
            gameConfig.render(currentQuote)
            audio.play();
        });
}

function checkGuess() {
    const guess = input.value;
    
    if(!guess) {
        result.textContent = 'Enter a name';
        result.className = 'wrong';
        soundWrong.play();
        return;
    }

    if(guess.toLowerCase().trim() === currentQuote.lore_title.toLowerCase().trim()) {
        result.textContent = 'Correct!';
        result.className = 'correct';
        soundCorrect.play();
    } else {
        result.textContent = 'Wrong!';
        result.className = 'wrong';
        soundWrong.play();
    }
}

play();