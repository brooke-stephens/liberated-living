var multiplevariants = $('#multiplevariants');
var unneededelements = $('.elementstohide');
var openVariantmodal = $('button#openVariantmodal');
var addVarianButton = $('button.addVariant');
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


openVariantmodal.click(function() {
	event.preventDefault();
});

addVarianButton.click(function(e) {

	var vsize = $("input#vsize").val();
	var vprice = $("input#vprice").val();
	var vquantity = $("input#vquantity").val();
	var vsku = $("input#vsku").val();
	$counter = 0;
	var variantinput = 	 "<tr class=\"productvariant\"> id=\""+$counter+"\""+
						 "<th scope=\"row\">1</th>"+
						 "<td><input type=\"text\" placeholder=\"Size\" name=\"vsize[]\" class=\"form-control\" value=\""+vsize+"\"></td>"+
						 "<td><input type=\"text\" placeholder=\"Price\" name=\"vprice[]\" class=\"form-control\" value=\""+vprice+"\"></td>"+
						 "<td><input type=\"text\" placeholder=\"Quantity\" name=\"vquantity[]\" class=\"form-control\" value=\""+vquantity+"\"></td>"+
						 "<td><input type=\"text\" placeholder=\"SKU\" name=\"vsku[]\" class=\"form-control\" value=\""+vsku+"\"></td>"+
						 "<td><button type=\"button\" class=\"btn btn-danger\">Delete</button></td>";
	$counter++;					 
						
					 		
	addedVariants.fadeIn();					 
	$('#appendvarianthere').append(variantinput);
	$('.modal').modal('toggle');

});

