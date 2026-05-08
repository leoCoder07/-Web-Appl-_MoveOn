<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="./assets/css/auth.css">

 <?php 

  require_once 'process-authentication.php';
  // require_once 'process-post-authentication.php';

  if (isset($_SESSION['four_digit_code']) || isset($_SESSION['guest_answers'])) {
   header('Location: moveon.php');
   exit;
  }

 ?>

 <title><?= $show_login ? 'Log in' : 'Sign up' ?></title>
</head>

<body>

 <div class="logo-box">
  <h1 class="logo">MoveOn</h1>
 </div>

 <main id="auth-container">

  <!-- sign up form -->
  <div id="sign-up-form" class="auth-form <?= $show_login ? '' : 'active' ?>">
   <div class="header">
    <h2>Sign Up</h2>
    <p>Create your first account</p>
    <?php if ($error): ?>
    <p id="error-message"><?= $error; ?></p>
    <?php endif ?>
   </div>

   <form method="POST" action="" autocomplete="off">
    <div class="input-box">
     <div class="username-code">
      <div class="username">
       <label for="username">Username</label>
       <input type="text" name="username" id="username" minlength="3" maxlength="255" value="<?= htmlspecialchars($username_value_sign_up ?? ''); ?>"/>
      </div>
      <div class="user-code">
       <label for="four_digit_code">Code</label>
       <input type="text" name="four_digit_code" id="four_digit_code" pattern="\d{4}" maxlength="4"  value="<?= htmlspecialchars($four_digit_code ?? ''); ?>"/>
      </div>
     </div>

     <div class="password">
      <label for="password">Password</label>
      <input type="password" name="password" id="password"  autocomplete="new-password">
     </div>

     <div class="confirm-password">
      <label for="confirm_password">Confirm password</label>
      <input type="password" name="confirm_password" id="confirm_password"  autocomplete="new-password">
     </div>
     
     <p class="consent">By signing up, you consent to MoveOn's Terms of Use and Privacy Policy.</p>

     <div class="quess-or-login">
      <a href="?guest" class="quest-btn">Continue as guess?</a>
      <button type="button" class="toggle-login-btn">Log in</button>
     </div>

     <button type="submit" name="signup">Sign up</button>
    </div>
   </form>
  </div>

  <!-- login form -->
  <div id="log-in-form" class="auth-form <?= $show_login ? 'active' : '' ?>">
   <div class="header">
    <h2>Log In</h2>
    <p>Input existing account</p>
    <?php if ($error): ?>
    <p id="error-message"><?= $error; ?></p>
    <?php elseif ($success): ?>
    <p id="success-message"><?= $success; ?></p>
    <?php endif ?>
   </div>

   <form method="POST" action="" autocomplete="off">
    <div class="input-box">
     <div class="username-code">
      <div class="username">
       <label for="username">Username</label>
       <input type="text" name="username" id="username" value="<?= htmlspecialchars($username_value_login ?? '') ?>" minlength="3" maxlength="255"/>
      </div>
     </div>

     <div class="password">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" autocomplete="current-password">
     </div>
     
     <p class="consent">By logging in, you consent to MoveOn's Terms of Use and Privacy Policy.</p>

     <div class="quess-or-login">
      <button type="button" class="forgot-pass-btn">Forgot password?</button>
      <button type="button" class="toggle-signup-btn">Sign up</button>
     </div>

     <button type="submit" name="login">Log In</button>
    </div>
   </form>
  </div>

  <!-- forgot password form -->
  <div id="forgot-pass-form" class="auth-form">
   <div class="header">
    <h2>Recover account</h2>
    <p>Remember you username / code</p>
    <?php if ($error): ?>
    <p id="error-message"><?= $error; ?></p>
    <?php elseif ($success): ?>
    <p id="success-message"><?= $success; ?></p>
    <?php endif ?>
   </div>

   <form method="POST" action="">
    <div class="input-box">
     <div class="username-code">
      <div class="username">
       <input class="recover-input" type="text" name="identifier" id="username" minlength="3" maxlength="255" placeholder="username or 4 digit code"/>
      </div>
     </div>
     
     <!-- <p class="consent">By logging in, you consent to MoveOn's Terms of Use and Privacy Policy.</p> -->

     <div class="quess-or-login">
      <button type="button" class="toggle-login-btn">Log in</button>
      <a href="?guest" class="quest-btn">Continue as guess?</a>
      <button type="button" class="toggle-signup-btn">Sign up</button>
     </div>

     <button type="submit" name="recover_password">Recover</button>
    </div>
   </form>
  </div>

 </main>

 <footer>
  <h4>Copyright &copy; 2026 All Rights Reserved</h4>
  <h4>Made with &#x2764; by <a href="#container" target="_blank">@johnleojariel</a></h4>
 </footer>

 <script src="./assets/js/auth.js"></script>

</body>

</html>