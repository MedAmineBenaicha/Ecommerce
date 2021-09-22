$('.cart-container-1').hover(
	function(){
		$('.show-1').attr('class','shop-hover d-block show-1')
	},
	function(){
		$('.show-1').attr('class','shop-hover d-none show-1')
	}
);

$('.cart-container-2').hover(
	function(){
		$('.show-2').attr('class','shop-hover d-block show-2')
	},
	function(){
		$('.show-2').attr('class','shop-hover d-none show-2')
	}
);

$('.cart-container-3').hover(
	function(){
		$('.show-3').attr('class','shop-hover d-block show-3')
	},
	function(){
		$('.show-3').attr('class','shop-hover d-none show-3')
	}
);

$('.hot-deal ul li a').click(function(){
})

$('.hot-deal ul li a').click(function () {

		$(this).addClass('active-icon').siblings('a').removeClass('active-icon');

	});

// Pour augmenter ou bien diminuer la quantite !!!

	$('.input-number').each(function() {
		var $this = $(this),
		$input = $this.find('input[type="number"]'),
		up = $this.find('.qty-up'),
		down = $this.find('.qty-down');

		down.on('click', function () {
			var value = parseInt($input.val()) - 1;
			value = value < 1 ? 1 : value;
			$input.val(value);
			$input.change();
			updatePriceSlider($this , value)
		})

		up.on('click', function () {
			var value = parseInt($input.val()) + 1;
			$input.val(value);
			$input.change();
			updatePriceSlider($this , value)
		})
	});

	var priceInputMax = document.getElementById('price-max'),
			priceInputMin = document.getElementById('price-min');

	priceInputMax.addEventListener('change', function(){
		updatePriceSlider($(this).parent() , this.value)
	});

	priceInputMin.addEventListener('change', function(){
		updatePriceSlider($(this).parent() , this.value)
	});

	function updatePriceSlider(elem , value) {
		if ( elem.hasClass('price-min') ) {
			console.log('min')
			priceSlider.noUiSlider.set([value, null]);
		} else if ( elem.hasClass('price-max')) {
			console.log('max')
			priceSlider.noUiSlider.set([null, value]);
		}
	}

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


	// Switch Entre Les Langues 

	$('.SpanLanguage').click(function () {

		$(this).addClass('active').siblings('span').removeClass('active');

	});