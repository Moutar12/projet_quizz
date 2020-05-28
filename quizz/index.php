<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
     integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="content">
    <?php
   
    session_start();
    if(isset($_GET['lien'])){
        switch($_GET['lien']){
            case "acceuil":
            require_once("acceuil.php");
            break;
            case "jeux":
                require_once("./page/joueur.php");
        }
    }else{
        if(isset($_GET['log'])  && $_GET['log']==="off"){
            deconnexion();
        }
        require_once("./connexion/interfaceConnexion.php");
    }
  

?>
</div>
</body>
</html>