<?php 

 require_once './includes/db-connect.php';

 $error = '';
 $success = '';


 // ! sign up process
 if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
  $username = trim($_POST['username']);
  $four_digit_code = trim($_POST['four_digit_code']);
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_ password'];


  if (empty($username) || empty($four_digi_code) || empty($password)) {
   $error = 'All fields are required';
  } elseif (!preg_match('/^\d{4}$/', $four_digit_code)) {
   $error = '4-digit number must be exactly 4 numbers';
  } elseif (strlen($password) < 4) {
   $error = 'Password must be at least 4 characters';
  } elseif ($password !== $confirm_password) {
   $error = 'Password do not match';
  } else {

   $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
   $stmt->execute([$username]);
   if ($stmt->fetch()) {
    $error = 'Username already exists';
   } else {

    // ! retrieving process of answers
    $temp_answers = $_SESSION['temp_answers'] ?? [];
    $question_1 = $temp_answers['question_1'] ?? 'skip';
    $question_2 = $temp_answers['question_2'] ?? 'skip';
    $question_3 = $temp_answers['question_3'] ?? 'skip';
    $question_4 = $temp_answers['question_4'] ?? 'skip';

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    // ! preparing process
    $stmt = $pdo->prepare("INSERT INTO users (username, four_digit_code, password, question_1, question_2, question_3, question_4) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // !executing process
    if ($stmt->execute([$username, $four_digit_code, $password, $question_1, $question_2, $question_3, $question_4])) {
     unset($_SESSION['temp_answers']);
     $_SESSION['user_id'] = $pdo->lastInsertId();
     $_SESSION['username'] = $username;
     header('Location: moveon.php');
     exit;
    } else {
     $error = 'Registration failed.';
    }

   }

  }
 }

?>