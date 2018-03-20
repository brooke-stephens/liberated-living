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
// var headers = $('.header').css('text-decoration', 'line-through');
var submitbutton = $('#submitbutton');
var saveHtml;
var shipmethodHtml;
var fname;
var lname;
var shipmethod = $("input[name='shipmethod']:checked").val();

panels.first().show();

$('body').on('click', 'a.firststep', function() {
	var $this = $(this);
	saveHtml = $(".content").html();	
	event.preventDefault();
	fname = $('#firstname').val();
	lname = $('#lastname').val();
	$this.parent().prev().find('.header').css('text-decoration', 'line-through');
    $this.parent().next().find('.header').css('text-decoration', 'none');
    
    // alert($this.parent().next().attr('class'));
	myData = { 	fname: fname,
				lname: lname };
	 $.ajax({
            type: "POST",
            url : "/reviewcheckout",
            data: myData,
              success: function(data) {
              	data = myData.fname +' '+myData.lname;
                // $("#ajaxresults").html(myData.fname); 
                $('.shipping').animate({'height': '125px','font-size': '12px'}, 400, function(){
			        // $("#ajaxresults").show();
			        $(".inputContent").fadeOut();
			        $("#ajaxresults").html(data).animate({'opacity': 1}, 400);			        
			        // $(".shipping").animate({'height': '125px','height': '125px','font-size': '12px'}, 400);
			    }); 

			    $('.shipmethod').animate({'opacity': 1,'height': '400px'}, 400, function(){
					    
				});
			    $('.shipmethod').fadeIn();

              },
              error: function(data){
                  alert("There was an error. Please notify the administrator.");
                  // console.log(data);
              }
            });

	
});


$('.editstepone').on('click', function() {
	
	var $this = $(this);
	panels.slideUp();
	$('.shipping').animate({'opacity': 0,'height': '400px'}, 400, function(){
        $(this).html(saveHtml).animate({'opacity': 1}, 400);
        $('#firstname').val(fname); 
        $('#lastname').val(lname);   
    });
	// headers.css('text-decoration', 'line-through');
    submitbutton.addClass('hide');
	$this.parent().next().slideDown();
	$this.prev().css('text-decoration', 'none');
	return false;
	
});

$('body').on('click', 'a.secondstep', function() {
	var $this = $(this);
	shipmethodHtml = $(".shipmethod").html();
	$('.shipmethod').animate({'opacity': 0,'height': '50px','font-size': '12px'}, 400, function(){
		 $(this).html(shipmethod).animate({'opacity': 1}, 400);    
	});
	$('.paymentmethod').slideDown();
	$this.parent().prev().find('.header').css('text-decoration', 'line-through');
	submitbutton.removeClass('hide');
});

$('.editsteptwo').on('click', function() {

	var $this = $(this);
	panels.slideUp();
	$('.shipmethod').animate({'opacity': 0,'height': '400px'}, 400, function(){
        $(this).html(shipmethodHtml).animate({'opacity': 1}, 400);
        
    });
    submitbutton.addClass('hide');
	$this.parent().next().slideDown();
	$this.prev().css('text-decoration', 'none');
	$this.parent().prev().prev().find('.header').css('text-decoration', 'line-through');
	return false;
	
});


// $('.editstepthree').on('click', function() {

// 	var $this = $(this);
// 	panels.slideUp();
// 	$('.shipmethod').animate({'opacity': 0,'height': '400px'}, 400, function(){
//         $(this).html(shipmethodHtml).animate({'opacity': 1}, 400);
        
//     });
// 	headers.css('text-decoration', 'line-through');

// 	$this.parent().next().slideDown();
// 	$this.prev().css('text-decoration', 'none');
// 	return false;
	
// });

