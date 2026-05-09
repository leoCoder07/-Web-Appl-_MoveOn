menuButton = document.getElementById('menu-btn');
navResp = document.getElementById('nav-resp');

menuButton.addEventListener('click', () => {
 expand = document.querySelector('.ti-menu-3');
 eKs = document.querySelector('.ti-square-rounded-x');

 if (expand) {
  expand.classList.remove('ti-menu-3');
  expand.classList.add('ti-square-rounded-x');
  navResp.classList.add('active');
 } else {
  eKs.classList.remove('ti-square-rounded-x');
  eKs.classList.add('ti-menu-3');
  navResp.classList.remove('active');
 }
});

logoHref = document.querySelector('.logo-href');

logoHref.addEventListener('click', () => {
 location.href = 'moveon.php';
});