<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="assets/css/header&footer/header.css">
 <link rel="stylesheet" href="assets/css/hope.css">
 <link rel="stylesheet" href="assets/css/header&footer/footer.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
 <title>Hope - Gain Perspective</title>
</head>

<body>

 <?php include './includes/header.php' ?>

 <main>
  <section id="app-container">

   <div class="quote-section">
    <div class="quote-container">
     <blockquote id="dailyQuote">
      Loading...
     </blockquote>
     <cite id="quoteAuthor">-</cite>
    </div>
   </div>

   <aside class="sidebar">
    <header>
     <h1>HOPE!</h1>
     <p>Gain perspective</p>
    </header>

    <section class="info-input">
     <section class="card-tutorial">
      <h2><i class="ti ti-alert-circle"></i> Quick Tutorial</h2>
      <ul class="tutorial-list">
       <li>Read daily inspirational quotes to start your healing journey.</li>
       <li>Explore heartbreak stories from famous people who overcame adversity.</li>
       <li>Discover recommended books for healing and personal growth.</li>
       <li>Click on any book or story to learn more and access resources.</li>
      </ul>
     </section>

     <section class="card-research">
      <h2><i class="ti ti-file-search"></i> Research</h2>
      <p>Research shows that reading inspirational content and stories of resilience can significantly improve mental well-being. This section provides curated resources to help you find hope, gain perspective, and discover that you're not alone in your journey toward healing.</p>
     </section>
   </aside>

  </section>

  <section id="heartbreak-stories">
   <div class="divider">
    <h2>Heartbreak stories of famous people</h2>
   </div>

   <div class="slider-container">
    <div class="img-slider-btns">
     <button class="prev-btn slider-btn" id="storiesPrevBtn"><i class="ti ti-arrow-badge-left"></i></button>
     <button class="next-btn slider-btn" id="storiesNextBtn"><i class="ti ti-arrow-badge-right"></i></button>
    </div>

    <div class="slider-track" id="storiesTrack">
     <!-- Stories will be dynamically loaded here -->
    </div>
   </div>

  </section>

  <section id="books-section">
   <div class="divider">
    <h2>Recommended books for healing</h2>
   </div>

   <article class="accordion" id="healingBooksAccordion">
    <!-- Healing books will be dynamically loaded here -->
   </article>
  </section>

  <section id="others-section">
   <div class="divider">
    <h2>Others</h2>
   </div>

   <article class="accordion" id="othersBooksAccordion">
    <!-- Other books will be dynamically loaded here -->
   </article>
  </section>
 </main>

 <!-- Modal for story details -->
 <div id="storyModal" class="story-modal">
  <div class="story-modal-content">
   <div class="story-modal-header">
    <h3 id="storyModalTitle">Story Title</h3>
    <span class="story-modal-close">&times;</span>
   </div>
   <div class="story-modal-body">
    <p id="storyModalText"></p>
   </div>
   <div class="story-modal-footer">
    <a href="#" id="storyModalLink" target="_blank" class="read-more-btn">Read Full Story →</a>
   </div>
  </div>
 </div>

 <?php include './includes/footer.php' ?>

 <script src="assets/js/header.js"></script>
 <script src="assets/js/hope.js"></script>

</body>

</html>