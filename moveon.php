<?php 

require_once 'process-authentication.php';
require_once 'process-post-authentication.php'; 

?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="assets/css/moveon.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
 <title>MoveOn</title>
</head>

<body>

 <header id="header-nav">
  <nav>
   <div id="logo-container">
    <div class="logo-box">
     <h1 class="logo">MoveOn</h1>
    </div>
   </div>

   <div id="navigation-buttons">
    <ul class="nav-btn-list">

     <li><a href="" class="nav-btn"><i class="ti ti-volcano"></i> VENT</a></li>
     
     <li><a href="" class="nav-btn"><i class="ti ti-music-heart"></i> RELAPSE</a></li>
     
     <li><a href="" class="nav-btn"><i class="ti ti-clover"></i> HOPE</a></li>

     <li><a href="" class="nav-btn"><i class="ti ti-brand-google-fit"></i> TRACK</a></li>
    </ul>
   </div>

   <div id="profile" class="dropdown-profile">
    <div class="profile-circle"></div>
    <div class="dropdown-list">
     <a id="view-profile-btn" href="#">View Profile <i class="ti ti-user"></i></a>
     <button type="button" class="setting-btn">Settings <i class="ti ti-settings"></i></button>
     <form method="POST" action="">
      <button type="submit" name="logout">Log Out <i class="ti ti-logout"></i></button>
     </form>
    </div>
   </div>

   <div id="burger-btn">
    <i class="ti ti-menu-3" id="menu-btn"></i>
   </div>
  </nav>
 </header>

 <header id="nav-resp">
  <div id="navigation-buttons">
   <ul class="nav-btn-list">

    <li>
     <div class="nav-btn">
      <div id="profile">
       <div class="profile-circle"></div>
       <span class="view-profile">View profile</span>
      </div>

      <div class="func-btn">
       <button type="button" class="setting-btn"><i class="ti ti-settings"></i></button>
       <form method="POST" action="">
        <button type="submit" name="logout" class="log-out-btn" title="Logout"><i class="ti ti-logout"></i></button>
       </form>
      </div>
     </div>
    </li>

    <li><a href="" class="nav-btn"><i class="ti ti-volcano"></i> VENT</a></li>
    
    <li><a href="" class="nav-btn"><i class="ti ti-music-heart"></i> RELAPSE</a></li>
    
    <li><a href="" class="nav-btn"><i class="ti ti-clover"></i> HOPE</a></li>

    <li><a href="" class="nav-btn"><i class="ti ti-brand-google-fit"></i> TRACK</a></li>

    
   </ul>
  </div>
 </header>

 <main>
  <!-- Hero Section -->
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

 <!-- Why you need MoveOn Section -->
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

 <footer>
  <div id="footer-container">
   <div id="logo-container">
    <div class="logo-box">
     <h1 class="logo">MoveOn</h1>
    </div>
   </div>

   <div class="footer-nav-btns">
    <h3 class="sub-quote">To move on is to accept the past</h3>
    <div class="explore">
     <h3>EXPLORE</h3>
     <ul class="ftr-nav-btns">
      <li><a href="">Docs</a></li>
      <li><a href="">FAQ's</a></li>
      <li><a href="">Contact</a></li>
      <li><a href="">About</a></li>
      <li><a href="">Books</a></li>
     </ul>
    </div>
    <div class="navigate">
     <h3>NAVIGATE</h3>
     <ul class="ftr-nav-btns">
      <li><a href="">Vent</a></li>
      <li><a href="">Relapse</a></li>
      <li><a href="">Hope</a></li>
      <li><a href="">Track</a></li>
     </ul>
    </div>
   </div>

   <div class="credits">
    <p>Made with ❤ by <a href="">@johnleojariel</a></p>
    <p>Copyright &copy; 2026 All Rights Reserved.</p>
   </div>
  </div>
 </footer>

 <script src="assets/js/moveon.js"></script>

</body>

</html>