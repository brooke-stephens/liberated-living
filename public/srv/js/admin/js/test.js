$( document ).ready(function() {
$(document.body).on('click', '.delete' ,function(){
var id = this.id;
swal({
        title: "Are you sure?",
        text: "Associated product variants will be deleted as well. Continue?",
        icon: "warning",
        buttons: true,
        dangerMode: true,

      }
    ).then(
      function (isConfirm) {
        if (isConfirm) {        
        
            $.ajax({
            type: "POST",
            url : "{{route('admin.delete.product')}}",
            //url : $(self).attr('data-url'),
            //data: "hi",
            data: {'productId':id,
                  },
            // dataType: "json",
              success: function(data) {
                 // $("#ajaxresults").html(data);
                  swal("Your product file has been deleted!", {
                        icon: "success",
                      }).then(function (reload) {
                   
                         location.reload(); // then reload the page.(3)
                  });


              },
              error: function(data){
                  alert('Error: '+e);
                  // console.log(data);
              }
            });

        }
      },
      function() {
        swal("Your file is safe!");
      }
    );



});





  
$(document.body).on('click', '.deleteassociatedimage' ,function(){
var id = this.id;

swal({
        title: "Are you sure?",
        text: "Do you really want to delete this image?",
        icon: "warning",
        buttons: true,
        dangerMode: true,

      }
    ).then(
      function (isConfirm) {
        if (isConfirm) {        
        
            $.ajax({
            type: "POST",
            url : "{{route('delete.single.associated.image')}}",
            dataType: "json",
            contentType: "application/json; charset=utf-8",

            //url : $(self).attr('data-url'),
            //data: "hi",
            data: {'image_id':id,
                  },
            // dataType: "json",
             beforeSend : function(data) {
                    alert(data);
                },
              success: function(data) {
                 $("#ajaxresults").html(data);
                  swal("Your image has been deleted!", {
                        icon: "success",
                      }).then(function (reload) {
                   
                         location.reload(); // then reload the page.(3)
                  });


              },
              error: function(data){
                  alert('Error: '+ data);
                  // console.log(data);
              }
            });

        }
      },
      function() {
        swal("Your file is safe!");
      }
    );



});

});