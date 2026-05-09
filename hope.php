<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="assets/css/header&footer/header.css">
 <link rel="stylesheet" href="assets/css/hope.css">
 <link rel="stylesheet" href="assets/css/header&footer/footer.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
 <title>Hope</title>
</head>

<body>
 
 <?php include './includes/header.php' ?>

 <main>
  <section id="app-container">

   <div class="quote-section">
    <div class="quote-container">
     <blockquote>
      Design is not just what it looks like and feels like. Design is how it works.
     </blockquote>
     <cite>
      Steve Jobs
     </cite>
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
       <li>Use the writing bar at the bottom left-corner.</li>
       <li>Write what you feel and think, do not overthink it.</li>
       <li>Click the “Put” Button to put it inside the digital jar.</li>
       <li>If you want to release it, you can click the “Burn” Button.</li>
      </ul>
     </section>

     <section class="card-research">
      <h2><i class="ti ti-file-search"></i> Research</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur  vehicula interdum enim sed mollis. Praesent nec est in risus ullamcorper tristique. Sed vel condimentum leo, a vestibulum odio. Suspendisse  mattis porta mi. Integer tempus quis metus sit amet volutpat. Duis  interdum turpis id nisl condimentum, non pellentesque libero iaculis.  Donec feugiat consectetur lacus nec imperdiet. Nulla id malesuada sem.</p>
     </section>
   </aside>

  </section>

  <section id="heartbreak-stories">
   <div class="divider">
     <h2>Heartbreak stories of famous people</h2>
   </div>

   <div class="slider-container">
    <div class="img-slider-btns">
     <button class="prev-btn slider-btn"><i class="ti ti-arrow-badge-left"></i></button>
     <button class="next-btn slider-btn"><i class="ti ti-arrow-badge-right"></i></button>
    </div>

    <div class="slider-track">
     <a href="#" class="slide"><img src="./assets/images/webp/img1.webp" alt=""></a>
     <a href="#" class="slide"><img src="./assets/images/webp/img1.webp" alt=""></a>
     <a href="#" class="slide"><img src="./assets/images/webp/img1.webp" alt=""></a>
     <a href="#" class="slide"><img src="./assets/images/webp/img2.webp" alt=""></a>
     <a href="#" class="slide"><img src="./assets/images/webp/img2.webp" alt=""></a>
     <a href="#" class="slide"><img src="./assets/images/webp/img4.webp" alt=""></a>
    </div>
   </div>
   
  </section>

  <section id="books-section">
   <div class="divider">
    <h2>Recommended books for healing</h2>
   </div>

   <article class="accordion">
    <div class="accordion-item">
     <div class="accordion-header">
      <a href="#" class="accordion-href"><i class="ti ti-book-2"></i> <span class="title">The Body Keeps the Score</span> <span class="author">by Bessel van der Kolk</span></a>
      <i class="ti ti-chevron-down" id="chevron-btn"></i>
     </div>
     <div class="accordion-content">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis blanditiis provident illum qui, veritatis incidunt eius molestiae fuga minus minima earum sapiente quasi iste vel nostrum animi dolore, enim fugiat!
      Dolore libero reiciendis quia voluptas dignissimos accusantium harum labore adipisci, ea, sint voluptates explicabo accusamus exercitationem distinctio quos facere quis amet natus ipsam officiis dicta aliquid iusto praesentium? Vitae, sapiente.
      Maiores repellat sed nostrum dolores nemo veniam reprehenderit vitae, optio, vero esse explicabo. Quos ipsum, molestiae temporibus sapiente quo error nam aut aliquam dolores nulla facere mollitia sint unde odio.</p>
     </div>
    </div>
   </article>
  </section>

  <section id="others-section">
   <div class="divider">
    <h2>Others</h2>
   </div>

   <article class="accordion">
    <div class="accordion-item">
     <div class="accordion-header">
      <a href="#" class="accordion-href"><i class="ti ti-book-2"></i> <span class="title">More books here</span></a>
      <i class="ti ti-chevron-down" id="chevron-btn"></i>
     </div>
     <div class="accordion-content">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis blanditiis provident illum qui, veritatis incidunt eius molestiae fuga minus minima earum sapiente quasi iste vel nostrum animi dolore, enim fugiat!
      Dolore libero reiciendis quia voluptas dignissimos accusantium harum labore adipisci, ea, sint voluptates explicabo accusamus exercitationem distinctio quos facere quis amet natus ipsam officiis dicta aliquid iusto praesentium? Vitae, sapiente.
      Maiores repellat sed nostrum dolores nemo veniam reprehenderit vitae, optio, vero esse explicabo. Quos ipsum, molestiae temporibus sapiente quo error nam aut aliquam dolores nulla facere mollitia sint unde odio.</p>
     </div>
    </div>
   </article>
  </section>
 </main>

 <?php include './includes/footer.php' ?>

 <script src="assets/js/header.js"></script>
 <script src="assets/js/hope.js"></script>

</body>

</html>