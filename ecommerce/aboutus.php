<?php
	ob_start();
	session_start();
	$pageTitle="About Us";
	include 'init.php';

?>
<div class="container my-5">
	<div class="about-us px-5 py-4">
		<h2><?php echo lang('ABOUT');?> <span>E-Commerce Online Shopping</span></h2>
		<h4><?php echo lang('PHRASE');?> </h4>
		<p class="mb-5"> <?php echo lang('ABOUT CONTENT');?> </p>
	</div>
</div>


<?php

	include 'includes/templates/footer.php';
	ob_end_flush();

?>
