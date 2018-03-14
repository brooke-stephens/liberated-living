@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
<div class="row">
	<h1>User Profile</h1>
	<hr>
	<h2>My Orders</h2>
	 @foreach ($orders as $order)
	<div class="panel panel-default">
	  <div class="panel-body">
	    <ul class="list-group">
	   	  @foreach($order->cart->items as $item)
		    <li class="list-group-item">
				<span class="badge badge-warning">$ {{ $item['price'] }}</span>
				{{ $item['item']['title'] }} | {{ $item['qty'] }} 
				{{ $item['item']['size'] }}	
										
		    </li>
	       @endforeach 
		</ul>
	  </div>
	  <div class="panel-footer">
		<strong>Subtotal: $ {{ $order->cart->subTotal }}</strong>
	  </div>
	</div>
	@endforeach 
</div>
@endsection


