class MusicPlayer {
 constructor() {
  this.playlists = {
   submerged: {
    title: "SUBMERGED",
    songs: [
     {
      id: "sub_1",
      title: "The Night We Met",
      artist: "Lord Huron",
      duration: 208,
      url: "assets/music/submerged/night-we-met.mp3",
      imgUrl:
       "https://i.pinimg.com/originals/94/6d/7d/946d7d491f4f128b03235ab452bbf202.gif",
     },
     {
      id: "sub_2",
      title: "Lifetime",
      artist: "Ben&Ben",
      duration: 277,
      url: "assets/music/submerged/lifetime.mp3",
      imgUrl:
       "https://i.pinimg.com/originals/a9/9d/57/a99d5708b68d44cdc725c59e17cc2167.gif",
     },
     {
      id: "sub_3",
      title: "Kalapastangan",
      artist: "fitterkarma",
      duration: 276,
      url: "assets/music/submerged/Kalapastangan.mp3",
      imgUrl:
       "https://i.pinimg.com/originals/d1/ce/9c/d1ce9c89d666cc576955c934f8203a36.gif",
     },
     {
      id: "sub_4",
      title: "The Scientist",
      artist: "Coldplay",
      duration: 311,
      url: "assets/music/submerged/the-scientist.mp3",
      imgUrl:
       "https://i.pinimg.com/originals/9f/16/8a/9f168ace87835bd22fea42c111773b12.gif",
     },
     {
      id: "sub_5",
      title: "About You",
      artist: "The 1975",
      duration: 326,
      url: "assets/music/submerged/about-you.mp3",
      imgUrl:
       "https://i.pinimg.com/originals/74/c7/b5/74c7b5a29d3e34262ce0344a763b97e7.gif",
     },
     {
      id: "sub_6",
      title: "Pahina",
      artist: "Cup of Joe",
      duration: 249,
      url: "assets/music/submerged/pahina.mp3",
      imgUrl:
       "https://i.pinimg.com/originals/dc/54/58/dc5458ae693d75209933cc3391d7cd4b.gif",
     },
     {
      id: "sub_7",
      title: "Let Her Go",
      artist: "Passenger",
      duration: 254,
      url: "assets/music/submerged/let-her-go.mp3",
      imgUrl:
       "https://i.pinimg.com/originals/2b/7e/0f/2b7e0ff9753c0296e607ccec260783cc.gif",
     },
     {
      id: "sub_8",
      title: "back to friends",
      artist: "sombr",
      duration: 199,
      url: "assets/music/submerged/back-to-friends.mp3",
      imgUrl:
       "https://i.pinimg.com/originals/16/64/e7/1664e7a45bb1ec24507301f9b5a5ed1f.gif",
     },
     {
      id: "sub_9",
      title: "Look After You",
      artist: "The Fray",
      duration: 269,
      url: "assets/music/submerged/look-after-you.mp3",
      imgUrl:
       "https://i.pinimg.com/originals/ca/1a/07/ca1a07f13ce0bac6282d2ae4433a5d38.gif",
     },
    ],
   },
   ascendant: {
    title: "ASCENDANT",
    songs: [
     {
      id: "asc_1",
      title: "On Top of the World",
      artist: "Imagine Dragons",
      duration: 192,
      url: "assets/music/ascendant/on-top-of-the-world.mp3",
     },
     {
      id: "asc_2",
      title: "Unstoppable",
      artist: "Sia",
      duration: 215,
      url: "assets/music/ascendant/unstoppable.mp3",
     },
     {
      id: "asc_3",
      title: "Hall of Fame",
      artist: "The Script",
      duration: 202,
      url: "assets/music/ascendant/hall-of-fame.mp3",
     },
     {
      id: "asc_4",
      title: "Fight Song",
      artist: "Rachel Platten",
      duration: 203,
      url: "assets/music/ascendant/fight-song.mp3",
     },
     {
      id: "asc_5",
      title: "Happy",
      artist: "Pharrell Williams",
      duration: 240,
      url: "assets/music/ascendant/happy.mp3",
     },
     {
      id: "asc_6",
      title: "Animals",
      artist: "Maroon 5",
      duration: 229,
      url: "assets/music/ascendant/animals.mp3",
     },
     {
      id: "asc_7",
      title: "Birds",
      artist: "Imagine Dragons",
      duration: 222,
      url: "assets/music/ascendant/birds.mp3",
     },
    ],
   },
  };

  this.currentPlaylist = null;
  this.currentSongIndex = 0;
  this.isPlaying = false;
  this.audio = document.getElementById("audioPlayer");

  this.init();
 }

