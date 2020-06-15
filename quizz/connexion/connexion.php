<?php


$servername = 'mysql-ndiath.alwaysdata.net';
$username = 'ndiath';
$password = 'Moutar12';
$bdnames = 'ndiath_quizz';




try {
  $pdo = new PDO("mysql:host=$servername;dbname=$bdnames", $username, $password);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} 
catch(PDOException $e) {
  echo "Connexion failed: " . $e->getMessage();
}





?>