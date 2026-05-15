<?php

session_start();



$question_id = isset($_GET['question_id']) ? (int)$_GET['question_id'] : 0;
$answer = $_SESSION['temp_answers']['question_' . $question_id] ?? null;

echo json_encode(['answer' => $answer]);
