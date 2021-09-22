<?php
	session_start();
	$noNavbar = '';
	$pageTitle = 'Login';

	if (isset($_SESSION['username'])) {
		header('Location: dashboard.php'); // Réorienter vers la page dashboard.php
	}

	include 'init.php';

	// Check If User Coming From HTTP Post Request

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$username = $_POST['username'];
		$password = $_POST['password'];
		$hashedPass = sha1($password);

		// Vérifiez si l'utilisateur existe dans la base de données

		$stmt = $con->prepare("SELECT
									user_id, username, password
								FROM
									users
								WHERE
									username = ?
								AND
									Password = ?
								AND
									GroupID = 1
								LIMIT 1");

		$stmt->execute(array($username, $hashedPass));
		$row = $stmt->fetch(); // record as an array
		$count = $stmt->rowCount();

		// Si count> 0, cela signifie que la base de données contient un enregistrement sur ce username

		if ($count > 0) {
			$_SESSION['username'] = $username; // Register Session Name
			$_SESSION['user_id'] = $row['user_id']; // Register Session ID
			header('Location: dashboard.php'); // Rediriger vers la page dashboard.php
			exit();
		}

	}

?>

	<form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
		<h4 class="text-center">Admin Login</h4>
		<input class="form-control" type="text" name="username" placeholder="username" autocomplete="off" />
		<input class="form-control" type="password" name="password" placeholder="Password" autocomplete="new-password" />
		<input class="btn btn-primary btn-block" type="submit" value="Login" />
	</form>

<?php include $tpl . 'footer.php'; ?>
