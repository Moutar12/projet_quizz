<?php



   $pdo = new PDO('mysql:dbname=quizz;host=localhost', 'root', '');
   $pdo->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $result = $pdo->query('SELECT * FROM personnes');
   $res = $pdo->query('SELECT login,mot_de_passe FROM personnes');
   $mp=$res->fetchAll(PDO::FETCH_OBJ);
   $data =$result->fetchAll(PDO::FETCH_OBJ);
   //$count=$pdo->exec('INSERT INTO personnes SET prenom="Thierno", nom="NDIATH", login="admin", mot_de_passe="admin"');

  


?>