<?php

define('DB_DATABASE', 'db');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', '********');
define('PDO_DSN', 'mysql:dbhost=localhost;dbname=' . DB_DATABASE);

try {
  // connect
  $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // insert
  // bindValue
  $stmt = $db->prepare("insert into users (name, score) values (?, ?)");
  // $stmt->execute(['taguchi', 44]);
  // $stmt->execute(['taguchi', 54]);
  // $stmt->execute(['taguchi', 22]);

  $name = 'taguchi';
  $stmt->bindValue(1, $name, PDO::PARAM_STR);
  // $stmt->bindValue(':name', $name, PDO::PARAM_STR);
  $score = 23;
  $stmt->bindValue(2, $score, PDO::PARAM_INT);
  $stmt->execute();
  $score = 44;
  $stmt->bindValue(2, $score, PDO::PARAM_INT);
  $stmt->execute();

  // PDO::PARAM_NULL
  // PDO::PARAM_BOOL

} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}
