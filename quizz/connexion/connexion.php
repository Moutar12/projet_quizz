<?php



$servername = 'localhost';
$username = 'root';
$password = '';
$bdname = 'quizz';
$bd ='mysql:host=$servername';
$requete = 'SELECT * FROM personnes';


try {
  $pdo = new PDO("mysql:host=$servername;dbname=quizz", $username, null);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch(PDOException $e) {
  echo "Connexion failed: " . $e->getMessage();
}





?>