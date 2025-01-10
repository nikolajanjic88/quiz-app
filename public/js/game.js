const question = document.getElementById("question");
const choices = Array.from(document.getElementsByClassName("choice-text"));
const progressText = document.getElementById("progressText");
const scoreText = document.getElementById("score");
const progressBarFull = document.getElementById("progressBarFull");
const loader = document.getElementById('loader');
const game = document.getElementById('game');
const gameContainer = document.getElementById('game-container'); 
const containerEnd = document.getElementById('container-end'); 
let currentQuestion = {};
let acceptingAnswers = false;
let score = 0;
let questionCounter = 0;
let availableQuesions = [];

let questions = [];
const apiUrl = '/silmarilion-quiz-app-questions/get'; 

fetch(apiUrl)
  .then((res) => {
      return res.json();
  })
  .then((loadedQuestions) => {
    questions = loadedQuestions.map((loadedQuestion) => {
      const formattedQuestion = {
        question: loadedQuestion.question,
      };

      const answerChoices = [...loadedQuestion.incorrect_answers];
      formattedQuestion.answer = Math.floor(Math.random() * 4) + 1;
      answerChoices.splice(
        formattedQuestion.answer - 1,
        0,
        loadedQuestion.correct_answer
      );

      answerChoices.forEach((choice, index) => {
        formattedQuestion['choice' + (index + 1)] = choice;
      });
      
      return formattedQuestion;
    });
    
    startGame();
  })
  .catch((err) => {
      console.error(err);
  });

const CORRECT_BONUS = 10;
const MAX_QUESTIONS = 10;

startGame = () => {
  questionCounter = 0;
  score = 0;
  availableQuesions = [...questions];
  getNewQuestion();
  game.classList.remove('hidden');
  loader.classList.add('hidden');
};

getNewQuestion = () => {
  if(availableQuesions.length === 0 || questionCounter >= MAX_QUESTIONS) 
  {    
    gameContainer.style.display = 'none';
    containerEnd.style.display = 'block';
    const saveScoreBtn = document.getElementById('saveScoreBtn');
    const finalScore = document.getElementById('finalScore');
    const scoreInput = document.getElementById('finalScoreInput');
    scoreInput.value = score
  
    finalScore.innerText = `Your score - ${score}`;

    const data = {
      score: scoreInput.value
    };

    saveScoreBtn.addEventListener('click', (e) => {
      e.preventDefault();

      fetch(apiUrl, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
      })
        .then(response => response.json())
        .then(result => {
          window.location.assign('/menu');
          console.log(result.message);
        })
        .catch(error => {
          console.error('Error:', error);
        });
    })
  }
  questionCounter++;
  progressText.innerText = `Question ${questionCounter}/${MAX_QUESTIONS}`;
  progressBarFull.style.width = `${(questionCounter / MAX_QUESTIONS) * 100}%`;

  const questionIndex = Math.floor(Math.random() * availableQuesions.length);
  currentQuestion = availableQuesions[questionIndex];
  question.innerText = currentQuestion.question;

  choices.forEach(choice => {
    const number = choice.dataset["number"];
    choice.innerText = currentQuestion["choice" + number];
  });

  availableQuesions.splice(questionIndex, 1);
  //console.log(availableQuesions)
  acceptingAnswers = true;
};

choices.forEach(choice => {
  choice.addEventListener("click", e => {
    if (!acceptingAnswers) return;

    acceptingAnswers = false;
    const selectedChoice = e.target;
    const selectedAnswer = selectedChoice.dataset["number"];

    const classToApply = selectedAnswer == currentQuestion.answer ? "correct" : "incorrect";

    if(classToApply === "correct") 
    {
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
