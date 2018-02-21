$(document).ready(function(){



		var fileCollection = new Array();

		$('#images').on('change',function(e){

			var files = e.target.files;
			var counter = fileCollection.length;
			$.each(files, function(i, file){

				fileCollection.push(file);
				
				// console.log(counter);

				var reader = new FileReader();
				reader.readAsDataURL(file);
				reader.fileName = file.name;
				
				reader.onload = function(e){
					counter ++;
					name = e.target.fileName;
					var output = name.substr(0, name.lastIndexOf('.')) || name;
				    name = output.replace(/\s+/g, '');

					console.log(name);
					var template = 	'<div id="'+counter+'">'+
									'<img src="'+e.target.result+'"> '+
									'<button  class="btn btn-sm btn-danger removebutton">Remove</button><br>'+
									'</div>';

					$('#previews').append(template);
				};

			});

		});

	$(document).on('click', '.removebutton', function() {
	  id = $(this).parent().attr("id");
	  $( "div" ).remove( '#'+id );


    var itemtoRemove = "HTML"; 
    // fileCollection.splice($.inArray(itemtoRemove, fileCollection),1); 
    fileCollection.splice(id,1);

	});	



  // $('#upload').submit(function( event ) {
  //       //you could trigger the submit button itself
  //           // $('#button').click(function( event ) {

  //   event.preventDefault();
   
    
  // var userinput = $("#data").val();
  // // console.log($(this));
  // var formData = $(this).serialize();

  //    $.ajax({
  //           type: "POST",
  //           url : document.getElementById('upload').action,
  //           //url : $(self).attr('data-url'),
  //           //data: "hi",
  //           data: {'formdata':formData,
  //                 },
  //           // dataType: "json",
  //           success: function(data) {
  //               console.log(data);
  //                $("#ajaxresults").html(data);


  //           },
  //           error: function(data){
  //               alert("fail");
  //               console.log(data);
  //           }
  //       });   
     
  // }); //ajaxsubmit


// $(document).on('submit','form',function(e){

// 			e.preventDefault();
// 			//this form index
// 			var index = $(this).index();
// 			var formdata = new FormData($(this)); //direct form not object
// 			// var formdata = new FormData();
// 			//append the file relation to index

// 			// formdata.append('image',fileCollection);

// 			console.log(fileCollection);


//   			request = new XMLHttpRequest();
// 			request.open("POST", "test", true);  
// 			// request.open("POST", document.getElementById('upload').action, true);
// 			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

// 			request.onreadystatechange = function() {
// 			    if (request.readyState == 4 && request.status == 200) {
// 			       console.log('successful');
// 			       // alert(request.responseText);
// 			      } else {
// 			       // alert(request.status);
// 			       console.log('failed');
// 			      }
// 			};


// 			request.send(formdata);
// 			// console.log(fileCollection);
			
// 	});


}); //document
