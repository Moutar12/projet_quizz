<?php
require_once("../connexion/connexion.php") ;

?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
     integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <link rel="stylesheet" href="../stylecss/style.css">
   <title>inscription</title>
 </head>
 <body>
 <div class="div1 container">
   <p>Bienvenue sur la page d'inscription</p>
<form class="form-horizontal inscription " id="form-connexion" method="POST">
  <div class="form-group d-flex justify-content-center ">
    <div class="col-sm-5 mt-5">
    <label class="control-label col-sm-2 " for="prenom">Prénom:</label>
      <input type="text" class="form-control" id="prenom" name="prenom">
    </div>
  </div>
  <div class="form-group d-flex justify-content-center">
    <div class="col-sm-5">
    <label class="control-label col-sm-2" for="nom">Nom:</label>
    <input type="text" class="form-control" id="nom" name="nom">
    </div>
  </div>
  <div class="form-group d-flex justify-content-center">
    <div class="col-sm-5">
    <label class="control-label col-sm-2" for="login">Login:</label>
      <input type="text" class="form-control" id="login" name="login" >
    </div>
  </div>
  <div class="form-group d-flex justify-content-center">
    <div class="col-sm-5">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pwd">
    </div>
  </div>
  <div class="form-group d-flex justify-content-center">
    <div class="col-sm-5">
    <label class="control-label col-sm-0 " for="confirme">Confirmez password:</label>
      <input type="password" class="form-control" id="confirme" name="confirme">
    </div>
  </div>
  
 
  <div class="form-group d-flex justify-content-center">   
                <div class="col-sm-5"> 
                <label class="control-label col-sm-1" for="profil"> Profil:</label>
                  <div class="input-group"> 
                     <select class="form-control" name="profil"  id="profil">
             <option value="Aucun">Aucun</option>
             <?php                
                   $reponse = $pdo->query('SELECT * FROM fonction');
                                     
                      while ($donnees = $reponse->fetch())

                      
                         {
                  ?>
                       <option  value=" <?php echo $donnees[0]; ?>"> <?php echo utf8_encode ($donnees[1]); ?></option>
                       <?php
                          }
                                 
                        ?>     

                        
                                
                      </select>
                  </div>
                </div>
              </div> 
          <div  class="col-sm-5 ml-2 ">
            <div class="custom-file  justify-content-center " >
            <input class=" mr-sm-3 p-0 m-0  w-25 h-75 " type="file" name="image" id="image" ">
            </div>
          </div>
          <div class="form-group d-flex justify-content-center">
            <div class="col-sm-5 ml-5"  >
            <input type="submit" name="btn" id="form" class="btn text-white text-h1 " value="Créer votre compte" >
          </div>
          </div>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 </body>
 </html>
 
<script type="text/javascript">



$(document).ready(function() {
     $("#form").click(function() {
        // alert("Hello world!");
         var error = 1;
    let prenom = $("#prenom").val();
    let nom = $("#nom").val();
    let login = $("#login").val();
    let pwd = $("#pwd").val();
    let confirme = $("#confirme").val();
    //let role = $('#role').val();
    let image = $("#image").val();
    let profil = $("#profil").val();
    var form = $("form")[0]; // You need to use standard javascript object here
    var formData = new FormData(form);

    

    if (prenom.length < 1) {
   $("#prenom").after('<span class="error ">Veuillez saisir le prénom</span>');
      error = 0;
    }
    if (nom.length < 1) {
      $("#nom").after('<span class="error">Veuillez saisir le nom</span>');
      error = 0;
    }
    if (login.length < 1) {
      $("#login").after('<span class="error">Veuillez saisir le login</span>');
      error = 0;
    }
    if (pwd < 1) {
      $("#pwd").after('<span class="error">Veuillez saisir le mot de passe</span>');
      error = 0;
    } else if (pwd.length < 4) {
      $("#pwd").after(
        '<span class="erreur">Le mot de passe doit être au minimum 4 caractéres</span>'
      );
      error = 0;
    }
    if (confirme < 1) {
      $("#confirme").after('<span class="error">Veuillez saisir le confirmé votre mot passe</span>');
      error = 0;
    } else if (confirme !== pwd) {
      $("#confirme").after(
        '<span class="erreur">Les mots de passe de passe doit être identiques</span>');
      error = 0;
    }
    if (image == "") {
      $("#image").after(
        '<span class="erreur" style="top:2.2em" >Vous ne voulez pas televerser une image</span>');
    }
    if (profil === "aucun") {
      $("#profil").after(
        '<span class="erreur" style="top:2.2em" >Vous ne voulez pas televerser une image</span>');
    }
    // else if(jQuery.inArray(image_extension,['gif','jpg','jpeg','']) == -1){
    //   $('#image').after('<span class="erreur" style="top:2.2em" >Seul les fichier .jpg ou .png sont permis</span>');
    //   error = 0;
    // }
  $.ajax({
    type: "POST",
        url: "http://localhost/projet_quizz/quizz/traitement/mesRequets.php",
        data: { prenom:prenom,
                nom:nom,
                login:login,
                pwd:pwd,
                confirme:confirme,
                image:image,
                profil:profil
        },
        dataType : "JSON",
        success: function (data) {
          if(data){
        console.log(data);
          }
    }
  });


});

     });
 



</script>