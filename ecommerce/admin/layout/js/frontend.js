$(function(){
	'use strict';
	$('.login input').focus(function(){
		$(this).attr('data',$(this).attr('placeholder'));
		$(this).attr("placeholder","");
	}).blur(function(){
		$(this).attr("placeholder",$(this).attr('data'));
	});

});

// changer entre login et sign up 

$(function(){
	'use strict';
	$('.login-page h1 span').click(function(){
		$(this).addClass('active').siblings().removeClass('active');
		$('.login-page form').hide();
		$('.' + $(this).data('class')).fadeIn(100);
	})
});

//ajouter une etoile dans les champs necessaire !! required fields 

$('input').each(function(){
	if($(this).attr('required') === 'required'){
		$(this).after("<span class='asterisk'>*</span>");
	}
});

$('.credit-card input').each(function(){
	if($(this).attr('required') === 'required'){
		$('.asterisk').remove();
	}
});

// Afficher le mot de pass quand on clique sur l'icone de l'oeuil !!

var passField=$('.password');
$('.show-eye').hover(function(){
	passField.attr('type','text');
},function(){
	passField.attr('type','password');	
});

// Confirmer avant de supprimer un utilisateur !!

$('.confirmation').click(function(){
	return confirm('Are you sure ?');
});

// Animation dans la page de categorie

$('.categorie h3').click(function(){
	$(this).next('.full-view').fadeToggle(300);
});

// Une fonction pour la page d'affichage de produits 


$(document).ready(function(){
	var quantity = 1;

$('.quantity-right-plus').click(function(e){
    e.preventDefault();
    var quantity = parseInt($('#quantity').val());
    $('#quantity').val(quantity + 1);
});

$('.quantity-left-minus').click(function(e){
    e.preventDefault();
    var quantity = parseInt($('#quantity').val());
    if(quantity > 1){
        $('#quantity').val(quantity - 1);
    }
});

});

