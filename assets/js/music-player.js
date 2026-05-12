// Global Music Player Manager - Persists Across Pages
class GlobalMusicManager {
 constructor() {
  this.audio = null;
  this.currentSong = null;
  this.isPlaying = false;
  this.currentTime = 0;
  this.playlistName = null;
  this.songIndex = null;
  this.init();
 }

 init() {
  // Check if audio element already exists (from previous page)
  let existingAudio = document.getElementById('globalAudioPlayer');

  if (!existingAudio) {
   // Create hidden audio element
   this.audio = document.createElement('audio');
   this.audio.id = 'globalAudioPlayer';
   this.audio.style.display = 'none';
   document.body.appendChild(this.audio);

   // Load saved state from localStorage
   this.loadFromLocalStorage();
  } else {
   this.audio = existingAudio;
   this.loadFromLocalStorage();
  }

  // Setup event listeners
  this.audio.addEventListener('timeupdate', () => this.saveCurrentTime());
  this.audio.addEventListener('ended', () => this.onSongEnd());
  this.audio.addEventListener('play', () => {
   this.isPlaying = true;
   this.saveState();
  });
  this.audio.addEventListener('pause', () => {
   this.isPlaying = false;
   this.saveState();
  });

  // Restore playback if it was playing
  if (this.currentSong && this.isPlaying) {
   this.audio.play().catch(e => console.log('Auto-play prevented:', e));
  }
 }

 loadFromLocalStorage() {
  const saved = localStorage.getItem('global_music_state');
  if (saved) {
   try {
    const state = JSON.parse(saved);
    this.currentSong = state.currentSong;
    this.currentTime = state.currentTime || 0;
    this.isPlaying = state.isPlaying || false;
    this.playlistName = state.playlistName;
    this.songIndex = state.songIndex;

    if (this.currentSong && this.audio) {
     this.audio.src = this.currentSong.url;
     this.audio.load();
     this.audio.currentTime = this.currentTime;
    }
   } catch (e) {
    console.error('Error loading music state:', e);
   }
  }
 }

 saveState() {
  const state = {
   currentSong: this.currentSong,
   currentTime: this.audio?.currentTime || 0,
   isPlaying: this.isPlaying,
   playlistName: this.playlistName,
   songIndex: this.songIndex,
   lastUpdated: Date.now()
  };
  localStorage.setItem('global_music_state', JSON.stringify(state));

  // Also save to server if user is logged in
  this.saveToServer();
 }

 saveCurrentTime() {
  if (this.audio && this.audio.currentTime) {
   const state = JSON.parse(localStorage.getItem('global_music_state') || '{}');
   state.currentTime = this.audio.currentTime;
   localStorage.setItem('global_music_state', JSON.stringify(state));
  }
 }

 async saveToServer() {
  if (!window.userSession?.isGuest && window.userSession?.userId) {
   const formData = new FormData();
   formData.append('action', 'save_playback_state');
   formData.append('song_id', this.currentSong?.id || '');
   formData.append('current_time', this.audio?.currentTime || 0);
   formData.append('is_playing', this.isPlaying);

   try {
    await fetch('music-api.php', {
     method: 'POST',
     body: formData
    });
   } catch (error) {
    console.error('Error saving to server:', error);
   }
  }
 }

 onSongEnd() {
  // Auto-play next song logic can be added here
  this.isPlaying = false;
  this.saveState();
 }

 playSong(song, playlistName, songIndex) {
  this.currentSong = song;
  this.playlistName = playlistName;
  this.songIndex = songIndex;
  this.audio.src = song.url;
  this.audio.load();
  this.audio.play().catch(e => console.log('Playback prevented:', e));
  this.isPlaying = true;
  this.saveState();
 }

 pause() {
  if (this.audio) {
   this.audio.pause();
   this.isPlaying = false;
   this.saveState();
  }
 }

 resume() {
  if (this.audio && this.currentSong) {
   this.audio.play().catch(e => console.log('Playback prevented:', e));
   this.isPlaying = true;
   this.saveState();
  }
 }

 setProgress(time) {
  if (this.audio) {
   this.audio.currentTime = time;
   this.saveState();
  }
 }

 getCurrentTime() {
  return this.audio?.currentTime || 0;
 }

 getDuration() {
  return this.audio?.duration || 0;
 }
}

// Create global instance
window.globalMusicManager = null;

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
 if (!window.globalMusicManager) {
  window.globalMusicManager = new GlobalMusicManager();
 }
});