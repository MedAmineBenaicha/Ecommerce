<?php
	/*
		-Ce script nous aide a afficher le titre d'une page web 
		chaque page doit avoir une variable $pageTitle avec sa valeur
		sinon Le titre de la page va etre default !!
	*/

	function getTitle(){
		global $pageTitle;
		if(isset($pageTitle)){
			echo $pageTitle;
		}
		else{
			echo lang('DEFAULT');
		}
	}

	/* La fonction de redirection

	function redirect($location){
		header('location:'.$location);
	}

	/* Une fonction pur executer les requettes 

	function querry($sql){
		global $con;
		return mysqli_query($con,$sql);
	}

	/* Une fonction pur executer les requettes 

	function escape_string($string){
		global $con;
		return mysqli_real_escape_string($con,$string);
	}

	/* Une fonction pour recuperer les donnes 

	function fetch_array($result){
		return mysqli_fetch_array($result);
	}

	/* Une fonction pour log out 

	function logout(){
		$_SESSION['logged'] = false;
		session_destroy();
		redirect('home.php');
	}

	/* Une fonction pour supprimer un produit de panier 

	function empty_cart($id,$price){
		unset($_SESSION['products_'.$id]);
		$_SESSION['count'] -= 1;
		$_SESSION['totaux'] -= $price;
		redirect('cart.php');
	}

	function confirm($result){
	    global $con;
	    if(!$result){
	        die("Erreur ".mysqli_error($con));
	    }
	}	

	function get_products(){
	    $sql = "SELECT * FROM products";
	    $result = querry($sql);
	    return $result;
	}

	*/

	function redirectFunction($message,$url=null,$seconds = 3){
		if($url===null){
			$url='home.php';
			$link='HomePage';
		}
		elseif($url == 'login.php'){
			$url='login.php';
			$link='Login page';
		}
		else{
			// Pour retourner vers la page precedente (La page de reference) !!
			if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){
				$url=$_SERVER['HTTP_REFERER'];
				$link='Previous Page';
			}else{
				$url='home.php';
				$link='HomePage';
			}

		}
		echo "<div class='container'>";
		echo $message;
		echo '<div class="alert alert-success">You will be redirected to the <strong>'.$link.'</strong> after <strong>'.$seconds.' seconds</strong></div>';
		echo "</div>";
		header("refresh:$seconds;url=$url");
		exit();
	}

	/*
		== Une fonction pour rechercher si un item existe deja dans notre Base de donnes ou nn  !!
		== Cette fonction contacte la base de donnes donc on aura besoin d'une variable $con   
	*/

	function checkItem($select, $from,$value){
		global $con;
		$statement = $con->prepare("SELECT $select FROM $from WHERE $select= ? ");
		$statement->execute(array($value));
		$count=$statement->rowCount();
		return $count;
	}

	/*
		==getItem v1.0
		== Une fonction pour rechercher si un item existe deja dans notre Base de donnes ou nn  !!
		== Cette fonction contacte la base de donnes donc on aura besoin d'une variable $con   
	*/

	function getItem($select, $from,$value){
		global $con;
		$statement = $con->prepare("SELECT * FROM $from WHERE $select= ? LIMIT 1");
		$statement->execute(array($value));
		$row=$statement->fetch();
		return $row;
	}

	/*
		==Une fonction pour afficher les messages d'erreur !!  
	*/

	function showErrorMessage($errorMessage){
		echo "<div class='container'>";
		echo '<div class="alert alert-danger">'.$errorMessage.'</div>';
		echo "</div>";
	}

	/*
		== CountItems v1.0
		== Une fonction pour calculer les nombre total des utilisateurs !!
	*/

	function countItems($count,$table,$condition=1){
		global $con;
		$statement1 = $con->prepare("SELECT COUNT($count) FROM $table WHERE $condition");
		$statement1->execute();
		$count=$statement1->fetchColumn();
		return $count;
	}

	/*
		== getLatest v1.0
		== Une fonction pour recuperer les derniers items (users,categories ...) !!
	*/

	function getLatest($select,$table,$order,$limit=5){
		global $con;
		$state = $con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");
		$state->execute();
		$rows=$state->fetchAll();
		return $rows;
	}

	/*
		== getCategories v1.0
		== Une fonction pour recuperer les categories (users,categories ...) !!
	*/

	function getCategories(){
		global $con;
		$categorie = $con->prepare(" SELECT * FROM categories ORDER BY cat_id DESC ");
		$categorie->execute();
		$rows=$categorie->fetchAll();
		return $rows;
	}

	/*
		== getItems v1.0
		== Une fonction pour recuperer les produits oar categorie (users,categories ...) !!
	*/

	function getItems($catid){
		global $con;
		$categorie = $con->prepare(" SELECT * FROM products WHERE product_category_id = ? ORDER BY product_id DESC ");
		$categorie->execute(array($catid));
		$rows=$categorie->fetchAll();
		return $rows;
	}


	/*
		== deleteProduct v1.0
		== Une fonction pour supprimer un produit de notre panier !!
	*/

	function deleteProduct($id,$price){
		for($i=0;$i<count($_SESSION['id_products']);$i++){
			if($_SESSION['id_products'][$i] == $id){
				unset($_SESSION['id_products'][$i]);
				break;
			}
		}
		unset($_SESSION['products_'.$id]);
		$_SESSION['count'] -= 1;
		$_SESSION['totaux'] -= $price;
		header('location:cart.php');
	}

	/*
		== emptyCart v1.0
		== Une fonction pour supprimer un produit de notre panier !!
	*/

	function emptyCart(){
		foreach ($_SESSION['id_products'] as $id) {
			unset($_SESSION['products_'.$id]);
		}
		unset($_SESSION['id_products']);
		$_SESSION['count'] = 0;
		$_SESSION['totaux'] = 0;
	}

	/*
	
		== is_valid_luhn v1.0
		== Une fonction pour valider les credits cards avec l'algorithm de Lhun

	*/
	 function luhn_validate($number, $mod5 = false) {
	$parity = strlen($number) % 2;
	$total = 0;
	// Split each digit into an array
  	$digits = str_split($number);
  	foreach($digits as $key => $digit) { // Foreach digit
		// for every second digit from the right most, we must multiply * 2
	  	if (($key % 2) == $parity) 
		  	$digit = ($digit * 2);
		// each digit place is it's own number (11 is really 1 + 1)
	  	if ($digit >= 10) {
			// split the digits
		  	$digit_parts = str_split($digit);
			// add them together
		  	$digit = $digit_parts[0]+$digit_parts[1];
	  	}
		// add them to the total
		$total += $digit;
  	}
	return ($total % ($mod5 ? 5 : 10) == 0 ? true : false); // If the mod 10 or mod 5 value is equal to zero (0), then it is valid
}