<?php 

require_once 'process-authentication.php';
require_once 'process-post-authentication.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="assets/css/header&footer/header.css">
 <link rel="stylesheet" href="assets/css/vent.css">
 <link rel="stylesheet" href="assets/css/header&footer/footer.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
 <title>Vent</title>
</head>

<body>

 <?php include './includes/header.php'; ?>

 <main>
  <section id="app-container">
   <div class="jar-section">
    <div class="jar">
     <div class="jar-lid"></div>
     <div class="jar-body">
      <img id="jar-reflection" src="assets/images/svg/jar-reflection.svg" alt="">
     </div>
    </div>
   </div>

   <aside class="sidebar">
    <header>
     <h1>VENT!</h1>
     <p>Release your thoughts</p>
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

     <div class="input-area">
      <form method="POST" action="">
       <textarea name="vent-message" placeholder="Write your unsaid thoughts/feelings here" spellcheck="false"></textarea>
       <button type="submit" name="post-vent-message"><i class="ti ti-circle-dashed-plus"></i><span>Put</span></button>
      </form>
     </div>
    </section>
   </aside>
  </section>
 </main>

 <?php include './includes/footer.php' ?>

 <script src="assets/js/header.js"></script>
 

</body>

</html>