
$(document).ready(function () {
    
    $(".alert").alert();

    var navfirst = $('.accordion > li').first().find('.sub-menu');

    $(navfirst).css('display', 'block');

    $('.accordion > li > a').click(function(){
		
		$('.accordion li ul').slideUp();
		
		if ($(this).next().is(":visible")){
			
			$(this).next().slideUp();
			
		} else {
			
			$(this).next().slideToggle();
			
		}
		
	});

    $('a.action[title]').qtip({
		position: {
			my: 'right center',
			at: 'center left'
		},
		style: {
			classes: 'ui-tooltip-dark ui-tooltip-tipsy'
		}
	});

	$('input.search[title]').qtip({
		position: {
			my: 'bottom center',
			at: 'top center'
		},
		style: {
			classes: 'ui-tooltip-blue ui-tooltip-tipsy'
		}
	});

	accounting.settings = {
		currency: {
			symbol : "Rp.",   // default currency symbol is '$'
			format: "%s%v", // controls output: %s = symbol, %v = value/number (can be object: see below)
			decimal : ",",  // decimal point separator
			thousand: ".",  // thousands separator
			precision : 0   // decimal places
		},
		number: {
			precision : 2,  // default precision on numbers is 0
			thousand: ".",
			decimal : ","
		}
	}
	
});