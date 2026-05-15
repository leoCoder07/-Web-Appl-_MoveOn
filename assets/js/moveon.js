const hero = document.getElementById("hero");
const thumbs = document.querySelectorAll(".thumb");
const dots = document.querySelectorAll(".dot");

const images = [
 "assets/images/webp/img1.webp",
 "assets/images/webp/img2.webp",
 "assets/images/webp/img3.webp",
 "assets/images/webp/img4.webp",
];

let currentIndex = 0;
let slideInterval;

function updateHero(index) {
 currentIndex = index;

 hero.style.backgroundImage = `linear-gradient(to right, rgba(0,0,0,0.7) 25%, rgba(0,0,0,0.1)), url('${images[index]}')`;

 thumbs.forEach((t) => t.classList.remove("active"));
 dots.forEach((d) => d.classList.remove("active"));

 thumbs[index].classList.add("active");
 dots[index].classList.add("active");
}

function startAutoSlide() {
 slideInterval = setInterval(() => {
  currentIndex = (currentIndex + 1) % images.length;
  updateHero(currentIndex);
 }, 5000);
}

[...thumbs, ...dots].forEach((el) => {
 el.addEventListener("click", () => {
  clearInterval(slideInterval);
  updateHero(parseInt(el.dataset.index));
  startAutoSlide();
 });
});

startAutoSlide();
