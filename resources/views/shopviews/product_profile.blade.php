@extends('layouts.pagelayout')


<div id="header-page">
  @include('partials.nav')
</div>



<main class="container product_profile">
	<div class="row">
		<div class='col-md-8' >
			<form action="">
				<!-- <input type="text" name="productsearch" id="productsearch" placeholder="Product Search"> -->
				
		<div class="">
            <div id="search_container"> 
                <div class="input-group stylish-input-group">
                    <input type="text" class="form-control input-lg" placeholder="Product Search..." />
                    <span class="input-group-addon">
                    	<button type="submit" class="search-expand">
                            <span class="glyphicon glyphicon-triangle-bottom"></span>
                        </button> 
                        <button type="submit" >
                            <span class="glyphicon glyphicon-search"></span>
                        </button>                          
                    </span>
                </div>
            </div>
        </div>



            <div class="subcategory-container">
            	<label class="checkbox-inline"><input type="checkbox" value="">Option 1</label>
				<label class="checkbox-inline"><input type="checkbox" value="">Option 2</label>
				<label class="checkbox-inline"><input type="checkbox" value="">Option 3</label> 
            </div>
			</form>

			<img src="{{URL::asset('/images/test.jpg')}}" class="product_img" alt="">



		</div>
		<div class='col-md-4' >
			<h4>Bottle of Pills</h4>
			Stars
			<p class="product_description">Beautifully designed and engineered with three premium foams for cooling, body contouring and pressure-relieving core support.</p>

			<select name="brand" id="brand" class="form-control">
                <option value="" disabled selected="selected">Choose here</option>  
                           
                <option value="">option 1</option>
                <option value="">option 2</option>
                          
            </select> 
			<br>	
            <h3>59.99</h3>
            <input type="submit" class="btn btn-success product_profile_btn" value="ADD TO CART">
		</div>

	<div class='col-md-8' >	
	<br>
	<h1>Featured Products</h1>
			<hr>
			<div class='col-md-4 productparentcontainer' >
				<div class="featuredproduct-container">
					<img src="{{URL::asset('/images/test.jpg')}}" class="product_img" alt="">
					<div class="featuredproduct-summary">Oyster Mushroom Powder Steam</div>
					<hr>
					<div class="featuredproduct-price">$29.88 - $50.95</div>
				</div>
			</div>
			<div class='col-md-4 productparentcontainer' >
				<div class="featuredproduct-container">
					<img src="{{URL::asset('/images/test.jpg')}}" class="product_img" alt="">
					<div class="featuredproduct-summary">Oyster Mushroom Powder Steam</div>
					<hr>
					<div class="featuredproduct-price">$29.88 - $50.95</div>
				</div>
			</div>
			<div class='col-md-4 productparentcontainer' >
				<div class="featuredproduct-container">
					<img src="{{URL::asset('/images/test.jpg')}}" class="product_img" alt="">
					<div class="featuredproduct-summary">Oyster Mushroom Powder Steam</div>
					<hr>
					<div class="featuredproduct-price">$29.88 - $50.95</div>
				</div>
			</div>	

	</div>

	</div>



<!-- dfgasf -->
<div class="row">
		<div class='col-md-8' >
	  <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="/theme/svg/loading/static-svg/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
            <div data-p="170.00">
                <img data-u="image" src="{{URL::asset('/images/test.jpg')}}" />
                <div data-u="thumb">
                    <img data-u="thumb" class="i" src="{{URL::asset('/images/test.jpg')}}" />
                  
                </div>
            </div>
            <div data-p="170.00">
                <img data-u="image" src="{{URL::asset('/images/test.jpg')}}" />
                <div data-u="thumb">
                    <img data-u="thumb" class="i" src="{{URL::asset('/images/test.jpg')}}" />
                   
                </div>
            </div>
            <div data-p="170.00">
                <img data-u="image" src="{{URL::asset('/images/test.jpg')}}" />
                <div data-u="thumb">
                    <img data-u="thumb" class="i" src="{{URL::asset('/images/test.jpg')}}" />
                   
                </div>
            </div>
            <div data-p="170.00">
                <img data-u="image" src="{{URL::asset('/images/test.jpg')}}" />
                <div data-u="thumb">
                    <img data-u="thumb" class="i" src="{{URL::asset('/images/test.jpg')}}" />
                  
                </div>
            </div>
            <div data-p="170.00">
                <img data-u="image" src="{{URL::asset('/images/test.jpg')}}" />
                <div data-u="thumb">
                    <img data-u="thumb" class="i" src="{{URL::asset('/images/test.jpg')}}" />
                   
                </div>
            </div>
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort121" style="position:absolute;left:0px;top:0px;width:168px;height:380px;overflow:hidden;cursor:default;" data-autocenter="2" data-scale-left="0.75">
            <div data-u="slides">
                <div data-u="prototype" class="p" style="width:168px;height:68px;">
                    <div data-u="thumbnailtemplate" class="t"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
 <!-- asfasf    -->


		
</main>



<div id="footer">
   @include('partials.footer')
</div>


@section('scripts')

	<script type="text/javascript" src="{{URL::to('srv/js/jssor.slider.min.js')}}"></script>

	    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
              {$Duration:800,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Orientation: 2
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>

    <script type="text/javascript">jssor_1_slider_init();</script>
    <!-- #endregion Jssor Slider End -->

<script>


	$('.search-expand').on('click',function(event){
		event.preventDefault();
		$('.subcategory-container').slideToggle( "slow", function() {

		  });

	});


</script>

@endsection