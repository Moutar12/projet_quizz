<?php
  echo "connexion reusie";
include("../traitement/control_session.php");

$requet=$pdo->query("SELECT prenom, nom, f.libelle FROM personnes, fonction f WHERE login= '".$_SESSION['login']."'");
$requet->execute();
$data=$requet->fetch();
echo $data['prenom'];
echo $data['nom'];
echo $data['libelle'];


 
  

  ?>
  <br>
<div class="href">
<?php
echo "<a href='../index.php'>Déconnexion</a>"
?>
</div>