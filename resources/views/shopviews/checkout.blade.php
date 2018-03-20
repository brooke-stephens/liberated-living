@extends('layouts.pagelayout')



    <div id="header-page">
      @include('partials.nav')
    </div>

<div id="container">

<main class="container">



<h1>Checkout</h1>
<h2>total: {{ $total }}</h2>

<form action="{{ route('checkout') }}" method="post" id="checkout-form">
<div class="row">
  <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
    <div class='form-row'>
         <div class='col-md-12 error form-group hide'>                
            <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hide' : ''  }}"> 
                 {{ Session::get('error') }} 
            </div> 
          </div>
     </div>

  <div class='col-md-9 leftpanel' >
  <dl class="accordion">
 <!-- <div class="header"><div class="testf">Step 1: Billing/Shipping Address</div> <div class="test"><a class="edit" href="">Edit</a></div></div> -->
    <div class="headercontainer">
    <div class="header">
         <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <i class="fa fa-inverse fa-stack-1x">1</i>
         </span>
         Step 1: Billing/Shipping Address
    </div>
    <a class="editstepone" href="">Edit</a></div>     
    <dd class="content shipping">
        <div id="ajaxresults"></div>

            <div class='form-row'>
              <div class='col-xs-5 form-group '>
                <label class='control-label'>First Name</label>
                <input class='form-control' value="{{ old('firstname') }}" size='4' type='text' id="firstname" name="firstname" >
              </div>          
              <div class='col-xs-5 form-group '>
                <label class='control-label'>Last Name</label>
                <input class='form-control' value="{{ old('lastname') }}" size='4' type='text' id="lastname" name="lastname" >
              </div>
            </div>

            <div class='form-row'>
              <div class='col-xs-5 form-group '>
                <label class='control-label'>Address Line 1</label>
                <input class='form-control' value="{{ old('addresslineone') }}" size='4' type='text' id="addresslineone" name="addresslineone" >
              </div>          
              <div class='col-xs-5 form-group '>
                <label class='control-label'>Address Line 2</label>
                <input class='form-control' value="{{ old('addresslinetwo') }}" size='4' type='text' id="addresslinetwo" name="addresslinetwo">
              </div>
            </div>

            <div class='form-row'>
              <div class='col-xs-5 form-group '>
                <label class='control-label'>City</label>
                <input class='form-control' value="{{ old('city') }}" size='4' type='text' id="city" name="city" >
              </div>
              <div class='col-xs-5 form-group '>
                <label class='control-label'>Province</label>
                <input class='form-control' value="{{ old('province') }}" size='4' type='text' id="province" name="province" >
             </div>
            </div>

             <div class='form-row'>
              <div class='col-xs-5 form-group '>
                <label class='control-label'>Postal Code</label>
                <input class='form-control' value="{{ old('postalcode') }}" size='4' type='text' id="postalcode" name="postalcode" >
              </div>
              <div class='col-xs-5 form-group '>
                <label class='control-label'>Phone Number</label>
                <input class='form-control' value="{{ old('phonenumber') }}" size='4' type='text' id="phonenumber" name="phonenumber" >
              </div>
            </div>


    <a class="firststep" href=""><button type="button" class="btn btn-success">Proceed to Shipping</button></a>
    
    </dd>

   <div class="headercontainer"> 
      <div class="header">
           <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-inverse fa-stack-1x">2</i>
           </span>
          Step 2: Shipping Method
      </div>
    <a class="editsteptwo" href="">Edit</a></div>
   <dd class="content shipmethod">

     <input type="radio" name="shipmethod" id="shipmethod" value="Expediated Shipping"> Expediated Shipping<br>
     <input type="radio" name="shipmethod" id="shipmethod" value="Ground Shipping"> Ground Shipping<br>
     
   <a class="secondstep" href=""><button type="button" class="btn btn-success">Shipping Method</button></a>
   </dd>

    <div class="headercontainer">
      <div class="header">
        <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <i class="fa fa-inverse fa-stack-1x">3</i>
         </span>
      Payment Method
    </div>
    <!-- <a class="editstepthree" href="">Edit</a> -->
    </div>
    <dd class="content paymentmethod">

            <div class='form-row'>
              <div class='col-xs-5 form-group'>
                <label class='control-label'>Name on Card</label>
                <input class='form-control' type='text' id="card-name" value="asdf"  >
              </div>
              <div class='col-xs-5 form-group card '>
                <label class='control-label'>Card Number</label>
                <input autocomplete='off' class='form-control card-number' value="4242424242424242" type='text' id="card-number" >
              </div>
           </div>
            <div class='form-row'>
              <div class='col-xs-2 form-group cvc '>
                <label class='control-label'>CVC</label>
                <input autocomplete='off' class='form-control card-cvc' value="211" placeholder='ex. 311' size='4' type='text' id="card-cvc" >
              </div>
              <div class='col-xs-2 form-group expiration '>
                <label class='control-label'>Expiration</label>
                <input class='form-control card-expiry-month' placeholder='MM' value="12"  size='2' type='text' id="card-expiry-month" >
              </div>
              <div class='col-xs-2 form-group expiration '>
                <label class='control-label'> </label>
                <input class='form-control card-expiry-year' value="2019"  placeholder='YYYY' size='4' type='text' id="card-expiry-year" >
              </div>
            </div>
          </dd>   
    <button class='btn btn-success pay-submit hide' id="submitbutton" type='submit'>Purchase Order</button>
    </dl>

  </div>

    <div class='col-md-3 rightpanel' >
    </div>
  


</div> <!-- end row -->
  
  {{ csrf_field() }}  
</form>



<!-- <div class="row">
  <dl class="accordion">  
    <div class='col-md-9 leftpanel' >
      <div class="firststepcontainer">
          <div class="firststepheader">
              Step 1: Billing/Shipping Address 
          </div>
          <div class="firststepcontent">
          ed to shipping</button></a>
          </div>
      </div>
      
       <div class="firststepcontainer">
          <div class="firststepheader">
              Step 2: Shipping Method 
          </div>
          <div class="firststepcontent">
        
          </div>
      </div>
      <div class="firststepcontainer">
          <div class="firststepheader">
              Step 3: Payment Method 
          </div>
          <div class="firststepcontent">
        
          </div>
      </div>
    </div>
    <div class='col-md-3 rightpanel' >
      saf
    </div>

</div> -->



  

          <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
            
            
       
        
        
          <!--   <div class='form-row'>
              <div class='col-xs-12 form-group '>
                <label class='control-label'>Save Shipping Info</label>
                 <label class="checkbox-inline"><input type="checkbox" value=""></label>
              </div>
            </div> -->




          
           
          
          








 </main>
</div>





    <div id="footer">
      @include('partials.footer')
    </div>


@section('scripts')
<script src="https://js.stripe.com/v2/"></script>
<script src="https://js.stripe.com/v3/"></script>
<!-- <script src="{{ URL::to('srv/js/checkout.js') }}"></script> -->
<script type="text/javascript" src="{{URL::to('srv/js/checkout.js')}}"></script>
@endsection







