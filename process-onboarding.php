<?php

 require_once './includes/db-connect.php';

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = $_POST['action'] ?? '';

  if ($action === 'save_answer') {
   $question_id = $_POST['question_id'];
   $answer = $_POST['answer'];

   if (!isset($_SESSION['temp_answers'])) {
    $_SESSION['temp_answers'] = [];
   }

   $_SESSION['temp_answers']['question_' . $question_id] = $answer;

   echo json_encode(['success' => true]);
   exit;
  }

  if ($action === 'clear_answers') {
   unset($_SESSION['temp_answers']);
   echo json_encode(['success' => true]);
   exit;
  }
 }

?>