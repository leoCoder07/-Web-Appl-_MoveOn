<?php
session_start();
require_once './includes/db-connect.php';

header('Content-Type: application/json');

$is_guest = isset($_SESSION['guest_answers']);
$user_id = $_SESSION['user_id'] ?? null;
$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
 case 'save_playback_state':
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
   echo json_encode(['success' => false, 'error' => 'Invalid request method']);
   exit;
  }

  $song_id = $_POST['song_id'] ?? '';
  $current_position = floatval($_POST['current_position'] ?? 0);
  $is_playing = filter_var($_POST['is_playing'] ?? false, FILTER_VALIDATE_BOOLEAN);

  if ($is_guest) {
   echo json_encode(['success' => true, 'is_guest' => true]);
  } else if ($user_id) {
   try {
    $stmt = $pdo->prepare("INSERT INTO user_music_state (user_id, current_song_id, current_position, is_playing) 
                                       VALUES (?, ?, ?, ?) 
                                       ON DUPLICATE KEY UPDATE 
                                       current_song_id = VALUES(current_song_id),
                                       current_position = VALUES(current_position),
                                       is_playing = VALUES(is_playing)");
    $stmt->execute([$user_id, $song_id, $current_position, $is_playing]);
    echo json_encode(['success' => true]);
   } catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
   }
  }
  break;

 case 'get_playback_state':
  if ($is_guest) {
   echo json_encode(['success' => true, 'is_guest' => true, 'state' => null]);
  } else if ($user_id) {
   try {
    $stmt = $pdo->prepare("SELECT current_song_id, current_position, is_playing FROM user_music_state WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $state = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode(['success' => true, 'state' => $state]);
   } catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
   }
  }
  break;

 case 'log_listen':
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
   echo json_encode(['success' => false, 'error' => 'Invalid request method']);
   exit;
  }

  if (!$is_guest && $user_id) {
   $song_id = $_POST['song_id'] ?? '';
   $song_title = $_POST['song_title'] ?? '';
   $artist = $_POST['artist'] ?? '';
   $playlist = $_POST['playlist'] ?? '';
   $duration = intval($_POST['duration'] ?? 0);

   try {
    $stmt = $pdo->prepare("INSERT INTO user_music_history (user_id, song_id, song_title, artist, playlist, listen_duration) 
                                       VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $song_id, $song_title, $artist, $playlist, $duration]);
    echo json_encode(['success' => true]);
   } catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
   }
  } else {
   echo json_encode(['success' => true, 'is_guest' => true]);
  }
  break;

 default:
  echo json_encode(['success' => false, 'error' => 'Invalid action']);
  break;
}
