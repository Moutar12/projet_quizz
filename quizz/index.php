<?php
session_start();
if(isset($_SESSION['login'])){
  session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
     integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="stylecss/style.css">
    <title>quizz</title>
    
</head>
<body class="body" >

    <?php
    
      
         require_once('./connexion/connexion.php');
        
             require_once("traitement/interfaceConnexion.php");
         
        
        



?>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
  
<!-- <script>
  $(document).ready(function () {
       
    $("#admin").load("./utili/inscription.php");
});
</script> -->
</body>
</html>