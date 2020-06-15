<?php


session_start(); 
session_destroy(); //On détruit le cookie de l'identifiant. 

include("index.php"); //On revient au départ. 

?>
