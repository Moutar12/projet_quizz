<?php

include("../connexion/connexion.php");
include("../connexion/control_session.php");
require_once("../connexion/function.php");
is_connect();
$requet=$pdo->query("SELECT prenom, nom, f.libelle FROM personnes, fonction f WHERE login= '".$_SESSION['login']."'");
$requet->execute();
$data=$requet->fetch();
echo $data['prenom'];
echo $data['nom'];
echo $data['libelle'];


  
  

  ?>
  <br>
<div class="href">
<a href="../index.php">Déconnexion</a>
</div>