<?php
require('connexion.php');
function connexion($user, $ligne){
    if($user['login']===$ligne['login'] && $user['mot_de_passe']===$ligne['pwd']){
        $_SESSION['user']=$ligne;
        if($ligne==='admin'){
            return "admin";
        }
            else{
                return "joueur";
            }
        }
        return "error";
    }
function validation($value){
    $value=trim($value);
    $value=stripslashes($value);
    return $value=htmlspecialchars($value);
}

function is_connect(){
    if(!isset( $_SESSION['login'])){
        header("Location:..index.php");
    }
}
function bdRequete($conn,$requet){
    $reponse = $pdo->query($requet);
    return $reponse = $reponse->fetch();
}

function deconnexion(){
    unset($_SESSION['user']);
    unset($_SESSION['log']);
    session_destroy();
}


?>