<?php

include("../traitement/control_session.php");


$requet=$pdo->query("SELECT prenom, nom,image, score, f.libelle FROM personnes, fonction f WHERE login= '".$_SESSION['login']."'");
$requet->execute();
$data=$requet->fetch();
echo $data['prenom'];
echo $data['nom'];
echo $data['libelle'];
echo $data['score'];

  ?>


  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
     integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <link rel="stylesheet" href="../stylecss/style.css">
    <title>Admin</title>
  </head>
  <body class="libody">
  <div class="bg">
<div class="col-md-15 mb-55 border bg-dark mx-auto mt-0 p-3 w-100"> 
<div class="p-2 py-2 text-white text-center h1 font-weight-bold ">J’ai le plaisir de jouer</div>
</div>

<div class="logo">
<img src="../stylecss/logo-QuizzSA.png"  class="img-rounded col-md-3 mb-4 ">
</div>

<div class="liendebase">
<p class="text-white ml-4 h1 font-weight-bold mt-3 ">CRÉER ET  PARAMÉRTER VOS QUIZZ</p>
<div class="lien">
    <a class="text-white h4 my-2 my-lg-2" href="../index.php">Déconnexion</a>
  </div>
</div>


<nav class="navbar navbar-expand-lg " style="background-color:#F2F2F2">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="nav navbar-nav"style="margin-left:50px">
     
      <li class="nav-item dropdown  ml-5" style="border:2px solid #6BF1FA; background:#C4C4C4;">
        <a class="charger" href="#" id="lquestion" >Listes des Questions</a>
        </li>
        
        <li class="nav-item active  ml-3" style="border:2px solid #6BF1FA; background:#C4C4C4;">
        <a class="charger" href="#" id="cradmin" >Créer admin</a>
        </li>
       
        <li class="nav-item dropdown  ml-3" style="border:2px solid #6BF1FA; background:#C4C4C4;">
        <a class="charger" href="#" id="ljoueur" >Listes des Joueurs</a>
        </li>
        <li class="nav-item dropdown  ml-3 " style="border:2px solid #6BF1FA; background:#C4C4C4;">
        <a class="charger " href="#" id="crquestion" >Créer Questions</a>
        </li>
      
    </ul>
    <div class="" id="joueur"></div>
    
  </div>
</nav>
</div>
<div id="admin"></div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  </body>
  </html>
  
 
 
<script type="text/javascript">
$(".charger").click(function(e){
  const lquestion = $("#lquestion");
  const cradmin = $("#cradmin");
  const ljoueur = $("#ljoueur");
  const crquestion = $("#crquestion");

  if(e.target.id === 'lquestion'){
    $("#lquestion").load("listedesquestions.php");
  }
  else if(e.target.id === 'cradmin'){
    $("#admin").load("inscription.php");
  }
  else if(e.target.id === 'ljoueur'){
    $("#admin").load("joueur.php");
  }
  else if(e.target.id === 'crquestion'){
    $("#admin").load("creerQuestion.php");
  }
})

// $(document).ready(function(){
//   $(".charger").click(function(){
//     $("#admin").load("inscription.php");
//     // $("#joueur").load("");
//     $.ajax({
//       method: "POST",
//       url: page,
//       data: {}
//     }).done(function(char){
//       afficher(char);
//     });
//     return false;
//   }); 

//   function afficher(data){
//     $('#page').fadeOut('500', function(){
//       $('#page').empty();
//       $('#page').append(data);
//       $('#page').fadeIn('500');
//     });
//   }

// });

 
</script>