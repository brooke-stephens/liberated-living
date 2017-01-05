// for the slider menu

jQuery(document).ready(function($) {
	$('.toggle-menu').jPushMenu();
});

// fixed top menu

$(document).ready(function() { 

	$(window).scroll(function() { 

		var fromTop = $(document).scrollTop(); 	

			if ( fromTop > $('#navcontainer').height() ) 				
				$('#navcontainer').addClass('sticky active'); 
				

				else if (fromTop == 0 )				
					$('#navcontainer').removeClass('sticky active'); 

					if ( fromTop > $('#navcontainer').height() ) 				
						$('#moto').addClass('motocorrection');

					else if (fromTop == 0 )
						$('#moto').removeClass('motocorrection');



					
				// if ( fromTop > $('#navcontainer').height() ) 

				
				// $('#logowrap, #navwrap').addClass('test'); 
				

				// else if (fromTop == 0 )

				
				// 	$('#logowrap, #navwrap').removeClass('test');
			}); 



}); 

// var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				
// 				showLeft = document.getElementById( 'showLeft' ),
// 				body = document.body;

// 			showLeft.onclick = function() {
// 				classie.toggle( this, 'active' );
// 				classie.toggle( menuLeft, 'cbp-spmenu-open' );
// 				disableOther( 'showLeft' );
// 			};