 async init() {
  this.setupEventListeners();
  await this.loadSavedState();
  this.updateUI();

  setInterval(() => this.savePlaybackState(), 3000);
  this.audio.addEventListener("ended", () => this.nextSong());
  this.audio.addEventListener("timeupdate", () => this.updateProgress());
 }

 setupEventListeners() {
  document.querySelectorAll(".playlist-tab").forEach((tab) => {
   tab.addEventListener("click", () => {
    const playlist = tab.dataset.playlist;
    this.showPlaylist(playlist);
   });
  });

  const backBtn = document.getElementById("backToPlaylistsBtn");
  if (backBtn) {
   backBtn.addEventListener("click", () => this.showPlaylistTabs());
  }

  document
   .getElementById("playBtn")
   .addEventListener("click", () => this.togglePlay());
  document
   .getElementById("prevBtn")
   .addEventListener("click", () => this.prevSong());
  document
   .getElementById("nextBtn")
   .addEventListener("click", () => this.nextSong());

  const progressBar = document.getElementById("progressBar");
  progressBar.addEventListener("input", (e) => {
   if (this.audio.duration) {
    const percent = e.target.value / 100;
    this.audio.currentTime = percent * this.audio.duration;
   }
  });
 }

 showPlaylist(playlistName) {
  const playlist = this.playlists[playlistName];
  if (!playlist) return;

  const newPlaylistName = playlistName;

  const playlistTabs = document.getElementById("playlistTabs");
  const playlistDisplay = document.getElementById("playlistDisplay");
  const currentPlaylistTitle = document.getElementById("currentPlaylistTitle");
  const songsList = document.getElementById("songsList");

  playlistTabs.style.display = "none";
  playlistDisplay.style.display = "flex";
  currentPlaylistTitle.textContent = playlist.title;

  songsList.innerHTML = playlist.songs
   .map(
    (song, index) => `
        <div class="song-item" data-song-index="${index}" data-song-id="${song.id}">
            <div class="song-info">
                <div class="song-title">${this.escapeHtml(song.title)}</div>
                <div class="song-artist">${this.escapeHtml(song.artist)}</div>
            </div>
            <div class="song-duration">${this.formatTime(song.duration)}</div>
        </div>
    `,
   )
   .join("");

  document.querySelectorAll(".song-item").forEach((item) => {
   item.addEventListener("click", () => {
    const index = parseInt(item.dataset.songIndex);
    this.playSong(playlistName, index);
   });
  });

  const currentlyPlayingSongId = this.getCurrentPlayingSongId();

  if (currentlyPlayingSongId) {
   const songInNewPlaylist = playlist.songs.find(
    (song) => song.id === currentlyPlayingSongId,
   );

   if (songInNewPlaylist) {
    const newIndex = playlist.songs.findIndex(
     (song) => song.id === currentlyPlayingSongId,
    );
    this.currentSongIndex = newIndex;
    this.currentPlaylist = newPlaylistName;
    this.updateActiveSongInList();
   } else {
    this.currentPlaylist = newPlaylistName;

    this.currentSongIndex = 0;
    this.resetSongListActiveState();
   }
  } else {
   this.currentPlaylist = newPlaylistName;
   this.currentSongIndex = 0;
   this.resetSongListActiveState();
  }
 }

 showPlaylistTabs() {
  const playlistTabs = document.getElementById("playlistTabs");
  const playlistDisplay = document.getElementById("playlistDisplay");

  playlistDisplay.style.display = "none";
  playlistTabs.style.display = "flex";
  this.resetSongListActiveState();
 }

 playSong(playlistName, songIndex) {
  const playlist = this.playlists[playlistName];
  if (!playlist || !playlist.songs[songIndex]) return;

  this.currentPlaylist = playlistName;
  this.currentSongIndex = songIndex;
  const song = playlist.songs[songIndex];

  this.audio.src = song.url;
  this.audio.load();

  const playPromise = this.audio.play();
  if (playPromise !== undefined) {
   playPromise
    .then(() => {
     this.isPlaying = true;
     this.updateUI();
     this.updateMusicImage(song);

     const playlistDisplay = document.getElementById("playlistDisplay");
     const currentVisiblePlaylist = playlistDisplay.style.display === "flex";
     const currentPlaylistTitle = document.getElementById(
      "currentPlaylistTitle",
     );
     const isViewingThisPlaylist =
      currentVisiblePlaylist &&
      currentPlaylistTitle &&
      currentPlaylistTitle.textContent.includes(playlist.title);

     if (isViewingThisPlaylist) {
      this.updateActiveSongInList();
     } else {
      this.resetSongListActiveState();
     }

     this.logListenStart(song);
     this.savePlaybackState();
    })
    .catch((error) => {
     console.log("Playback error:", error);
     this.isPlaying = false;
     this.updateUI();
    });
  }
 }

