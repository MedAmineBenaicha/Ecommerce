<?php

	ob_start();
	session_start();

	$pageTitle='Cart';
	include 'init.php';
?>
<h1 class="text-center"><?php echo lang('CART');?></h1>
<div class="container">
	<div class="card-main bg-light text-center">
			<div class="row">
				<div class="col-md-12">
					<?php
						if(isset($_GET['message'])){
							echo '<div class="alert alert-danger mt-2 p-2">'.$_GET['message'].'</div>';
						}
					?>
					<table class="table table-hover mt-2 mb-3">
						<thead>
							<th><?php echo lang('PRODUCT');?></th>
							<th><?php echo lang('PRICE');?></th>
							<th><?php echo lang('QUANTITY');?></th>
							<th><?php echo lang('TOTAL');?></th>
							<th><?php echo lang('ACTION');?></th>
						</thead>
						<?php
							foreach ($_SESSION as $name => $product):
						?>
							<?php
								if(substr($name,0,9) == "products_"):
							?>
								<input type="hidden" name="productsnumber" value=<?php echo  substr($name,9,10); ?> >
								<tbody>
									<td><?php echo !(empty($product['product'])) ? $product['product'] : "" ?></td>
									<td><?php echo !(empty($product['price'])) ? $product['price'] : "" ?></td>
									<td><?php echo !(empty($product['quantite'])) ? $product['quantite'] : "" ?></td>
									<td><?php echo !(empty($product['total'])) ? $product['total'] : "" ?></td>
									<td><a href="cancel.php?id=<?php echo !(empty($product['id'])) ? $product['id'] : '' ?>&price=<?php echo !(empty($product['total'])) ? $product['total'] : '' ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
								</tbody>
							<?php
								endif;
							?>
						<?php
							endforeach;
						?>
				</table>
			</div>
		</div>
		<div class="row">
			<?php

				if(isset($_SESSION['totaux']) && $_SESSION['totaux']>0):

			?>
			<div class="md-3 mr-auto">
				<a href="credit-card.php" class="btn btn-success mx-3"><i class="fa fa-credit-card"></i><?php echo lang('PAYMENT');?></a>
			</div>
			<?php

				endif;

			?>
			<div class="md-3 ml-auto">
				<table class="table table-bordered">
					<thead>
						<th><?php echo lang('PRODUCTS');?></th>
						<th><?php echo lang('TOTAL');?></th>
					</thead>
					<tbody>
						<td>
							<?php echo !(empty($_SESSION['count'])) ? $_SESSION['count'] : "" ?>
						</td>
						<td>
							<?php echo !(empty($_SESSION['totaux'])) ? $_SESSION['totaux'].' DHS' : "" ?>
						</td>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php

	include 'includes/templates/footer.php';
	ob_end_flush();

?>
