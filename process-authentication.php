<?php

require_once './includes/db-connect.php';



$error = '';
$success = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
 $username_value_sign_up = trim($_POST['username']);
 $username = trim($_POST['username']);
 $four_digit_code = trim($_POST['four_digit_code']);
 $password = $_POST['password'];
 $confirm_password = $_POST['confirm_password'];

 $password_pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

 if (empty($username) || empty($four_digit_code) || empty($password)) {
  $error = 'All fields are required';
 } elseif (!preg_match('/^\d{4}$/', $four_digit_code)) {
  $error = '4-digit number must be exactly 4 numbers';
 } elseif (!preg_match($password_pattern, $password)) {
  $error = 'Password must be at least 8 characters, include an uppercase letter, a number, and a special character.';
 } elseif ($password !== $confirm_password) {
  $error = 'Password do not match';
 } else {

  $stmt = $pdo->prepare("SELECT id FROM users WHERE four_digit_code = ? OR username = ?");
  $stmt->execute([$four_digit_code, $username]);
  if ($stmt->fetch()) {
   $error = 'Code / Username already exists';
  } else {


   $temp_answers = $_SESSION['temp_answers'] ?? [];
   $question_1 = $temp_answers['question_1'] ?? 'skip';
   $question_2 = $temp_answers['question_2'] ?? 'skip';
   $question_3 = $temp_answers['question_3'] ?? 'skip';
   $question_4 = $temp_answers['question_4'] ?? 'skip';

   $hashed_password = password_hash($password, PASSWORD_DEFAULT);



   $stmt = $pdo->prepare("INSERT INTO users (username, four_digit_code, password, question_1, question_2, question_3, question_4) VALUES (?, ?, ?, ?, ?, ?, ?)");


   if ($stmt->execute([$username, $four_digit_code, $hashed_password, $question_1, $question_2, $question_3, $question_4])) {
    unset($_SESSION['temp_answers']);
    $_SESSION['user_id'] = $pdo->lastInsertId();
    $_SESSION['username'] = $username;
    $_SESSION['registration_success'] = true;
    header('Location: auth.php');
    $_SESSION['success_message'] = 'Success! You may now log in';
    exit;
   } else {
    $error = 'Registration failed.';
   }
  }
 }
}






if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
 $username_value_login = trim($_POST['username']);
 $username = trim($_POST['username']);
 $password = $_POST['password'];

 $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
 $stmt->execute([$username]);
 $user = $stmt->fetch();

 if ($user && password_verify($password, $user['password'])) {
  unset($_SESSION['temp_answers']);
  $_SESSION['user_id'] = $user['id'];
  $_SESSION['username'] = $user['username'];
  $_SESSION['four_digit_code'] = $user['four_digit_code'];
  header('Location: moveon.php');
 } else {
  $_SESSION['registration_success'] = true;
  $error = 'Invalid username or password';
 }
}





if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recover_password'])) {
 $identifier = trim($_POST['identifier']);

 if (empty($identifier)) {
  $error = 'Field must not be empty';
  $_SESSION['registration_success'] = true;
 } elseif (strlen($identifier) < 3) {
  $error = 'Field must be at least 3 characters';
  $_SESSION['registration_success'] = true;
 } else {

  $stmt = $pdo->prepare("SELECT username, password, four_digit_code FROM users WHERE username = ? OR four_digit_code = ?");
  $stmt->execute([$identifier, $identifier]);
  $user = $stmt->fetch();

  if ($user) {
   $_SESSION['success_message'] = 'Your password is stored securely. Please contact <a href="mailto:leodev0077@gmail.com?subject=[MoveOn] Forget Password&body=Hi Leo, I need your help regarding my account." target="blank">@johnleojariel</a> to reset it, or remember your credentials.';
   $_SESSION['registration_success'] = true;
  } else {
   $error = 'No user found, contact <a href="mailto:leodev0077@gmail.com?subject=[MoveOn] Forget Password&body=Hi Leo, I need your help regarding my account." target="blank">@johnleojariel</a>';
   $_SESSION['registration_success'] = true;
  }
 }
}





if (isset($_GET['guest'])) {
 if ($_SESSION['guest_answers'] = $_SESSION['temp_answers']) {
  header('Location: moveon.php');
  exit;
 } else {
  $_SESSION['guest_answers'] = true;
  header('Location: moveon.php');
  exit;
 }
}

$show_login = false;
$success = '';

if (isset($_SESSION['registration_success'])) {
 $show_login = true;


 if (isset($_SESSION['success_message'])) {
  $success = $_SESSION['success_message'];
  unset($_SESSION['success_message']);
 }

 unset($_SESSION['registration_success']);
}
