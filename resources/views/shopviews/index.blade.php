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
		

		<div class="col-sm-6 col-md-4">
	     <div class="thumbnail">
	      <img src="{{ URL::to ('./images/pills.jpg') }}" alt="...">
	      <div class="caption">
	        <h3><?php echo $product->title; ?></h3>
	        <p>{{ $product->description }} </p>
	        <p>
			<div class="clearfix">
				<div class="price pull-left">$<?php echo $product->price; ?></div>
				
	        	<a href="{{ route('product.addToCart', ['id' => $product->id]  ) }}" class="btn btn-success pull-right" role="button">Add to cart</a> </p>
	        </div>
	      </div>
	    </div>
	  </div>

	@endforeach

  



</div> <!-- end row -->




@endsection
