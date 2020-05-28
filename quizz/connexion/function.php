<?php
include('./connexion/traitement.php');
function connexion($login, $pwd)
{
    $users=getData();
        if($users["login"]===$login && $users["password"]===$pwd){
            $_SESSION['user']=$users;
            $_SESSION['log']="login";
            if($user["profil"]==="admin"){
                return "acceuil";
            }else{
                return "jeux";
            }
        }
    
    return "error";
}
function is_connect(){
    if(!isset( $_SESSION['log'])){
        header("Location:index.php");
    }
}
function getData()
{
    $pdo = new PDO('mysql:dbname=quizz;host=localhost', 'root', '');
    $pdo->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result = $pdo->query('SELECT * FROM personnes');
    $res = $pdo->query('SELECT login,mot_de_passe FROM personnes');
    $mp=$res->fetchAll(PDO::FETCH_OBJ);
    $data =$result->fetchAll(PDO::FETCH_OBJ);
}

function deconnexion(){
    unset($_SESSION['user']);
    unset($_SESSION['log']);
    session_destroy();
}


?>