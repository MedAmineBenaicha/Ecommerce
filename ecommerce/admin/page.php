<?php 

	# Pour Manager Les categories : Ajouter -Modifier - Supprimer ...

	$do='';

	$do=isset($_GET['do']) ? $_GET['do'] : 'Manage';

	if($do=='Manage'){
		echo "You are in Manage Page";
	}
	else if($do=='Add'){
		echo "You are in Add Page";
	}
	else if($do=='Edit'){
		echo "You are in Edit Page";
	}
	else{
		echo "Error";
	}

?>