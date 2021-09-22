<?php

	ob_start();
	session_start();
	//Pour definir le titre de la page !!
	$pageTitle="Home";
	include 'init.php';



?>

<!-- Start menu Home -->

	<section class="menu-home">
		<div class="container">
			<div class="row mb-3">
				<div class="col-12 ad-carousel p-0 h-100 mb-3">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					  <ol class="carousel-indicators">
					    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
					  </ol>
					  <div class="carousel-inner">
					    <div class="carousel-item active">
					      <img class="d-block w-100" src="<?php echo $image; ?>1b.png" alt="Third slide">
					      <div class="carousel-caption d-none d-md-block">

						  </div>
					    </div>
					     <div class="carousel-item">
					      <img class="d-block w-100" src="<?php echo $image; ?>2b.png" alt="Third slide">
					      <div class="carousel-caption d-none d-md-block">
						  </div>
					    </div>
					     <div class="carousel-item">
					      <img class="d-block w-100" src="<?php echo $image; ?>3b.jpg" alt="Third slide">
					      <div class="carousel-caption d-none d-md-block">
						  </div>
					    </div>
					     <div class="carousel-item">
					      <img class="d-block w-100" src="<?php echo $image; ?>4b.jpg" alt="Third slide">
					      <div class="carousel-caption d-none d-md-block">
						  </div>
					    </div>
					    <div class="carousel-item">
					      <img class="d-block w-100" src="<?php echo $image; ?>5b.jpg" alt="Third slide">
					      <div class="carousel-caption d-none d-md-block">
						  </div>
					    </div>
					  </div>
					  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- End menu Home -->

	<!-- Start New Products menu -->

	<section class="new-products">
		<div class="container p-0">
			<div class="row">
				<div class="col-md-3 mb-3 col-sm-12 mb-md-0">
					<div class="hot-deal hot-deal-container p-2">
						<!-- Start of Carousel controls -->
						<span id="promotion-logo"> - 50 % </span>
						<ul class="list-inline float-right">
							<li class="list-inline-item mr-0">
								<a class="active-icon mr-1" href="#hot-product" data-slide="prev"><i class="fas fa-chevron-circle-left"></i></a>
								<a href="#hot-product" data-slide="prev" class="not-active-icon"><i class="fas fa-chevron-circle-right"></i></a>
							</li>
						</ul>
						<!-- End of Carousel controls -->
						<h3 class="px-2"><?php echo lang('HOTDEALS');?></h3>
						<hr class="categorie-divider">
						<div id="hot-product" class="carousel slide" data-ride="carousel" data-interval="0">
						<!-- Carousel indicators -->
						<ol class="carousel-indicators">
							<li data-target="#hot-product" data-slide-to="0" class="active"></li>
							<li data-target="#hot-product" data-slide-to="1"></li>
							<li data-target="#hot-product" data-slide-to="2"></li>
						</ol>
						<!-- Wrapper for carousel items -->
							<div class="carousel-inner">
								<!-- Start of the first Sider -->
								<div class="item carousel-item active">
									 <div class="row">
										<?php

					                		$stmtent =$con->prepare('SELECT * FROM products ORDER BY product_id ASC LIMIT 2');

											$stmtent->execute();

											$rows=$stmtent->fetchAll();

											$j=0;

											foreach ($rows as $row):

												if($j==1){
															echo "<!-- End of the first Slider -->";
														echo "</div>";
													echo "</div>";
													echo "<!-- Start of the second Slider -->";
														echo '<div class="item carousel-item">';
															echo '<div class="row">';
															echo "<!-- End of the second Sider -->";
												}

					                	?>
										<div class="col-12">
										<div class="img-hot-deal d-block">
											<a href="products.php?do=AddHotDeal&productid=<?php echo $row['product_id']; ?>"><img src="<?php echo $images; echo $row['product_image']; ?>" class="img-responsive img-fluid" alt="<?php echo $row['product_title'] ?>"></a>
										</div>
										<div class="product-info text-center pt-3">
											<h4 ><?php echo $row['product_title'] ?></h4>
											<p><strike><?php echo $row['product_price'] ?> Dhs</strike> <span><?php echo (($row['product_price'])*50/100); ?> Dhs</span></p>
											<ul class="list-inline">
												<?php
												$goodRating = $row['Rating'];
													while($goodRating > 0):

													?>
													<li class="list-inline-item"><i class="fa fa-star"></i></li>
												<?php

													$goodRating = $goodRating - 1;
													endwhile;

												?>
												<?php
												$badRating = 5 - $row['Rating'];
													while($badRating > 0):
												?>
													<li class="list-inline-item"><i class="fa fa-star" style="color: #cdc9c9;"></i></li>
												<?php

													$badRating = $badRating - 1;
													endwhile;

												?>
											</ul>
										</div>
									</div>
									<?php

										$j++;
									endforeach;

									?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9 col-sm-12">
					<div class="hot-deal p-2">
						<!-- Start of Carousel controls -->
						<ul class="list-inline float-right">
							<li class="list-inline-item mr-0">
								<a class="active-icon mr-1" href="#view-products" data-slide="prev"><i class="fas fa-chevron-circle-left"></i></a>
								<a href="#view-products" data-slide="prev" class="not-active-icon"><i class="fas fa-chevron-circle-right"></i></a>
							</li>
						</ul>
						<!-- End of Carousel controls -->
						<h3 class="px-4"><?php echo lang('NEWPRODUCTS');?></h3>
						<hr class="categorie-divider">

						<div id="view-products" class="carousel slide" data-ride="carousel" data-interval="0">
						<!-- Carousel indicators -->
						<ol class="carousel-indicators">
							<li data-target="#view-products" data-slide-to="0" class="active"></li>
							<li data-target="#view-products" data-slide-to="1"></li>
							<li data-target="#view-products" data-slide-to="2"></li>
						</ol>
						<!-- Wrapper for carousel items -->
						<div class="carousel-inner">
							<!-- Start of the first Sider -->
							<div class="item carousel-item active">
								<div class="row">
								<?php

			                		$stmt =$con->prepare('SELECT * FROM products ORDER BY product_id DESC LIMIT 8');

									$stmt->execute();

									$rows=$stmt->fetchAll();

									$j=0;

									foreach ($rows as $row):

										if($j==4){
													echo "<!-- End of the first Slider -->";
												echo "</div>";
											echo "</div>";
											echo "<!-- Start of the second Slider -->";
												echo '<div class="item carousel-item">';
													echo '<div class="row">';
													echo "<!-- End of the second Sider -->";
										}

			                	?>
									<div class="col-md-3 col-sm-4">
										<div class="img-hot-deal d-block">
											<a href="products.php?do=Add&productid=<?php echo $row['product_id']; ?>"><img src="<?php echo $images; echo $row['product_image']; ?>" class="img-responsive img-fluid" alt="<?php echo $row['product_title'] ?>"></a>
										</div>
										<div class="product-info text-center pt-3">
											<h4 ><?php echo $row['product_title'] ?></h4>
											<p><strike><?php echo $row['old_price'] ?> Dhs</strike> <span><?php echo $row['product_price'] ?> Dhs</span></p>
											<ul class="list-inline">
												<?php
												$goodRating = $row['Rating'];
													while($goodRating > 0):

													?>
													<li class="list-inline-item"><i class="fa fa-star"></i></li>
												<?php

													$goodRating = $goodRating - 1;
													endwhile;

												?>
												<?php
												$badRating = 5 - $row['Rating'];
													while($badRating > 0):
												?>
													<li class="list-inline-item"><i class="fa fa-star" style="color: #cdc9c9;"></i></li>
												<?php

													$badRating = $badRating - 1;
													endwhile;

												?>
											</ul>
										</div>
									</div>
									<?php

										$j++;
									endforeach;

									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- End New Products menu -->

	<!-- Start menu products -->
	<section id="product-slider">
		<div class="container p-0">
			<div class="row">
				<div class="col-md-12">
					<h2 ><?php echo lang('ALLPRODUCTS');?></h2>
					<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
					<!-- Carousel indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>
						<!-- Wrapper for carousel items -->
						<div class="carousel-inner">
							<?php
								$stmt =$con->prepare('SELECT * FROM products');

								$stmt->execute();

								$rows=$stmt->fetchAll();

								$i=0;
								foreach ($rows as $row) {
									if($i==0 || $i%4 == 0){
										if($i==0){
											echo '<div class="item carousel-item active">';
											echo '<div class="row products">';
										}else{
											echo '<div class="item carousel-item">';
											echo '<div class="row products">';
										}
									}
							?>
								<div class="col-sm-3 p-0">
								<div class="thumb-wrapper product-box">
									<div class="img-box">
										<img src="<?php echo $images; echo $row['product_image']; ?>" class="img-responsive img-fluid" alt="<?php echo $row['product_title'] ?>">
									</div>
									<div class="thumb-content">
										<h4><?php echo $row['product_title'] ?></h4>
										<p class="item-price">
											<?php

												if($row['old_price'] != 0){
													echo "<strike>".$row['old_price']."</strike>";
												}

											?>
											<span><?php echo $row['product_price'] ?> Dhs</span></p>
										<p class="item-description">
											<?php echo $row['short_desc'] ?>
										</p>
										<div class="star-rating">
											<ul class="list-inline">
												<?php
												$goodRating = $row['Rating'];
													while($goodRating > 0):

													?>
													<li class="list-inline-item">
														<i class="fa fa-star" style="color: #FF9529;"></i>
													</li>
												<?php

													$goodRating = $goodRating - 1;
													endwhile;

												?>
												<?php
												$badRating = 5 - $row['Rating'];
													while($badRating > 0):
												?>
													<li class="list-inline-item">
														<i class="fa fa-star" style="color: #cdc9c9;"></i>
													</li>
												<?php

													$badRating = $badRating - 1;
													endwhile;

												?>
											</ul>
										</div>
										<a href="products.php?do=Add&productid=<?php echo $row['product_id']; ?>" class="btn btn-primary"><?php echo lang('SHOW');?></a>
									</div>
								</div>
							</div>
							<?php
								if($i!=0){
									if(($i+1)%4 == 0){
												echo '</div>';
											echo '</div>';
									}
								}
								$i=$i+1;
							}
								if($i%4 !=0){
										echo '</div>';
									echo '</div>';
								}
							?>
					</div>
					<!-- Carousel controls -->
					<a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
						<i class="fa fa-angle-left" style="color: #FFF;"></i>
					</a>
					<a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
						<i class="fa fa-angle-right" style="color: #FFF;"></i>
					</a>
				</div>
				</div>
			</div>
		</div>
	</section>

	<!-- End menu products -->

	<!-- Start Ecommerce Product View -->

	<section id="product-view">
		<div class="container">
			<div class="row mb-5 mt-5">
				<?php
					$statement =$con->prepare('SELECT * FROM products ORDER BY product_id ASC LIMIT 3');

					$statement->execute();

					$rows=$statement->fetchAll();

					$counter=0;

					foreach ($rows as $row):

						$stmat2=$con->prepare('SELECT * FROM categories WHERE cat_id = ?');

						$stmat2->execute(array($row['product_category_id']));

						$categorie=$stmat2->fetch();

						if($counter==0){
							echo '<div class="col-md-4 mb-1 px-5 py-2 p-md-3">';
								echo '<div class="cart-container-1 text-center">';
						}
						if($counter==1){
							echo '<div class="col-md-4 mb-1 px-5 py-2 p-md-3">';
								echo '<div class="cart-container-2 text-center">';
						}
						if($counter==2){
							echo '<div class="col-md-4 mb-1 px-5 py-2 p-md-3">';
								echo '<div class="cart-container-3 text-center">';
						}
					?>
						<div class="cart-top-container cart-container-top">

						</div>
						<h3 class="pt-5 product-view-title"><?php echo $row['product_title'] ?></h3>
						<div class="image-cart">
							<img src="<?php echo $images; echo $row['product_image']; ?>" class="img-responsive img-fluid" alt="<?php echo $row['product_title'] ?>">
						</div>
						<div class="cart-bottom-container">
							<div class="product-view-price">
								<h3 class="deal-title"><?php echo $row['product_price'] ?> Dhs</h3>
								<strike><?php echo $row['old_price'] ?> Dhs</strike>
							</div>
							<div class="product-view-description px-3 mt-4">
								<p><?php echo $row['product_description'] ?> Dhs</p>
							</div>
						<?php

							if($counter==0){
								echo '<div class="shop-hover d-none show-1">';
									echo "<a class='btn btn-shop' href='products.php?do=Add&productid=". $row['product_id']."'>".lang('SHOPNOW')."</a>";
								echo "</div>";
							}
							if($counter==1){
								echo '<div class="shop-hover d-none show-2">';
									echo "<a class='btn btn-shop' href='products.php?do=Add&productid=". $row['product_id']."'>".lang('SHOPNOW')."</a>";
								echo "</div>";
							}
							if($counter==2){
								echo '<div class="shop-hover d-none show-3">';
									echo "<a class='btn btn-shop' href='products.php?do=Add&productid=". $row['product_id']."'>".lang('SHOPNOW')."</a>";
								echo "</div>";
							}

						?>
						</div>
					</div>
				</div>
				<?php

					$counter=$counter+1;
					endforeach;

				?>
			</div>
		</div>
	</section>

	<!-- End Ecommerce Product View -->

<?php

	include 'includes/templates/footer.php';
	ob_end_flush();
?>
