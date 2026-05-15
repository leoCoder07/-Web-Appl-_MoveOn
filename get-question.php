<?php

session_start();



require_once './includes/db-connect.php';

$question_id = isset($_GET['q']) ? $_GET['q'] : 1;

$stmt = $pdo->prepare("SELECT id, question_text FROM onboarding_questions WHERE id = ?");
$stmt->execute([$question_id]);
$question = $stmt->fetch();

if (!$question) {
 echo json_encode(['success' => false, 'error' => 'Question not found']);
 exit;
}

$stmt = $pdo->prepare("SELECT id, option_text FROM onboarding_options WHERE question_id = ? ORDER BY display_order");
$stmt->execute([$question_id]);
$options = $stmt->fetchAll();

echo json_encode([
 'success' => true,
 'question_id' => $question['id'],
 'question' => $question['question_text'],
 'options' => $options
]);
