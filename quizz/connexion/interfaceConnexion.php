<?php
@$nom=$_POST["nom"];
@$prenom=$_POST["prenom"];
@$login=$_POST["login"];
@$pass=$_POST["pass"];
@$valider=$_POST['btn_submit'];
$erreur="";
if(isset($valider)){
   if(empty($login)){ 
     $erreur="Login laissé vide!";
   }
   elseif(empty($pass)) {
     $erreur="Mot de passe laissé vide!";
   }
   else{
      include("traitement.php");
      $sel=$pdo->prepare("SELECT login,mot_de_passe FROM personnes WHERE login=? limit 2");
      $sel->execute(array($login,$pass));
      $tab=$sel->fetchAll();
      var_dump($tab);
   }
   
}

?>

<div class="conteneur">
<div class="col-md-15 mb-55 border bg-dark mt-n mx-auto p-4 w-100"> 
<div class="p-2 py-2 text-white text-center h1 font-weight-bold ">J’ai le plaisir de jouer</div>
</div>

<div style="position:absolute;margin-top:-110px; width:35em;height:1em">
<img src="./connexion/logo-QuizzSA.png"  class="img-rounded col-md-2 mb-5 .w-100 .h-75 ">
</div>


<div class="view" style="background-image: url('./connexion/bg.jpg'); margin-top:-30px; background-repeat: no-repeat;background-position:fixed; background-size: 100% 100%; height:33.3em">


<div style="background-color:white; width:40em;height:25em;margin-top:45px;margin-left:350px; position:absolute; ">
<div style="background-color:#9EAFCF; height:5em" >
<p class="text-center p-3 font-weight-bold h2 text-white">Veuillez vous connecter</p>
</div>
<form method="post" id="form-connexion">
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