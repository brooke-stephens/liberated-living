<div id="navcontainer">

				  <div class="flexi">



						  <div id="logowrap">
							 <a href="/#home" onclick="$('#home').animatescroll();return false;">
							  		<div>
							  		<h1 id="logoh1text"><span>Liberated Living</span></h1>
									</div>
								</a>
						  </div> <!-- end logowrap -->
					  <!-- </a> -->


					  <div id="navwrap">

					  <!--  	<h4 class="toggle-menu menu-left">Menu</a></h4> -->
					  <!-- <li><a class="toggle-menu menu-top">Services</a></li> -->
					  <!-- <span class="glyphicon glyphicon-align-justify" id="trigger" aria-hidden="true"></span> -->
					  <!-- <li><a href="#section-3" onclick="$('#section-3').animatescroll({padding:200});return false;">Services</a></li> -->
					  <span class="glyphicon glyphicon-align-justify toggle-menu menu-top" aria-hidden="true"></span>

					  	<ul class="navigation" >
							<li><a href="/#about-me" onclick="$('#about-me').animatescroll();return false;">About</a></li>
							<li><a href="/#my-services" onclick="$('#my-services').animatescroll();return false;">Services</a></li>
							<li><a href="{{URL::to('/shop')}}">Shop</a></li>
							<li><a href="{{URL::to('/videos')}}">Videos</a></li>
							<li><a href="/#my-testimonials" onclick="$('#my-testimonials').animatescroll();return false;">Testimonials</a></li>
							<li><a href="/#contact-me" onclick="$('#contact-me').animatescroll();return false;">Contact</a></li>

							
						      <nav class="navbar">

							    <ul class="navbar-nav mr-auto">     
							    
							      <li class="nav-item dropdown">
							       <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i>
						          <!-- User Account -->
						        </a>
						        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						          @if (Auth::check())
						            <a class="dropdown-item" href="{{route('user.profile')}}">Profile</a>
						            <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
						          @else
						            <a class="dropdown-item" href="{{ route('user.signup') }}">Sign Up</a>
						            <a class="dropdown-item" href="{{ route('user.signin') }}">Sign In</a>
						          @endif         
						        </div>
							      </li>
							     
							    </ul>			   

							</nav>

							<a class="nav-link" href="{{ route('product.getShoppingCart') }}">
					        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <!-- Shopping Cart -->
					        <span class="badge badge-warning">{{ Session::has('cart') ? Session::get('cart')->totalQty : "" }}</span>
					        </a>

						</ul>



					  </div>


					<!-- 	  <div id="loginwrap">
							<a href="/login"><img type="button" class="loginimg" src="{{ URL::to('/images/homepage/login.png') }}">
							</a>
						  </div> -->



					</div><!-- end flexi -->






		<!-- Top slide in menu element-->

		<nav class="cbp-spmenu cbp-spmenu-horizontal cbp-spmenu-top">
		  	<ul class="navtopslider" >
				<li><a href="/#about-me" onclick="$('#about-me').animatescroll();return false;">About</a></li>
				<li><a href="/#my-services" onclick="$('#my-services').animatescroll();return false;">Services</a></li>
				<li><a href="{{URL::to('/shop')}}">Shop</a></li>
				<li><a href="{{URL::to('/videos')}}">Videos</a></li>
				<li><a href="/#my-testimonials" onclick="$('#my-testimonials').animatescroll();return false;">Testimonials</a></li>
				<li><a href="/#contact-me" onclick="$('#contact-me').animatescroll();return false;">Contact</a></li>

			


			<a class="nav-link" href="{{ route('product.getShoppingCart') }}">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
				<span class="badge badge-warning">{{ Session::has('cart') ? Session::get('cart')->totalQty : "" }}</span>
			</a>

			</ul>

		

		</nav>





</div> <!-- end navcontainer -->

