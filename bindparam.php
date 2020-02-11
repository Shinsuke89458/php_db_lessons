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
  // bindValue: 値をbind
  // bindParam: 変数への参照をbind
  $stmt = $db->prepare("insert into users (name, score) values (?, ?)");

  $name = 'taguchi';
  $stmt->bindValue(1, $name, PDO::PARAM_STR);
  // $score = 23;
  // $stmt->bindValue(2, $score, PDO::PARAM_INT);
  // $stmt->execute();
  // $score = 44;
  // $stmt->bindValue(2, $score, PDO::PARAM_INT);
  // $stmt->execute();

  $stmt->bindParam(2, $score, PDO::PARAM_INT);
  $score = 52;
  $stmt->execute();
  $score = 44;
  $stmt->execute();
  $score = 6;
  $stmt->execute();


} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}
