<?php
session_start();
require_once '../../includes/db-connect.php';

header('Content-Type: application/json');

$is_guest = isset($_SESSION['guest_answers']);
$user_id = $_SESSION['user_id'] ?? null;
$action = $_POST['action'] ?? $_GET['action'] ?? '';


function getRandomPastelColor()
{
 $hue = rand(0, 360);
 return "hsl($hue, 70%, 75%)";
}

switch ($action) {
 case 'save_message':
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
   echo json_encode(['success' => false, 'error' => 'Invalid request method']);
   exit;
  }

  $message = trim($_POST['message'] ?? '');
  $color_code = $_POST['color_code'] ?? getRandomPastelColor();
  $paper_rotation = rand(-15, 15);

  if (empty($message)) {
   echo json_encode(['success' => false, 'error' => 'Message cannot be empty']);
   exit;
  }

  if (strlen($message) > 500) {
   echo json_encode(['success' => false, 'error' => 'Message too long (max 500 characters)']);
   exit;
  }

  if ($is_guest) {

   $paper_id = 'guest_' . time() . '_' . rand(1000, 9999);
   echo json_encode([
    'success' => true,
    'is_guest' => true,
    'paper' => [
     'id' => $paper_id,
     'message' => $message,
     'color_code' => $color_code,
     'paper_rotation' => $paper_rotation,
     'created_at' => date('Y-m-d H:i:s')
    ]
   ]);
  } else if ($user_id) {
   try {
    $stmt = $pdo->prepare("INSERT INTO user_vent_messages (user_id, message, color_code, paper_rotation) VALUES (?, ?, ?, ?)");
    $stmt->execute([$user_id, $message, $color_code, $paper_rotation]);

    echo json_encode([
     'success' => true,
     'is_guest' => false,
     'paper' => [
      'id' => $pdo->lastInsertId(),
      'message' => $message,
      'color_code' => $color_code,
      'paper_rotation' => $paper_rotation,
      'created_at' => date('Y-m-d H:i:s')
     ]
    ]);
   } catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
   }
  } else {
   echo json_encode(['success' => false, 'error' => 'User not authenticated']);
  }
  break;

 case 'get_messages':
  if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
   echo json_encode(['success' => false, 'error' => 'Invalid request method']);
   exit;
  }

  if ($is_guest) {
   echo json_encode(['success' => true, 'is_guest' => true, 'messages' => []]);
  } else if ($user_id) {
   try {
    $stmt = $pdo->prepare("SELECT id, message, color_code, paper_rotation, created_at FROM user_vent_messages WHERE user_id = ? ORDER BY created_at DESC");
    $stmt->execute([$user_id]);
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
     'success' => true,
     'is_guest' => false,
     'messages' => $messages
    ]);
   } catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
   }
  } else {
   echo json_encode(['success' => false, 'error' => 'User not authenticated']);
  }
  break;

 case 'delete_message':
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
   echo json_encode(['success' => false, 'error' => 'Invalid request method']);
   exit;
  }

  $message_id = $_POST['message_id'] ?? '';

  if (empty($message_id)) {
   echo json_encode(['success' => false, 'error' => 'Message ID required']);
   exit;
  }

  if ($is_guest) {
   echo json_encode(['success' => true, 'is_guest' => true, 'message_id' => $message_id]);
  } else if ($user_id) {
   try {
    $stmt = $pdo->prepare("DELETE FROM user_vent_messages WHERE id = ? AND user_id = ?");
    $stmt->execute([$message_id, $user_id]);

    if ($stmt->rowCount() > 0) {
     echo json_encode(['success' => true, 'message' => 'Message deleted']);
    } else {
     echo json_encode(['success' => false, 'error' => 'Message not found']);
    }
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
