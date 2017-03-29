// for the slider menu

jQuery(document).ready(function($) {
	$('.toggle-menu').jPushMenu();
});

// fixed top menu

$(document).ready(function() { 

	let startingHieght = $(document).scrollTop();
	
		if ( startingHieght > 1 ) 				
		$('#navcontainer').addClass('sticky stickytopstyle'); 
			else if (startingHieght == 0 )				
				$('#navcontainer').removeClass('sticky stickytopstyle'); 

	



	$(window).scroll(function() { 

		var fromTop = $(document).scrollTop(); 	
			// if ( fromTop > $('#navcontainer').height() ) 	
			if ( fromTop > 1 ) 				
				$('#navcontainer').addClass('sticky stickytopstyle'); 
				

				else if (fromTop == 0 )				
					$('#navcontainer').removeClass('sticky stickytopstyle'); 

					
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



