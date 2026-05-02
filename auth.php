<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="./assets/css/auth.css">
 <title>Sign Up</title>
</head>

<body>

 <main id="auth-container">

  <!-- sign up form -->
  <div id="sign-up-form" class="auth-form">
   <div class="header">
    <h2>Sign Up</h2>
    <p>Create your first account</p>
   </div>

   <form method="POST" action="">
    <div class="input-box">
     <div class="username-code">
      <div class="username">
       <label for="username">Username</label>
       <input type="text" name="username" id="username" required minlength="3" maxlength="255"/>
      </div>
      <div class="user-code">
       <label for="four_digi_code">Code</label>
       <input type="text" name="four_digit_code" id="four_digit_code" pattern="\d{4}" maxlength="4" required/>
      </div>
     </div>

     <div class="password">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" required>
     </div>

     <div class="confirm-password">
      <label for="confirm_password">Confirm password</label>
      <input type="password" name="confirm_password" id="confirm_password" required>
     </div>
     
     <p class="consent">By signing up, you consent to MoveOn's Terms of Use and Privacy Policy.</p>

     <div class="quess-or-login">
      <a href="?guest=1" class="quest-btn">Continue as guess?</a>
      <button type="button" class="toggle-login-btn">Log in</button>
     </div>

     <button type="submit" name="signup">Sign up</button>
    </div>
   </form>
  </div>

  <!-- login form -->
  <div id="log-in-form" class="auth-form">
   <div class="header">
    <h2>Log In</h2>
    <p>Input existing account</p>
   </div>

   <form method="POST" action="">
    <div class="input-box">
     <div class="username-code">
      <div class="username">
       <label for="username">Username</label>
       <input type="text" name="username" id="username" required minlength="3" maxlength="255"/>
      </div>
     </div>

     <div class="password">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" required>
     </div>
     
     <p class="consent">By logging in, you consent to MoveOn's Terms of Use and Privacy Policy.</p>

     <div class="quess-or-login">
      <button type="button" class="forgot-btn">Forgot password?</button>
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
   </div>

   <form method="POST" action="">
    <div class="input-box">
     <div class="username-code">
      <div class="username">
       <input class="recover-input" type="text" name="username" id="username" required minlength="3" maxlength="255" placeholder="username or 4 digit code"/>
      </div>
     </div>
     
     <!-- <p class="consent">By logging in, you consent to MoveOn's Terms of Use and Privacy Policy.</p> -->

     <div class="quess-or-login">
      <button type="button" class="toggle-login-btn">Log in</button>
      <a href="?guest=1" class="quest-btn">Continue as guess?</a>
      <button type="button" class="toggle-signup-btn">Sign up</button>
     </div>

     <button type="submit" name="recover">Recover</button>
    </div>
   </form>
  </div>

 </main>

</body>

</html>