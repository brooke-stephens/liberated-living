@extends('admin.admin_layout')

@section('title')
    Admin Dashboard
@endsection

@section('content')

  <div class="container-fluid">
	<div class="row">

	
<!-- Card 1 -->
			<div class="col-lg-6">
			<div class="card">
			<div class="card-header"><h4>Order #{{$order->id}}</h4></div>
			<div class="card-body">
			 <h5 class="card-title">General Order Details</h5>
				<p class="card-text">User Name:<br> {{ $order->firstname.' '.$order->lastname }}</p>
			    <p class="card-text">Order Date:<br> {{ $order->created_at->format('D, F j, Y') }}</p>
			    <p class="card-text">User Email:<br> {{ $order->User->email }}</p>
		
				<label>Order Status:</label>
				<form action="{{ ROUTE('admin.view.order',[$order->id]) }}" method="POST">
			     <div class="form-group">   
					     <select name="orderstatus" class="custom-select">

					    	@foreach ($statuses as $status)
					    	<option value="{{ $status->id }}" {{ $status->id == $order->Status->id ? "selected" : '' }} >{{ $status->name }}</option>	
					    	@endforeach				    	
					    </select>
					    <input type="submit" value="Update Order" class="btn btn-primary">
				{{ csrf_field() }}    
				</form>
				</div>
			</div>
			</div>
			</div>

			<!-- Card 2 -->
			<div class="col-lg-3 nobreaklinep">
			<div class="card">
			<div class="card-body">
			<h4 class="card-title">Billing Details</h4>
			<h6>Address:</h6>
			<p class="card-text">{{ $order->firstname.' '.$order->lastname }}</p>
			<p class="card-text">{{ $order->addresslineone }}</p>
			<p class="card-text">{{ $order->addresslinetwo }}</p>
			<p class="card-text">Email:{{ $order->city.', '.$order->province.' '.$order->postalcode }}</p>
			<br>
			<p class="card-text">Email:<br>{{ $order->User->email }}</p>
			<br>
			<p class="card-text">Phone:<br>{{ $order->phonenumber }}</p>
			</div>
			</div>
			</div>

			<!-- Card 3 -->
			<div class="col-lg-3 nobreaklinep">
			<div class="card">
			<div class="card-body">
			<h4 class="card-title">Shipping Details</h4>
			<h6>Address:</h6>
			<p class="card-text">{{ $order->firstname.' '.$order->lastname }}</p>
			<p class="card-text">{{ $order->addresslineone }}</p>
			<p class="card-text">{{ $order->addresslinetwo }}</p>
			<p class="card-text">{{ $order->city.', '.$order->province.' '.$order->postalcode }}</p>
			</div>
			</div>
			</div>


			<!-- Card 4 -->
			<div class="col-lg-12">
			<div class="card">
			<div class="card-body">
			<h4 class="card-title">Item Details</h4>
			                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th><a href="">Product</a></th>
                          <th><a href="">SKU</a></th>
                          <th><a href="">Cost</a></th>
                          <th><a href="">Qty</a></th>
                          <th><a href="">Total</a></th>
                        </tr>
                      </thead>

                      <tbody>
                        
                       

            
						@foreach($ordersdetails->cart->items as $item)						
                         <tr>
                         <?php 
								if (!isset($item['item']['product_id'])){
									$id =  $item['item']['id'];
								} else {
									$id =  $item['item']['product_id'];
								}		

							   		   
							?>	
                          <th>
                          	 @foreach ($images as $image)
                                @if($image->product_id == $id)

                                  <img src="{{ URL::to('/srv/productthumbnails/'.$image->name.'') }}">
                                  
                                @endif
                              @endforeach
                              <!-- {{ ($item['item']['title']) ? $item['item']['title'] : App\Product::find($id)->title }} -->
                          </th>                        	
						  <th>{{ ($item['item']['title']) }}{{ ' '. $item['item']['size'] }}</a></th>
                          <th>{{$item['item']['sku']}}</th>
                          <th>{{$item['item']['price']}}</th>
                          <th>{{$item['qty']}}</th>
                          <th>{{$item['price']}}</th>
                        </tr>
                       @endforeach
							

                        <tr>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th>Shipping:</th>
                          <th>20.00</th>
                        </tr>

                      	 <tr style="background-color: white;">
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th>Tax:</th>
                          <th>7.99</th>
                        </tr>

                        <tr>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th>Order Subtotal:</th>
                          <th>{{ $ordersdetails->cart->subTotal }} </th>
                        </tr>

                     
                      </tbody>
                    </table>


			
			</div>
			</div>
			</div>







	</div>
</div>
@endsection

