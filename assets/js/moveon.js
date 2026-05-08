// hero navigation

const hero = document.getElementById('hero');
const thumbs = document.querySelectorAll('.thumb');
const dots = document.querySelectorAll('.dot');

const images = [
  'assets/images/webp/img1.webp',
  'assets/images/webp/img2.webp',
  'assets/images/webp/img3.webp',
  'assets/images/webp/img4.webp'
];

let currentIndex = 0;
let slideInterval;

function updateHero(index) {
  currentIndex = index;
  
  // Change background
  hero.style.backgroundImage = `linear-gradient(to right, rgba(0,0,0,0.7) 25%, rgba(0,0,0,0.1)), url('${images[index]}')`;
  
  // Update active states
  thumbs.forEach(t => t.classList.remove('active'));
  dots.forEach(d => d.classList.remove('active'));
  
  thumbs[index].classList.add('active');
  dots[index].classList.add('active');
}

// Auto slide function
function startAutoSlide() {
  slideInterval = setInterval(() => {
    currentIndex = (currentIndex + 1) % images.length;
    updateHero(currentIndex);
  }, 5000);
}

// Manual click handling
[...thumbs, ...dots].forEach(el => {
  el.addEventListener('click', () => {
    clearInterval(slideInterval); // Stop timer on click
    updateHero(parseInt(el.dataset.index));
    startAutoSlide(); // Restart timer
  });
});

// Initialize
startAutoSlide();

// ! burger button

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