<?php

	ob_start();
	session_start();
	$pageTitle="Profil"; //Pour definir le titre de la page !!
	include 'init.php';


	if(isset($_SESSION['user'])){

		$userid=$_SESSION['userid'];

		$do='';

		$do=isset($_GET['do']) ? $_GET['do'] : 'Manage';

		if($do=='Manage'){ // debut de if


			$stmt=$con->prepare('SELECT * FROM users WHERE user_id = ? LIMIT 1');

			$stmt->execute(array($userid));
			$row=$stmt->fetch(); //enregistrer le resultat sous la forme d'un tableau "Aller Chercher"
			$count = $stmt->rowCount();

			//If Count > 0 ca veut dire que cet utilisateur avec cet password et de type administrateur existe

			if($count > 0){ ?>


				<!-- Start profil form -->

				<div class="container text-center">
					<div class="signup-container">
						<div class="logo-lock">
							<i class="fa fa-user-alt"></i>
						</div>
						<h1 class="pt-5 mb-0"><?php echo lang('WELCOME');?><span><?php echo $row['username'] ?></span></h1>
						<form class="pt-5 pb-4" action="?do=Update&userid=<?php echo $userid; ?>" method="post">
							<div class="input-group mb-3">
							  	<span class="input-group-btn signup-bg-color">
						         	<span class="btn"><?php echo lang('NAME');?></span>
						        </span>
						        <input class="form-control" type="text" value="<?php echo $row['username']; ?>" name="username" autocomplete="off" required="required">
						   	</div>
							<div class="input-group mb-3">
							  	<span class="input-group-btn signup-bg-color">
						         	<span class="btn"><?php echo lang('EMAIL');?></span>
						        </span>
						        <input class="form-control" type="email" name="email" autocomplete="off" value="<?php echo $row['email']; ?>" required="required">
						   	</div>
						   	<div class="input-group mb-3">
							  	<span class="input-group-btn signup-bg-color">
						         	<span class="btn"><?php echo lang('PASSWORD');?></span>
						        </span>
						        <input class="form-control" type="password" name="new-password" autocomplete="new-password" placeholder="Leave it blank if you don't want to change it">
						   	</div>
						   	<!-- hidden input for password old value -->
						    <input class="form-control" type="hidden" name="old-password" autocomplete="new-password" value="<?php echo $row['password']; ?>">
						   	<div class="input-group mb-3">
							  	<span class="input-group-btn signup-bg-color">
						         	<span class="btn" style="font-size: 0.9rem;"><?php echo lang('FULLNAME');?></span>
						        </span>
						        <input class="form-control" type="text" name="fullName"
										autocomplete="off" value="<?php echo $row['fullName']; ?>" required="required">
						   	</div>
						  	<button type="submit" class="btn btn-block"><?php echo lang('SAVE');?></button>
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
					</div>
				</div>

				<!-- End profil form -->
				<?php
			}
		}//end pour la condition if
		else if($do=='Update'){
				$userid=0;
				//Tester la valeur de l'id_utilisateur : il doit estre numerique !

				if(isset($_GET['userid']) && is_numeric($_GET['userid'])){
					$userid=$_GET['userid'];
				}
				else{

					$userid=0;
				}
				if ($_SERVER['REQUEST_METHOD'] == 'POST'){

				$username=$_POST['username'];

				$email=$_POST['email'];

				$fullName=$_POST['fullName'];

				//Pour tester le password !!

				if(empty($_POST['new-password'])){
					$password=$_POST['old-password'];
				}
				else{
					$password=sha1($_POST['new-password']);
				}
				//Avant de changer dans la base de donnes il faut qu'on teste les champs pour catcher les erreurs lors de la saisie des nouveaux donnes !!
				$formErrors=array();
				if(strlen($username) > 20){
					$formErrors[]="<div class='alert alert-danger'>".lang("UsernameError")."</div>";
				}
				if(empty($username)){
					$formErrors[]="<div class='alert alert-danger'>".lang("UsernameError1")."</div>";
				}
				if(strlen($username) < 3){
					$formErrors[]="<div class='alert alert-danger'>".lang("UsernameError2")."</div>";
				}
				if(empty($email)){
					$formErrors[]="<div class='alert alert-danger'>".lang("EmailError")."</div>";
				}
				if(empty($fullName)){
					$formErrors[]="<div class='alert alert-danger'>".lang("FNError")."</div>";
				}
				//Boucler sur les erreurs pour les afficher :

				foreach ($formErrors as $error) {
					echo $error;
				}

				// Changer les donnes dans la base de donnes !!

				if(empty($formErrors)){
					$stmt=$con->prepare("UPDATE
											users
										 SET
										 	username = ? , email = ? , fullName = ? , password = ?
										 WHERE
										 	user_id = ?	 ");
					$stmt->execute(array($username,$email,$fullName,$password,$userid));

					$message="<div class='alert alert-success'> ".$stmt->rowCount().lang("UPDATEDONE")."</div>";

					redirectFunction($message,'back');

				}
			}else{
				// Redirection vers la page precedente
				$message="<div class='alert alert-danger'>".lang("ACCESS")."</div>";

				redirectFunction($message);
			}

		}
	}else{
		header('location:login.php');
		exit();
	}


	include 'includes/templates/footer.php';
	ob_end_flush();
?>
