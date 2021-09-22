<?php
	ob_start();
	session_start();
	$pageTitle="Payment";
	include 'init.php';

	if(!isset($_SESSION['user'])){

		$message='<div class="alert alert-warning mt-4">'. lang('MESSAGE4') .'</div>';
		redirectFunction($message,'login.php',3);

	}

	$formErrors = array();
	$formValidation=array();

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		if(isset($_POST['username']) && is_string($_POST['username'])){

			if(isset($_POST['cardNumber']) && is_numeric($_POST['cardNumber'])){

				if(isset($_POST['cvv']) && is_numeric($_POST['cvv'])){

					$userid 	 = $_SESSION['userid'];
					$username	 = $_POST['username'];
					$cardNumber	 = $_POST['cardNumber'];
					$cvv 		 = $_POST['cvv'];

					$validation=(luhn_validate($cardNumber));

					if($validation == true){

						$user=getItem('user_id','users',$userid);

						$userMail=$user['email'];

						$fullName=$user['fullName'];

						$msg = lang('HI').$fullName.' /n /n /n '.lang('PAYMENT2').'/n/n/n '.'<b>'.lang('CONGRATULATIONS').'</b>';

						$montantTotal = $_SESSION['totaux'];

						//mail($userMail,'Payment Done',$msg);

						//$formValidation[]='Your Payment is done , Congratulations '.$fullName.' Please check your mail !';

						$to      = $userMail;
					    $subject = lang('PAYMENT3');
					    $message = lang('MESSAGE5').$fullName.lang('MESSAGE6').$userMail.lang("AMOUNT").$montantTotal.lang("THANKYOU");
					    $headers = lang('FROM').' ecommerceensa@gmail.com';

					    if(mail($to, $subject, $message, $headers)){

					    	$formValidation[] = lang("MESSAGE7");
					    	emptyCart($userid);
					    	header("refresh:8;url=home.php");

					    }else{

					    	$formErrors[]=lang("ERROR");

					    }

					}
					else{

						$formErrors[]=lang("INVALID");

					}

				}
				else{

					$formErrors[]=lang("INVALID2");

				}

			}
			else{

				$formErrors[]=lang("INVALID3");

			}

		}
		else{

			$formErrors[]=lang("INVALID4");

		}
	}
?>

	<!-- Start Payment form -->

	<div class="container text-center">
		<div class="payment-container">
			<div class="logo-payment">
				<span>P</span>
			</div>
			<h1 class="mb-0"><?php echo lang('PGATEWAY');?></h1>
			<form class="pt-5 pb-5" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				<div class="input-group mb-3 px-5">
					<label class="d-block"><?php echo lang('CHOLDER');?></label>
					<div class="payment-input-container">
						<div class="payment-input-logo">
							<i class="fa fa-user-alt"></i>
						</div>
			        	<input type="text" name="username" placeholder="<?php echo lang('ENTERPLACEHOLDER');?>" required class="form-control">
					</div>
			   	</div>
			   	<div class="input-group mb-3 px-5 pb-3">
					<label class="d-block"><?php echo lang('CNUMBER');?></label>
					<div class="payment-input-container">
						<div class="payment-input-logo">
							<i class="fas fa-credit-card"></i>
						</div>
			        	<input type="text" name="cardNumber" placeholder="<?php echo lang('CARDNUMBERPLACEHOLDER');?>" class="form-control" required>
					</div>
			   	</div>
			   	<div class="input-group mb-3 px-5 pb-3">
			   		<div class="row text-left  w-100 ml-1">
			   			<div class="col-8 p-0">
			   				<label class="d-block"><?php echo lang('EXDATE');?></label>
							<div class="payment-input-container">
								<div class="payment-input-logo">
									<i class="far fa-calendar-alt" style="font-style: 1.2rem"></i>
								</div>
					        	<input type="date" id="start"
							       min="2020-01-01" max="2028-12-31" class="form-control text-center" name="card-number" placeholder="00/00" required="required">
							</div>
			   			</div>
			   			<div class="col-4 pr-0">
			   				<label class="d-block">CVC :</label>
							<div class="payment-input-container">
					        	<input type="text" class="form-control text-center" name="cvv" placeholder="CVC" required="required">
							</div>
			   			</div>
			   		</div>
			   	</div>
			  	<button type="submit" class="btn btn-block btn-payment"><?php echo lang('CONFIRM');?></button>
			</form>
			<?php

				if(!empty($formErrors)){
					echo '<div class="error-show pb-3 px-3">';
						echo '<div class="alert alert-danger mb-0" role="alert">';
								foreach ($formErrors as $error) {
									echo $error;
								}
						echo "</div>";
					echo "</div>";
				}

			?>
			<?php

				if(!empty($formValidation)){
					echo '<div class="error-show pb-3 px-3">';
						echo '<div class="alert alert-success mb-0" role="alert">';
								foreach ($formValidation as $validation) {
									echo $validation;
								}
						echo "</div>";
					echo "</div>";
				}

			?>
		</div>
	</div>


	<!-- End Payment form -->

<?php

	include 'includes/templates/footer.php';
	ob_end_flush();

?>
