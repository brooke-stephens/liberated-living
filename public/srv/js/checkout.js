$(function() {
	$.validator.addMethod('postalcodev', function (value) { 
    return /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/.test(value); 
	}, 'Please enter a valid postalcode. ');
	$.validator.addMethod('phonenumber', function (value) { 
    return  /^[+]?[0-9]{0,1}[-. ]?\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/.test(value); 
	}, 'Please enter a valid phone number. ');
	
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='checkout-form']").validate({
    // Specify validation rules
    // ^-?(\d{1,3})(\.\d{1,2})?$
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      firstname: {
      	required: true,
      	minlength:2,  
      },
      lastname: {
     	 required: true,
     	 minlength:2, 
      },
      cardname: {
     	 required: true, 
      },
      addresslineone: {
      	required: true,   
      },
      city: {
     	 required: true, 
      },
      postalcode: {
     	 required: true,
     	 postalcodev:true, 
      },
      phonenumber: {
     	 required: true,
     	 phonenumber:true, 
      },
      province: {
     	 required: true, 
      },
      // shipmethod: {
     	//  required: true, 
      // },
      
      // vquantity: {
     	//  required: true,
     	//  digits: true,
      // },
      // vsku: {
      // 	required: true,
      // 	minlength: 4,
      // },    
     
    },
    // Specify validation error messages
   
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});

$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});



