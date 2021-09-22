<?php 
	ob_start();
	session_start();
	require('includes/functions/functions.php');

	if(isset($_GET['id']) && isset($_GET['price'])){
		if(is_numeric($_GET['id']) && is_numeric($_GET['price'])){
			deleteProduct($_GET['id'],$_GET['price']);
		}
	}else{
		echo "<h1 class='text-center'>ERROR</h1>";
	}
 ?>