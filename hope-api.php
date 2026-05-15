<?php
session_start();
require_once './includes/db-connect.php';

header('Content-Type: application/json');

$action = $_GET['action'] ?? $_POST['action'] ?? '';

switch ($action) {
 case 'get_quote':

  try {

   $stmt = $pdo->prepare("SELECT quote_text, author FROM quotes WHERE is_active = TRUE ORDER BY RAND() LIMIT 1");
   $stmt->execute();
   $quote = $stmt->fetch(PDO::FETCH_ASSOC);

   if ($quote) {
    echo json_encode(['success' => true, 'quote' => $quote]);
   } else {

    echo json_encode(['success' => true, 'quote' => [
     'quote_text' => 'Hope is the thing with feathers that perches in the soul.',
     'author' => 'Emily Dickinson'
    ]]);
   }
  } catch (PDOException $e) {
   echo json_encode(['success' => false, 'error' => 'Database error']);
  }
  break;

 case 'get_stories':
  try {
   $stmt = $pdo->prepare("SELECT id, title, story_text, image_url, story_link FROM heartbreak_stories WHERE is_active = TRUE ORDER BY display_order, id");
   $stmt->execute();
   $stories = $stmt->fetchAll(PDO::FETCH_ASSOC);
   echo json_encode(['success' => true, 'stories' => $stories]);
  } catch (PDOException $e) {
   echo json_encode(['success' => false, 'error' => 'Database error']);
  }
  break;

 case 'get_books':
  $category = $_GET['category'] ?? 'all';
  try {
   if ($category === 'all') {
    $stmt = $pdo->prepare("SELECT id, title, author, description, book_link, cover_image, category FROM books WHERE is_active = TRUE ORDER BY display_order, id");
   } else {
    $stmt = $pdo->prepare("SELECT id, title, author, description, book_link, cover_image, category FROM books WHERE is_active = TRUE AND category = ? ORDER BY display_order, id");
    $stmt->execute([$category]);
   }
   $stmt->execute();
   $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
   echo json_encode(['success' => true, 'books' => $books]);
  } catch (PDOException $e) {
   echo json_encode(['success' => false, 'error' => 'Database error']);
  }
  break;

 default:
  echo json_encode(['success' => false, 'error' => 'Invalid action']);
  break;
}
