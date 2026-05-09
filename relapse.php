<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="assets/css/header&footer/header.css">
 <link rel="stylesheet" href="assets/css/relapse.css">
 <link rel="stylesheet" href="assets/css/header&footer/footer.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
 <title>Relapse</title>
</head>

<body>
 
 <?php include './includes/header.php' ?>


 <main>
  <section id="app-container">

   <div class="music-section">
    <div class="music-container">
     <div class="submerged-playlist playlist-tab">
      <h1 class="title">SUBMERGED</h1>
      <p class="description">The deep dive. This is for when you just want to drown in the feels. It's heavy, slow, and echoey, perfect for sitting in the dark and letting the nostalgia completely take over for a while.</p>
      <img src="./assets/images/svg/cd-red.svg" alt="cd-player">
     </div>
     <div class="ascendant-playlist playlist-tab">
      <h1 class="title">ASCENDANT</h1>
      <p class="description">The glow-up vibe. It's all about fresh air, high energy, and that "I'm back" feeling. These tracks have a steady beat and bright sound that make moving on feel like a win rather than a chore.</p>
      <img src="./assets/images/svg/cd-blue.svg" alt="cd-player">
     </div>
    </div>
   </div>
   
   <aside class="sidebar">
    <header>
     <h1>RELAPSE!</h1>
     <p>Listen to music</p>
    </header>

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

     <div class="music-image"></div>
     <div class="music-controller"></div>
   </aside>

  </section>
 </main>



</body>

</html>