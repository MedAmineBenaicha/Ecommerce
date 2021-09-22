<?php
	ob_start();
	session_start();
	$pageTitle="Sign Up";
	include 'init.php';
	
	if(isset($_SESSION['user'])){
		header('location:home.php');
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

			$formErrors=array();

			if(isset($_POST['username'])){

				$username=filter_var($_POST['username'],FILTER_SANITIZE_STRING); // Pour filtrer le username contre les scripts ... (garder seulement un string !!)

				if(strlen($username) > 20){
					$formErrors[]=lang("UsernameError");
				}
				if(empty($username)){
					$formErrors[]=lang("UsernameError1");
				}
				if(strlen($username) < 3){
					$formErrors[]=lang("UsernameError2");
				}

			}

			if(isset($_POST['password']) && isset($_POST['confirm-password'])){

				if(empty($_POST['password'])){
					$formErrors[]=lang("PASSWORDERROR");
				}

				$password=sha1($_POST['password']);
				$confirmPassword=sha1($_POST['confirm-password']);

				if($password !== $confirmPassword){
					$formErrors[]=lang("PASSWORDERROR1");
				}

			}

			if(isset($_POST['email'])){

				$email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

				if(filter_var($email,FILTER_VALIDATE_EMAIL) != true){

					$formErrors[]=lang("EmailError1");

				}

				if(empty($email)){
					$formErrors[]=lang("EmailError2");
				}

			}

			$age 		= $_POST['age'];
			$adresse	= $_POST['adresse'];
			$ville 		= $_POST['ville'];

			if (empty($age)) {
					$formErrors[] = lang("AGEERROR");
			}

			if (empty($adresse)) {
				$formErrors[] = lang("ADRESSERROR");
			}

			if (empty($ville)) {
				$formErrors[] = lang("CITYERROR");
			}

			// Ajouter les donnes dans la base de donnes d'un nouveau utilisateur !!

			if(empty($formErrors)){

				$formSuccess;

				//Verifier est ce que le nom utilisateur existe !!

				$check=checkItem('username','users',$username);
				if($check==1){

					$formErrors[]='Sorry this username exists !';

				}
				else{

					$stmt=$con->prepare("INSERT INTO `users`
							(username, password, email, AGE, ADRESSE, VILLE)
						 VALUES (:user , :pass , :email , :zage, :zadresse, :zville) ");

					$stmt->execute(array(

						'user' => $username,
						'pass' => $password,
						'email' => $email,
						'zage' => $age,
						'zadresse' => $adresse,
						'zville' => $ville

					));

					$formSuccess[]=lang("SUCCESS");
				}
			}
		}
?>
	<!-- Start signup form -->

	<div class="container text-center">
		<div class="signup-container">
			<div class="logo-lock">
				<i class="fa fa-user-alt"></i>
			</div>
			<h1 class="pt-5 mb-0"><?php echo lang('REGFORM');?></h1>
			<form class="pt-5 pb-4" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				<div class="input-group mb-3">
				  	<span class="input-group-btn signup-bg-color">
			         	<span class="btn"><?php echo lang('NAME');?></span>
			        </span>
			        <input type="text" class="form-control" name="username" autocomplete="off" required="required" placeholder="Your Name">
			   	</div>
				<div class="input-group mb-3">
				  	<span class="input-group-btn signup-bg-color">
			         	<span class="btn"><?php echo lang('EMAIL');?></span>
			        </span>
			        <input type="email" class="form-control" name="email" autocomplete="off" required="required" placeholder="Your Email">
			   	</div>
			   	<div class="input-group mb-3">
				  	<span class="input-group-btn signup-bg-color">
			         	<span class="btn"><?php echo lang('PASSWORD');?></span>
			        </span>
			        <input type="password" class="form-control" name="password" placeholder="Your Password" required="required" autocomplete="new-password">
			   	</div>
			   	<div class="input-group mb-3">
				  	<span class="input-group-btn signup-bg-color">
			         	<span class="btn"><?php echo lang('CONFIRM');?></span>
			        </span>
			        <input type="password" class="form-control" name="confirm-password" placeholder="Confirm password" required="required" autocomplete="new-password">
			   	</div>
			   	<div class="input-group mb-3">
				  	<span class="input-group-btn signup-bg-color">
			         	<span class="btn"><?php echo lang('AGE');?></span>
			        </span>
			        <input type="text" class="form-control" name="age" autocomplete="off" required="required" placeholder="Your Age">
			   	</div>
			   	<div class="input-group mb-3">
				  	<span class="input-group-btn signup-bg-color">
			         	<span class="btn"><?php echo lang('ADRESS');?></span>
			        </span>
			        <input type="text" class="form-control" name="adresse" autocomplete="off" required="required" placeholder="Your Adresse">
			   	</div>
			   	<div class="input-group mb-4">
				  	<span class="input-group-btn signup-bg-color">
			         	<span class="btn"><?php echo lang('CITY');?></span>
			        </span>
			        <input type="text" class="form-control" name="ville" autocomplete="off" required="required" placeholder="Your City">
			   	</div>
			  	<button type="submit" class="btn btn-block" href=""><?php echo lang('SIGNUP');?></button>
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
			<?php

				if(!empty($formSuccess)){
					echo '<div class="error-show">';
						echo '<div class="alert alert-success mb-0" role="alert">';
								foreach ($formSuccess as $success) {
									echo $success;
								}
						echo "</div>";
					echo "</div>";
				}

			?>
			<div class="signup text-center pb-3">
				<hr class="categorie-divider">
				<p> <?php echo lang('ACCOUNT1');?><a class="btn-link" href="login.php"> <?php echo lang('SIGNIN');?></a></p>
			</div>
		</div>
	</div>

	<!-- End signup form -->
<?php

	include 'includes/templates/footer.php';
	ob_end_flush();

?>