 togglePlay() {
  if (!this.currentPlaylist) {
   this.showPlaylist("submerged");
   return;
  }

  const song =
   this.playlists[this.currentPlaylist]?.songs[this.currentSongIndex];
  if (!song) {
   this.showPlaylist("submerged");
   return;
  }

  if (this.isPlaying) {
   this.audio.pause();
   this.isPlaying = false;
   this.updateUI();
   this.updateActiveSongInList();
   this.savePlaybackState();
  } else {
   const playPromise = this.audio.play();
   if (playPromise !== undefined) {
    playPromise
     .then(() => {
      this.isPlaying = true;
      this.updateUI();
      this.updateActiveSongInList();
      this.savePlaybackState();
     })
     .catch((error) => {
      console.log("Playback error:", error);
     });
   }
  }
 }

 nextSong() {
  if (!this.currentPlaylist) return;
  const playlist = this.playlists[this.currentPlaylist];
  const nextIndex = (this.currentSongIndex + 1) % playlist.songs.length;
  this.playSong(this.currentPlaylist, nextIndex);
 }

 prevSong() {
  if (!this.currentPlaylist) return;
  const playlist = this.playlists[this.currentPlaylist];
  const prevIndex =
   (this.currentSongIndex - 1 + playlist.songs.length) % playlist.songs.length;
  this.playSong(this.currentPlaylist, prevIndex);
 }

 updateProgress() {
  if (this.audio.duration) {
   const percent = (this.audio.currentTime / this.audio.duration) * 100;
   document.getElementById("progressBar").value = percent;
   document.getElementById("currentTime").textContent = this.formatTime(
    this.audio.currentTime,
   );
   document.getElementById("duration").textContent = this.formatTime(
    this.audio.duration,
   );
  }
 }

 updateUI() {
  const playBtn = document.getElementById("playBtn");
  const playIcon = playBtn.querySelector("i");
  playIcon.className = this.isPlaying
   ? "ti ti-player-pause"
   : "ti ti-player-play";
 }

 updateMusicImage(song) {
  const musicImage = document.getElementById("musicImage");
  const songTitle = document.getElementById("songTitle");
  const songArtist = document.getElementById("songArtist");

  const bgImage = song.imgUrl
   ? `url('${song.imgUrl}')`
   : this.currentPlaylist === "submerged"
     ? "url('https://i.pinimg.com/736x/18/ad/c7/18adc7cc5018b34f6adb679b2ebe5dfd.jpg')"
     : "url('https://i.pinimg.com/1200x/80/7a/1a/807a1a2700bd768a03f50c29d29289f8.jpg')";

  musicImage.style.backgroundImage = bgImage;
  musicImage.style.backgroundSize = "cover";
  musicImage.style.backgroundPosition = "center";

  songTitle.textContent = song.title;
  songArtist.textContent = song.artist;
 }

 updateActiveSongInList() {
  const songsList = document.getElementById("songsList");
  if (!songsList || !this.currentPlaylist) return;

  const currentlyPlayingSongId = this.getCurrentPlayingSongId();
  if (!currentlyPlayingSongId) {
   this.resetSongListActiveState();
   return;
  }

  const currentPlaylistSongs = this.playlists[this.currentPlaylist]?.songs;
  if (!currentPlaylistSongs) return;

  const songExistsInCurrentPlaylist = currentPlaylistSongs.some(
   (song) => song.id === currentlyPlayingSongId,
  );

  if (!songExistsInCurrentPlaylist) {
   this.resetSongListActiveState();
   return;
  }

  const songItems = songsList.querySelectorAll(".song-item");

  songItems.forEach((item) => {
   item.classList.remove("active");
   const indicator = item.querySelector(".playing-indicator");
   if (indicator) indicator.remove();
  });

  songItems.forEach((item) => {
   const songId = item.dataset.songId;
   if (songId === currentlyPlayingSongId) {
    item.classList.add("active");
    if (this.isPlaying) {
     const indicator = document.createElement("div");
     indicator.className = "playing-indicator";

     const fontIndicator = document.createElement("i");
     fontIndicator.className = "ti ti-headphones";
     fontIndicator.style.color = "white";

     indicator.appendChild(fontIndicator);

     item.appendChild(indicator);
    }
   }
  });
 }

