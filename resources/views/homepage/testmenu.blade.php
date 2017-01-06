<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>

	
		<link rel="stylesheet" type="text/css" href="{{ URL::to('srv/css/main.css') }}">
		
		<link rel="stylesheet" type="text/css" href="{{ URL::to('srv/css/demo.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::to('srv/css/component.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::to('srv/css/icons.css') }}">
		
		<script type='text/javascript' src="{{ URL::to('srv/js/modernizr.custom.js') }}"></script>
	</head>
	<body>
			<div id="navcontainer">
  
				  <div class="flexi">

					  <div id="logowrap" class="ttt">
					  	<h1 id="logoh1text"><span>Liberated Living</span></h1>

					  </div>

				  
					  <div id="navwrap">
					  <!--  	<h4 class="toggle-menu menu-left">Menu</a></h4> -->
					  <span class="glyphicon glyphicon-align-justify toggle-menu menu-left" aria-hidden="true"></span>

					  	<ul class="navigation">
							<li><a href="#">About</a></li>
							<li><a class="toggle-menu menu-top">Services</a></li>
							<li><a href="#">WorkShops</a></li>
							<li><a href="#">Contact</a></li>	
							<a href="#" id="trigger" class="menu-trigger"></a>
						</ul>

					  </div>

				  <!-- Left slide menu element-->
					<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left">

						<!-- <h3>Menu</h3> -->
						<a href="#">About</a>
						<a href="#">Services</a>
						<a href="#">Work Shops</a>
						<a href="#">Contact</a>
					</nav>

				<!-- <button class="toggle-menu menu-left push-body">Toggle Left Menu Push</button>	 -->	

						  <div id="loginwrap">

						  	<span class="glyphicon glyphicon-search searchimg" aria-hidden="true"></span>

							<img class="loginimg" src="{{ URL::to('/images/homepage/login.png') }}">
						  
						  </div>

					</div><!-- end flexi -->
				</div> <!-- end navcontainer -->

				<div id="moto">
					<h3>Nutrition, Counseling. Feel Good.</h3>
					<h1>Shake what your momma gave ya!</h1>
					

				</div>
		
			<!-- Push Wrapper -->
			<div class="mp-pusher" id="mp-pusher">

				<!-- mp-menu -->
				<nav id="mp-menu" class="mp-menu">
					<div class="mp-level">
						<h2>All Categories</h2>
						<ul>
							
							<li>
								<a href="#">Magazines</a>						
							</li>
							<li>
								<a  href="#">Store</a>
								<div class="mp-level">
									<h2>Store</h2>
									<a class="mp-back" href="#">back</a>
									<ul>
										<li>
											<a href="#">Clothes</a>											
										</li>
										<li>
											<a href="#">Jewelry</a>
										</li>
										<li>
											<a href="#">Music</a>
										</li>
										<li>
											<a href="#">Grocery</a>
										</li>
									</ul>
								</div>
							</li>
							<li><a  href="#">Collections</a></li>
							<li><a  href="#">Credits</a></li>
						</ul>
							
					</div>
				</nav>
				<!-- /mp-menu -->

			</div><!-- /pusher -->


 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="s<script>document.body.className += ' fade-out';</script>ha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous">
 </script>


<script type='text/javascript' src="{{ URL::to('srv/js/classie.js') }}"></script>
<script type='text/javascript' src="{{ URL::to('srv/js/jPushMenu.js') }}"></script>
<script type='text/javascript' src="{{ URL::to('srv/js/mlpushmenu.js') }}"></script>

<script type="text/javascript">
	new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ), {
	type : 'cover'
} );
</script>

	</body>
</html>