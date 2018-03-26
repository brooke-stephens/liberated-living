<!DOCTYPE html>
<html>
<head>
	<title>
		Liberated Living
	</title>
	<meta name="_token" content="{!! csrf_token() !!}"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">	

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">


    <link rel="stylesheet" type="text/css" href="{{ URL::to('srv/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('srv/css/page.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('srv/css/sweetalert.css')}}">


    <!-- these css sheets are for the sub menu slider -->
	<!-- <link rel="stylesheet" type="text/css" href="{{ URL::to('srv/css/component.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('srv/css/demo.css') }}"> -->

	<!-- <noscript>
    <link rel="stylesheet" type="text/css" href="{{ URL::to('srv/css/nojava.css') }}">
	</noscript> -->

	<script type='text/javascript' src="{{ URL::to('srv/js/modernizr.custom.js') }}"></script>



</head>
<body>

	@yield('content')

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="s<script>document.body.className += ' fade-out';</script>ha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>

<script type='text/javascript' src="{{ URL::to('srv/js/slidein.js') }}"></script>
<script type='text/javascript' src="{{ URL::to('srv/js/jPushMenu.js') }}"></script>
<!-- submenu slider menu -->
<!-- <script type='text/javascript' src="{{ URL::to('srv/js/classie.js') }}"></script>
<script type='text/javascript' src="{{ URL::to('srv/js/mlpushmenu.js') }}"></script> -->
<script type='text/javascript' src="{{ URL::to('srv/js/animatescroll.js') }}"></script>
<script type='text/javascript' src="{{ URL::to('srv/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('srv/js/sweetalert.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('srv/js/youtubeajax.js')}}"></script>
<script type="text/javascript" src="{{ URL::to('srv/js/youtubeapi.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
<!-- submenu slider menu -->

<!-- <script type="text/javascript">
	new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ), {
	type : 'cover'

} );

</script> -->
<script type="text/javascript">
	$.ajaxSetup({
	   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});
</script>

<!-- <script type="text/javascript">

    	@if (notify()->ready())
	    	swal({

	    		title: "{!! notify()->message() !!}",
	    		type: "{{ notify()->type() }}"

	    	});
	    @endif

</script> -->

@yield('scripts')


</body>
</html>