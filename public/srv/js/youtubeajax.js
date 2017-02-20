$(document).ready(function(){

     // $('#formid').submit(function( event ) {
        //you could trigger the submit button itself

     // $('#youtube').click(function( event ) {
       $(document).on('click', '#youtube',function(event) {
      event.preventDefault();

      
// var id = $("#apiresults").val();    
var id = $(this).attr('class');
// alert($(this).attr('class'));
var userinput ='<div class=\"embed-container margin-bottom-15\"><iframe src=\"https://www.youtube.com/embed/'+id+'\" frameborder=\"0\" allowfullscreen></iframe></div>';


         $.ajax({
          type: "POST",
          url: 'videos',
         
         // dataType: 'text',
          data: { "test": userinput,"id":id, },
            // dataType: "json",
            success: function(data) {
                console.log(data);
                $(".innertopvideo").html(data);
            },
            error: function(data){
                alert("fail");
                console.log(data);
            }
        }); 
     
  }); 
});

