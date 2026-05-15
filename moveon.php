<?php

require_once './scripts/process/process-authentication.php';
require_once './scripts/process/process-post-authentication.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="shortcut icon" href="assets/images/svg/moveon-logo.svg" type="image/svg">
 <link rel="stylesheet" href="assets/css/header&footer/header.css">
 <link rel="stylesheet" href="assets/css/moveon.css">
 <link rel="stylesheet" href="assets/css/header&footer/footer.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
 <title>MoveOn</title>
</head>

<body>


 <?php include './includes/header.php'; ?>

 <main>

  <section class="hero" id="hero">
   <div class="hero-inside">
    <div class="hero-content">
     <h1>Healing isn't a race.<br>Take the first step at your own pace.</h1>
     <p>You are more than what happened to you. Let's start rebuilding today.</p>
    </div>

    <div class="hero-nav">
     <div class="thumbnails">
      <img src="assets/images/webp/img1.webp" class="thumb active" data-index="0">
      <img src="assets/images/webp/img2.webp" class="thumb" data-index="1">
      <img src="assets/images/webp/img3.webp" class="thumb" data-index="2">
      <img src="assets/images/webp/img4.webp" class="thumb" data-index="3">
     </div>
    </div>

    <div class="dots">
     <span class="dot active" data-index="0"></span>
     <span class="dot" data-index="1"></span>
     <span class="dot" data-index="2"></span>
     <span class="dot" data-index="3"></span>
    </div>
   </div>
  </section>


  <section id="why-you-need-moveOn">
   <div class="header">
    <h1>Why you need <span class="logo">MoveOn</span>?</h1>
   </div>

   <article class="feature">
    <img src="assets/images/svg/vent.svg" alt="vent">

    <div class="caption right">
     <h2>Vent</h2>
     <h2>Release your thoughts</h2>
     <p>Type out your feelings, thoughts, or anger. You can choose to save your entries in a private archive to track your thoughts over time or use the "Digital Shredder" to let them go forever.</p>
    </div>
   </article>

   <article class="feature reverse">
    <img src="assets/images/svg/relapse.svg" alt="relapse">

    <div class="caption">
     <h2>Relapse</h2>
     <h2>Listen to music</h2>
     <p>Instead of reaching out to the past, reach for your headphones. This section provides categorized playlists—from "Cathartic Release" (for when you need to cry) to "Individuality & Power" (for when you're ready to stand tall again).</p>
    </div>
   </article>

   <article class="feature">
    <img src="assets/images/svg/hope.svg" alt="hope">

    <div class="caption right">
     <h2>Hope</h2>
     <h2>Gain perspective</h2>
     <p>When you're stuck in your own head, you need new voices. The Hope page connects you with the resilience of others who have walked this path before you.</p>
    </div>
   </article>

   <article class="feature reverse">
    <img src="assets/images/svg/tracker.svg" alt="tracker">

    <div class="caption">
     <h2>Track</h2>
     <h2>Visualize progress</h2>
     <p>See the "big picture" of your recovery. Even on bad days, your history will prove that you are moving forward.</p>
    </div>
   </article>

   <blockquote>
    <p>“Because moving on isn't about forgetting; it's about outgrowing the pain. <span class="logo-text">MoveOn</span> provides four structured pillars to help you navigate the messiest parts of a breakup.”</p>
   </blockquote>
  </section>
 </main>


 <?php include './includes/footer.php'; ?>

 <script src="assets/js/header.js"></script>
 <script src="assets/js/moveon.js"></script>

</body>

</html>