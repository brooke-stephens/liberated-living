$('#skugenerate').on('click', function(event){
	event.preventDefault();
	var multiplevariants = $('#multiplevariants');
	// if ($(multiplevariants).is(':checked')) {
	// 	alert('asdf');
	// }

	name = $('#name').val();
	// var code = name.substr(0, 2);
	// var str     = "Java Script Object Notation";
	var matches = name.match(/\b(\w\w)/g);          
	var code = matches.join(''); 

	code += '-C';

	category = $('#category').val().substr(0, 2);
	code += category;
	code += '-';

	code += 'S';
	size = $('#size').val();
	size = size.match(/[0-9]+/,'');
	if ((!size) || $(multiplevariants).is(':checked')){
		size = "NA";
	}
	code += size;

	code += '-RN';

	var randomnumber = Math.floor(Math.random() * 89) + 10;
	code += randomnumber;

	$('#skuinput').val(code);

});

$('#vskugenerate').on('click', function(e){
	event.preventDefault(e);

	name = $('#name').val();
	// var code = name.substr(0, 2);
	// var str     = "Java Script Object Notation";
	var matches = name.match(/\b(\w\w)/g);          
	var code = matches.join(''); 

	code += '-C';

	category = $('#category').val().substr(0, 2);
	code += category;
	code += '-';

	code += 'S';
	size = $('#vsize').val();
	size = size.match(/[0-9]+/,'');
	if (!size){
		size = "NA";
	}
	code += size;

	code += '-RN';

	var randomnumber = Math.floor(Math.random() * 99) + 10;
	code += randomnumber;

	$('#vsku').val(code);

});
