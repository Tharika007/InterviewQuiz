const question = document.getElementById('question')
const choices = Array.from(document.getElementsByClassName('choice-text'))
const progressText  = document.getElementById('progressText')
const scoreText = document.getElementById('score')
const progressBarFull = document.getElementById('progressBarFull')
let currentQuestion = {};
let acceptingAnswers = false;
let score = 0;
let questionCounter= 0;
let availableQuestions = [];

let questions = [
    {
        question: "Inside which HTML element do we put the JavaScript?",
        choice1: "<script>",
        choice2: "<javascript>",
        choice3: "<js>",
        choice4: "<scriptjs>",
        answer: 1
    },

    {
        question: "Inside which HTML element do we put the Paragraph?",
        choice1: "<Paragraph>",
        choice2: "<P>",
        choice3: "<p>",
        choice4: "<text>",
        answer: 3
    },

    {
        question: "Inside which HTML element do we put the linktag?",
        choice1: "<link>",
        choice2: "<href>",
        choice3: "<li>",
        choice4: "<a>",
        answer: 4
    }
    
]
//CONSTANTS
const CORRECT_BONUS = 1;
const MAX_QUESTIONS = 10;

startGame = () => {
    questionCounter= 0;
    score = 0;
    availableQuestions = [...questions];
    
    getNewQuestion();
}

getNewQuestion = () =>{

    if(availableQuestions.length === 0 || questionCounter > MAX_QUESTIONS ){
        localStorage.setItem('mostRecentScore', score);
        return window.location.assign('/end.html')
    }
    questionCounter++;
    progressText.innerText = `Question ${questionCounter}/${MAX_QUESTIONS}`;
    
    //progressText.innerText = " Question " + questionCounter + "/" + MAX_QUESTIONS;

    //UPDATE the Progress Bar
    progressBarFull.style.width = `${(questionCounter / MAX_QUESTIONS) * 100}%`;

    const questionIndex = Math.floor(Math.random() * availableQuestions.length);
    currentQuestion = availableQuestions[questionIndex];
    question.innerText = currentQuestion.question;

    choices.forEach(choice =>{
        const number = choice.dataset['number']
        choice.innerText = currentQuestion['choice'+number];
    })
    availableQuestions.splice(questionIndex, 1);

    acceptingAnswers = true;

}
    choices.forEach(choice => {
        choice.addEventListener("click", e => {
            if(!acceptingAnswers) return;

            acceptingAnswers = false;
            const selectedChoice = e.target; 
            const selectedAnswer = selectedChoice.dataset["number"]; 


            const classToApply = selectedAnswer == currentQuestion.answer ? 'correct' : 'incorrect';
             if(classToApply === 'correct' ){
                 incrementScore(CORRECT_BONUS);
             }

            selectedChoice.parentElement.classList.add(classToApply);

                    setTimeout( ()=>{
                        selectedChoice.parentElement.classList.remove(classToApply);

                        getNewQuestion();
                    }, 1000);
           

        })
    })

incrementScore = num => {
    score +=num;
    scoreText.innerText = score;

}
startGame();