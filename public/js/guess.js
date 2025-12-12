const characterImageElement = document.getElementById('characterImage');
const apiUrl = '/silmarilion-quiz-app-lore/get'; 
let lore = []
let currentCharacter = {};

const soundCorrect = new Audio('sounds/correct.mp3');
const soundWrong = new Audio('sounds/wrong.mp3');

function play() 
{
    document.getElementById('guess-input').value = '';
    document.getElementById('result').innerText = '';
    result.className = '';

    if (lore.length === 0) 
    {
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

function clear()
{
    document.getElementById('guess-input').addEventListener('focus', () => {
        result.textContent = '';
    });

}

function checkGuess() 
{
    const userGuess = document.getElementById('guess-input').value.trim();

    if (!userGuess) 
    {
        result.textContent = 'Please enter a guess.';
        result.className = 'wrong';
        soundWrong.play();
        return;
    }

    if (userGuess.toLowerCase() === currentCharacter.title.toLowerCase()) 
    {
        result.textContent = 'Correct! Well done!';
        result.className = 'correct';
        soundCorrect.play();
    } else {
        result.textContent = 'Try again!';
        result.className = 'wrong';
        soundWrong.play();
    }
}

play();
clear();