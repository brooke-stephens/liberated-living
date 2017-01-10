<!DOCTYPE html>
<html>
<head>
	<title>
		Liberated Living
	</title>

	
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    

    <link rel="stylesheet" type="text/css" href="{{ URL::to('srv/css/main.css') }}">	
	<link rel="stylesheet" type="text/css" href="{{ URL::to('srv/css/component.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('srv/css/demo.css') }}">
					
		<script type='text/javascript' src="{{ URL::to('srv/js/modernizr.custom.js') }}"></script>


</head>
<body>
	<div id="container">

		<div id="homepageheader">
			@include('homepage.header')
		</div>

		<div id="homepageabout">
			@include('homepage.about')
		</div>

		<div id="salespitch">
			@yield('content')
		</div>

		<div id="services">
			@yield('services')
		</div>

		<div id="footer">
			@include('partials.footer')
		</div>
	</div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="s<script>document.body.className += ' fade-out';</script>ha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous">
 </script>

<script type='text/javascript' src="{{ URL::to('srv/js/slidein.js') }}"></script>
<script type='text/javascript' src="{{ URL::to('srv/js/jPushMenu.js') }}"></script>
<script type='text/javascript' src="{{ URL::to('srv/js/classie.js') }}"></script>
<script type='text/javascript' src="{{ URL::to('srv/js/mlpushmenu.js') }}"></script>

<script type="text/javascript">
	new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ), {
	type : 'cover'
} );
</script>	


   <!--  <script type='text/javascript' src="{{ URL::to('srv/js/TweenMax.js') }}"></script>   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>
    <script type='text/javascript' src="{{ URL::to('srv/js/main.js') }}"></script> -->




</body>
</html>