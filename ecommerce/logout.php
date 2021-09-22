<?php 

	session_start(); # Pour continuer dans la session existante !
	session_unset(); # Pour supprimer les donnes de la session !
	session_destroy(); # Pour detruire la session !

	header('Location: home.php'); # Redirection vers la page de login !!
	exit();
