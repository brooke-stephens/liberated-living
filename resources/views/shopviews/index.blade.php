@extends('layouts.master')

@section('title')
	Laravel Shopping Cart
@endsection

@section('content')



<div class="row">
	@if (Session::has('success'))
		<div class="col-md-6">
			<div id="charge-message" class="alert alert-success">
				{{ Session::get('success') }}
			</div>
		</div>
	@endif

	

	@foreach($products as $product)
      <form action="{{ route('product.addToCart') }}" method="POST">		

		<div class="col-sm-6 col-md-4">
	     <div class="thumbnail">
	      <img src="{{ URL::to ('./images/pills.jpg') }}" alt="...">
	      <div class="caption">
	        <h3><?php echo $product->title; ?></h3>

	      

	      		 
	         		
	         	
	        <p> <?php echo $product->description; ?> </p>
	        <p>
			<div class="clearfix">
			
			@if($product->price == 0)
				<select name="subproduct" id="subproduct">
					@foreach($product->product_variants as $variant)
						<option value="{{$variant->id}}" price="{{$variant->price}}">{{$variant->size}}</option>	
					@endforeach				   			    
				 </select>
			@endif

				<div class="price pull-left" id="{{$product->id}}">$
					@if($product->price == 0)

						<script type="text/javascript">
							

							var price = $('#subproduct').find(":selected").attr('price')

							$( "div.price" ).html(price);		

							$(document).on('change', '#subproduct', function() {
							  var price = $('#subproduct').find(":selected").attr('price')
							  var pricediv = $('.price');
							  $( "div#{{$product->id}}" ).html(price);	  

							});

					    </script>
					@else					
						<?php echo $product->price; ?>
					@endif
						
				</div>

				
				
	        	<!-- <a href="{{ route('product.addToCart', ['id' => $product->id]  ) }}" class="btn btn-success pull-right" role="button">Add to cart</a> </p> -->
	        	<input type="hidden" name="id" value="{{$product->id}}">
	        	<input type="submit" class="btn btn-success pull-right" value="Add to cart">
	        	{{ csrf_field() }}
	        </form>
	        </div>
	      </div>
	    </div>
	  </div>

	@endforeach

  



</div> <!-- end row -->




@endsection



