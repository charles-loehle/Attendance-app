<?php 

  include_once 'config.php';

  $host = URL;
  $db = DB;
  $user = USER;
  $pass = PASS;
  $charset = 'utf8mb4';

  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
  
  try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  } catch (PDOException $e) {
    // echo '<h1 class="text-danger">No database found</h1>';
    throw new PDOException($e->getMessage());
  }

  require_once 'crud.php';
  require_once 'user.php';
  $crud = new crud($pdo);
  $user = new user($pdo);


?>