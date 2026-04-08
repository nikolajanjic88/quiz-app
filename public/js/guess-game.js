const result = document.getElementById('result');
const input = document.getElementById('guess-input');
const guessQuote = document.getElementById('guess-quote');
const suggestions = document.getElementById('suggestions');
const hintBtn = document.getElementById('hintBtn');
const guessBtn = document.querySelector('.btn.neon');

let attempts = 0;
const maxAttempts = 3;

let hintUsed = false;

let currentQuote = {};
let audio = new Audio();

const soundCorrect = new Audio('/sounds/correct.mp3');
const soundWrong = new Audio('/sounds/wrong.mp3');

function play() {
    attempts = 0;
    hintUsed = false;
    input.disabled = false;
    hintBtn.disabled = false;
    guessBtn.disabled = false;
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
    const guess = input.value.trim();

    if (!guess) {
        result.textContent = 'Enter a name';
        result.className = 'wrong';
        soundWrong.play();
        return;
    }

    attempts++;

    if (guess.toLowerCase() === currentQuote.lore_title.toLowerCase()) {
        hintBtn.disabled = true;
        guessBtn.disabled = true;
        result.textContent = 'Correct!';
        result.className = 'correct';
        soundCorrect.play();
        return;
    }

    // if not correct
    if (attempts >= maxAttempts) {
        input.disabled = true;
        hintBtn.disabled = true;
        guessBtn.disabled = true;
        result.textContent = `No attempts left! Answer: ${currentQuote.lore_title}`;
        result.className = 'wrong';
        soundWrong.play();

        // disable input i dugme
        input.disabled = true;
    } else {
        result.textContent = `Wrong! (${attempts}/${maxAttempts})`;
        result.className = 'wrong';
        soundWrong.play();
    }
}

input.addEventListener('keyup', async () => {
    const query = input.value.trim();

    if (query.length < 2) {
        suggestions.innerHTML = '';
        suggestions.style.display = 'none';
        return;
    }

    const response = await fetch(`/characters/search?q=${encodeURIComponent(query)}`);
    const data = await response.json();

    if (!data.length) {
        suggestions.innerHTML = '';
        suggestions.style.display = 'none';
        return;
    }

    suggestions.innerHTML = '';
    suggestions.style.display = 'block';

    data.forEach(character => {
        const li = document.createElement('li');
        li.textContent = character.title;

        li.addEventListener('click', () => {
            input.value = character.title;
            suggestions.style.display = 'none';
    });

    suggestions.appendChild(li);
    });
});

function giveHint() {
    if (hintUsed) return;

    hintUsed = true;

    const answer = currentQuote.lore_title;
    const revealCount = Math.ceil(answer.length * 0.3);

    let indices = [];

    while (indices.length < revealCount) {
        let rand = Math.floor(Math.random() * answer.length);

        if (!indices.includes(rand) && answer[rand] !== ' ') {
            indices.push(rand);
        }
    }

    let hint = answer
        .split('')
        .map((char, index) => {
            if (char === ' ') return ' ';
            return indices.includes(index) ? char : '_';
        })
        .join('');

    result.textContent = `Hint: ${hint}`;
    result.className = '';

    hintBtn.disabled = true;
}

hintBtn.addEventListener('click', giveHint);
play();