 resetSongListActiveState() {
  const songsList = document.getElementById("songsList");
  if (songsList) {
   const songItems = songsList.querySelectorAll(".song-item");
   songItems.forEach((item) => {
    item.classList.remove("active");
    const indicator = item.querySelector(".playing-indicator");
    if (indicator) indicator.remove();
   });
  }
 }

 async savePlaybackState() {
  if (!this.currentPlaylist) return;
  const song =
   this.playlists[this.currentPlaylist]?.songs[this.currentSongIndex];
  if (!song) return;

  const formData = new FormData();
  formData.append("action", "save_playback_state");
  formData.append("song_id", song.id);
  formData.append("current_time", this.audio.currentTime || 0);
  formData.append("is_playing", this.isPlaying);

  try {
   await fetch("./scripts/api/music-api.php", {method: "POST", body: formData});
  } catch (error) {
   console.error("Error saving state:", error);
  }
 }

 async logListenStart(song) {
  const formData = new FormData();
  formData.append("action", "log_listen");
  formData.append("song_id", song.id);
  formData.append("song_title", song.title);
  formData.append("artist", song.artist);
  formData.append("playlist", this.currentPlaylist);
  formData.append("duration", 0);

  try {
   await fetch("./scripts/api/music-api.php", {method: "POST", body: formData});
  } catch (error) {
   console.error("Error logging listen:", error);
  }
 }

 async loadSavedState() {
  try {
   const response = await fetch(
    "./scripts/api/music-api.php?action=get_playback_state",
   );
   const data = await response.json();

   if (data.success && data.state && !data.is_guest) {
    const state = data.state;
    if (state.current_song_id) {
     for (const [playlistName, playlist] of Object.entries(this.playlists)) {
      const songIndex = playlist.songs.findIndex(
       (s) => s.id === state.current_song_id,
      );
      if (songIndex !== -1) {
       this.currentPlaylist = playlistName;
       this.currentSongIndex = songIndex;
       const song = playlist.songs[songIndex];

       this.audio.src = song.url;
       this.audio.load();

       this.audio.addEventListener(
        "loadedmetadata",
        () => {
         this.audio.currentTime = parseFloat(state.current_time) || 0;
        },
        {once: true},
       );

       if (state.is_playing === "1" || state.is_playing === true) {
        this.audio.play().catch((e) => console.log("Auto-play prevented:", e));
        this.isPlaying = true;
       }

       this.updateUI();
       this.updateMusicImage(song);
       break;
      }
     }
    }
   }
  } catch (error) {
   console.error("Error loading saved state:", error);
  }
 }

 playSong(playlistName, songIndex) {
  const playlist = this.playlists[playlistName];
  if (!playlist || !playlist.songs[songIndex]) return;

  this.currentPlaylist = playlistName;
  this.currentSongIndex = songIndex;
  const song = playlist.songs[songIndex];

  this.audio.src = song.url;
  this.audio.load();

  this.updateMusicImage(song);

  const playPromise = this.audio.play();
  if (playPromise !== undefined) {
   playPromise
    .then(() => {
     this.isPlaying = true;
     this.updateUI();

     this.updateActiveSongInList();

     this.logListenStart(song);
     this.savePlaybackState();
    })
    .catch((error) => {
     console.log("Playback error:", error);
     this.isPlaying = false;
     this.updateUI();
    });
  }
 }

 escapeHtml(text) {
  const div = document.createElement("div");
  div.textContent = text;
  return div.innerHTML;
 }

 getCurrentPlayingSongId() {
  if (!this.currentPlaylist) return null;
  const playlist = this.playlists[this.currentPlaylist];
  if (!playlist || !playlist.songs[this.currentSongIndex]) return null;
  return playlist.songs[this.currentSongIndex].id;
 }

 formatTime(seconds) {
  if (isNaN(seconds)) return "0:00";
  const mins = Math.floor(seconds / 60);
  const secs = Math.floor(seconds % 60);
  return `${mins}:${secs.toString().padStart(2, "0")}`;
 }
}

document.addEventListener("DOMContentLoaded", () => {
 new MusicPlayer();
});
