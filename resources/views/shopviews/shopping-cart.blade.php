@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')

	@if(Session::has('cart'))
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<ul class="list-group">
					@foreach($products as $product)
						<li class="list-group-item">
							<span class="badge badge-primary">
								{{ $product['qty'] }}
							</span>
							<strong>
									<?php 
										if (!isset($product['item']['product_id'])){
											$id =  $product['item']['id'];
										} else {
											$id =  $product['item']['product_id'];
										}				
									 	echo App\Product::find($id)->title 
									 	?>
										{{ $product['item']['size'] }}</strong>	
							
							<span class="label label-success">
								{{ $product['price'] }}
							</span>
							<button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
								Action <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li>
									<a href="{{ route('product.subtractFromCart',['id'=>$product['item']['sku']] )}}">Reduce</a>
									<a href="{{ route('product.removeFromCart',['id'=>$product['item']['sku']] )}}">Delete</a>
								</li>
							</ul>
						</li>
					@endforeach
				</ul>
			</div>
			<div class="col-sm-6 col-sm-offset-3">
				<strong>Total: {{ $totalPrice }}</strong>
			</div>
			<hr>
			<div class="col-sm-6 col-sm-offset-3">
				<a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a>
			</div>

		</div>
	@else
		<div class="col-sm-6 col-sm-offset-3">
			<h2>You have no items in your cart.</h2>
		</div>
	@endif

@endsection