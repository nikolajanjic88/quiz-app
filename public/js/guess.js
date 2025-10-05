
const characterImageElement = document.getElementById('characterImage');
let userGuess = document.getElementById('guess-input').value.trim();
const apiUrl = '/silmarilion-quiz-app-lore/get'; 
let lore = []
let currentCharacter = {};

function play() {
    document.getElementById('guess-input').value = ''; // ✅ Clear input
    document.getElementById('result').innerText = ''; // Optional: clear result
    result.className = '';

    if (lore.length === 0) {
    fetch(apiUrl)
        .then((res) => res.json())
        .then((data) => {
        lore = data;
        getRandomCharacter(lore);
        });
    } else {
    getRandomCharacter(lore);
    }
}

function getRandomCharacter(chars)
{
    const randomIndex = Math.floor(Math.random() * chars.length);
    currentCharacter = chars[randomIndex];
    characterImageElement.src =currentCharacter.image;     
}

function checkGuess() {
    const userGuess = document.getElementById('guess-input').value.trim(); // ✅ Get updated input

    if (!userGuess) {
    result.textContent = 'Please enter a guess.';
    result.className = 'wrong';
    return;
    }

    if (userGuess.toLowerCase() === currentCharacter.title.toLowerCase()) {
    result.textContent = 'Correct! Well done!';
    result.className = 'correct';
    } else {
    result.textContent = 'Try again!';
    result.className = 'wrong';
    }
}

play();
