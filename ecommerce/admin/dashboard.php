<?php

	ob_start(); // Output Buffering Start

	session_start();

	if (isset($_SESSION['username'])) {

		$pageTitle = 'Dashboard';

		include 'init.php';

		/* Start Dashboard Page */

		$numUsers = 6; // Number Of Latest Users

		$latestUsers = getLatest("*", "users", "user_id", $numUsers); // Latest Users Array

		$numItems = 6; // Number Of Latest Items

		$latestItems = getLatest("*", 'products', 'product_id', $numItems); // Latest Items Array

		$numComments = 4;

		?>

		<div class="home-stats">
			<div class="container text-center">
				<h1>Dashboard</h1>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-3 mb-3">
						<div class="stat st-members">
							<i class="fa fa-users"></i>
							<div class="info">
								Total Users
								<span>
									<a href="users.php"><?php echo countItems('user_id', 'users') ?></a>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 mb-3">
						<div class="stat st-items">
							<i class="fa fa-tag"></i>
							<div class="info">
								Total Products
								<span>
									<a href="products.php"><?php echo countItems('product_id', 'products') ?></a>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-3"></div>
				</div>
			</div>
		</div>

		<div class="latest">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 mb-3">
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-users"></i>
								 Latest <?php echo $numUsers ?> Registerd Users
								<span class="toggle-info pull-right">
									<i class="fa fa-plus fa-lg"></i>
								</span>
							</div>
							<div class="panel-body">
								<ul class="list-unstyled latest-users">
								<?php
									if (! empty($latestUsers)) {
										foreach ($latestUsers as $user) {
											echo '<li>';
												echo $user['username'];
												echo '<a href="users.php?do=Edit&user_id=' . $user['user_id'] . '">';
													echo '<span class="btn btn-success pull-right">';
														echo '<i class="fa fa-edit"></i> Edit';
														if ($user['RegStatus'] == 0) {
															echo "<a
																	href='users.php?do=Activate&user_id=" . $user['user_id'] . "'
																	class='btn btn-info pull-right activate'>
																	<i class='fa fa-check'></i> Activate</a>";
														}
													echo '</span>';
												echo '</a>';
											echo '</li>';
										}
									} else {
										echo 'There\'s No Members To Show';
									}
								?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-6 mb-3">
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-tag"></i> Latest <?php echo $numItems ?> Products
								<span class="toggle-info pull-right">
									<i class="fa fa-plus fa-lg"></i>
								</span>
							</div>
							<div class="panel-body">
								<ul class="list-unstyled latest-users">
									<?php
										if (! empty($latestItems)) {
											foreach ($latestItems as $item) {
												echo '<li>';
													echo $item['product_title'];
													echo '<a href="products.php?do=Edit&product_id=' . $item['product_id'] . '">';
													echo '</a>';
												echo '</li>';
											}
										} else {
											echo 'There\'s No Products To Show';
										}
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php

		/* End Dashboard Page */
    include $tpl . 'footer.php';
	} else {

		header('Location: index.php');

		exit();
	}

	ob_end_flush(); // Release The Output

?>
