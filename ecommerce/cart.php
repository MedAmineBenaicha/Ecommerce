<?php

	ob_start();
	session_start();
  $pageTitle="Cart";
	include 'init.php';

	
?>
	<h1 class="text-center mt-4"><?php echo lang('CART');?></h1>
    <div class="container">
      <?php

        if(isset($_GET['message'])){
          echo '<div class="alert alert-danger mt-3">'.$_GET['message'].'</div>';
        }

      ?>
      <div class="row">
        <div class="col-lg-12 mb-4">
          <!-- Shopping cart table -->
          <div class="table-responsive bg-white">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase"><?php echo lang('PRODUCT');?></div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase"><?php echo lang('PRICE');?></div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase"><?php echo lang('QUANTITY');?></div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase"><?php echo lang('REMOVE');?></div>
                  </th>
                </tr>
              </thead>
              <?php
					foreach ($_SESSION as $name => $product):
				?>
					<?php
						if(substr($name,0,9) == "products_"):
					?>
              <tbody>
                <tr>
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <img src="<?php echo $images; echo !(empty($product['image'])) ? $product['image'] : "" ?> ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"><?php echo !(empty($product['product'])) ? $product['product'] : "" ?></a></h5><span class="text-muted font-weight-normal font-italic d-block">Category: <?php echo !(empty($product['categorie'])) ? $product['categorie'] : "" ?></span>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong><?php echo !(empty($product['price'])) ? $product['price'] : "" ?> Dhs</strong></td>
                  <td class="border-0 align-middle"><strong><?php echo !(empty($product['quantite'])) ? $product['quantite'] : "" ?></strong></td>
                  <td class="border-0 align-middle"><a href="cancel.php?id=<?php echo !(empty($product['id'])) ? $product['id'] : '' ?>&price=<?php echo !(empty($product['total'])) ? $product['total'] : '' ?>" class="text-dark"><i class="fa fa-trash"></i></a></td>
                </tr>
              </tbody>
             	<?php
					endif;
				?>
			<?php
				endforeach;
			?>
            </table>
          </div>
          <!-- End -->
        </div>
      </div>

      <?php

			if(isset($_SESSION['totaux']) && $_SESSION['totaux']>0):

		?>
      <div class="row mb-5">
        <div class="col-lg-4 ml-auto bg-white shadow-sm pt-4 mx-3">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold"><?php echo lang('ORDERSUMMARY');?> </div>
          <div class="p-4">
            <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted"><?php echo lang('PRODUCTS');?> </strong><strong><?php echo !(empty($_SESSION['count'])) ? $_SESSION['count'] : "" ?></strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted"><?php echo lang('TOTAL');?></strong>
                <h5 class="font-weight-bold"><?php echo !(empty($_SESSION['totaux'])) ? $_SESSION['totaux'].' DHS' : "" ?></h5>
              </li>
            </ul><a href="credit-card.php" class="btn btn-dark rounded-pill py-2 btn-block"><?php echo lang('PROCEED');?></a>
          </div>
        </div>
      </div>
      <?php

		endif;

	?>

    </div>
<?php

	include 'includes/templates/footer.php';
	ob_end_flush();

?>
