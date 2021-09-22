<?php

	ob_start();
	session_start();
	$pageTitle='Log in';
	include 'init.php';


	if(isset($_SESSION['user'])){

		header('location:home.php');

	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$formErrors=array();

			$username=$_POST['username'];

			$password=$_POST['password'];

			$hashPassword=sha1($password);

			//verifier est ce que cet utilisateur existe dans notre base de donnes !!!

			$stmt=$con->prepare('SELECT user_id , username , password
								 FROM users
								 WHERE username = ?
								 AND password = ?
								 LIMIT 1');

			$stmt->execute(array($username,$hashPassword));
			$row=$stmt->fetch(); //enregistrer le resultat sous la forme d'un tableau
			$count = $stmt->rowCount();

			//If Count > 0 ca veut dire que cet utilisateur avec cet password et de type administrateur existe

			if($count > 0){
				$_SESSION['logged']=true; // Notre utilisateur existe dans notre session
				$_SESSION['user']=$row['username'];
				$_SESSION['userid']=$row['user_id']; //enregistrer le nom d'utilisateur dans notre session.
				header('location:home.php'); // pour ser rediriger ves la page dashborde de l'administrateur.
				exit();
			}else{
				$formErrors[]=lang("ERROR2");
			}
		}
?>
<!-- Start Login form -->

	<div class="container text-center">
		<div class="login-container" >
			<div class="login-top-container">
				<div class="logo-lock">
					<i class="fa fa-user-alt"></i>
				</div>
				<h2><?php echo lang('WELCOME');?></h2>
			</div>
			<div class="login-bottom-container px-3 pt-4">
				<p><?php echo lang('LOGIN');?></p>
				<form class="ml-3 mb-4" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				  <div class="form-group login-input-container">
				  	<i class="fa fa-user-alt"></i>
				   	 <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your username" name="username">
				  </div>
				  <div class="form-group login-input-container">
				  	<i class="fa fa-lock"></i>
				    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Your Password" required="required" autocomplete="new-password">
				  </div>
				  <button type="submit" class="btn btn-primary btn-block" name="login"><?php echo lang('LOGIN1');?></button>
				</form>
				<?php

					if(!empty($formErrors)){
						echo '<div class="error-show">';
							echo '<div class="alert alert-danger mb-0" role="alert">';
									foreach ($formErrors as $error) {
										echo $error;
									}
							echo "</div>";
						echo "</div>";
					}

				?>
				<div class="signup text-center pt-3">
					<hr class="categorie-divider">
					<p><?php echo lang('ACCOUNT');?><a class="btn-link" href="signup.php"> <?php echo lang('REGISTER1');?></a></p>
				</div>
			</div>
		</div>
	</div>

	<!-- End Login form -->
<?php

	include 'includes/templates/footer.php';
	ob_end_flush();

?>
