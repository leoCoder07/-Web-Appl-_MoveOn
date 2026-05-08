<?php 

 $host = 'localhost';
 $dbname = 'moveon_db';
 $dbusername = 'root';
 $dbpassword = 'JoHnLeopoldoleiraj5u5i';

 try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
 } catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
 }

 if (session_status() === PHP_SESSION_NONE) {
  session_start();
 }

?>