<?php
session_start();
require_once '../../includes/db-connect.php';

header('Content-Type: application/json');

$is_guest = isset($_SESSION['guest_answers']);
$user_id = $_SESSION['user_id'] ?? null;
$action = $_POST['action'] ?? $_GET['action'] ?? '';

if ($is_guest) {
 echo json_encode(['success' => false, 'error' => 'Guest users cannot perform this action']);
 exit;
}

if (!$user_id) {
 echo json_encode(['success' => false, 'error' => 'User not authenticated']);
 exit;
}

switch ($action) {
 case 'update_username':
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
   echo json_encode(['success' => false, 'error' => 'Invalid request method']);
   exit;
  }

  $new_username = trim($_POST['username'] ?? '');

  if (empty($new_username)) {
   echo json_encode(['success' => false, 'error' => 'Username cannot be empty']);
   exit;
  }

  if (strlen($new_username) < 3 || strlen($new_username) > 50) {
   echo json_encode(['success' => false, 'error' => 'Username must be between 3 and 50 characters']);
   exit;
  }

  if (!preg_match('/^[a-zA-Z0-9_]+$/', $new_username)) {
   echo json_encode(['success' => false, 'error' => 'Username can only contain letters, numbers, and underscores']);
   exit;
  }

  try {

   $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? AND id != ?");
   $stmt->execute([$new_username, $user_id]);
   if ($stmt->fetch()) {
    echo json_encode(['success' => false, 'error' => 'Username already taken']);
    exit;
   }


   $stmt = $pdo->prepare("SELECT username_change_count, last_username_change FROM users WHERE id = ?");
   $stmt->execute([$user_id]);
   $user = $stmt->fetch();

   $today = new DateTime();
   $lastChange = $user['last_username_change'] ? new DateTime($user['last_username_change']) : null;


   if (!$lastChange || $lastChange->format('Y-m') !== $today->format('Y-m')) {
    $changeCount = 0;
   } else {
    $changeCount = $user['username_change_count'];
   }

   if ($changeCount >= 3) {
    echo json_encode(['success' => false, 'error' => 'You can only change your username 3 times per month']);
    exit;
   }


   $stmt = $pdo->prepare("SELECT username FROM users WHERE id = ?");
   $stmt->execute([$user_id]);
   $old_username = $stmt->fetchColumn();


   $stmt = $pdo->prepare("UPDATE users SET username = ?, username_change_count = ?, last_username_change = CURDATE() WHERE id = ?");
   $stmt->execute([$new_username, $changeCount + 1, $user_id]);


   $stmt = $pdo->prepare("INSERT INTO username_change_history (user_id, old_username, new_username) VALUES (?, ?, ?)");
   $stmt->execute([$user_id, $old_username, $new_username]);

   $_SESSION['username'] = $new_username;

   echo json_encode(['success' => true, 'message' => 'Username updated successfully', 'new_username' => $new_username]);
  } catch (PDOException $e) {
   echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
  }
  break;

 case 'update_profile_icon':
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
   echo json_encode(['success' => false, 'error' => 'Invalid request method']);
   exit;
  }

  $icon = $_POST['icon'] ?? '';

  $validIcons = ['gradient-1', 'gradient-2', 'gradient-3', 'gradient-4', 'gradient-5', 'gradient-6', 'gradient-7'];

  if (!in_array($icon, $validIcons)) {
   echo json_encode(['success' => false, 'error' => 'Invalid icon selection']);
   exit;
  }

  try {
   $stmt = $pdo->prepare("UPDATE users SET profile_icon = ? WHERE id = ?");
   $stmt->execute([$icon, $user_id]);
   echo json_encode(['success' => true, 'message' => 'Profile icon updated successfully']);
  } catch (PDOException $e) {
   echo json_encode(['success' => false, 'error' => 'Database error']);
  }
  break;

 case 'update_bio':
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
   echo json_encode(['success' => false, 'error' => 'Invalid request method']);
   exit;
  }

  $bio = trim($_POST['bio'] ?? '');

  if (strlen($bio) > 500) {
   echo json_encode(['success' => false, 'error' => 'Bio cannot exceed 500 characters']);
   exit;
  }

  try {
   $stmt = $pdo->prepare("UPDATE users SET bio = ? WHERE id = ?");
   $stmt->execute([$bio, $user_id]);
   echo json_encode(['success' => true, 'message' => 'Bio updated successfully']);
  } catch (PDOException $e) {
   echo json_encode(['success' => false, 'error' => 'Database error']);
  }
  break;

 case 'get_user_data':
  try {
   $stmt = $pdo->prepare("SELECT username, four_digit_code, bio, profile_icon, question_1, question_2, question_3, question_4, username_change_count, last_username_change FROM users WHERE id = ?");
   $stmt->execute([$user_id]);
   $user = $stmt->fetch(PDO::FETCH_ASSOC);

   if ($user) {
    echo json_encode(['success' => true, 'user' => $user]);
   } else {
    echo json_encode(['success' => false, 'error' => 'User not found']);
   }
  } catch (PDOException $e) {
   echo json_encode(['success' => false, 'error' => 'Database error']);
  }
  break;

 case 'get_questions_with_answers':
  try {

   $stmt = $pdo->prepare("SELECT id, question_text FROM onboarding_questions ORDER BY id");
   $stmt->execute();
   $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);


   $stmt = $pdo->prepare("SELECT question_1, question_2, question_3, question_4 FROM users WHERE id = ?");
   $stmt->execute([$user_id]);
   $userAnswers = $stmt->fetch(PDO::FETCH_ASSOC);

   $result = [];
   foreach ($questions as $question) {
    $answerKey = 'question_' . $question['id'];
    $answer = $userAnswers[$answerKey] ?? 'skip';
    $result[] = [
     'question_id' => $question['id'],
     'question_text' => $question['question_text'],
     'answer' => $answer
    ];
   }

   echo json_encode(['success' => true, 'questions_answers' => $result]);
  } catch (PDOException $e) {
   echo json_encode(['success' => false, 'error' => 'Database error']);
  }
  break;

 default:
  echo json_encode(['success' => false, 'error' => 'Invalid action']);
  break;
}
