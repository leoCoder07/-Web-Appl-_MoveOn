<?php
require_once 'process-authentication.php';
require_once 'process-post-authentication.php';
$is_guest = isset($_SESSION['guest_answers']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="shortcut icon" href="assets/images/svg/moveon-logo.svg" type="image/svg">
 <link rel="stylesheet" href="assets/css/header&footer/header.css">
 <link rel="stylesheet" href="assets/css/profile.css">
 <link rel="stylesheet" href="assets/css/header&footer/footer.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
 <title>Profile - MoveOn</title>
</head>

<body>
 <?php include './includes/header.php'; ?>

 <main>
  <div class="profile-container">
   <?php if ($is_guest): ?>
    <div class="guest-profile">
     <div class="profile-icon-wrapper">
      <div class="profile-icon gradient-default">
       <i class="ti ti-user"></i>
      </div>
     </div>
     <div class="profile-info">
      <div class="username-section">
       <h2>Guest User</h2>
       <span class="guest-badge">Guest Account</span>
      </div>
     </div>
     <div class="guest-message">
      <i class="ti ti-info-circle"></i>
      <p>You are currently using a guest account. <a href="auth.php">Sign up</a> or <a href="auth.php">log in</a> to create your personalized profile, save your data across devices, and access all features!</p>
     </div>
    </div>
   <?php else: ?>
    <div class="user-profile" id="userProfile">
     <div class="profile-header">
      <div class="profile-icon-wrapper">
       <div class="profile-icon" id="profileIcon">
       </div>
       <button class="edit-icon-btn" id="editIconBtn" title="Change profile icon">
        <i class="ti ti-edit"></i>
       </button>
      </div>

      <div class="profile-info">
       <div class="username-section editable">
        <h2 id="displayUsername">Loading...</h2>
        <span id="displayUserCode" class="user-code">#----</span>
        <button class="edit-text-btn" id="editUsernameBtn" title="Edit username">
         <i class="ti ti-edit"></i> Change username
        </button>
       </div>

       <div class="bio-section">
        <p id="displayBio">Loading bio...</p>
       </div>
       <button class="edit-bio-btn" id="editBioBtn" title="Edit bio">
        <i class="ti ti-edit"></i> Edit bio
       </button>
      </div>
     </div>

     <div class="answers-section">
      <h3>Your Onboarding Journey</h3>
      <div id="answersContainer" class="answers-container">
       <div class="loading">Loading your answers...</div>
      </div>
     </div>

     <div class="settings-section">
      <form method="POST" action="process-post-authentication.php" class="logout-form">
       <button type="submit" name="logout" class="logout-btn">
        <i class="ti ti-logout"></i> Log Out
       </button>
      </form>
     </div>
    </div>
   <?php endif; ?>
  </div>
 </main>

 <div id="iconModal" class="modal">
  <div class="modal-content modal-medium">
   <div class="modal-header">
    <h3><i class="ti ti-palette"></i> Choose Your Profile Icon</h3>
    <span class="close-modal"><i class="ti ti-circle-dashed-x"></i></span>
   </div>
   <div class="modal-body">
    <div class="icon-grid" id="iconGrid">
    </div>
   </div>
  </div>
 </div>

 <div id="usernameModal" class="modal">
  <div class="modal-content">
   <div class="modal-header">
    <h3><i class="ti ti-user-edit"></i> Change Username</h3>
    <span class="close-modal"><i class="ti ti-circle-dashed-x"></i></span>
   </div>
   <div class="modal-body">
    <p class="info-text">You can change your username <strong>3 times per month</strong>.</p>
    <div class="form-group">
     <label for="newUsername">New Username</label>
     <input type="text" id="newUsername" placeholder="Enter new username" maxlength="50">
     <small>Only letters, numbers, and underscores. 3-50 characters.</small>
    </div>
    <div class="form-group">
     <label for="userCode">Your 4-digit code (for verification)</label>
     <input type="password" id="userCode" placeholder="Enter your 4-digit code" maxlength="4">
    </div>
    <div id="usernameError" class="error-message"></div>
   </div>
   <div class="modal-footer">
    <button class="btn-secondary" id="cancelUsernameBtn">Cancel</button>
    <button class="btn-primary" id="saveUsernameBtn">Save Changes</button>
   </div>
  </div>
 </div>

 <div id="bioModal" class="modal">
  <div class="modal-content">
   <div class="modal-header">
    <h3><i class="ti ti-edit"></i> Edit Bio</h3>
    <span class="close-modal"><i class="ti ti-circle-dashed-x"></i></span>
   </div>
   <div class="modal-body">
    <div class="form-group">
     <label for="userBio">Your Bio (max 500 characters)</label>
     <textarea id="userBio" rows="4" maxlength="500" placeholder="Write something about yourself..."></textarea>
     <small><span id="bioCharCount">0</span>/500 characters</small>
    </div>
    <div id="bioError" class="error-message"></div>
   </div>
   <div class="modal-footer">
    <button class="btn-secondary" id="cancelBioBtn">Cancel</button>
    <button class="btn-primary" id="saveBioBtn">Save Changes</button>
   </div>
  </div>
 </div>

 <?php include './includes/footer.php'; ?>

 <script src="assets/js/header.js"></script>
 <script src="assets/js/profile.js"></script>
</body>

</html>