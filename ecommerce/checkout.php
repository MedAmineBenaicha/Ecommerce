<?php

	ob_start();
	session_start();
	$pageTitle="Checkout";
	include 'init.php';
	
	if(isset($_SESSION['user'])){

		if(isset($_POST['quantite']) && isset($_POST['product_id']) && is_numeric($_POST['product_id']) && !isset(($_POST['hot_deal'])) ){

			$product_id=$_POST['product_id'];

			$quantite=$_POST['quantite'];

			$stmat=$con->prepare('SELECT * FROM products WHERE product_id = ?');

			$stmat->execute(array($product_id));

			$product=$stmat->fetch();

			$categorie_id=$product['product_category_id'];

			$stmat2=$con->prepare('SELECT * FROM categories WHERE cat_id = ?');

			$stmat2->execute(array($categorie_id));

			$categorie=$stmat2->fetch();

			if($_SESSION['products_'.$product_id]['id'] == $_POST['product_id']){


				$message = lang('MESSAGE');
				header('location:cart.php?message='.$message);

			}
			else{

				if($product['product_quantity'] < $quantite){

					$message = lang('MESSAGE2').$product['product_quantity'];
					header('location:cart.php?message='.$message);

				}else{

					$_SESSION['id_products'][]=$product_id;

					$_SESSION['products_'.$product_id]=array(
					'id' 		=> $product['product_id'],
					'product' 	=> $product['product_title'],
					'categorie' => $categorie['cat_title'],
					'price' 	=> $product['product_price'],
					'quantite' 	=> $quantite,
					'image'		=> $product['product_image'],
					'total'		=> $product['product_price'] * $quantite,
					);

					$_SESSION['totaux'] += $_SESSION['products_'.$_POST['product_id']]['total'];

					$_SESSION['count'] += 1;

					header("location:cart.php");

				}
			}
		}else if(isset($_POST['quantite']) && isset($_POST['product_id']) && is_numeric($_POST['product_id']) && isset(($_POST['hot_deal'])) ){

			$product_id=$_POST['product_id'];

			$quantite=$_POST['quantite'];

			$stmat=$con->prepare('SELECT * FROM products WHERE product_id = ?');

			$stmat->execute(array($product_id));

			$product=$stmat->fetch();

			$categorie_id=$product['product_category_id'];

			$stmat2=$con->prepare('SELECT * FROM categories WHERE cat_id = ?');

			$stmat2->execute(array($categorie_id));

			$categorie=$stmat2->fetch();

			if($_SESSION['products_'.$product_id]['id'] == $_POST['product_id']){


				$message = lang('MESSAGE');
				header('location:cart.php?message='.$message);

			}
			else{

				if($product['product_quantity'] < $quantite){

					$message = lang('MESSAGE2').$product['product_quantity'];
					header('location:cart.php?message='.$message);

				}else{

					$_SESSION['id_products'][]=$product_id;

					$_SESSION['products_'.$product_id]=array(
					'id' 		=> $product['product_id'],
					'product' 	=> $product['product_title'],
					'categorie' => $categorie['cat_title'],
					'price' 	=> $product['product_price'] * 0.5,
					'quantite' 	=> $quantite,
					'image'		=> $product['product_image'],
					'total'		=> $product['product_price']* 0.5 * $quantite,
					);

					$_SESSION['totaux'] += $_SESSION['products_'.$_POST['product_id']]['total'];

					$_SESSION['count'] += 1;

					header("location:cart.php");

				}
			}

		}
	}else{

		$message='<div class="alert alert-warning mt-5">'.lang('MESSAGE3').'</div>';
		redirectFunction($message,'login.php',3);

	}
?>

<?php

	include 'includes/templates/footer.php';
	ob_end_flush();

?>s
