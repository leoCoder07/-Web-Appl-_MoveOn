<?php
session_start();
require_once './includes/db-connect.php';

header('Content-Type: application/json');


$is_guest = isset($_SESSION['guest_answers']);
$user_id = $_SESSION['user_id'] ?? null;


$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
 case 'save_mood':
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
   echo json_encode(['success' => false, 'error' => 'Invalid request method']);
   exit;
  }

  $mood_date = $_POST['mood_date'] ?? '';
  $mood_text = $_POST['mood_text'] ?? '';

  if (empty($mood_date) || empty($mood_text)) {
   echo json_encode(['success' => false, 'error' => 'Missing required fields']);
   exit;
  }

  if ($is_guest) {

   echo json_encode(['success' => true, 'message' => 'Guest mode: mood saved locally']);
  } else if ($user_id) {

   try {
    $stmt = $pdo->prepare("INSERT INTO user_moods (user_id, mood_date, mood_text) VALUES (?, ?, ?) 
     ON DUPLICATE KEY UPDATE mood_text = VALUES(mood_text)");
    $stmt->execute([$user_id, $mood_date, $mood_text]);
    echo json_encode(['success' => true, 'message' => 'Mood saved to database']);
   } catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
   }
  } else {
   echo json_encode(['success' => false, 'error' => 'User not authenticated']);
  }
  break;

 case 'get_moods':
  if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
   echo json_encode(['success' => false, 'error' => 'Invalid request method']);
   exit;
  }

  $year = $_GET['year'] ?? date('Y');
  $month = $_GET['month'] ?? date('m');


  $year = intval($year);
  $month = intval($month);

  if ($month < 1 || $month > 12) {
   echo json_encode(['success' => false, 'error' => 'Invalid month']);
   exit;
  }

  $start_date = "$year-$month-01";
  $end_date = date('Y-m-t', strtotime($start_date));

  if ($is_guest) {

   echo json_encode(['success' => true, 'is_guest' => true, 'moods' => []]);
  } else if ($user_id) {
   try {
    $stmt = $pdo->prepare("SELECT mood_date, mood_text FROM user_moods 
    WHERE user_id = ? AND mood_date BETWEEN ? AND ?");
    $stmt->execute([$user_id, $start_date, $end_date]);
    $moods = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $formatted_moods = [];
    foreach ($moods as $mood) {
     $formatted_moods[$mood['mood_date']] = $mood['mood_text'];
    }

    echo json_encode(['success' => true, 'is_guest' => false, 'moods' => $formatted_moods]);
   } catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
   }
  } else {
   echo json_encode(['success' => false, 'error' => 'User not authenticated']);
  }
  break;

 case 'remove_mood':
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
   echo json_encode(['success' => false, 'error' => 'Invalid request method']);
   exit;
  }

  $mood_date = $_POST['mood_date'] ?? '';

  if (empty($mood_date)) {
   echo json_encode(['success' => false, 'error' => 'Missing date']);
   exit;
  }

  if ($is_guest) {
   echo json_encode(['success' => true, 'message' => 'Guest mode: mood will be removed locally']);
  } else if ($user_id) {
   try {
    $stmt = $pdo->prepare("DELETE FROM user_moods WHERE user_id = ? AND mood_date = ?");
    $stmt->execute([$user_id, $mood_date]);
    echo json_encode(['success' => true, 'message' => 'Mood removed from database']);
   } catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
   }
  } else {
   echo json_encode(['success' => false, 'error' => 'User not authenticated']);
  }
  break;

 default:
  echo json_encode(['success' => false, 'error' => 'Invalid action']);
  break;
}
