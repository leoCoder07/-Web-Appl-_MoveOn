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

   <div id="profile">
    <div class="profile-circle"></div>
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
   <h1>Why you need <span class="logo">MoveOn</span></h1>
  </div>

  <article class="feature-1">
   
  </article>
 </section>

 </main>

 <script src="assets/js/moveon.js"></script>

</body>

</html>