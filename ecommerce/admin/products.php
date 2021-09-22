<?php

	// Products Page

	ob_start(); // Output Buffering Start

	session_start();

	$pageTitle = 'Products';

	if (isset($_SESSION['username'])) {

		include 'init.php';

		$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

		if ($do == 'Manage') {


			$stmt = $con->prepare("SELECT
										products.*,
										categories.cat_title AS category_name
									FROM
										products
									INNER JOIN
										categories
									ON
										categories.cat_id = products.product_category_id
									ORDER BY
										product_id DESC");

			// Execute The Statement

			$stmt->execute();

			// Assign To Variable

			$items = $stmt->fetchAll();

			if (! empty($items)) {

			?>

			<h1 class="text-center">Manage products</h1>
			<div class="container">
				<div class="table-responsive">
					<table class="main-table text-center table table-bordered">
						<tr>
							<td>#ID</td>
							<td>Porduct Name</td>
							<td>Description</td>
							<td>Old Price</td>
							<td>Price</td>
							<td>Quantity</td>
							<td>Category</td>
							<td>image</td>
							<td>Control</td>
						</tr>
						<?php
							foreach($items as $item) {
								echo "<tr>";
									echo "<td>" . $item['product_id'] . "</td>";
									echo "<td>" . $item['product_title'] . "</td>";
									echo "<td>" . $item['product_description'] . "</td>";
									echo "<td>" . $item['old_price'] . "</td>";
									echo "<td>" . $item['product_price'] . "</td>";
									echo "<td>" . $item['product_quantity'] . "</td>";
									echo "<td>" . $item['category_name'] ."</td>";
									echo "<td>" . $item['product_image'] ."</td>";
									echo "<td class='w-25'>
										<a href='products.php?do=Edit&product_id=" . $item['product_id'] . "' class='btn btn-success mb-2'><i class='fa fa-edit'></i> Edit</a>
										<a href='products.php?do=Delete&product_id=" . $item['product_id'] . "' class='btn btn-danger confirm mb-2'><i class='fa fa-close'></i> Delete </a>";
									echo "</td>";
								echo "</tr>";
							}
						?>
						<tr>
					</table>
				</div>
				<a href="products.php?do=Add" class="btn btn-sm btn-primary">
					<i class="fa fa-plus"></i> New Product
				</a>
			</div>

			<?php } else {

				echo '<div class="container">';
					echo '<div class="nice-message">There\'s No products To Show</div>';
					echo '<a href="products.php?do=Add" class="btn btn-sm btn-primary">
							<i class="fa fa-plus"></i> New Product
						</a>';
				echo '</div>';

			} ?>

		<?php

		} elseif ($do == 'Add') { ?>

			<h1 class="text-center">Add New Product</h1>
			<div class="container">
				<form class="form-horizontal" action="?do=Insert" method="POST" enctype="multipart/form-data">
					<!-- Start Name Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10 col-md-6">
							<input
								type="text"
								name="product_title"
								class="form-control"
								required="required"
								placeholder="Name of The Product" />
						</div>
					</div>
					<!-- End Name Field -->
					<!-- Start Description Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Short Description</label>
						<div class="col-sm-10 col-md-6">
							<input
								type="text"
								name="short_description"
								class="form-control"
								required="required"
								placeholder="Short Description of The Product" />
						</div>
					</div>
					<!-- End Description Field -->
					<!-- Start Description Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Description</label>
						<div class="col-sm-10 col-md-6">
							<input
								type="text"
								name="product_description"
								class="form-control"
								required="required"
								placeholder="Description of The Product" />
						</div>
					</div>
					<!-- End Description Field -->
					<!-- Start Price Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Price</label>
						<div class="col-sm-10 col-md-6">
							<input
								type="text"
								name="product_price"
								class="form-control"
								required="required"
								placeholder="Price of The Product" />
						</div>
					</div>
					<!-- End Price Field -->
					<!-- Start Quantity Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Quantity</label>
						<div class="col-sm-10 col-md-6">
							<input
								type="text"
								name="product_quantity"
								class="form-control"
								required="required"
								placeholder="Quantity of The Product" />
						</div>
					</div>
					<!-- End Quantity Field -->
					<!-- Start Categories Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Category</label>
						<div class="col-sm-10 col-md-6">
							<select name="category">
								<option value="0">...</option>
								<?php
									$allCats = getAllFrom("*", "categories", "cat_id");
									foreach ($allCats as $cat) {
										echo "<option value='" . $cat['cat_id'] . "'>" . $cat['cat_title'] . "</option>";
									}
								?>
							</select>
						</div>
					</div>
					<!-- End Categories Field -->
					<!-- Start Rating Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Rating</label>
						<div class="col-sm-10 col-md-6">
							<select name="rating">
								<option value="1">*</option>
								<option value="2">**</option>
								<option value="2">***</option>
								<option value="2">****</option>
								<option value="2">*****</option>
							</select>
						</div>
					</div>
					<!-- End Rating Field -->
					<!-- Start Image Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Product Image</label>
						<div class="col-sm-10 col-md-6">
							<input
								type="file"
								name="image"
								id="image"
								class="form-control"
								required="required"
								placeholder="Image of The Product" />
						</div>
					</div>
					<!-- End Image Field -->
					<!-- Start Submit Field -->
					<div class="form-group form-group-lg">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="submit" value="Add Product" class="btn btn-primary btn-sm" />
						</div>
					</div>
					<!-- End Submit Field -->
				</form>
			</div>

			<?php

		} elseif ($do == 'Insert') {

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$statement3 = $con->prepare("SELECT MAX(product_id) AS max_id FROM products");

				$statement3->execute();

				$invNum = $statement3->fetch(PDO::FETCH_ASSOC);

				$maxId = $invNum['max_id'] + 1;

				echo "<h1 class='text-center'>Insert Item</h1>";
				echo "<div class='container'>";

				// Get Variables From The Form

				$name	  	= $_POST['product_title'];
				$short_desc = $_POST['short_description'];
				$desc 		= $_POST['product_description'];
				$price 		= $_POST['product_price'];
				$quantity = $_POST['product_quantity'];
				$cat 	  	= $_POST['category'];
				$rating 	= $_POST['rating'];
				$file 		= $_FILES['image'];

				// Les donnes de l'image uploade par l'utilisateur !!

				$fileName 		= $_FILES['image']['name'];
				$fileTmpName 	= $_FILES['image']['tmp_name'];
				$fileSize 		= $_FILES['image']['size'];
				$fileError 		= $_FILES['image']['error'];
				$fileType 		= $_FILES['image']['type'];

				$fileExt 		= explode('.', $fileName);
				$fileActualExt	= strtolower(end($fileExt));

				// les extensions qu'on peut uploader

				$allowed 		= array('jpg','jpeg','png');



				// Validate The Form

				$formErrors = array();

				if (empty($name)) {
					$formErrors[] = 'Name Can\'t be <strong>Empty</strong>';
				}

				if (empty($desc)) {
					$formErrors[] = 'Description Can\'t be <strong>Empty</strong>';
				}

				if (empty($price)) {
					$formErrors[] = 'Price Can\'t be <strong>Empty</strong>';
				}

				if ($cat == 0) {
					$formErrors[] = 'You Must Choose the <strong>Category</strong>';
				}

				// Loop Into Errors Array And Echo It

				foreach($formErrors as $error) {
					echo '<div class="alert alert-danger">' . $error . '</div>';
				}

				// Check If There's No Error Proceed The Update Operation

				if (empty($formErrors)) {

					// Insert Userinfo In Database
					$fileNameNew = uniqid('',true).'.'.$fileActualExt;

					$fileNewDestination = '../layout/images/products/'.$fileNameNew;

					move_uploaded_file($fileTmpName, $fileNewDestination);

					$stmt = $con->prepare("INSERT INTO

						products(product_title, short_desc, product_description, product_price, product_quantity, product_category_id, product_image, Rating)

						VALUES(:zname, :zshort, :zdesc, :zprice, :zquantity, :zcat, :zfile, :zrating)");

					$stmt->execute(array(

						'zname' 	  => $name,
						'zshort'	  => $short_desc,
						'zdesc' 	  => $desc,
						'zprice' 	  => $price,
						'zquantity'	  => $quantity,
						'zcat'		  => $cat,
						'zfile'		  => $fileNameNew,
						'zrating'	  => $rating		
					));

					// Echo Success Message

					$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Inserted</div>';

					redirectHome($theMsg, 'back');

				}

			} else {

				echo "<div class='container'>";

				$theMsg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';

				redirectHome($theMsg);

				echo "</div>";

			}

			echo "</div>";

		} elseif ($do == 'Edit') {

			// Check If Get Request item Is Numeric & Get Its Integer Value

			$itemid = isset($_GET['product_id']) && is_numeric($_GET['product_id']) ? intval($_GET['product_id']) : 0;

			// Select All Data Depend On This ID

			$stmt = $con->prepare("SELECT * FROM products WHERE product_id = ?");

			// Execute Query

			$stmt->execute(array($itemid));

			// Fetch The Data

			$item = $stmt->fetch();

			// The Row Count

			$count = $stmt->rowCount();

			// If There's Such ID Show The Form

			if ($count > 0) { ?>

				<h1 class="text-center">Edit Product</h1>
				<div class="container">
					<form class="form-horizontal" action="?do=Update" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="product_id" value="<?php echo $itemid ?>" />
						<!-- Start Name Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Name</label>
							<div class="col-sm-10 col-md-6">
								<input
									type="text"
									name="product_title"
									class="form-control"
									required="required"
									placeholder="Name of The Item"
									value="<?php echo $item['product_title'] ?>" />
							</div>
						</div>
						<!-- End Name Field -->
						<!-- Start Description Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Short Description</label>
							<div class="col-sm-10 col-md-6">
								<input
									type="text"
									name="short_description"
									class="form-control"
									required="required"
									placeholder="Short Description of The Item"
									value="<?php echo $item['short_desc'] ?>" />
							</div>
						</div>
						<!-- End Description Field -->
						<!-- Start Description Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Description</label>
							<div class="col-sm-10 col-md-6">
								<input
									type="text"
									name="product_description"
									class="form-control"
									required="required"
									placeholder="Description of The Item"
									value="<?php echo $item['product_description'] ?>" />
							</div>
						</div>
						<!-- End Description Field -->
						<!-- Start Old Price Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Old Price</label>
							<div class="col-sm-10 col-md-6">
								<input
									type="text"
									name="old_price"
									class="form-control"
									required="required"
									placeholder="Old Price of The Item"
									value="<?php echo $item['old_price'] ?>" />
							</div>
						</div>
						<!-- End Old Price Field -->
						<!-- Start Price Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Price</label>
							<div class="col-sm-10 col-md-6">
								<input
									type="text"
									name="product_price"
									class="form-control"
									required="required"
									placeholder="Price of The Item"
									value="<?php echo $item['product_price'] ?>" />
							</div>
						</div>
						<!-- End Price Field -->
						<!-- Start Quantity Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Quantity</label>
							<div class="col-sm-10 col-md-6">
								<input
									type="text"
									name="product_quantity"
									class="form-control"
									required="required"
									placeholder="Quantity of The Product"
									value="<?php echo $item['product_quantity'] ?>" />
							</div>
						</div>
						<!-- End Quantity Field -->
						<!-- Start Categories Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Category</label>
							<div class="col-sm-10 col-md-6">
								<select name="category">
									<?php
										$allCats = getAllFrom("*", "categories", "", "cat_id");
										foreach ($allCats as $cat) {
											echo "<option value='" . $cat['cat_id'] . "'";
											if ($item['product_category_id'] == $cat['cat_id']) { echo ' selected'; }
											echo ">" . $cat['cat_title'] . "</option>";
										}
									?>
								</select>
							</div>
						</div>
						<!-- End Categories Field -->
						<!-- Start Rating Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Rating</label>
							<div class="col-sm-10 col-md-6">
								<select name="rating">
									<option value="1" <?php if($item['Rating']==1) echo 'selected'; ?>>*</option>
									<option value="2" <?php if($item['Rating']==2) echo 'selected'; ?>>**</option>
									<option value="2" <?php if($item['Rating']==3) echo 'selected'; ?>>***</option>
									<option value="2" <?php if($item['Rating']==4) echo 'selected'; ?> >****</option>
									<option value="2" <?php if($item['Rating']==5) echo 'selected'; ?>>*****</option>
								</select>
							</div>
						</div>
						<!-- End Rating Field -->
						<!-- Start Image Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label">Product Image</label>
							<div class="col-sm-10 col-md-6">
								<input
									type="file"
									value="<?php echo $item['product_image'] ?>"
									name="image"
									id="image"
									class="form-control"
									required="required"
									placeholder="Quantity of The Product" />
							</div>
						</div>
						<!-- End Image Field -->
						<input type="hidden" name="product_image" value="<?php echo $item['product_image'] ?>" />
						<!-- Start Submit Field -->
						<div class="form-group form-group-lg">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="submit" value="Save Item" class="btn btn-primary btn-sm" />
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

		} elseif ($do == 'Update') {

			echo "<h1 class='text-center'>Update Item</h1>";
			echo "<div class='container'>";

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				// Get Variables From The Form

				$id 		  	= $_POST['product_id'];
				$name 			= $_POST['product_title'];
				$desc 			= $_POST['product_description'];
				$price 			= $_POST['product_price'];
				$old_price 		= $_POST['old_price'];
				$quantity		= $_POST['product_quantity'];
				$cat 		    = $_POST['category'];
				$oldimage 		= $_POST['product_image'];
				$rating 		= $_POST['rating'];

				$file 			= $_FILES['image'];

				// Les donnes de l'image uploade par l'utilisateur !!

				$fileName 		= $_FILES['image']['name'];
				$fileTmpName 	= $_FILES['image']['tmp_name'];
				$fileSize 		= $_FILES['image']['size'];
				$fileError 		= $_FILES['image']['error'];
				$fileType 		= $_FILES['image']['type'];

				$fileExt 		= explode('.', $fileName);
				$fileActualExt	= strtolower(end($fileExt));

				// les extensions qu'on peut uploader 

				$allowed 		= array('jpg','jpeg','png');

				
			

				// Validate The Form

				$formErrors = array();

				if (empty($name)) {
					$formErrors[] = 'Name Can\'t be <strong>Empty</strong>';
				}

				if (empty($desc)) {
					$formErrors[] = 'Description Can\'t be <strong>Empty</strong>';
				}

				if (empty($price)) {
					$formErrors[] = 'Price Can\'t be <strong>Empty</strong>';
				}

				if ($cat == 0) {
					$formErrors[] = 'You Must Choose the <strong>Category</strong>';
				}
				if(!(in_array($fileActualExt, $allowed))){
					$formErrors[] = "Wrong extension";	
				}
				if($fileError !== 0){
					$formErrors[] = "Image Error";			
				}
				if($fileSize > 1000000){
					$formErrors[] = "Big size";	
				}

				// Loop Into Errors Array And Echo It

				foreach($formErrors as $error) {
					echo '<div class="alert alert-danger">' . $error . '</div>';
				}

				// Check If There's No Error Proceed The Update Operation

				if (empty($formErrors)) {

					$fileNameNew = uniqid('',true).'.'.$fileActualExt;

					$fileNewDestination = '../layout/images/products/'.$fileNameNew;

					move_uploaded_file($fileTmpName, $fileNewDestination);

					unlink('../layout/images/products/' . $oldimage);

					// Update The Database With This Info

					$stmt = $con->prepare("UPDATE
												products
											SET
												product_title = ?,
												product_description = ?,
												product_price = ?,
												old_price = ?,
												product_quantity = ?,
												product_category_id = ?,
												product_image = ?,
												Rating = ?
											WHERE
												product_id = ?");

					$stmt->execute(array($name, $desc, $price, $old_price, $quantity, $cat, $fileNameNew, $rating, $id));

					// Echo Success Message

					$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';

					redirectHome($theMsg, 'back');

				}

			} else {

				$theMsg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';

				redirectHome($theMsg);

			}

			echo "</div>";

		} elseif ($do == 'Delete') {

			echo "<h1 class='text-center'>Delete Item</h1>";
			echo "<div class='container'>";

				// Check If Get Request Item ID Is Numeric & Get The Integer Value Of It

				$itemid = isset($_GET['product_id']) && is_numeric($_GET['product_id']) ? intval($_GET['product_id']) : 0;

				// Select All Data Depend On This ID

				$check = checkItem('product_id', 'products', $itemid);

				// If There's Such ID Show The Form

				if ($check > 0) {

					$stmt = $con->prepare("DELETE FROM products WHERE product_id = :zid");

					$stmt->bindParam(":zid", $itemid);

					$stmt->execute();

					$theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Deleted</div>';

					redirectHome($theMsg, 'back');

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
