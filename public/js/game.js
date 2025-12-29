const question = document.getElementById('question');
const choiceContainers = Array.from(document.getElementsByClassName('choice-container'));
const choices = Array.from(document.getElementsByClassName('choice-text'));
const progressText = document.getElementById('progressText');
const scoreText = document.getElementById("score");
const progressBarFull = document.getElementById('progressBarFull');
const loader = document.getElementById('loader');
const game = document.getElementById('game');
const gameContainer = document.getElementById('game-container');
const containerEnd = document.getElementById('container-end');
const endGameImage = document.getElementById('end-game-gif');

const timerDisplay = document.getElementById('timer');
const timerBar = document.getElementById('timer-bar');

const soundCorrect = new Audio('sounds/correct.mp3');
const soundWrong = new Audio('sounds/wrong.mp3');
const perfectScoreSound = new Audio('sounds/endgame.mp3');
const goodScoreSound = new Audio('sounds/endgame2.mp3');
const badScoreSound = new Audio('sounds/endgame3.mp3');
perfectScoreSound.loop = true;
goodScoreSound.loop = true;
badScoreSound.loop = true;

let currentQuestion = {};
let acceptingAnswers = false;
let score = 0;
let questionCounter = 0;
let availableQuestions = [];

let questions = [];
let usedFifty = false;
let extraTimeUsed = false;

const CORRECT_BONUS = 10;
const MAX_QUESTIONS = 10;
const TIME_LIMIT = 10;

let timeLeft = TIME_LIMIT;
let timerDuration = TIME_LIMIT;
let timerInterval;

const apiUrl = '/silmarilion-quiz-app-questions/get';

// Fetch questions
fetch(apiUrl)
  .then(res => res.json())
  .then(loadedQuestions => {
    questions = loadedQuestions.map(q => {
      const formattedQuestion = { question: q.question };
      const answerChoices = [...q.incorrect_answers];
      formattedQuestion.answer = Math.floor(Math.random() * 4) + 1;
      answerChoices.splice(formattedQuestion.answer - 1, 0, q.correct_answer);

      answerChoices.forEach((choice, index) => {
        formattedQuestion['choice' + (index + 1)] = choice;
      });
      return formattedQuestion;
    });

    startGame();
  })
  .catch(err => console.error(err));

function startGame() {
  questionCounter = 0;
  score = 0;
  availableQuestions = [...questions];
  game.classList.remove('hidden');
  loader.classList.add('hidden');
  getNewQuestion();
}

// Timer
function startTimer() {
  clearInterval(timerInterval);
  timeLeft = TIME_LIMIT;
  timerDuration = TIME_LIMIT;
  timerDisplay.innerText = `Time: ${timeLeft}s`;
  timerBar.style.width = '100%';
  timerBar.style.backgroundColor = '#4caf50';

  const start = Date.now();

  timerInterval = setInterval(() => {
    const elapsed = (Date.now() - start) / 1000;
    const remaining = Math.max(0, timerDuration - elapsed);
    timeLeft = Math.ceil(remaining);
    timerDisplay.innerText = `Time: ${timeLeft}s`;

    const widthPercent = (remaining / timerDuration) * 100;
    timerBar.style.width = `${widthPercent}%`;
    if (timeLeft <= 3) timerBar.style.backgroundColor = 'red';

    if (remaining <= 0) {
      clearInterval(timerInterval);
      acceptingAnswers = false;
      getNewQuestion();
    }
  }, 50);
}

// Get new question
function getNewQuestion() {
  if (availableQuestions.length === 0 || questionCounter >= MAX_QUESTIONS) {
    endGame();
    return;
  }

  questionCounter++;
  progressText.innerText = `Question ${questionCounter}/${MAX_QUESTIONS}`;
  progressBarFull.style.width = `${(questionCounter / MAX_QUESTIONS) * 100}%`;

  const questionIndex = Math.floor(Math.random() * availableQuestions.length);
  currentQuestion = availableQuestions[questionIndex];
  question.innerText = currentQuestion.question;

  choices.forEach(choice => {
    const number = choice.dataset["number"];
    choice.innerText = currentQuestion["choice" + number];
    choice.style.pointerEvents = "auto";
    choice.parentElement.classList.remove("disabled");
  });

  availableQuestions.splice(questionIndex, 1);
  acceptingAnswers = true;

  startTimer();
}

