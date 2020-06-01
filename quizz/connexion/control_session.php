<?php
require ('connexion.php'); //pour main.php

session_start();

if ((!isset($_SESSION['login'])) || ($_SESSION['login'] == ''))
{
	// La variable $_SESSION['login'] n'existe pas, ou bien elle est vide
	// <=> la personne ne s'est PAS connectée
	echo '<p>Vous devez vous <a href="../index.php">connecter</a>.</p>'."\n";
	exit();
}

  


?>