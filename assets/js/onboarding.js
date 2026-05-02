let currentQuestion = 1;
const totalQuestions = 4;



document.addEventListener('DOMContentLoaded', () => {
 loadQuestion(currentQuestion);

 document.getElementById('nextBtn')?.addEventListener('click', nextQuestion);

 document.getElementById('backBtn')?.addEventListener('click', backQuestion);

 document.getElementById('skipBtn')?.addEventListener('click', skipQuestion);
});



function loadQuestion(qId) {
 fetch (`/moveon/get-question.php?q=${qId}`)
 .then (response => response.json())
 .then (data => {
  if (data.success) {
   updateUI(data);
   loadSavedAnswer(qId);
  }
 })
 .catch (error => console.error('Error:', error));
}



function updateUI(data) {
 document.getElementById('questionText').textContent = data.question;
 document.title = `Onboarding | Question ${data.question_id}`
 // document.getElementById('questionNumber').textContent = `Question ${data.question_id} of ${totalQuestions}`;

 const optionsContainer = document.getElementById('optionsContainer');
 optionsContainer.innerHTML = '';

 data.options.forEach((option, index) => {
  const radioId = `option_${option.id}`;
  const label = document.createElement('label');
  label.className = 'label-box';
  label.htmlFor = `${radioId}`;
  label.innerHTML = `${option.option_text}<input type="radio" name="answer" id="${radioId}" value="${option.option_text}"/>`;
  optionsContainer.appendChild(label);
 });

 const backBtn = document.getElementById('backBtn');
 const nextBtn = document.getElementById('nextBtn');
 const labels = document.querySelectorAll('.label-box');

 if (data.question_id === 2) {
  labels.forEach(label => {
   label.classList.add('colorize');
  });
 }

 backBtn.style.display = data.question_id === 1 ? 'none' : 'inline-block';
 nextBtn.textContent = data.question_id === totalQuestions ? 'Sign up' : 'Next →';
}




function saveAnswer(questionId, answer) {
 fetch ('/moveon/process-onboarding.php', {
  method: 'POST',
  headers: {
   'Content-type': 'application/x-www-form-urlencoded',
  },
  body: `action=save_answer&question_id=${questionId}&answer=${encodeURIComponent(answer)}`
 })
 .then (response => response.json())
 .then (data => {
  if(!data.success) {
   console.error('Failed to save answer.');
  }
 })
 .catch(error => console.error('Error:', error));
}




function loadSavedAnswer(questionId) {
 fetch (`/moveon/get-saved-answer.php?question_id=${questionId}`)
 .then (response => response.json())
 .then (data => {
  if (data.answer) {
   const radio = document.querySelector(`input[value="${data.answer}"]`);
   if (radio) radio.checked = true
  }
 })
 .catch (error => console.error('Error:', error));
}




function nextQuestion() {
 const selectedAnswer = document.querySelector('input[name="answer"]:checked');
 if (!selectedAnswer) {
  alert('Please select an answer or click Skip');
  return;
 }

 const answer = selectedAnswer.value;
 const questionId = currentQuestion;

 saveAnswer(questionId, answer);

 if (currentQuestion === totalQuestions) {
  window.location.href = 'auth.php';
 } else {
  currentQuestion++;
  loadQuestion(currentQuestion);
 }
}



function backQuestion() {
 if (currentQuestion > 1) {
  currentQuestion--;
  loadQuestion(currentQuestion);
 }
}




function skipQuestion() {
 const questionId = currentQuestion;
 saveAnswer(questionId, 'skip');
 
 if (currentQuestion === totalQuestions) {
  window.location.href = 'auth.php';
 } else {
  currentQuestion++;
  loadQuestion(currentQuestion);
 }
}