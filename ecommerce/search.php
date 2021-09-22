<?php

	ob_start();
	session_start();
	include 'init.php';
	$pageTitle=lang("SEARCH");
	if(isset($_POST['search'])){
		$search=$_POST['search'];
	?>
		<section id="product-slider">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 ><?php echo lang('PSEARCH');?></h2>
						<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
						<div class="carousel-inner">
							<div class="item carousel-item active">
								<div class="row">
									<?php
										$stmt=$con->prepare("SELECT * FROM products WHERE product_title LIKE '%$search%' OR  product_description LIKE '%$search%' OR  short_desc LIKE '%$search%' ");

										$stmt->execute(array($search));

										$rows=$stmt->fetchAll();

										$count=count($rows);

										if($count > 0){

										foreach ($rows as $row) {
										?>
									<div class="col-sm-6 col-md-4 col-lg-3">
										<div class="thumb-wrapper">
											<div class="img-box">
												<img src="<?php echo $images; echo $row['product_image']; ?>" class="img-responsive img-fluid" alt="">
											</div>
											<div class="thumb-content">
												<h4><?php echo $row['product_title'] ?></h4>
												<p class="item-price"><strike><?php echo $row['old_price'] ?></strike> <span><?php echo $row['product_price'] ?></span></p>
												<p class="item-description">
													<?php echo $row['short_desc'] ?>
												</p>
												<div class="star-rating">
													<ul class="list-inline">
														<li class="list-inline-item"><i class="fa fa-star"></i></li>
														<li class="list-inline-item"><i class="fa fa-star"></i></li>
														<li class="list-inline-item"><i class="fa fa-star"></i></li>
														<li class="list-inline-item"><i class="fa fa-star"></i></li>
														<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
													</ul>
												</div>
												<a href="products.php?do=Add&productid=<?php echo $row['product_id']; ?>" class="btn btn-primary"><?php echo lang('ADDCART');?></a>
											</div>
										</div>
									</div>
									<?php
										}// La fin de notre boucle foreach !!
									?>
									<?php

										} // End if
										else{
											echo"<div class='alert alert-link'>There is no product like this name : $search</div>";
										}

									?>

								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</section>
	<?php

	}else{
		$message='<div class="alert alert-warning">'.lang("SEARCHITEM").'</div>';
		redirectFunction($message);
	}


	include 'includes/templates/footer.php';
	ob_end_flush();
?>
