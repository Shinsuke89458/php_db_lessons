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
  // $stmt = $db->prepare("insert into users (name, score) values (?, ?)");
  // $stmt->execute(['taguchi', 44]);
  $stmt = $db->prepare("insert into users (name, score) values (:name, :score)");
  $stmt->execute([':name'=>'fkoji', ':score'=>80]);
  echo "inserted: " . $db->lastInsertId();

} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}
