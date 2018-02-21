@extends('layouts.master')

@section('title')
    Laravel Shopping Checkout
@endsection

@section('content')

<h1>Checkout</h1>
<h2>total: {{ $total }}</h2>

<form action="{{ route('checkout') }}" method="post" id="checkout-form">
	
	 <div class='row'>
        <div class='col-md-4'></div>
        <div class='col-md-4'>
          <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
           SHIPPING 
             <div class='form-row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>Name</label>
                <input class='form-control' size='4' type='text' id="name" name="name" required>
              </div>
            </div>
             <div class='form-row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>Address</label>
                <input class='form-control' size='4' type='text' id="address" name="address" required>
              </div>
            </div>

            CARD INFO
            <div class='form-row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>Name on Card</label>
                <input class='form-control' size='4' type='text' id="card-name"  required>
              </div>
            </div>
           <div class='form-row'>
              <div class='col-xs-12 form-group card required'>
                <label class='control-label'>Card Number</label>
                <input autocomplete='off' class='form-control card-number' size='20' type='text' id="card-number" required>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-xs-4 form-group cvc required'>
                <label class='control-label'>CVC</label>
                <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' id="card-cvc" required>
              </div>
              <div class='col-xs-4 form-group expiration required'>
                <label class='control-label'>Expiration</label>
                <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text' id="card-expiry-month" required>
              </div>
              <div class='col-xs-4 form-group expiration required'>
                <label class='control-label'> </label>
                <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text' id="card-expiry-year" required>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12'>
                <div class='form-control total btn btn-info'>
                  Total:
                  <span class='amount'>{{ $total }}</span>
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12 form-group'>
                <button class='form-control btn btn-primary pay-submit' type='submit'>Pay »</button>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12 error form-group hide'>
                
                <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''  }}"> 
                 {{ Session::get('error') }} 
             </div> 

              </div>
            </div>
          
        </div>
        <div class='col-md-4'></div>
    </div>
	{{ csrf_field() }}	
</form>
@endsection

@section('scripts')
<script src="https://js.stripe.com/v2/"></script>
<script src="https://js.stripe.com/v3/"></script>
<!-- <script src="{{ URL::to('srv/js/checkout.js') }}"></script> -->
<script type="text/javascript" src="{{URL::to('srv/js/checkout.js')}}"></script>
@endsection

