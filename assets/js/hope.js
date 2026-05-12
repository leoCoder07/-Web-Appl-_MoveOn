// Hope Feature JavaScript
class HopeFeature {
 constructor() {
  this.currentStoryIndex = 0;
  this.stories = [];
  this.itemsPerSlide = 3;
  this.init();
 }

 async init() {
  await this.loadQuote();
  await this.loadStories();
  await this.loadBooks();
  this.setupEventListeners();
 }

 async loadQuote() {
  try {
   const response = await fetch('hope-api.php?action=get_quote');
   const data = await response.json();

   if (data.success && data.quote) {
    document.getElementById('dailyQuote').textContent = data.quote.quote_text;
    document.getElementById('quoteAuthor').textContent = `— ${data.quote.author}`;
   } else {
    this.setFallbackQuote();
   }
  } catch (error) {
   console.error('Error loading quote:', error);
   this.setFallbackQuote();
  }
 }

 setFallbackQuote() {
  document.getElementById('dailyQuote').textContent = 'Hope is the thing with feathers that perches in the soul.';
  document.getElementById('quoteAuthor').textContent = '— Emily Dickinson';
 }

 async loadStories() {
  try {
   const response = await fetch('hope-api.php?action=get_stories');
   const data = await response.json();

   if (data.success && data.stories) {
    this.stories = data.stories;
    this.renderStories();
    this.initStorySlider();
   } else {
    this.renderEmptyStories();
   }
  } catch (error) {
   console.error('Error loading stories:', error);
   this.renderEmptyStories();
  }
 }

 renderStories() {
  const track = document.getElementById('storiesTrack');

  if (!this.stories || this.stories.length === 0) {
   track.innerHTML = '<div class="slide">No stories available yet.</div>';
   return;
  }

  track.innerHTML = this.stories.map(story => `
            <div class="slide" data-story-id="${story.id}">
                <img src="${story.image_url || './assets/images/webp/img1.webp'}" alt="${story.title}">
            </div>
        `).join('');

  document.querySelectorAll('.slide').forEach(slide => {
   slide.addEventListener('click', () => {
    const storyId = parseInt(slide.dataset.storyId);
    const story = this.stories.find(s => s.id === storyId);
    if (story) {
     this.showStoryModal(story);
    }
   });
  });
 }

 renderEmptyStories() {
  const track = document.getElementById('storiesTrack');
  track.innerHTML = '<div class="slide">No heartbreak stories available at the moment.</div>';
 }

 initStorySlider() {
  const track = document.getElementById('storiesTrack');
  const slides = document.querySelectorAll('.slide');
  const nextBtn = document.getElementById('storiesNextBtn');
  const prevBtn = document.getElementById('storiesPrevBtn');
  const imgSliderBtns = document.querySelectorAll('.slider-btn');

  if (!track || slides.length === 0) return;

  let currentIndex = 0;

  const getItemsPerView = () => {
   return window.innerWidth <= 985 ? 1 : 3;
  };

  const getMaxIndex = () => {
   const itemsPerView = getItemsPerView();
   return Math.max(0, slides.length - itemsPerView);
  };

  const updateSlider = () => {
   const itemsPerView = getItemsPerView();
   const maxIndex = getMaxIndex();

   // Ensure currentIndex is within bounds
   if (currentIndex > maxIndex) currentIndex = maxIndex;
   if (currentIndex < 0) currentIndex = 0;

   const shiftPercentage = currentIndex * (100 / itemsPerView);
   track.style.transform = `translateX(-${shiftPercentage}%)`;
  };

  const nextSlide = () => {
   const maxIndex = getMaxIndex();
   if (currentIndex < maxIndex) {
    currentIndex++;
   } else {
    // Loop back to the beginning
    currentIndex = 0;
   }
   updateSlider();
  };

  const prevSlide = () => {
   if (currentIndex > 0) {
    currentIndex--;
   } else {
    // Loop to the end
    currentIndex = getMaxIndex();
   }
   updateSlider();
  };

  // Hide buttons if slides are less than or equal to items per view
  const itemsPerView = getItemsPerView();
  if (slides.length <= itemsPerView) {
   imgSliderBtns.forEach(button => {
    if (button) button.style.display = 'none';
   });
  } else {
   imgSliderBtns.forEach(button => {
    if (button) button.style.display = 'flex';
   });
  }

  if (nextBtn) {
   // Remove existing listeners
   const newNextBtn = nextBtn.cloneNode(true);
   nextBtn.parentNode.replaceChild(newNextBtn, nextBtn);
   newNextBtn.addEventListener('click', nextSlide);
  }

  if (prevBtn) {
   const newPrevBtn = prevBtn.cloneNode(true);
   prevBtn.parentNode.replaceChild(newPrevBtn, prevBtn);
   newPrevBtn.addEventListener('click', prevSlide);
  }

  window.addEventListener('resize', () => {
   const currentItemsPerView = getItemsPerView();
   if (slides.length <= currentItemsPerView) {
    imgSliderBtns.forEach(button => {
     if (button) button.style.display = 'none';
    });
   } else {
    imgSliderBtns.forEach(button => {
     if (button) button.style.display = 'flex';
    });
   }

   // Reset index if it exceeds new max
   const maxIndex = getMaxIndex();
   if (currentIndex > maxIndex) {
    currentIndex = maxIndex;
   }
   updateSlider();
  });

  updateSlider();
 }

