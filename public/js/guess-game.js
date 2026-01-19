const result = document.getElementById('result');
const input = document.getElementById('guess-input');
const guessQuote = document.getElementById('guess-quote');
const suggestions = document.getElementById('suggestions');

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

play();