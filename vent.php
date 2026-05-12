<?php
require_once 'process-authentication.php';
require_once 'process-post-authentication.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="shortcut icon" href="assets/images/svg/moveon-logo.svg" type="image/svg">
 <link rel="stylesheet" href="assets/css/header&footer/header.css">
 <link rel="stylesheet" href="assets/css/vent.css">
 <link rel="stylesheet" href="assets/css/header&footer/footer.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
 <title>Vent - Release Your Thoughts</title>
 <script>
  // Pass user session info to JavaScript
  window.userSession = {
   isGuest: <?php echo isset($_SESSION['guest_answers']) ? 'true' : 'false'; ?>,
   userId: <?php echo $_SESSION['user_id'] ?? 'null'; ?>
  };
 </script>
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
      <div id="papersContainer" class="papers-container">
       <!-- Rolled papers will be dynamically inserted here -->
       <div class="loading-indicator">Loading your thoughts...</div>
      </div>
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
       <li>Write what you feel and think in the text area below.</li>
       <li>Click the "Put" button to add your rolled paper to the jar.</li>
       <li>Click on any paper in the jar to read your message.</li>
       <li>In the modal, you can delete individual messages.</li>
       <li>Use "Burn All" to clear all your messages at once.</li>
      </ul>
     </section>

     <section class="card-research">
      <h2><i class="ti ti-file-search"></i> Research</h2>
      <p>Writing down your thoughts can reduce stress and improve mental clarity. This digital jar gives you a safe space to release what's on your mind without judgment. Each paper represents a moment of release—collected, but never forgotten unless you choose to let go.</p>
     </section>

     <div class="input-area">
      <form id="ventForm">
       <textarea id="ventMessage" name="vent-message" placeholder="Write your unsaid thoughts/feelings here..." spellcheck="false" maxlength="500"></textarea>
       <button type="submit" id="putButton"><i class="ti ti-circle-dashed-plus"></i><span>Put</span></button>
      </form>
      <!-- <div class="burn-all-container">
       <button id="burnAllBtn" class="burn-all-btn"><i class="ti ti-trash"></i> Burn All Messages</button>
      </div> -->
     </div>
    </section>
   </aside>
  </section>
 </main>

 <!-- Modal for viewing message -->
 <div id="messageModal" class="modal">
  <div class="modal-content">
   <div class="modal-header">
    <h3><i class="ti ti-message"></i> Your Thought</h3>
    <span class="close-modal"><i class="ti ti-circle-dashed-x"></i></span>
   </div>
   <div class="modal-body">
    <div class="modal-message" id="modalMessage"></div>
    <div class="modal-date" id="modalDate"></div>
   </div>
   <div class="modal-footer">
    <button id="deleteMessageBtn" class="delete-message-btn"><i class="ti ti-trash"></i></button>
   </div>
  </div>
 </div>

 <?php include './includes/footer.php' ?>

 <script src="assets/js/header.js"></script>
 <script src="assets/js/vent.js"></script>
</body>

</html>