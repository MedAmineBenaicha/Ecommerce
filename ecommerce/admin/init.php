<?php

	include 'connect.php';

	// Routes

	$tpl 	= 'includes/templates/'; // Template Directory
	$func	= 'includes/functions/'; // Functions Directory
	$css 	= 'layout/css/'; // Css Directory
	$js 	= 'layout/js/'; // Js Directory
	$language='includes/languages/'; //language directory

	// Inclure les fichiers importants

	include $func . 'functions.php';
	include $language.'english.php';
	include $tpl . 'header.php';

	// Inclure navbar.php sur toutes les pages sauf celle avec la variable $nonavbar

	if (!isset($noNavbar)) { include $tpl . 'navbar.php'; }
