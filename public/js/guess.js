const characterImageElement = document.getElementById('characterImage');
const apiUrl = '/silmarilion-quiz-app-lore/get'; 
let lore = []
let currentCharacter = {};

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
        return;
    }

    if (userGuess.toLowerCase() === currentCharacter.title.toLowerCase()) 
    {
        result.textContent = 'Correct! Well done!';
        result.className = 'correct';
    } else {
        result.textContent = 'Try again!';
        result.className = 'wrong';
    }
}

play();
clear();