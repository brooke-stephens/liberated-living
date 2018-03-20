Stripe.setPublishableKey('pk_test_GFsTmM5GC5DhhqiNDZblbMMc');
	var $form = $('#checkout-form');
	

	$form.submit(function(event) {

		$('#charge-error').addClass('hidden');
		$form.find('button').prop('disabled',true);

		Stripe.card.createToken({
	  		number: $('.card-number').val(),
	 		cvc: $('.card-cvc').val(),
	  		exp_month: $('.card-expiry-month').val(),
	  		exp_year: $('.card-expiry-year').val()
		}, stripeResponseHandler);

		return false;	
	});


	function stripeResponseHandler(status, response){
			if (response.error) {
				$('#charge-error').removeClass('hidden');
				$('#charge-error').text(response.error.message)
				$form.find('button').prop('disabled',false);
			} else {
				// Get the token ID:
	   			 var token = response.id;
	   			 // Insert the token into the form so it gets submitted to the server:
	   		     $form.append($('<input type="hidden" name="stripeToken" />').val(token));
	   		     // Submit the form:
	    		$form.get(0).submit();	

			}
	}


var panels = $('.content').hide();
var headers = $('.header').css('text-decoration', 'line-through');
var saveHtml;

panels.first().show();
$(".hiddencontent").fadeOut(500);
headers.first().css('text-decoration', 'none');
$('.header a').css('text-decoration', 'none');

$('.next').on('click', function() {
	
	var $this = $(this);
	//everything shuts
	// panels.slideUp();
	// $(".shipping").animate({
	// 	    'height': '75px'
	// 	    		}, 500);
	// $(".content").fadeOut(500);
	saveHtml = $(".content").html();
	
	$('.shipping').animate({'opacity': 0,'height': '125px'}, 400, function(){
        $(this).html('Something in Spanish').animate({'opacity': 1}, 400);    
    });
	headers.css('text-decoration', 'line-through');

	$this.parent().next().next().slideDown();


	thisParent = $this.parent().next().children('div').css('text-decoration', 'none');
    // var thisParent = $this.parent().next().children('div').attr('class');
    // alert(thisParent);

    // $('.shipping').css('height', '200px');
    // $this.parent().next().slideDown();
	return false;
	
});

$('.edit').on('click', function() {
	
	var $this = $(this);
	panels.slideUp();
	$('.shipping').animate({'opacity': 0,'height': '400px'}, 400, function(){
        $(this).html(saveHtml).animate({'opacity': 1}, 400);    
    });
	headers.css('text-decoration', 'line-through');

	$this.parent().next().slideDown();
	$this.prev().css('text-decoration', 'none');
	return false;
	
});

