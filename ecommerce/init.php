<?php 

	 include 'connect.php';

	$tpl='includes/templates/'; // Template directory
	$css='layout/css/';
	$function='includes/functions/';
	$js='layout/js/';
	$image='layout/images/banners/';
	$images='layout/images/products/';
	$language='includes/languages/';
	$svg = '../../layout/svg/';


	//Include les choses importantes
	include $function.'functions.php';
	// Include languages File
	if( !( isset($_SESSION['lang']) )){
	 	$_SESSION['lang'] = "en";
	}else if(isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang']) ){
	 	if($_GET['lang'] == "en"){
	 		$_SESSION['lang'] = "en";
	 	}
	 	else if($_GET['lang'] == "fr"){
	 		$_SESSION['lang'] = "fr";
	 	}
	}

	include $language.'lang-'.$_SESSION['lang'].'.php';
	//Include The Header File
	include $tpl.'header.php';

	//la navigation bar ne doit pas se trouver dans toutes les pages donc on doit filtrer notre include.

	if(!isset($noNavigationBar)){
		include $tpl.'navbar.php';
	}
?>