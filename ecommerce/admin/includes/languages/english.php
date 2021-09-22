<?php 

	function lang( $phrase ){
		static $lang=array(
			#Title words
			'DEFAULT'			 	=> 'Default',

			# Words for navigation Bar.

			'HOME'			 	=> 'Home',
			'CATEGORIES' 		=> 'Categories',
			'ITEMS' 			=> 'Items',	
			'MEMBERS' 			=> 'Members',
			'STATISTICS' 		=> 'Statistics',
			'LOGS' 				=> 'Logs',
			'VISIT_SHOP'		=> 'Visit Shop',
			'EDIT_PROFIL'	 	=> 'Edit Profil',
			'SETTINGS' 			=> 'Settings',
			'LOGOUT' 			=> 'Log out',
			'CART' 				=> 'Cart',
			'REGISTER' 			=> 'Register',
			'PRODUCTS' 			=> 'Products',
			'COMPTE'			=> 'Compte'


		);
		return $lang[$phrase];
	}

?>