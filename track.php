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
 <link rel="stylesheet" href="assets/css/track.css">
 <link rel="stylesheet" href="assets/css/header&footer/footer.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
 <title>Track</title>
</head>

<body>

 <?php include './includes/header.php'; ?>

 <main>

  <div class="tracker-container" id="app">
   <header>
    <h1>Track!</h1>
    <p>Visualize progress</p>
   </header>

   <!-- dynamic calendar header & navigation -->
   <div class="calendar-nav">
    <div class="calendar-head">
     <div class="month-year" id="monthYearDisplay">May 2025</div>
     <div>
      <button class="calendar-nav-btn" id="prevMonthBtn"><i class="ti ti-arrow-narrow-left"></i></button>
      <button class="calendar-nav-btn" id="nextMonthBtn"><i class="ti ti-arrow-narrow-right"></i></button>
     </div>
    </div>
   </div>

   <div class="calendar-weekdays">
    <span>SUN</span><span>MON</span><span>TUE</span><span>WED</span><span>THU</span><span>FRI</span><span>SAT</span>
   </div>

   <div id="calendarGrid" class="calendar-grid"></div>

   <!-- mood selection area (exactly like concept) -->
   <div class="mood-panel">
    <aside class="sidebar">

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
    <div class="main-func-section">
     <div class="main-func">
      <div class="mood-question">
       So what do you feel right now?
      </div>
      <div class="mood-buttons" id="moodButtonsContainer">
       <button data-mood="Great" class="mood-btn">✨ Great</button>
       <button data-mood="Stable" class="mood-btn">🌿 Stable</button>
       <button data-mood="Sad" class="mood-btn">💧 Sad</button>
       <button data-mood="Drained" class="mood-btn">⚡ Drained</button>
       <button data-mood="Overwhelmed" class="mood-btn">🌀 Overwhelmed</button>
       <button data-mood="Motivated" class="mood-btn">🚀 Motivated</button>
      </div>
     </div>
     <button id="burnSelectedBtn" class="primary-btn danger-btn"><i class="ti ti-pinned-off"></i></button>
     <button id="pinTodayBtn" class="primary-btn"><i class="ti ti-pin"></i></button>
    </div>
    <!-- <div class="info-message">
     💡 Click a mood, then press "Put mood on TODAY" → pins your feeling to current real day.<br>
     🔥 "Burn" removes mood from today's cell.<br>
     📅 Navigate months with Prev/Next, see your whole mood history.
    </div> -->
   </div>
  </div>

 </main>

 <?php include './includes/footer.php' ?>

 <script src="assets/js/track.js"></script>

</body>

</html>