document.addEventListener("DOMContentLoaded", () => {
  const homepage = document.querySelector("#homepage");
  const quiz = document.querySelector("#Quiz");
  const result = document.querySelector("#result");
  const startButton = document.querySelector("#start");
  const startOverButton = document.querySelector("#start_over");
  const tryAgainButton = document.querySelector("#try_again");
  const questionElement = document.querySelector("#question");
  const answersElement = document.querySelector("#answers");
  const typeQuestionElement = document.querySelector("#type_question");
  const completedElement = document.querySelector("#completed");
  const finalPointsElement = document.querySelector("#final");
  const loadingScreen = document.querySelector("#loadingScreen");
  homepage.style.display = "none";
  loadingScreen.style.display = "block";
  window.location.hash = 'homepage';
  let currentQuestionNumber = 1;
  let score = 0;
  sessionStorage.setItem("score", score);
  let questions = [];

  fetchQuizData()
    .then((data) => {
      questions = data.results;
      loadingScreen.style.display = "none";
      homepage.style.display = "block";
    })
    .catch((error) => {
      console.error(error);
      loadingScreen.style.display = "none";
      homepage.style.display = "block";
    });

  startButton.addEventListener("click", () => {
    homepage.style.display = "none";
    quiz.style.display = "block";
    window.location.hash = `question-${currentQuestionNumber}`;
    loadQuestion(currentQuestionNumber);
  });

  startOverButton.addEventListener("click", () => {
    score = 0;
    sessionStorage.setItem("score", score);
    fetchQuizData().then((data) => {
      questions = data.results;
    });
    currentQuestionNumber = 1;
    window.location.hash = `question-${currentQuestionNumber}`;
    loadQuestion(currentQuestionNumber);
  });

  tryAgainButton.addEventListener("click", () => {
    score = 0;
    sessionStorage.setItem("score", score);
    fetchQuizData().then((data) => {
      questions = data.results;
      currentQuestionNumber = 1;
      window.location.hash = `question-${currentQuestionNumber}`;
      loadQuestion(currentQuestionNumber);
      homepage.style.display = "none";
      quiz.style.display = "block";
      result.style.display = "none";
    });
  });

  window.addEventListener("hashchange", () => {
    if (result.style.display === "block") {
      window.location.hash = "result";
    } else if (window.location.hash.startsWith("#question-")) {
      const questionNumber = parseInt(
        window.location.hash.replace("#question-", ""),
        10
      );

      if (questionNumber !== currentQuestionNumber) {
        loadQuestion(questionNumber);
      }
    }
  });

  function loadQuestion(questionNumber) {
    if (questionNumber <= questions.length) {
      const currentQuestion = questions[questionNumber - 1];
      questionElement.textContent = currentQuestion.question;
      typeQuestionElement.textContent = currentQuestion.category;
      displayAnswers(currentQuestion);
      completedElement.textContent = `Completed: ${questionNumber - 1}/20`;
      currentQuestionNumber = questionNumber;
    } else {
      showResult();
    }
  }

  function displayAnswers(currentQuestion) {
    answersElement.innerHTML = "";
    if (currentQuestion.type === "multiple") {
      const allAnswers = [
        currentQuestion.correct_answer,
        ...currentQuestion.incorrect_answers,
      ];
      const shuffledAnswers = shuffleArray(allAnswers);

      shuffledAnswers.forEach((answer) => {
        const answerButton = document.createElement("button");
        answerButton.textContent = answer;
        answerButton.className = "btn btn-outline-dark w-75 mx-auto my-2 py-2 px-5 animate__animated animate__fadeIn";
        answerButton.addEventListener("click", (event) => {
          const selectedAnswer = event.target.textContent;
          if (selectedAnswer === currentQuestion.correct_answer) {
            score++;
            sessionStorage.setItem("score", score);
          }
          currentQuestionNumber++;
          window.location.hash = `question-${currentQuestionNumber}`;
          loadQuestion(currentQuestionNumber);
        });

        answersElement.appendChild(answerButton);
      });
    } else if (currentQuestion.type === "boolean") {
      const trueButton = createAnswerButton("True", currentQuestion);
      const falseButton = createAnswerButton("False", currentQuestion);

      trueButton.addEventListener("click", () => {
        if ("True" === currentQuestion.correct_answer) {
          score++;
          sessionStorage.setItem("score", score);
        }
        currentQuestionNumber++;
        window.location.hash = `question-${currentQuestionNumber}`;
        loadQuestion(currentQuestionNumber);
      });

      falseButton.addEventListener("click", () => {
        if ("False" === currentQuestion.correct_answer) {
          score++;
          sessionStorage.setItem("score", score);
        }
        currentQuestionNumber++;
        window.location.hash = `question-${currentQuestionNumber}`;
        loadQuestion(currentQuestionNumber);
      });

      answersElement.appendChild(trueButton);
      answersElement.appendChild(falseButton);
    }
  }

  function createAnswerButton(answer, currentQuestion) {
    const answerButton = document.createElement("button");
    answerButton.textContent = answer;
    answerButton.className = "btn btn-outline-dark w-75 mx-auto my-2 py-2 px-5 animate__animated animate__fadeIn";
    answerButton.addEventListener("click", () => {
      if (answer === currentQuestion.correct_answer) {
        score++;
        sessionStorage.setItem("score", score);
      }
      currentQuestionNumber++;
      loadQuestion(currentQuestionNumber);
    });
    return answerButton;
  }

  function showResult() {
    quiz.style.display = "none";
    result.style.display = "block";
    finalPointsElement.textContent = `Total Correct Answers: ${score}/20`;
    localStorage.setItem("score", score);
  }

  async function fetchQuizData() {
    try {
      const response = await fetch("https://opentdb.com/api.php?amount=20");
      if (response.status === 200) {
        const data = await response.json();
        localStorage.setItem("questions", JSON.stringify(data.results));
        console.log("new set of questions");
        return data;
      } else {
        throw new Error("Request failed with status: " + response.status);
      }
    } catch (error) {
      console.error(error);
    }
  }

  function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
  }
});
