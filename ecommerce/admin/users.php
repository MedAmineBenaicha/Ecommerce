<?php

	ob_start(); // Output Buffering Start

	session_start();

	$pageTitle = 'Users';

	if (isset($_SESSION['username'])) {

		include 'init.php';

		$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

		// Start Manage Page

		if ($do == 'Manage') { // Manage Members Page

			$query = '';

			if (isset($_GET['page']) && $_GET['page'] == 'Pending') {

				$query = 'AND RegStatus = 0';

			}

			// Select All Users Except Admin

			$stmt = $con->prepare("SELECT * FROM users WHERE GroupID != 1 $query ORDER BY user_id DESC");

			// Execute The Statement

			$stmt->execute();

			// Assign To Variable

			$rows = $stmt->fetchAll();

			if (! empty($rows)) {

			?>

			<h1 class="text-center">Manage Users</h1>
			<div class="container">
				<div class="table-responsive">
					<table class="main-table text-center table table-bordered">
						<tr>
							<td>#ID</td>
							<td>Username</td>
							<td>Email</td>
							<td>Full Name</td>
							<td>Age</td>
							<td>Adresse</td>
							<td>Ville</td>
							<td>Control</td>
						</tr>
						<?php
							foreach($rows as $row) {
								echo "<tr>";
									echo "<td>" . $row['user_id'] . "</td>";
									echo "<td>" . $row['username'] . "</td>";
									echo "<td>" . $row['email'] . "</td>";
									echo "<td>" . $row['fullName'] . "</td>";
									echo "<td>" . $row['AGE'] ."</td>";
									echo "<td>" . $row['ADRESSE'] ."</td>";
									echo "<td>" . $row['VILLE'] ."</td>";
									echo "<td>
										<a href='users.php?do=Edit&user_id=" . $row['user_id'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
										<a href='users.php?do=Delete&user_id=" . $row['user_id'] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete </a>";
										if ($row['RegStatus'] == 0) {
											echo "<a
													href='users.php?do=Activate&user_id=" . $row['user_id'] . "'
													class='btn btn-info activate'>
													<i class='fa fa-check'></i> Activate</a>";
										}
									echo "</td>";
								echo "</tr>";
							}
						?>
						<tr>
					</table>
				</div>
			</div>

			<?php } else {

				echo '<div class="container">';
					echo '<div class="nice-message">There\'s No Users To Show</div>';
					echo '<a href="users.php?do=Add" class="btn btn-primary">
							<i class="fa fa-plus"></i> New User
						</a>';
				echo '</div>';

			} ?>

		<?php
		} elseif ($do == 'Insert') {

			// Insert Member Page

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				echo "<h1 class='text-center'>Insert User</h1>";
				echo "<div class='container'>";

				// Get Variables From The Form

				$user 	  = $_POST['username'];
				$pass 	  = $_POST['password'];
				$email 	  = $_POST['email'];
				$fullname = $_POST['full'];
				$name 	  = $_POST['NOM'];
				$surname 	= $_POST['PRENOM'];
				$age 	    = $_POST['AGE'];
				$adresse 	= $_POST['ADRESSE'];
				$ville 	  = $_POST['VILLE'];

				$hashPass = sha1($_POST['password']);

				// Validate The Form

				$formErrors = array();

				if (strlen($user) < 4) {
					$formErrors[] = 'Username Cant Be Less Than <strong>4 Characters</strong>';
				}

				if (strlen($user) > 20) {
					$formErrors[] = 'Username Cant Be More Than <strong>20 Characters</strong>';
				}

				if (empty($user)) {
					$formErrors[] = 'Username Cant Be <strong>Empty</strong>';
				}

				if (empty($pass)) {
					$formErrors[] = 'Password Cant Be <strong>Empty</strong>';
				}

				if (empty($fullname)) {
					$formErrors[] = 'Full Name Cant Be <strong>Empty</strong>';
				}

				if (empty($email)) {
					$formErrors[] = 'Email Cant Be <strong>Empty</strong>';
				}

				if (empty($name)) {
					$formErrors[] = 'Name Cant Be <strong>Empty</strong>';
				}

				if (empty($surname)) {
					$formErrors[] = 'Surname Cant Be <strong>Empty</strong>';
				}

				if (empty($age)) {
					$formErrors[] = 'Age Cant Be <strong>Empty</strong>';
				}

				if (empty($adresse)) {
					$formErrors[] = 'Adresse Cant Be <strong>Empty</strong>';
				}

				if (empty($ville)) {
					$formErrors[] = 'City Cant Be <strong>Empty</strong>';
				}



				// Loop Into Errors Array And Echo It

				foreach($formErrors as $error) {
					echo '<div class="alert alert-danger">' . $error . '</div>';
				}

				// Check If There's No Error Proceed The Update Operation

				if (empty($formErrors)) {

					// Check If User Exist in Database

					$check = checkItem("username", "users", $user);

					if ($check == 1) {

						$theMsg = '<div class="alert alert-danger">Sorry This User Is Exist</div>';

						redirectHome($theMsg, 'back');

					} else {

						// Insert Userinfo In Database

						$stmt = $con->prepare("INSERT INTO
													users(username, password, email, fullName, RegStatus, AGE, ADRESSE, VILLE)
												VALUES(:zuser, :zpass, :zmail, :zfullname, 1, :zname, :zsurname, :zage, :zadresse, :zville) ");
						$stmt->execute(array(

							'zuser' => $user,
							'zpass' => $hashPass,
							'zmail' => $email,
							'zfullname' => $fullname,
							'zname' => $name,
							'zsurname' => $surname,
							'zage' => $age,
							'zadresse' => $adresse,
							'zville' => $ville

						));

						// Echo Success Message

						$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Inserted</div>';

						redirectHome($theMsg, 'back');

					}

				}

			} else {

				echo "<div class='container'>";

				$theMsg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';

				redirectHome($theMsg);

				echo "</div>";

			}

			echo "</div>";

		} elseif ($do == 'Edit') {

			// Check If Get Request userid Is Numeric & Get Its Integer Value

			$userid = isset($_GET['user_id']) && is_numeric($_GET['user_id']) ? intval($_GET['user_id']) : 0;

			// Select All Data Depend On This ID

			$stmt = $con->prepare("SELECT * FROM users WHERE user_id = ? LIMIT 1");

			// Execute Query

			$stmt->execute(array($userid));

			// Fetch The Data

			$row = $stmt->fetch();

			// The Row Count

			$count = $stmt->rowCount();

			// If There's Such ID Show The Form

			if ($count > 0) { ?>

				<h1 class="text-center">Edit User</h1>
				<div class="container">
					<form class="form-horizontal" action="?do=Update" method="POST">
						<input type="hidden" name="user_id" value="<?php echo $userid ?>" />
						<!-- Start Username Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Username</label>
							<div class="col-sm-10 col-md-6">
								<input type="text" name="username" class="form-control" value="<?php echo $row['username'] ?>" autocomplete="off" required="required" />
							</div>
						</div>
						<!-- End Username Field -->
						<!-- Start Password Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Password</label>
							<div class="col-sm-10 col-md-6">
								<input type="hidden" name="oldpassword" value="<?php echo $row['password'] ?>" />
								<input type="password" name="newpassword" class="form-control" autocomplete="new-password" placeholder="Leave Blank If You Dont Want To Change" />
							</div>
						</div>
						<!-- End Password Field -->
						<!-- Start Email Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10 col-md-6">
								<input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" required="required" />
							</div>
						</div>
						<!-- End Email Field -->
						<!-- Start Full Name Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Full Name</label>
							<div class="col-sm-10 col-md-6">
								<input type="text" name="full" value="<?php echo $row['fullName'] ?>" class="form-control" required="required" />
							</div>
						</div>
						<!-- End Full Name Field -->
						<!-- Start AGE Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Age</label>
							<div class="col-sm-10 col-md-6">
								<input type="text" name="age" value="<?php echo $row['AGE'] ?>" class="form-control" required="required" />
							</div>
						</div>
						<!-- End AGE Field -->
						<!-- Start Adresse Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Adresse</label>
							<div class="col-sm-10 col-md-6">
								<input type="text" name="adresse" value="<?php echo $row['ADRESSE'] ?>" class="form-control" required="required" />
							</div>
						</div>
						<!-- End Adresse Field -->
						<!-- Start City Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Ville</label>
							<div class="col-sm-10 col-md-6">
								<input type="text" name="ville" value="<?php echo $row['VILLE'] ?>" class="form-control" required="required" />
							</div>
						</div>
						<!-- End City Field -->
						<!-- Start Submit Field -->
						<div class="form-group form-group-lg">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="submit" value="Save" class="btn btn-primary btn-lg" />
							</div>
						</div>
						<!-- End Submit Field -->
					</form>
				</div>

			<?php

			// If There's No Such ID Show Error Message

			} else {

				echo "<div class='container'>";

				$theMsg = '<div class="alert alert-danger">Theres No Such ID</div>';

				redirectHome($theMsg);

				echo "</div>";

			}

		} elseif ($do == 'Update') { // Update Page

			echo "<h1 class='text-center'>Update User</h1>";
			echo "<div class='container'>";

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				// Get Variables From The Form

				$id 	= $_POST['user_id'];
				$user 	= $_POST['username'];
				$email 	= $_POST['email'];
				$fullname 	= $_POST['full'];
				$age 	= $_POST['age'];
				$adresse	= $_POST['adresse'];
				$ville 	= $_POST['ville'];

				// Password Trick

				$pass = empty($_POST['newpassword']) ? $_POST['oldpassword'] : sha1($_POST['newpassword']);

				// Validate The Form

				$formErrors = array();

				if (strlen($user) < 4) {
					$formErrors[] = 'Username Cant Be Less Than <strong>4 Characters</strong>';
				}

				if (!is_numeric($age)) {
					$formErrors[] = 'The age field must be numeric';
				}

				if (strlen($user) > 20) {
					$formErrors[] = 'Username Cant Be More Than <strong>20 Characters</strong>';
				}

				if (empty($user)) {
					$formErrors[] = 'Username Cant Be <strong>Empty</strong>';
				}

				if (empty($fullname)) {
					$formErrors[] = 'Full Name Cant Be <strong>Empty</strong>';
				}

				if (empty($email)) {
					$formErrors[] = 'Email Cant Be <strong>Empty</strong>';
				}

				if (empty($age)) {
					$formErrors[] = 'Age Cant Be <strong>Empty</strong>';
				}

				if (empty($adresse)) {
					$formErrors[] = 'Adresse Cant Be <strong>Empty</strong>';
				}

				if (empty($ville)) {
					$formErrors[] = 'City Cant Be <strong>Empty</strong>';
				}

				// Loop Into Errors Array And Echo It

				foreach($formErrors as $error) {
					echo '<div class="alert alert-danger">' . $error . '</div>';
				}

				// Check If There's No Error Proceed The Update Operation

				if (empty($formErrors)) {

					$stmt2 = $con->prepare("SELECT
												*
											FROM
												users
											WHERE
												username = ?
											AND
												user_id != ?");

					$stmt2->execute(array($user, $id));

					$count = $stmt2->rowCount();

					if ($count == 1) {

						$theMsg = '<div class="alert alert-danger">Sorry This User Already Exist choose a different username !</div>';

						redirectHome($theMsg, 'back');

					} else {

						// Update The Database With This Info

						$stmt = $con->prepare("UPDATE users SET username = ?, email = ?, fullName = ?, password = ?, AGE = ?, ADRESSE = ?, VILLE = ? WHERE user_id = ?");

						$stmt->execute(array($user, $email, $fullname, $pass, $age, $adresse, $ville, $id));

						// Echo Success Message

						$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';

						redirectHome($theMsg, 'back');

					}

				}

			} else {

				$theMsg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';

				redirectHome($theMsg);

			}

			echo "</div>";

		} elseif ($do == 'Delete') { // Delete Member Page

			echo "<h1 class='text-center'>Delete Users</h1>";
			echo "<div class='container'>";

				// Check If Get Request userid Is Numeric & Get The Integer Value Of It

				$userid = isset($_GET['user_id']) && is_numeric($_GET['user_id']) ? intval($_GET['user_id']) : 0;

				// Select All Data Depend On This ID

				$check = checkItem('user_id', 'users', $userid);

				// If There's Such ID Show The Form

				if ($check > 0) {

					$stmt = $con->prepare("DELETE FROM users WHERE user_id = :zuser");

					$stmt->bindParam(":zuser", $userid);

					$stmt->execute();

					$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Deleted</div>';

					redirectHome($theMsg, 'back');

				} else {

					$theMsg = '<div class="alert alert-danger">This ID is Not Exist</div>';

					redirectHome($theMsg);

				}

			echo '</div>';

		} elseif ($do == 'Activate') {

			echo "<h1 class='text-center'>Activate User</h1>";
			echo "<div class='container'>";

				// Check If Get Request userid Is Numeric & Get The Integer Value Of It

				$userid = isset($_GET['user_id']) && is_numeric($_GET['user_id']) ? intval($_GET['user_id']) : 0;

				// Select All Data Depend On This ID

				$check = checkItem('user_id', 'users', $userid);

				// If There's Such ID Show The Form

				if ($check > 0) {

					$stmt = $con->prepare("UPDATE users SET RegStatus = 1 WHERE user_id = ?");

					$stmt->execute(array($userid));

					$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';

					redirectHome($theMsg);

				} else {

					$theMsg = '<div class="alert alert-danger">This ID is Not Exist</div>';

					redirectHome($theMsg);

				}

			echo '</div>';

		}

		include $tpl . 'footer.php';

	} else {

		header('Location: index.php');

		exit();
	}

	ob_end_flush(); // Release The Output

?>
