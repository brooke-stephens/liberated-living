$(function() {
	$.validator.addMethod('price', function (value) { 
    return /^-?(\d{1,3})(\.\d{1,2})?$/.test(value); 
	}, 'Please enter a valid price. ');
	$.validator.addMethod('size', function (value) { 
    return /^-?(\d{1,3})[a-z]{2,}?$/.test(value); 
	}, 'Please enter a valid size. ');
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='test']").validate({
    // Specify validation rules
    // ^-?(\d{1,3})(\.\d{1,2})?$
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      vsize: {
      required: true,
      size:true,
      
      },
      vprice: {
      price: true
      },
      vquantity: "required",
      vsku: "required",
     
    },
    // Specify validation error messages
   
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});

var multiplevariants = $('#multiplevariants');
var unneededelements = $('.elementstohide');
var openVariantmodal = $('#openVariantmodal');
var addVarianButton = $('.addVariant');
var addedVariants = $('div.addedVariants');


openVariantmodal.hide();
// addedVariants.hide();

$(document).on('change', '#multiplevariants', function() {
							
	if(multiplevariants.prop('checked') == true){
		unneededelements.fadeOut();
		openVariantmodal.fadeIn();
		addedVariants.fadeIn();
	} else {
		unneededelements.fadeIn();
		openVariantmodal.fadeOut();
		addedVariants.fadeOut();
	}
});


openVariantmodal.click(function(event) {
	event.preventDefault();
});

addVarianButton.click(function(event) {

	event.preventDefault();

	

	if ($('#test').valid()){
		var vsize = $("input#vsize").val();
		var vprice = $("input#vprice").val();
		var vquantity = $("input#vquantity").val();
		var vsku = $("input#vsku").val();

		
		$('.modal').modal('toggle');
		var variantinput = 	 "<tr class=\"productvariant\"> id=\"\""+
							 "<th scope=\"row\">1</th>"+
						 	"<td><input type=\"text\" placeholder=\"Size\" name=\"vsize[]\" class=\"form-control\" value=\""+vsize+"\"></td>"+
							 "<td><input type=\"text\" placeholder=\"Price\" name=\"vprice[]\" class=\"form-control\" value=\""+vprice+"\"></td>"+
							 "<td><input type=\"text\" placeholder=\"Quantity\" name=\"vquantity[]\" class=\"form-control\" value=\""+vquantity+"\"></td>"+
							 "<td><input type=\"text\" placeholder=\"SKU\" name=\"vsku[]\" class=\"form-control\" value=\""+vsku+"\"></td>"+
							 "<td><button type=\"button\" class=\"btn btn-danger\">Delete</button></td>";
			 
		// addedVariants.fadeIn();					 
		$('#appendvarianthere').append(variantinput);
	}	 
						
					 		
	
	

});



