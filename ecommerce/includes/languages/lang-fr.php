<?php

	function lang( $phrase ){
		static $lang=array(
			#Title words
			'DEFAULT'			 	=> 'Défaut',

			// NavNar
			'TITLE'  		   => 'Commerce',
			'SEARCHFORPRODUCTS'=> 'Trouver des produits',

			// Header
			'CONTACT&SUPPORT'  => 'Contact et assistance ',
			'HELP'			   => 'Aide',

			# Words for navigation Bar.

			'HOME'			 	=> 'Accueil',
			'CATEGORIES' 		=> 'Catégories',
			'ITEMS' 			=> 'Articles',
			'MEMBERS' 			=> 'Membres',
			'STATISTICS' 		=> 'Statistiques',
			'LOGS' 				=> 'Journaux',
			'EDIT_PROFIL'	 	=> 'Modifier le profil',
			'SETTINGS' 			=> 'Paramètres',
			'LOGOUT' 			=> 'déconnecter',
			'LOGIN-OPTION'		=> 'connecter',
			'CART' 				=> 'Panier',
			'REGISTER' 			=> "S'inscrire",
			'PRODUCTS' 			=> 'Produits',
			'COMPTE'			=> 'Compte',

			// About us page

			'ABOUT'			 	=> 'À propos de nous',
			'PHRASE'			 	=> 'Achetez ce que vous voulez',
			'ABOUT CONTENT'			 	=> "Bienvenue sur E-Commerce, votre source numéro un pour tout [produit, c'est-à-dire: ordinateurs, casques, appareils photo ...]. Nous nous engageons à vous offrir le meilleur de [produit], en mettant l'accent sur la qualité et livraison rapide.

Fondé en 2020 par EnsaAgadir, le commerce électronique a parcouru un long chemin depuis ses débuts dans un [lieu de départ, c'est-à-dire: bureau à domicile, Agadir, Maroc.]. Lorsque [la fondatrice du magasin] a débuté, sa passion pour [la passion du fondateur, c'est-à-dire: aider d'autres parents à acheter des ordinateurs portables de loin sans avoir besoin d'y aller] l'a poussé à [agir, c'est-à-dire: faire des recherches intenses, la quitter day job], et lui a donné l'impulsion pour transformer le travail acharné et l'inspiration en une boutique en ligne en plein essor. Nous servons maintenant des clients partout [endroit, c'est-à-dire: le Maroc, les États-Unis, le monde,].

Nous espérons que vous apprécierez nos produits autant que nous aimons vous les offrir. Si vous avez des questions ou des commentaires, n'hésitez pas à nous contacter.

Cordialement,
EnsaAgadir, E-commerce en ligne",
// Panier & Cart1 page


	    // Cart & Cart1 page

			'CART'			 	=> 'Panier',
			'PRODUCT'			 	=> 'Produit',
			'QUANTITY'			 	=> 'Quantité',
			'PRICE'			 	=> 'Prix',
			'REMOVE'			 	=> 'Supprimer',
			'ORDERSUMMARY'			 	=> 'Récapitulatif de la commande',
			'PRODUCTS'			 	=> 'Produits',
			'TOTAL'			 	=> 'Total',
			'PROCEED'			 	=> 'Procéder au paiement',
			'ACTION' => 'Action',
			'PAYMENT' => 'Paiement',

			// Category page

			'CATEGORY' => 'Category',
      'PHRASE2'  => 'Cette catégorie est vide! Veuillez la vérifier une autre fois',
			'PHRASE3'  => "Il n'y a pas de catégorie avec cet identifiant",

			// Checkout page

			'MESSAGE' => 'Vous avez déjà ce produit dans votre panier',
			'MESSAGE2' => 'La quantité disponible en stock:',
			'MESSAGE3' => "Vous devez vous connecter avant d'ajouter des articles au panier",

			// Credit-card page

			'MESSAGE4' => 'YVous devez vous connecter avant de valider votre paiement!',
			'HI' => 'Salut',
			'PAYMENT2' => 'Votre paiement est effectué',
			'CONGRATULATIONS' => 'FÉLICITATIONS !',
			'PAYMENT3' => 'Paiement - Ecommerce Ensa',
			'MESSAGE5' => "Salut,
Nous vous informons que votre transaction a été confirmée. Voici le détail de l'opération:

Site Web: ecommerceensa
Nom du client :  ",
      'MESSAGE6' => '
			E-mail du client: ',
			'AMOUNT' => '
			Montant de la transaction :',
      'THANKYOU' =>  "MAD
			Pour plus d'informations, veuillez contacter votre revendeur.
            Merci.",
			'FROM'  => 'De:',
			'MESSAGE7' => 'Paiement terminé! Veuillez vérifier votre e-mail',
			'ERROR' => 'Erreur lors du paiement! réessayer',
			'INVALID' => "Votre carte de crédit n'est pas valide",
			'INVALID2' => "votre cvv n'est pas valide, veuillez le vérifier!",
			'INVALID3' => "Votre numéro de carte n'est pas valide, veuillez le vérifier!",
			'INVALID4' => "Votre nom d'utilisateur n'est pas valide, veuillez le vérifier!",
			'PGATEWAY' => 'Passerelle de paiement',
			'CNUMBER' => 'Numéro de carte:',
			'CHOLDER' => 'Titulaire de la carte:',
			'EXDATE' => "Date d'expiration:",
			'CONFIRM' => 'Confirmer',
			'ENTERPLACEHOLDER' => 'Veuillez entrer votre nom de carte',
			'CARDNUMBERPLACEHOLDER' => 'Veuillez entrer votre numero de carte',

			// Home page

			'HOTDEALS' => 'OFFRES CHAUDES',
			'NEWPRODUCTS' => 'Nouveaux produits',
			'ALLPRODUCTS' => 'Tous les <b> Produits </b>',
			'SHOW' => 'Montrer',
			'SHOPNOW' => 'Acheter',

			// Login page
			'LoginTitle' => 'Connexion',
			'ERROR2' => 'Email ou mot de passe incorrect',
			'WELCOME' => 'BIENVENUE ',
			'LOGIN' => "Connectez-vous à votre compte pour une expérience d'achat personnalisée",
			'LOGIN1' => 'SE CONNECTER',
			'ACCOUNT' => "Vous n'avez pas de compte?",
			'REGISTER1' => 'Inscrivez-vous ici',

     // Products page

      'ADDCART' => 'Ajouter au <b> Panier </b>',
			'CATEGORY1' => 'Catégorie:',
			'SHARE' => 'Partager:',
			'RPRODUCTS' => 'Produits similaires',
			'MESSAGE8' => "Il n'y a aucun produit avec cet identifiant",

			// Profile page
			'NAME' => 'Utilisateur',
			'EMAIL' => 'E-mail',
			'PASSWORD' => 'MDP',
			'FULLNAME' => 'Nom',
			'SAVE' => 'Enregistrer',
			'UsernameError' => "Le nom d'utilisateur doit comporter moins de <strong> 20 caractères </strong>",
			'UsernameError1' => "Le nom d'utilisateur ne doit pas être vide",
			'UsernameError2' => "Le nom d'utilisateur doit contenir plus de <strong> 3 caractères </strong>",
			'EmailError' => "L'e-mail ne doit pas être vide",
			'FNError' => "Full Name mustn't be empty",
			'UPDATEDONE' => "Mise à jour terminée",
			'ACCESS' => "Vous n'avez pas accès à cette page",

      // Register page

      'USERNAME' => "Nom d'utilisateure",
			'MOBILE' => 'Mobile',

			// Search page

			'PSEARCH' => 'Produits par <b> Recherche </b>',
			'SEARCHITEM' => "Vous devez d'abord rechercher un élément ",

      // Sign up page


			'PASSWORDERROR' => " Le mot de passe ne doit pas être vide </div>",
			'PASSWORDERROR1' => " Le mot de passe ne correspond pas",
			'EmailError1' => "Email non valide! </div>",
			'EmailError2' => " L'e-mail ne doit pas être vide </div>",
			'AGEERROR' => "L'âge ne peut pas être <strong> vide </strong>",
			'ADRESSERROR' => "L'adresse ne peut pas être <strong> vide </strong>",
			'CITYERROR' => 'La ville ne peut pas être <strong> vide </strong>',
			'SUCCESS' => "vous avez été ajouté avec succès",
			'REGFORM' => "Formulaire d'inscription",
			'AGE' => "Âge",
			'ADRESS' => "Adresse",
			'CITY' => "Ville",
			'SIGNUP' => "Inscription",
      'ACCOUNT1' => "Vous avez déjà un compte?",
      'SIGNIN' => 'SE CONNECTER',


      // Titles

			'ABOUTUS' => 'À propos de nous',
      'CHECKOUT' => 'Commander',
			'HOMEPAGE' => "Page d'accueil",
			'LOGIN2' => 'Connexion',
      'PROFILE' => 'Profil',
      'SEARCH' => 'Rechercher',

      // footer page

      'FREESHIPPING' => 'Livraison gratuite',
			'PHRASE4' => 'Au moins 500 Dhs',
			'PHRASE5' => '30 jours de retour',
			'PHRASE6' => 'Garantie de remboursement',
			'SUPPORT' => 'Assistance 24/7',
			'CALL' => 'Appeler +212690908080',
			'HELP' => 'Aide',
			'SCORECARD' => "Fiche d'évaluation",
			'RETURNPOLICY' => 'Politique de retour',
			'SHIPPINRATES' => "Tarifs d'expédition",
			'MYACCOUNT' => 'Mon compte',
			'YOURACCOUNT' => 'Votre compte',
			'INFORMATION' => 'Information',
			'ADRESSES' => 'Adresses',
			'ORDERHISTORY' => 'Historique des commandes',
			'SALESNEWS' => 'Nouvelles de vente',
			'PHRASE7' => "Inscrivez-vous à notre newsletter pour plus d'informations sur les ventes, les promotions et les cadeaux!",
			'FOLLOWUS' => 'Suivez nous',
			'COPYRIGHT' => 'Copyright &copy; E-Commerce en ligne. Tous les droits sont réservés.',
      		'ECOMMERCE' => 'E-Commerce',




		);
		return $lang[$phrase];
	}

?>