 async loadBooks() {
  try {
   const healingResponse = await fetch('hope-api.php?action=get_books&category=healing');
   const healingData = await healingResponse.json();

   if (healingData.success && healingData.books) {
    this.renderBooks(healingData.books, 'healingBooksAccordion');
   } else {
    this.renderEmptyBooks('healingBooksAccordion', 'No healing books available yet.');
   }

   const othersResponse = await fetch('hope-api.php?action=get_books&category=others');
   const othersData = await othersResponse.json();

   if (othersData.success && othersData.books && othersData.books.length > 0) {
    this.renderBooks(othersData.books, 'othersBooksAccordion');
   } else {
    const othersSection = document.getElementById('others-section');
    if (othersSection) {
     othersSection.style.display = 'none';
    }
   }
  } catch (error) {
   console.error('Error loading books:', error);
   this.renderEmptyBooks('healingBooksAccordion', 'Error loading books. Please try again later.');
  }
 }

 renderBooks(books, containerId) {
  const container = document.getElementById(containerId);

  if (!container) return;

  if (!books || books.length === 0) {
   container.innerHTML = '<div class="accordion-item">No books available in this category.</div>';
   return;
  }

  container.innerHTML = books.map((book, index) => `
            <div class="accordion-item">
                <div class="accordion-header">
                    <a href="${book.book_link || '#'}" class="accordion-href" target="${book.book_link ? '_blank' : '_self'}">
                        <i class="ti ti-book-2"></i>
                        <span class="title">${this.escapeHtml(book.title)}</span>
                        <span class="author">by ${this.escapeHtml(book.author || 'Unknown Author')}</span>
                    </a>
                    <i class="ti ti-chevron-down accordion-chevron"></i>
                </div>
                <div class="accordion-content">
                    <p>${this.escapeHtml(book.description || 'No description available.')}</p>
                    ${book.book_link ? `<p style="margin-top: 15px;"><a href="${book.book_link}" target="_blank" style="color: #667eea;">📖 Learn more about this book →</a></p>` : ''}
                </div>
            </div>
        `).join('');

  this.initAccordion(container);
 }

 renderEmptyBooks(containerId, message) {
  const container = document.getElementById(containerId);
  if (container) {
   container.innerHTML = `<div class="accordion-item">${message}</div>`;
  }
 }

 initAccordion(container) {
  const items = container.querySelectorAll('.accordion-item');

  items.forEach(item => {
   const header = item.querySelector('.accordion-header');
   const chevron = item.querySelector('.accordion-chevron');

   const toggleAccordion = (e) => {
    if (e) e.stopPropagation();

    // Close other accordion items
    const allItems = document.querySelectorAll('.accordion-item');
    allItems.forEach(otherItem => {
     if (otherItem !== item && otherItem.classList.contains('active')) {
      otherItem.classList.remove('active');
     }
    });

    // Toggle current item
    item.classList.toggle('active');
   };

   if (header) {
    // Remove existing listeners by cloning and replacing
    const newHeader = header.cloneNode(true);
    header.parentNode.replaceChild(newHeader, header);

    // Get the updated elements
    const updatedItem = newHeader.closest('.accordion-item');
    const updatedChevron = updatedItem.querySelector('.accordion-chevron');

    newHeader.addEventListener('click', (e) => {
     // Don't toggle if clicking on the link
     if (e.target.closest('.accordion-href')) return;
     toggleAccordion(e);
    });

    if (updatedChevron) {
     const newChevron = updatedChevron.cloneNode(true);
     updatedChevron.parentNode.replaceChild(newChevron, updatedChevron);
     newChevron.addEventListener('click', toggleAccordion);
    }
   } else if (chevron) {
    const newChevron = chevron.cloneNode(true);
    chevron.parentNode.replaceChild(newChevron, chevron);
    newChevron.addEventListener('click', toggleAccordion);
   }
  });
 }

 showStoryModal(story) {
  const modal = document.getElementById('storyModal');
  const title = document.getElementById('storyModalTitle');
  const text = document.getElementById('storyModalText');
  const link = document.getElementById('storyModalLink');

  if (!modal) return;

  title.textContent = story.title;
  text.textContent = story.story_text;
  link.href = story.story_link || '#';

  modal.style.display = 'flex';

  const closeBtn = document.querySelector('.story-modal-close');
  if (closeBtn) {
   // Remove existing listener
   const newCloseBtn = closeBtn.cloneNode(true);
   closeBtn.parentNode.replaceChild(newCloseBtn, closeBtn);
   newCloseBtn.onclick = () => {
    modal.style.display = 'none';
   };
  }

  window.onclick = (e) => {
   if (e.target === modal) {
    modal.style.display = 'none';
   }
  };
 }

 setupEventListeners() {
  // Any additional global event listeners
 }

 escapeHtml(text) {
  const div = document.createElement('div');
  div.textContent = text;
  return div.innerHTML;
 }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
 new HopeFeature();
});