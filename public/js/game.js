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

let currentQuestion = {};
let acceptingAnswers = false;
let score = 0;
let questionCounter = 0;
let availableQuestions = [];
let timer;

let questions = [];
let usedFifty = false;

const apiUrl = '/silmarilion-quiz-app-questions/get';

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

const CORRECT_BONUS = 10;
const MAX_QUESTIONS = 10;
const TIME_LIMIT = 10;

startGame = () => {
  questionCounter = 0;
  score = 0;
  availableQuestions = [...questions];
  getNewQuestion();
  game.classList.remove('hidden');
  loader.classList.add('hidden');
};

startTimer = () => {
  let timeLeft = TIME_LIMIT;
  timerDisplay.innerText = `Time: ${timeLeft}s`;

  clearInterval(timer);

  timerBar.style.transition = 'none';
  timerBar.style.width = '100%';
  timerBar.style.backgroundColor = '#4caf50';

  timerBar.offsetWidth;

  timerBar.style.transition = `width ${TIME_LIMIT}s linear`;
  timerBar.style.width = '0%';

  timer = setInterval(() => {
    timeLeft--;
    timerDisplay.innerText = `Time: ${timeLeft}s`;

    if (timeLeft <= 3) {
      timerBar.style.backgroundColor = 'red';
    }

    if (timeLeft <= 0) {
      clearInterval(timer);
      acceptingAnswers = false;
      getNewQuestion();
    }
  }, 1000);
};

getNewQuestion = () => {
  if (availableQuestions.length === 0 || questionCounter >= MAX_QUESTIONS) {
    clearInterval(timer);
    gameContainer.style.display = 'none';
    containerEnd.style.display = 'block';

    const saveScoreBtn = document.getElementById('saveScoreBtn');
    const finalScore = document.getElementById('finalScore');
    const scoreInput = document.getElementById('finalScoreInput');
    scoreInput.value = score;
    finalScore.innerText = `Your score - ${score}`;

    const data = { score: scoreInput.value };

    saveScoreBtn.addEventListener('click', (e) => {
      e.preventDefault();

      fetch(apiUrl, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
      })
        .then(response => response.json())
        .then(result => {
          window.location.assign('/menu');
        })
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

  clearInterval(timer);
  startTimer();
};

function useFifty() {
  if (usedFifty) return;

  usedFifty = true;

  const wrongChoices = choices.filter(
    c => c.dataset.number != currentQuestion.answer
  );

  const toRemove = wrongChoices
    .sort(() => Math.random() - 0.5)
    .slice(0, 2);

  toRemove.forEach(choice => {
    choice.innerText = "";
    choice.parentElement.classList.add("disabled");
    choice.style.pointerEvents = "none";
  });

  const btn = document.getElementById("fiftyBtn");
  btn.style.display = "none";
}

const fiftyBtn = document.getElementById("fiftyBtn");
fiftyBtn.addEventListener("click", useFifty);

choices.forEach(choice => {
  choice.addEventListener("click", e => {
    if (!acceptingAnswers) return;

    acceptingAnswers = false;
    clearInterval(timer);

    const selectedChoice = e.target;
    const selectedAnswer = selectedChoice.dataset["number"];

    const classToApply =
      selectedAnswer == currentQuestion.answer ? "correct" : "incorrect";

    if (classToApply === "correct") {
      incrementScore(CORRECT_BONUS);
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
