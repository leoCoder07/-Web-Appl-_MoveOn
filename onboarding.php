
<?php 

 require_once 'process-authentication.php';

 if (isset($_SESSION['user_id']) || isset($_SESSION['guest_answers'])) {
  header('Location: moveon.php');
  exit;
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="./assets/css/onboarding-styles.css">
 <title>Onboarding | Questions</title>
</head>

<body>

 <div class="logo-box">
  <h1 class="logo">MoveOn</h1>
 </div>

 <main>
  <div id="main-container">
   <form id="onboarding-form" method="POST" action="">
    <div id="sub-container">
     <div class="header-q">
      <h1 class="header-1">Hi! You are exactly where you are. It's not a mistake.</h1>
      <h2 id="questionText" class="header-2"></h2>
     </div>

     <div id="options-container">
      <div id="optionsContainer"></div>

      <div id="buttons-q-nav">
       <button type="button" id="backBtn">← Back</button>
       <button type="button" id="skipBtn">Skip</button>
       <button type="button" id="nextBtn">Next →</button>
      </div>
     </div>
    </div>
   </form>
  </div>
 </main>

 <footer>
  <h4>Copyright &copy; 2026 All Rights Reserved</h4>
  <h4>Made with &#x2764; by <a href="#container" target="_blank">@johnleojariel</a></h4>
 </footer>

 <script src="./assets/js/onboarding.js"></script>

</body>

</html>