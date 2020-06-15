<?php

require_once('../connexion/connexion.php');
global $pdo;
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$image = $_POST['image'];
$login = $_POST['login'];
$pwd = $_POST['pwd'];
$confirme = $_POST['confirme'];
$profil = $_POST['profil'];
 
$reponse = $pdo->query("SELECT COUNT(*) AS existe_login FROM personnes WHERE login = '".$login."'");
$reponse -> execute(); 
$donnees = $reponse->fetch() ;

if($donnees['existe_login'] == 0 AND (count($_POST)>0))
     {
        $req=$pdo->prepare(
            'INSERT INTO personnes (
                Id_fonction,
                prenom,
                nom,
                image,
                login,
                mot_de_passe,
                confirme
                )
                VALUES(
                    :it,
                    :pr,
                    :nm,
                    :im,
                    :lg,
                    :mp,
                    :cf );'
                    );
     $req->execute(array(
        it => $profil,
        pr => $prenom,
        nm => $nom,
        im => $image,
        lg => $login,
        mp => $pwd,
        cf => $confirme 
     ));
							
						   
						echo json_encode($req);
               

     }
    





?>