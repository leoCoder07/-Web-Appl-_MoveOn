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
 <link rel="stylesheet" href="assets/css/relapse.css">
 <link rel="stylesheet" href="assets/css/header&footer/footer.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
 <title>Relapse - Music for Your Journey</title>
 <script>
  window.userSession = {
   isGuest: <?php echo isset($_SESSION['guest_answers']) ? 'true' : 'false'; ?>,
   userId: <?php echo $_SESSION['user_id'] ?? 'null'; ?>
  };
 </script>
</head>

<body>

 <?php include './includes/header.php' ?>

 <main>
  <section id="app-container">

   <div class="music-section">
    <div class="music-container" id="musicContainer">
     <!-- Playlist Tabs (initial view) -->
     <div id="playlistTabs">
      <div class="submerged-playlist playlist-tab" data-playlist="submerged">
       <h1 class="title">SUBMERGED</h1>
       <p class="description">The deep dive. This is for when you just want to drown in the feels. It's heavy, slow, and echoey, perfect for sitting in the dark and letting the nostalgia completely take over for a while.</p>
       <img src="./assets/images/svg/cd-red.svg" alt="cd-player">
      </div>
      <div class="ascendant-playlist playlist-tab" data-playlist="ascendant">
       <h1 class="title">ASCENDANT</h1>
       <p class="description">The glow-up vibe. It's about fresh air, high energy, and that "I'm back" feeling. These tracks have a steady beat and bright sound that make moving on feel like a win rather than a chore.</p>
       <img src="./assets/images/svg/cd-blue.svg" alt="cd-player">
      </div>
     </div>

     <!-- Playlist Display (hidden initially, shows when playlist is selected) -->
     <div id="playlistDisplay" class="playlist-display" style="display: none;">
      <div class="playlist-header">
       <button id="backToPlaylistsBtn" class="back-btn">
        <i class="ti ti-arrow-left"></i> Back
       </button>
       <h3 id="currentPlaylistTitle">SUBMERGED</h3>
       <div style="width: 40px;"></div> <!-- Spacer for alignment -->
      </div>
      <div id="songsList" class="songs-list">
       <!-- Songs will be dynamically populated here -->
      </div>
     </div>
    </div>
   </div>

   <aside class="sidebar">
    <header>
     <h1>RELAPSE!</h1>
     <p>Listen to music</p>
    </header>

    <section class="info-input">
     <section class="card-tutorial">
      <h2><i class="ti ti-alert-circle"></i> Quick Tutorial</h2>
      <ul class="tutorial-list">
       <li>Click on SUBMERGED or ASCENDANT to see available songs.</li>
       <li>Select any song from the playlist to start playing.</li>
       <li>Use the progress bar to skip to any part of the song.</li>
       <li>Click "Back" to return to playlist selection.</li>
       <li>Playback continues even if you navigate to other pages.</li>
       <li>Your current song and position are saved automatically.</li>
      </ul>
     </section>

     <section class="card-research">
      <h2><i class="ti ti-file-search"></i> Research</h2>
      <p>Music has the power to heal, to transport, and to validate our emotions. Whether you're sinking into the depths or rising toward the light, these carefully curated tracks meet you where you are. Let the rhythm guide your journey of moving forward.</p>
     </section>

     <div class="music-image" id="musicImage">
      <div class="title-container">
       <p>Now Playing:</p>
       <h3 id="songTitle">Select a song to play</h3>
       <span id="songArtist">Choose from any playlist</span>
      </div>
     </div>

     <div class="music-player">
      <div class="music-controller">
       <div class="music-progress music-element">
        <span class="current-time" id="currentTime">0:00</span>
        <input type="range" id="progressBar" class="progress-bar" min="0" max="100" value="0" step="0.1">
        <span class="duration" id="duration">0:00</span>
       </div>

       <div class="controls music-element">
        <button class="prev-btn" id="prevBtn" title="Previous song">
         <i class="ti ti-player-track-prev"></i>
        </button>

        <button class="next-btn" id="nextBtn" title="Next song">
         <i class="ti ti-player-track-next"></i>
        </button>

        <button class="play-btn" id="playBtn" title="Play/Pause">
         <i class="ti ti-player-play"></i>
        </button>

       </div>
      </div>
     </div>
    </section>
   </aside>

  </section>
 </main>

 <!-- Audio element (hidden) -->
 <audio id="audioPlayer" preload="metadata"></audio>

 <?php include './includes/footer.php' ?>

 <script src="assets/js/header.js"></script>
 <script src="assets/js/relapse.js"></script>
</body>

</html>