Stripe.setPublishableKey('pk_test_GFsTmM5GC5DhhqiNDZblbMMc');
	var $form = $('#checkout-form');
	

	$form.submit(function(event) {
		// runs the validation 
		if ($("form[name='checkout-form']").valid()){} else {return false;}

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

var status = "stepone";
var panels = $('.content').hide();
var lightgrey = "#9c9c9c";
var contentcolor ="";
var activeheadercolour = 'white';
var activecontentcolour = '#e4ecf7'
// var headers = $('.header').css('text-decoration', 'line-through');
var submitbutton = $('#submitbutton');
var saveHtml;
var shipmethodHtml;
var fname;
var lname;
var addresslineone;
var	addresslinetwo;
var	city;	
var	postalcode
var	phonenumber;
var formsummary;
var shipmethod = $("input[name='shipmethod']:checked").val();
$('.editstepone').hide();
$('.editsteptwo').hide();

panels.first().show();

setStatus();
// applystyling();
$(window).on('hashchange',function(){ 
    setStatus();
	applystyling();
});



$('body').on('click', 'a.firststep', function(event) {
	event.preventDefault();
	if ($("form[name='checkout-form']").valid()){ shippingvalid = 1} else {return false;}

	if(history.pushState) {
		history.pushState(null, null, '#steptwo');
	}
	else 
	{
		location.hash = '#steptwo';
	}

	

	var $this = $(this);
	saveHtml = $(".content").html();	
	fname = $('#firstname').val();
	lname = $('#lastname').val();
	province = $('#province').val();
	addresslineone = $('#addresslineone').val();
	addresslinetwo = $('#addresslinetwo').val();
	city = $('#city').val();	
	postalcode = $('#postalcode').val();
	phonenumber = $('#phonenumber').val();
	
	
    $this.parent().next().find('.header').css('text-decoration', 'none');
    
    // alert($this.parent().next().attr('class'));
	myData = { 	fname: fname,
				lname: lname,
				province:province,
				addresslineone:addresslineone,
				addresslinetwo:addresslinetwo,
				city:city,
				postalcode:postalcode,
				phonenumber:phonenumber
				};
	 $.ajax({
            type: "POST",
            url : "/reviewcheckout",
            data: myData,
              success: function(data) {
              	// console.log(data);
              	// +' '+data.taxrate
              	// /.taxamount
              	if (addresslinetwo){
              		breakline = '<br>';
              	} else {
					breakline = '';
              	} 
              	formsummary = myData.fname +' '+myData.lname +'<br> '+ myData.city +', '+  myData.province +', '+myData.postalcode + breakline + myData.addresslinetwo +'<br> ' +myData.phonenumber;			    
				setStatus();
				applystyling();
				$('#taxamount').html('(' + data.taxtype + ') ' + data.taxamount);
				$('#ordertotal').html(data.ordertotal);
              },
              error: function(data){
                  alert("There was an error. Please notify the administrator.");
                  // console.log(data);
              }
            });
	
});


$('.editstepone').on('click', function() {

	if(history.pushState) {
		history.pushState(null, null, '#stepone');
	}
	else 
	{
		location.hash = '#stepone';
	}
	
	var $this = $(this);
	// panels.slideUp();

	setStatus();
	applystyling();


	// $this.parent().next().slideDown();
	$this.prev().css('text-decoration', 'none');
	return false;



	
});



$('body').on('click', 'a.secondstep', function(event) {
	event.preventDefault();
	if ($("form[name='checkout-form']").valid()){} else {return false;}

		if(history.pushState) {
		history.pushState(null, null, '#stepthree');
		}
		else {
			location.hash = '#stepthree';
		}

		setStatus();
		applystyling();

	var $this = $(this);
	shipmethodHtml = $(".shipmethod").html();
	
	
	$this.parent().prev().find('.header').css('text-decoration', 'line-through');

	// $('.headercontainertwo').css({'background-color': 'white'});
	// $('.headertwo').css({'opacity': '0.2',
	// 					 'background-color': 'white',
	// 					 'text-decoration': 'line-through'
	// 					});
	// $('.shipmethod').css({'background-color': 'white',
	// 					'color': lightgrey
	// 					});
});

$('.editsteptwo').on('click', function() {
	if ($("form[name='checkout-form']").valid()){} else {return false;}

	if(history.pushState) {
		history.pushState(null, null, '#steptwo');
	}
	else 
	{
		location.hash = '#steptwo';
	}

	var $this = $(this);
	// panels.slideUp();

	setStatus();
	applystyling();	

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



// ----------------------------- Hash Changes -------
function setStatus() {
    status = location.hash.slice(1);    
    if (status === ''){
    	status = 'stepone';
    }
}

function setOneInactive(){
	$( ".headerone" ).find( ".fa-circle" ).css("color", lightgrey); 
	$('.headercontainerone').css({'background-color': 'white'});
	$('.headerone').css({'opacity': '0.2',
									 'background-color': 'white',
									 'text-decoration': 'line-through'
									});
	$('.shipping').css({'background-color': 'white',
									'color': lightgrey
									});
	// This set the summary of the billing and adjusts the hieght
	$('.shipping').animate({'height': '125px','font-size': '12px'}, 400, function(){
				    $(".inputContent").fadeOut();
			        $("#ajaxresults").html(formsummary).animate({'opacity': 1}, 400);			        
			        // $(".shipping").animate({'height': '125px','height': '125px','font-size': '12px'}, 400);
			    }); 
	$('.editstepone').show();

};

function setTwoInactive(){
	$( ".headertwo" ).find( ".fa-circle" ).css("color", lightgrey); 
	$('.headercontainertwo').css({'background-color': 'white'});
	$('.headertwo').css({'opacity': '0.2',
									 'background-color': 'white',
									 'text-decoration': 'line-through'
									});
	$('.shipmethod').css({'background-color': 'white',
									'color': lightgrey
									});
	$('.secondstep').hide();
	$('.shipmethod').animate({'opacity': 0,'height': '100px','font-size': '12px'}, 400, function(){
		 $(this).html(shipmethod).animate({'opacity': 1}, 400);    
	});
	$('.editsteptwo').show();
};

function setOneActive(){
	setThreeInactive()

	$( ".headerone" ).find( ".fa-circle" ).css("color", "orange"); 

	$('.headercontainerone').css({'background-color': activeheadercolour});
	$('.headerone').css({'text-decoration': 'none',
									 'opacity': '1',
									 'background-color': activeheadercolour
									});
	$('.shipping').css({'opacity': '1',
									'color': 'black',
									'background-color': activecontentcolour
									});
	// this will undhide the form inputs
	$('.shipping').animate({'opacity': 0,'height': '400px'}, 400, function(){
        $(this).html(saveHtml).animate({'opacity': 1}, 400);
        $('#firstname').val(fname); 
        $('#lastname').val(lname); 
        $('#province').val(province);
        $('#addresslineone').val(addresslineone); 
        $('#addresslinetwo').val(addresslinetwo); 
        $('#city').val(city); 
        $('#postalcode').val(postalcode); 
        $('#phonenumber').val(phonenumber); 

    });
	$('.editstepone').hide();


}

function setTwoActive(){
	setThreeInactive();
	$( ".headertwo" ).find( ".fa-circle" ).css("color", "orange"); 
	$('.headercontainertwo').css({'background-color': activeheadercolour});
	$('.headertwo').css({'text-decoration': 'none',
									 'opacity': '1',
									 'background-color': activeheadercolour
									});
	$('.shipmethod').css({'opacity': '0',
									'color': 'black',
									'background-color': activecontentcolour
									});
	$('.shipmethod').animate({'opacity': 1,'height': '400px'}, 400, function(){
					    
		});
	 $('.shipmethod').fadeIn();	
	 $('.secondstep').show();
	 $('.editsteptwo').hide();
	 

	 // this will unhide the shipping method form
	// $('.shipmethod').animate({'opacity': 0,'height': '400px'}, 400, function(){
 //        $(this).html(shipmethodHtml).animate({'opacity': 1}, 400);
        
 //    });
}

function setThreeInactive(){
	$('.paymentmethod').slideUp();
	$( ".headerthree" ).find( ".fa-circle" ).css("color", lightgrey); 
	$('.headercontainerthree').css({'text-decoration': 'none',
									 'opacity': '1',
									 'background-color': 'white'
									});
};

function setThreeactive(){
	$('.paymentmethod').slideDown();
	$( ".headerthree" ).find( ".fa-circle" ).css("color", "orange"); 
	$('.headercontainerthree').css({'text-decoration': 'none',
									 'opacity': '1',
									 'background-color': activeheadercolour
									});
	
};


function applystyling(){
 
	if (status) {
        // $('#content').load(status+".html #sub-content");
        // document.title = originalTitle + ' – ' + status;

        switch (status) {
            // status specific functionality goes here
            case "stepone":
            	setOneActive();
            	setTwoInactive();
            	
            break;

            case "steptwo":

            	setOneInactive();
            	setTwoActive();
            	
            break;
            case "stepthree":

            	setOneInactive();
            	setTwoInactive();
            	setThreeactive()

            break;

            default:


        }
    }



}



