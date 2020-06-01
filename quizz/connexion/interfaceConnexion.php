<?php
require('connexion.php');
/*if(isset($_POST['btn_submit'])){
  $login=$_POST['login'];
  $pwd=$_POST['pwd'];
  $result=connexion($login, $pwd);
  if($result=="error"){
      echo "L'utilisateur n'existe pas";
  }
  else{
      header("location:index.php?lien=".$result);
  }
}*/
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
                window.location.href='../index.php';
              </script>
              <?php
            }else{
              if($resultat=='admin'){
                session_start();

                $_SESSION['Id_personnes']=$donnes['Id_personnes'];
                $_SESSION['login']=$_POST['login'];
                $_SESSION['Id_fonction']=$resultat['libelle'];
                sleep(2);

                header('Location:utili/admin.php');

              }else{
                header('Location:utili/joueur.php');
              }
            }

}
  if(count($_POST)<0){
    ?>
    <script type="text/javascript">
    alert('Veuillez saisir les bonnes information');
    window.location.href='../index.php';
    <?php
  }

?>

<div class="conteneur">


<div class="view" style="background-image: url('connexion/bg.jpg'); margin-top:0px; background-repeat: no-repeat;background-position:fixed; background-size: 100% 100%; height:40.8em">
<div class="col-md-15 mb-55 border bg-dark mx-auto mt-0 p-3 w-100"> 
<div class="p-2 py-2 text-white text-center h1 font-weight-bold ">J’ai le plaisir de jouer</div>
</div>

<div style="position:absolute;margin-top:-110px; width:35em;height:1em">
<img src="connexion/logo-QuizzSA.png"  class="img-rounded col-md-2 mb-5 ">
</div>


<div style="background-color:white; width:40em;height:25em;margin-top:45px; margin-left:25em; 
align-items:right;justify-content:center; ">
<div style="background-color:#9EAFCF; height:5em" >
<p class="text-center p-3 font-weight-bold h2 text-white">Veuillez vous connecter</p>
</div>
<form method="POST" id="form-connexion">
  <div class="input-group input-group-lg col-md-10 mb-20  ml-5 mt-5 ">
    <input type="text" class="form-control bg-light" error="error-1" name="login" id="login" placeholder="Login" >
    
  </div>
  <div class="input-group input-group-lg col-md-10 mb-20 ml-5  mt-5 ">
    <input type="password" class="form-control bg-light" error="error-2" name="pwd" id="Password" placeholder="Mot de passe">
  </div>
  <button type="submit" class="btn btn-info ml-5 px-3 font-weight-bold h3 mt-5" name="btn_submit">Se connecter</button>
  <a href="#"class="font-weight-bold h4 text-secondary p-3 mt-5 position-absolute">S'inscrire pour jouer?</a>
</form>
</div>
</div>
</div>

<script>
const inputs = document.getElementsByTagName("input");
for(input of inputs){
    input.addEventListener("keyup", function(e){
      if(e.target.hasAttribute("error")){
        var idDivError=e.target.hasAttribute("error");
        document.getElementById( idDivError).innerHTML="";
      }
    })
}
document.getElementById("form-connexion").addEventListener("submit",function(e){
const inputs= document.getElementsBysTagName("input");
var error=false;
for(input of inputs){
    if(input.hasAttribute("error")){
       var idDivError=input.getAttribute("error");
    if(!input.value){  
            document.getElementById(idDivError).innerHTML="Ce champ est obligatoire";
            error=true;
        }
       
    }
    
}
if(error){
    e.preventDefault();
    return false;
}

})



</script>
</html>