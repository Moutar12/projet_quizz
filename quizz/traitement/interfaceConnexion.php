<?php
//  session_start();
require('./connexion/connexion.php');

if(isset($_POST['btn_submit'])){

  $req2=$pdo->prepare('SELECT libelle from personnes p,fonction f  where  p.Id_fonction=f.Id_fonction and p.login=:login and p.mot_de_passe=:mot_de_passe' );
  $req2->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
  $req2->bindValue(':mot_de_passe', $_POST['pwd'], PDO::PARAM_STR);
  
  $req2-> execute();
  $resultat = $req2->fetchColumn();




  $req1=$pdo->prepare('SELECT * FROM personnes WHERE login= :login AND mot_de_passe= :mot_de_passe');
  $req1->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
  $req1->bindValue(':mot_de_passe', $_POST['pwd'], PDO::PARAM_STR);
  $req1->execute();
   $donnes = $req1->fetchColumn();
     $req1->closeCursor();
    
          if(!$donnes || $_POST['login']==" " || $_POST['pwd']==" "){
              
           
              ?>
              <script type="text/javascript">
                alert("Login ou Password Incorrect");
                window.location.href='index.php';
              </script>
              <?php
           
            }else{
              if($resultat=='admin'){
               

                $_SESSION['Id_personnes']=$donnes['Id_personnes'];
                $_SESSION['login']=$_POST['login'];
               

                header('Location:utili/admin.php');

              }else{
                header('Location:utili/joueur.php');
              }
            }

}

// if(isset($_POST['btn_submit'])){
//   $login=$_POST['login'];
//   $pwd=$_POST['pwd'];
//   $result=connexion($login, $pwd);
//   if($result=="error"){
//       echo "L'utilisateur n'existe pas";
//   }
//   else{
//       header("location:index.php?lien=".$result);
//   }
// }

?>




<div class="bg">
<div class="col-md-15 mb-55 border bg-dark mx-auto mt-0 p-3 w-100"> 
<div class="p-2 py-2 text-white text-center h1 font-weight-bold ">J’ai le plaisir de jouer</div>
</div>

<div  class="logo">
<img src="stylecss/logo-QuizzSA.png"  class=" col-md-3 mb-4 ">
</div>
<div class="container" id="container">

<div  class="header ">
<div  class="natif" >
<p class="text-center p-3 font-weight-bold h2 text-white">Veuillez vous connecter</p>
</div>
<form method="POST" id="connexion-form" class="container">
  <div class="input-group input-group-lg col-md-10 mb-20  ml-5 mt-5 ">
  <input type="text" class="form-control bg-light" error="error-1" name="login" id="login" placeholder="Login" >
    
  </div>
  <div class="input-group input-group-lg col-md-10 mb-20 ml-5  mt-5 ">
    <input type="password" class="form-control bg-light" error="error-2" name="pwd" id="Password" placeholder="Mot de passe"/>
  </div>
  <input type="submit" id="btn" class="btn btn-info ml-5 p-2 font-weight-bold h3 mt-5" name="btn_submit" value="Se connecter"/>
  
  <button  id="inscription" class=" btn font-weight-bold h6 text-secondary p-2 mt-5 ml-5 position-absolute"><a href="./utili/inscription.php">S'inscrire pour jouer?</a></button>
</form>
</div>
</div>
</div>
</html>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
  $(document).ready(function () {
       
    $("#inscription").load("utili/inscription.php");
});
</script>