signUpTab = document.getElementById('sign-up-form');
logInTab = document.getElementById('log-in-form');
forgotPassTab = document.getElementById('forgot-pass-form');



signUpBtn = document.querySelectorAll('.toggle-signup-btn');
signUpBtn.forEach(btn => {
 btn.addEventListener('click', () => {
  removeAll();
  signUpTab.classList.add('active');
 });
});




logInBtn = document.querySelectorAll('.toggle-login-btn');
logInBtn.forEach((btn, index) => {
 btn.addEventListener('click', () => {
   removeAll();
   logInTab.classList.add('active');
 });
});



forgotPassBtn = document.querySelector('.forgot-pass-btn');
forgotPassBtn.addEventListener('click', () => {
 removeAll();
 forgotPassTab.classList.add('active');
});



function removeAll() {
 signUpTab.classList.remove('active');
 logInTab.classList.remove('active');
 forgotPassTab.classList.remove('active');
}