// End game
function endGame() {
  clearInterval(timerInterval);
  gameContainer.style.display = 'none';
  containerEnd.style.display = 'block';

  const saveScoreBtn = document.getElementById('saveScoreBtn');
  const finalScore = document.getElementById('finalScore');
  const scoreInput = document.getElementById('finalScoreInput');
  scoreInput.value = score;

  // Set final message & image
  if(score === CORRECT_BONUS * MAX_QUESTIONS) {
    perfectScoreSound.play();
    endGameImage.src = 'images/giphy.gif';
    endGameImage.alt = 'Bravo';
    finalScore.innerHTML = `Perfect! <br>`;
  } else if (score > (CORRECT_BONUS * MAX_QUESTIONS) / 2) {
    goodScoreSound.play();
    finalScore.innerHTML = `Very good! <br>`;
  } else {
    badScoreSound.play();
    endGameImage.src = 'images/sad.gif';
    endGameImage.alt = 'Tree of Valinor died';
    finalScore.innerHTML = `Better luck next time! <br>`;
  }

  finalScore.innerHTML += `Your score - ${score}`;

  // Attach Save listener **once**
  saveScoreBtn.onclick = e => {
    e.preventDefault();

    saveScoreBtn.disabled = true;

    const data = { score };

    fetch(apiUrl, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(result => {
      alertify.set('notifier','position', 'top-center');
      alertify.success(result.message);

      setTimeout(() => {
        window.location.assign('/menu');
      }, 1500);
    })
    .catch(err => {
      console.error(err);
      alertify.set('notifier','position', 'top-center');
      alertify.error('Failed to save score');
    
      saveScoreBtn.disabled = false;
    });
  };
}

// Jokers
function useFifty() {
  if (usedFifty) return;
  usedFifty = true;

  const wrongChoices = choices.filter(c => c.dataset.number != currentQuestion.answer);
  const toRemove = wrongChoices.sort(() => Math.random() - 0.5).slice(0, 2);
  toRemove.forEach(choice => {
    choice.innerText = "";
    choice.parentElement.classList.add("disabled");
    choice.style.pointerEvents = "none";
  });

  document.getElementById("fiftyBtn").style.display = "none";
}

function useExtraTime() {
  if (extraTimeUsed) return;
  extraTimeUsed = true;

  timeLeft += 10;
  timerDuration += 10;

  timerDisplay.innerText = `Time: ${timeLeft}s`;
  document.getElementById("extraTimeBtn").style.display = "none";

  timerBar.style.transition = 'none';
  timerBar.style.backgroundColor = '#00ff00';
  setTimeout(() => {
    timerBar.style.transition = 'background-color 0.5s ease';
    timerBar.style.backgroundColor = timeLeft <= 3 ? 'red' : '#4caf50';
  }, 100);
}

document.getElementById("fiftyBtn").addEventListener("click", useFifty);
document.getElementById("extraTimeBtn").addEventListener("click", useExtraTime);

// Answer selection
choiceContainers.forEach(container => {
  container.addEventListener("click", e => {
    if (!acceptingAnswers) return;

    acceptingAnswers = false;
    clearInterval(timerInterval);

    const selectedChoice = container.querySelector(".choice-text");
    const selectedAnswer = selectedChoice.dataset["number"];

    const classToApply = selectedAnswer == currentQuestion.answer ? "correct" : "incorrect";

    if (classToApply === "correct") {
      incrementScore(CORRECT_BONUS);
      soundCorrect.play();
    } else {
      soundWrong.play();
    }

    container.classList.add(classToApply);

    setTimeout(() => {
      container.classList.remove(classToApply);
      getNewQuestion();
    }, 700);
  });
});

function incrementScore(num) {
  score += num;
  scoreText.innerText = score;
}
