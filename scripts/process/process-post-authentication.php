<?php

if (!isset($_SESSION['user_id']) && !isset($_SESSION['guest_answers'])) {
 header('Location: auth.php');
 exit;
}

$is_guest = isset($_SESSION['guest_answers']);
$username = $_SESSION['username'] ?? 'Guest User';
$four_digit_code = $_SESSION['four_digit_code'] ?? 'N/A';
$answers = $_SESSION['guest_answers'] ?? [];

if (!$is_guest && isset($_SESSION['user_id'])) {
 require_once './includes/db-connect.php';

 $stmt = $pdo->prepare("SELECT question_1, question_2, question_3, question_4 FROM users WHERE id = ?");
 $stmt->execute([$_SESSION['user_id']]);
 $user_data = $stmt->fetch();
 $answers = [
  'question_1' => $user_data['question_1'],
  'question_2' => $user_data['question_2'],
  'question_3' => $user_data['question_3'],
  'question_4' => $user_data['question_4']
 ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
 session_start();
 session_destroy();
 session_unset();
 header('Location: auth.php');
 $_SESSION['registration_success'] = true;
 exit;
}
