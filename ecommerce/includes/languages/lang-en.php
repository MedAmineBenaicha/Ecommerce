<?php

	function lang( $phrase ){
		static $lang=array(
			#Title words
			'DEFAULT'			 	=> 'Default',

			// NavNar
			'TITLE'  		   => 'Commerce',
			'SEARCHFORPRODUCTS' => 'Search For products',

			// Header
			'CONTACT&SUPPORT'  => 'Contact & Support ',
			'HELP'			   => 'Help',

			# Words for navigation Bar.

			'HOME'			 	=> 'Home',
			'CATEGORIES' 		=> 'Categories',
			'ITEMS' 			=> 'Items',
			'MEMBERS' 			=> 'Members',
			'STATISTICS' 		=> 'Statistics',
			'LOGS' 				=> 'Logs',
			'EDIT_PROFIL'	 	=> 'Edit Profil',
			'SETTINGS' 			=> 'Settings',
			'LOGOUT' 			=> 'Logout',
			'LOGIN-OPTION'		=> 'Login',
			'CART' 				=> 'Cart',
			'REGISTER' 			=> 'Register',
			'PRODUCTS' 			=> 'Products',
			'COMPTE'			=> 'Compte',

			// About us page

			'ABOUT'			 	=> 'About',
			'PHRASE'			 	=> 'Shop whatever you want',
			'ABOUT CONTENT'			 	=> "Welcome to E-Commerce, your number one source for all things [product, ie: computers, casques, Cameras ...]. We're dedicated to giving you the very best of [product], with a focus on quality and fast delivering.

	Founded in 2020 by EnsaAgadir, E-Commerce has come a long way from its beginnings in a [starting location, ie: home office, toolshed, Houston, TX.]. When [store founder] first started out, his/her passion for [passion of founder, ie: helping other parents be more eco-friendly, providing the best equipment for his fellow musicians] drove him to [action, ie: do intense research, quit her day job], and gave him the impetus to turn hard work and inspiration into to a booming online store. We now serve customers all over [place, ie: the US, the world, the Austin area], and are thrilled to be a part of the [adjective, ie: quirky, eco-friendly, fair trade] wing of the [industry type, ie: fashion, baked goods, watches] industry.

	We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.

	Sincerely,
	EnsaAgadir, E-commerce Online",

	    // Cart & Cart1 page

			'CART'			 	=> 'Cart',
			'PRODUCT'			 	=> 'Product',
			'QUANTITY'			 	=> 'Quantity',
			'PRICE'			 	=> 'Price',
			'REMOVE'			 	=> 'Remove',
			'ORDERSUMMARY'			 	=> 'Order summary',
			'PRODUCTS'			 	=> 'Products',
			'TOTAL'			 	=> 'Total',
			'PROCEED'			 	=> 'Proceed to payment',
			'ACTION' => 'Action',
			'PAYMENT' => 'Payment',

			// Category page

			'CATEGORY' => 'Category',
      'PHRASE2'  => 'This Categorie is empty ! Please check it in another time',
			'PHRASE3'  => 'There is no categorie with this Id',

			// Checkout page

			'MESSAGE' => 'You already have this product in your basket',
			'MESSAGE2' => 'The quantity available in stock:',
			'MESSAGE3' => 'You should log in before adding items to the cart',

			// Credit-card page

			'MESSAGE4' => 'You should log in before validating your payment!',
			'HI' => 'Hi',
			'PAYMENT2' => 'Your payment is done',
			'CONGRATULATIONS' => 'CONGRATULATIONS !',
			'PAYMENT3' => 'Payment - Ecommerce Ensa',
			'MESSAGE5' => "Hi,
We inform you that your transaction has been confirmed. Here is the detail of the operation:

Web site: ecommerceensa
Client name : ",
      'MESSAGE6' => '
			Client Email:',
			'AMOUNT' => '
			Transaction amount : ',
      'THANKYOU' => ' MAD
			For more information, please contact your dealer.
			thank you.',
			'FROM'  => 'From:',
			'MESSAGE7' => 'Payment Done! Please check your mail',
			'ERROR' => 'Error during payment ! try again',
			'INVALID' => 'Your credit card is not valid',
			'INVALID2' => 'your cvv is not valid, please check it !',
			'INVALID3' => 'your card number is not valid, please check it !',
			'INVALID4' => 'your username is not valid, please check it !',
			'PGATEWAY' => 'Payment Gateway',
			'CNUMBER' => 'Card Number :',
			'CHOLDER' => 'Card Holder :',
			'EXDATE' => 'Expiration Date :',
			'CONFIRM' => 'Confirm',
			'ENTERPLACEHOLDER' => 'Enter your name on the cart',
			'CARDNUMBERPLACEHOLDER' => 'Enter your card number',

			// Home page

			'HOTDEALS' => 'HOT DEALS',
			'NEWPRODUCTS' => 'New products',
			'ALLPRODUCTS' => 'All <b>Products</b>',
			'SHOW' => 'SHOW',
			'SHOPNOW' => 'Shop Now',

			// Login page
			'LoginTitle' => 'Login',
			'ERROR2' => 'Email or password is wrong',
			'WELCOME' => 'WELCOME ',
			'LOGIN' => 'Log in to your account for a personalized shopping experience',
			'LOGIN1' => 'LOG IN',
			'ACCOUNT' => "Don't have an account ? ",
			'REGISTER1' => 'Register here',

     // Products page

      'ADDCART' => 'Add to <b>Cart</b>',
			'CATEGORY1' => 'Category:',
			'SHARE' => 'Share:',
			'RPRODUCTS' => 'Related Products',
			'MESSAGE8' => 'There is no product with this id',

			// Profile page
			'NAME' => 'Username',
			'EMAIL' => 'Email',
			'PASSWORD' => 'Password',
			'FULLNAME' => 'Full Name',
			'SAVE' => 'Save',
			'UsernameError' => 'Username must be less than <strong>20 characters</strong>',
			'UsernameError1' => "Username mustn't be empty",
			'UsernameError2' => "Username must be more than <strong>3 characters</strong>",
			'EmailError' => "Email mustn't be empty",
			'FNError' => "Full Name mustn't be empty",
			'UPDATEDONE' => "Update Done",
			'ACCESS' => "You don't have access to this page",

      // Register page

      'USERNAME' => 'UserName',
			'MOBILE' => 'Mobile',

			// Search page

			'PSEARCH' => 'Products By <b>Search</b>',
			'SEARCHITEM' => 'You should search firstly on an item ',

      // Sign up page

			'PASSWORDERROR' => " Password mustn't be empty</div>",
			'PASSWORDERROR1' => " Password doesn't match",
			'EmailError1' => " Email not valid !</div>",
			'EmailError2' => " Email mustn't be empty</div>",
			'AGEERROR' => 'Age Cant Be <strong>Empty</strong>',
			'ADRESSERROR' => 'Adresse Cant Be <strong>Empty</strong>',
			'CITYERROR' => 'City Cant Be <strong>Empty</strong>',
			'SUCCESS' => "you've been added successfully",
			'REGFORM' => "Registration form",
			'AGE' => "Age",
			'ADRESS' => "Adress",
			'CITY' => "City",
			'SIGNUP' => "Sign Up",
      'ACCOUNT1' => "Already have an account ?",
      'SIGNIN' => 'SIGN IN',


      // Titles

			'ABOUTUS' => 'About Us',
      'CHECKOUT' => 'Checkout',
			'HOMEPAGE' => 'HomePage',
			'LOGIN2' => 'Log In',
      'PROFILE' => 'Profil',
      'SEARCH' => 'Search',

       // footer page

      		'FREESHIPPING' => 'Free shipping',
			'PHRASE4' => 'In order min 500 Dhs',
			'PHRASE5' => '30 days return',
			'PHRASE6' => 'Money back guarantee',
			'SUPPORT' => '24 / 7 support',
			'CALL' => 'Call +212690908080',
			'HELP' => 'Help',
			'SCORECARD' => 'Score Card',
			'RETURNPOLICY' => 'Return policy',
			'SHIPPINRATES' => 'Shipping Rates',
			'MYACCOUNT' => 'My Account',
			'YOURACCOUNT' => 'Your account',
			'INFORMATION' => 'Information',
			'ADRESSES' => 'Addresses',
			'ORDERHISTORY' => 'Order history',
			'SALESNEWS' => 'Sale News',
			'PHRASE7' => 'Sign in our Newsletter for more inforamtion about sales, promotions and gifts !',
			'FOLLOWUS' => 'Follow us',
			'COPYRIGHT' => 'Copyright &copy; E-Commerce Online. All rights reserved.',
      		'ECOMMERCE' => 'E-Commerce',




		);
		return $lang[$phrase];
	}

?>
