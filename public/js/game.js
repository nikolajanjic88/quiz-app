const question = document.getElementById("question");
const choices = Array.from(document.getElementsByClassName("choice-text"));
const progressText = document.getElementById("progressText");
const scoreText = document.getElementById("score");
const progressBarFull = document.getElementById("progressBarFull");
const loader = document.getElementById('loader');
const game = document.getElementById('game');
const gameContainer = document.getElementById('game-container');
const containerEnd = document.getElementById('container-end');

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

// Fetch
fetch(apiUrl)
  .then(res => res.json())
  .then(loadedQuestions => {
    questions = loadedQuestions.map(loadedQuestion => {
      const formattedQuestion = { question: loadedQuestion.question };
      const answerChoices = [...loadedQuestion.incorrect_answers];
      formattedQuestion.answer = Math.floor(Math.random() * 4) + 1;
      answerChoices.splice(formattedQuestion.answer - 1, 0, loadedQuestion.correct_answer);

      answerChoices.forEach((choice, index) => {
        formattedQuestion['choice' + (index + 1)] = choice;
      });

      return formattedQuestion;
    });

    startGame();
  })
  .catch(err => console.error(err));

startGame = () => {
  questionCounter = 0;
  score = 0;
  availableQuestions = [...questions];
  getNewQuestion();
  game.classList.remove('hidden');
  loader.classList.add('hidden');
};

// timer with +10 seconds
startTimer = () => {
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
};

getNewQuestion = () => {
  if (availableQuestions.length === 0 || questionCounter >= MAX_QUESTIONS) {
    clearInterval(timerInterval);
    gameContainer.style.display = 'none';
    containerEnd.style.display = 'block';

    const saveScoreBtn = document.getElementById('saveScoreBtn');
    const finalScore = document.getElementById('finalScore');
    const scoreInput = document.getElementById('finalScoreInput');
    scoreInput.value = score;

    if(score == CORRECT_BONUS * MAX_QUESTIONS) {
      perfectScoreSound.play();
      finalScore.innerHTML = `Perfect! <br>`;
    } else if (score < CORRECT_BONUS * MAX_QUESTIONS && score > CORRECT_BONUS * MAX_QUESTIONS / 2) {
      goodScoreSound.play();
      finalScore.innerHTML = `Very good! <br>`;
    } else {
      badScoreSound.play();
      finalScore.innerHTML = `Better luck next time! <br>`;
    }

    finalScore.innerHTML += `Your score - ${score}`;

    const data = { score: scoreInput.value };

    saveScoreBtn.addEventListener('click', (e) => {
      e.preventDefault();

      fetch(apiUrl, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
      })
        .then(response => response.json())
        .then(result => window.location.assign('/menu'))
        .catch(error => console.error('Error:', error));
    });
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
};

// 50:50 Joker
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

// +10 secounds Joker
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

// Answers
choices.forEach(choice => {
  choice.addEventListener("click", e => {
    if (!acceptingAnswers) return;

    acceptingAnswers = false;
    clearInterval(timerInterval);

    const selectedChoice = e.target;
    const selectedAnswer = selectedChoice.dataset["number"];

    const classToApply = selectedAnswer == currentQuestion.answer ? "correct" : "incorrect";

    if (classToApply === "correct") {
      incrementScore(CORRECT_BONUS);
      soundCorrect.play();
    } else {
      soundWrong.play();
    }

    selectedChoice.parentElement.classList.add(classToApply);

    setTimeout(() => {
      selectedChoice.parentElement.classList.remove(classToApply);
      getNewQuestion();
    }, 700);
  });
});


incrementScore = num => {
  score += num;
  scoreText.innerText = score;
};
