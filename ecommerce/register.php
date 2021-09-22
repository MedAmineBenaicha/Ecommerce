<?php

	$pageTitle='Log in'; //Pour definir le titre de la page !!

	include 'init.php';

	$do='';

	$do=isset($_GET['do']) ? $_GET['do'] : '';
	if($do == '') {
		// La page home de notre produits !!
	?>

	<!-- Start Contact Area -->

	<h1 class="text-center"><?php echo lang('REGISTER');?></h1>
		<section class="edit">
			<div class="container">
				<form class="form-horizontal" action="?do=Insert" method="post">
					<div class="form-group">
					<div class="row">

						<!--Start UserName input Field-->

						<label class="col-md-2 control-label"><?php echo lang('USERNAME');?></label>
						<div class="col-md-8 col-lg-6">
							<input class="form-control" type="text" name="username" autocomplete="off" required="required" placeholder="Choose an user name">
						</div>
						<div class="col-0 col-md-2 col-lg-4"></div>

						<!--End UserName input Field-->

						<!--Start Name input Field-->

						<label class="col-md-2 control-label"><?php echo lang('NAME');?></label>
						<div class="col-md-8 col-lg-6">
							<input class="form-control" type="text" name="name" autocomplete="off" required="required" placeholder="Your Name">
						</div>
						<div class="col-0 col-md-2 col-lg-4"></div>

						<!--End Name input Field-->

						<!--Start Email input Field-->

						<label class="col-md-2 control-label"><?php echo lang('EMAIL');?></label>
						<div class="col-md-8 col-lg-6">
							<input class="form-control" type="email" name="email" placeholder="Your email" required="required">
						</div>
						<div class="col-0 col-md-2 col-lg-4"></div>

						<!--End Email input Field-->

						<!--Start Password input Field-->

						<label class="col-md-2 control-label"><?php echo lang('PASSWORD');?></label>
						<div class="col-md-8 col-lg-6">
							<input class="form-control" type="password" name="password" placeholder="Your Password" required="required" autocomplete="new-password">
						</div>
						<div class="col-0 col-md-2 col-lg-4"></div>

						<!--End Password input Field-->

						<!--Start Mobile input Field-->

						<label class="col-md-2 control-label"><?php echo lang('MOBILE');?></label>
						<div class="col-md-8 col-lg-6">
							<input class="form-control" type="text" name="mobile" placeholder="Your mobile phone" required="required">
						</div>
						<div class="col-0 col-md-2 col-lg-4"></div>

						<!--End Mobile input Field-->

						<!--Start submit Field-->

						<div class="col-md-2"></div>
						<div class="col-md-8">
							<input class="btn btn-primary" type="submit" name="submit" value=<?php echo lang('REGISTER');?>>
						</div>
						<div class="col-md-2"></div>

						<!--End submit Field-->

						<!--Start Log in Field-->

						<div class="col-md-2"></div>
						<div class="col-md-8">
							<span>If you already have an acount <a href="login.php" class="link">Sign in</a></span>
						</div>

						<!--End Log in Field-->
					</div>
					</div>
				</form>
			</div>
		</section>

    <!-- End Contact Area -->
	<?php

	}else if($do=='Insert'){
		// Ajouter un client dans la base de donnes !!!

		if($_SERVER['REQUEST_METHOD']=='POST'){

			echo "<h1 class='text-center'>Add Client</h1>";

			echo '<div class="container">';


			// Les donnes pour un nouveau utilisateur !

			$name   	=	$_POST['name'];
			$username   =	$_POST['username'];
			$email 		=	$_POST['email'];
			$mobile 	=	$_POST['mobile'];
			$password  	= 	$_POST['password'];

			$hashPass	=	sha1($_POST['password']);

			//Avant d'Ajouter  dans la base de donnes il faut qu'on teste les champs pour catcher les erreurs lors de la saisie des donnees !!
			$formErrors=array();
			if(empty($username)){
				$formErrors[]=" Username mustn't be empty</div>";
			}
			if(empty($name)){
				$formErrors[]=" Username mustn't be empty</div>";
			}
			if(empty($password)){
				$formErrors[]=" Password mustn't be empty</div>";
			}
			if(strlen($username) < 2){
				$formErrors[]=" Username must be more than <strong>2 characters</strong>";
			}
			if(strlen($username) > 20){
				$formErrors[]=" Username mustn't be more than <strong>20 characters</strong>";
			}
			if(empty($email)){
				$formErrors[]=" Email mustn't be empty";
			}
			if(empty($mobile)){
				$formErrors[]=" Mobile mustn't be empty";
			}
			//Boucler sur les erreurs pour les afficher :

			foreach ($formErrors as $error) {
				echo '<div class="alert alert-danger">'.$error.'</div>';
			}

			// Ajouter les donnes dans la base de donnes d'un nouveau utilisateur !!

			if(empty($formErrors)){

				//Verifier est ce que le nom utilisateur existe !!

				$check=checkItem('username','users',$username);
				if($check==1){

					$message='<div class="alert alert-danger">Sorry this username exists !</div>';

					redirectFunction($message,'back',3);
				}
				else{

					$stmt=$con->prepare("INSERT INTO `users`
							(`username`, `fullName`, `email`, `password`)
						 VALUES (:user , :name , :email , :pass) ");

					$stmt->execute(array(

						'user' => $username,
						'pass' => $hashPass,
						'email' => $email,
						'name' => $name,

					));

					$message="<div class='alert alert-success'> Welcome ".$username."!!</div>";

					redirectFunction($message,2);
				}
			}

		}
		else{ // Un message de redirection !!

			$message="<div class='alert alert-danger'>You don't have access to this page</div>";

			redirectFunction($message,'back',3);

		}

		echo "</div>";
	}

	include 'includes/templates/footer.php';

?>
