<?php
// Get user's profile icon if logged in
$header_profile_icon = 'gradient-1';
if (isset($_SESSION['user_id']) && !isset($_SESSION['guest_answers'])) {
 require_once 'db-connect.php';
 $stmt = $pdo->prepare("SELECT profile_icon FROM users WHERE id = ?");
 $stmt->execute([$_SESSION['user_id']]);
 $user_icon = $stmt->fetch();
 if ($user_icon && $user_icon['profile_icon']) {
  $header_profile_icon = $user_icon['profile_icon'];
 }
}
?>


<header id="header-nav">
 <nav>
  <div id="logo-container">
   <div class="logo-box logo-href">
    <h1 class="logo">MoveOn</h1>
   </div>
  </div>

  <div id="navigation-buttons">
   <ul class="nav-btn-list">

    <li><a href="vent.php" class="nav-btn"><i class="ti ti-volcano"></i> VENT</a></li>

    <li><a href="relapse.php" class="nav-btn"><i class="ti ti-music-heart"></i> RELAPSE</a></li>

    <li><a href="hope.php" class="nav-btn"><i class="ti ti-clover"></i> HOPE</a></li>

    <li><a href="track.php" class="nav-btn"><i class="ti ti-brand-google-fit"></i> TRACK</a></li>
   </ul>
  </div>

  <div id="profile" class="dropdown-profile">
   <div class="header-profile">
    <?php if (isset($_SESSION['guest_answers'])): ?>
     <div class="profile-circle gradient-default small-icon">
      <i class="ti ti-user"></i>
     </div>
     <span class="header-username">Guest</span>
    <?php elseif (isset($_SESSION['user_id'])): ?>
     <div class="profile-circle <?php echo $header_profile_icon; ?> small-icon" id="headerProfileIcon">
      <span><?php echo strtoupper(substr($_SESSION['username'] ?? 'U', 0, 1)); ?></span>
     </div>
    <?php endif; ?>
   </div>
   <div class="dropdown-list">
    <a id="view-profile-btn" href="profile.php">View Profile <i class="ti ti-user"></i></a>
    <!-- <button type="button" class="setting-btn">Settings <i class="ti ti-settings"></i></button> -->
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
      <?php if (isset($_SESSION['guest_answers'])): ?>
       <div class="profile-circle gradient-default small-icon">
        <i class="ti ti-user"></i>
       </div>
       <span class="header-username">Guest</span>
      <?php elseif (isset($_SESSION['user_id'])): ?>
       <div class="profile-circle <?php echo $header_profile_icon; ?> small-icon" id="headerProfileIcon">
        <span><?php echo strtoupper(substr($_SESSION['username'] ?? 'U', 0, 1)); ?></span>
       </div>
      <?php endif; ?>
      <a class="view-profile" href="profile.php">View profile</a>
     </div>

     <div class="func-btn">
      <!-- <button type="button" class="setting-btn"><i class="ti ti-settings"></i></button> -->
      <form method="POST" action="">
       <button type="submit" name="logout" class="log-out-btn" title="Logout"><i class="ti ti-logout"></i></button>
      </form>
     </div>
    </div>
   </li>

   <li><a href="vent.php" class="nav-btn"><i class="ti ti-volcano"></i> VENT</a></li>

   <li><a href="relapse.php" class="nav-btn"><i class="ti ti-music-heart"></i> RELAPSE</a></li>

   <li><a href="hope.php" class="nav-btn"><i class="ti ti-clover"></i> HOPE</a></li>

   <li><a href="track.php" class="nav-btn"><i class="ti ti-brand-google-fit"></i> TRACK</a></li>


  </ul>
 </div>
</header>