const track = document.querySelector('.slider-track');
const slides = document.querySelectorAll('.slide');
const nextBtn = document.querySelector('.next-btn');
const prevBtn = document.querySelector('.prev-btn');

const imgSliderBtns = document.querySelectorAll('.slider-btn');

console.log(imgSliderBtns);

if (slides.length <= 3) {
 imgSliderBtns.forEach(button => button.style.display = 'none');
}

let index = 0;

function updateSlider() {
 const itemsPerView = window.innerWidth <= 985 ? 1 : 3;
 const maxIndex = slides.length - itemsPerView;

 if (index > maxIndex) index = 0;
 if (index < 0) index = maxIndex;

 const shiftPercentage = index * (100 / itemsPerView);
 track.style.transform = `translateX(-${shiftPercentage}%)`;
}

nextBtn.addEventListener('click', () => {
 index++;
 updateSlider();
});

prevBtn.addEventListener('click', () => {
 index--;
 updateSlider();
})

window.addEventListener('resize', updateSlider);

const accordionBtn = document.querySelectorAll('.ti-chevron-down');

accordionBtn.forEach(button => {
 button.addEventListener('click', () => {
  const item = button.closest('.accordion-item');
  item.classList.toggle('active');
 });
});