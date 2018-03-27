@extends('layouts.pagelayout')



    <div id="header-page">
      @include('partials.nav')
    </div>



<div id="container">

<main class="container checkoutcontainer">

<!--     <form action="" id="testform">
      <input type="text" id="firstname" name="firstname">
      <input type="submit" value="sub">
    </form> -->

@if(Session::has('cart'))

<form action="{{ route('checkout') }}" method="post" id="checkout-form" name="checkout-form">
<div class="row">
  <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
    <div class='form-row'>
         <div class='col-md-12 error form-group hide'>                
            <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''  }}"> 
                 {{ Session::get('error') }} 
            </div> 
          </div>
     </div>

  <div class='col-md-9 leftpanel' >
  <dl class="accordion">
 <!-- <div class="header"><div class="testf">Step 1: Billing/Shipping Address</div> <div class="test"><a class="edit" href="">Edit</a></div></div> -->
    <div class="headercontainer headercontainerone">
    <div class="header headerone">
         <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <i class="fa fa-inverse fa-stack-1x">1</i>
         </span>
         Step 1: Billing/Shipping Address
    </div>
    <a class="editstepone" href=""><i class="fa fa-pencil-square-o"></i></a>

</div>     
    <dd class="content shipping">
        <div id="ajaxresults"></div>
        <div class="inputContent">
            <div class='form-row'>
              <div class='col-xs-6 center-block form-group  '>
                <label class='control-label'>First Name</label>
                <input class='form-control' value="{{ old('firstname') }}" size='4' type='text' id="firstname" name="firstname" >
              </div>          
              <div class='col-xs-6 center-block form-group '>
                <label class='control-label'>Last Name</label>
                <input class='form-control' value="{{ old('lastname') }}" size='4' type='text' id="lastname" name="lastname" >
              </div>
            </div>

            <div class='form-row'>
              <div class='col-xs-6 center-block form-group '>
                <label class='control-label'>Street Address</label>
                <input class='form-control' value="{{ old('addresslineone') }}" size='4' type='text' id="addresslineone" name="addresslineone" >
              </div>          
              <div class='col-xs-6 center-block form-group '>
                <label class='control-label'>Apt, Suite, etc. (Optional)</label>
                <input class='form-control' value="{{ old('addresslinetwo') }}" size='4' type='text' id="addresslinetwo" name="addresslinetwo">
              </div>
            </div>

            <div class='form-row'>
              <div class='col-xs-6 center-block form-group '>
                <label class='control-label'>City</label>
                <input class='form-control' value="{{ old('city') }}" size='4' type='text' id="city" name="city" >
              </div>
              <div class='col-xs-6 center-block form-group '>
                <label class='control-label'>Province</label>
                <select id="province" name="province" class="custom-select" value="{{ old('province') }} " >
                    <option value="AB">Alberta</option>
                    <option value="BC">British Columbia</option>
                    <option value="MB">Manitoba</option>
                    <option value="NB">New Brunswick</option>
                    <option value="NL">Newfoundland and Labrador</option>
                    <option value="NS">Nova Scotia</option>
                    <option value="ON">Ontario</option>
                    <option value="PE">Prince Edward Island</option>
                    <option value="QC">Quebec</option>
                    <option value="SK">Saskatchewan</option>
                    <option value="NT">Northwest Territories</option>
                    <option value="NU">Nunavut</option>
                    <option value="YT">Yukon</option>
                  </select>
                <!-- <input class='form-control' value="{{ old('province') }}" size='4' type='text' id="province" name="province" > -->
             </div>
            </div>

             <div class='form-row'>
              <div class='col-xs-6 center-block form-group '>
                <label class='control-label'>Postal Code</label>
                <input class='form-control' value="{{ old('postalcode') }}" size='4' type='text' id="postalcode" name="postalcode" >
              </div>
              <div class='col-xs-6 center-block form-group '>
                <label class='control-label'>Phone Number</label>
                <input class='form-control' value="{{ old('phonenumber') }}" size='4' type='text' id="phonenumber" name="phonenumber" >
              </div>
            </div>


    <a class="firststep" href=""><button type="button" class="btn btn-success">Proceed to Shipping</button></a>
     </div> <!-- end input content -->
    </dd>

   <div class="headercontainer headercontainertwo"> 
      <div class="header headertwo">
           <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-inverse fa-stack-1x">2</i>
           </span>
          Step 2: Shipping Method
      </div>
    <a class="editsteptwo" href=""><i class="fa fa-pencil-square-o"></i></a></div>
   <dd class="content shipmethod">

     <input type="radio" name="shipmethod" id="shipmethod" value="Expediated Shipping"> Expediated Shipping<br>
     <input type="radio" name="shipmethod" id="shipmethod" value="Ground Shipping"> Ground Shipping<br>
     
   <a class="secondstep" href="#asdf"><button type="button" class="btn btn-success">Shipping Method</button></a>
   </dd>

    <div class="headercontainer headercontainerthree">
      <div class="header headerthree">
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
              <div class='col-xs-6 center-block form-group'>
                <label class='control-label'>Name on Card</label>
                <input class='form-control' type='text' id="card-name" name="cardname" value="asdf"  >
              </div>
              <div class='col-xs-6 center-block form-group card '>
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
             
              
                <button class='btn btn-success pay-submit' type='submit'>Place Order</button>                          

           
    </dd>    
    </dl>

  </div> <!-- end col -->

    <div class='col-md-3 rightpanel' >
      <div class="headercontainer">
         <div class="header headeritems">        
         Your Items
         <a href="{{ Route('product.getShoppingCart') }}"><span>View Cart</span></a>
         
        </div>
      </div>
      <div class="itemcontainer">

 @foreach($products as $product)
  <?php 
     if (!isset($product['item']['product_id'])){
        $id =  $product['item']['id'];
     } else {
        $id =  $product['item']['product_id'];
     }       
  ?>
      <table>
          <tbody>
              <tr class="imagecell">
                 <td rowspan="5">
                  @foreach ($images as $image)
                                @if($image->product_id == App\Product::find($id)->id )

                                  <img src="{{ URL::to('/srv/productthumbnails/'.$image->name.'') }}">
                                  
                                @endif
                              @endforeach
                </td>
              </tr>
                <tr>
                 <td style="font-weight: bold;" colspan="2">
                   <?php     
                    echo App\Product::find($id)->title 
                    ?>
                 </td>
                 
              </tr>
                <tr>
                 <td>Size: </td>
                 <td>{{ $product['item']['size'] }}</td>
              </tr>
               <tr>
                 <td>Qty:  </td>
                 <td> {{ $product['qty'] }} x ${{ $product['item']['price'] }}</td>
              </tr>
               <tr>
                 <td>Cost:</td>
                 <td>{{ $product['price'] }}</td>
              </tr>
          </tbody>
      </table>
@endforeach


      <hr>
      <table> 
          <tbody>
              <tr>
                 <td>Subtotal: </td>
                 <td>{{ $subTotal }}</td>
              </tr>
              <tr>
                 <td>Shipping</td>
                 <td>Need Shipping info</td>
              </tr>
              <tr>
                 <td>Tax: </td>
                 <td id="taxamount">Need Shipping info</td>
              </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
              </tr>
               <tr>
                 <td style="background-color: white;padding: 4px 4px 4px 4px;font-weight: bold;" >Order Total:</td>
                 <td id="ordertotal" style="background-color: white;padding: 4px 4px 4px 4px ">${{ $subTotal }}</td>
              </tr>
          </tbody>
      </table>
    </div> <!-- item container -->
    <br><br>
      <div class="headercontainer headeracceptedcards">
         <div class="header">        
        Accepted Payment Methods       
        </div>
      </div>
      <div class="acceptedcardcontainer">

        <div class="cards">
          <ul>
            <li class=icon-american-express><i title="American Express">American Express</i></li> 
            <li class=icon-master-card><i title=MasterCard>MasterCard</i></li> 
            <li class=icon-visa><i title=Visa>Visa</i></li> 
          </ul>
        </div>
      
        <div class="stripelogo"><img src="{{URL::asset('/images/homepage/stripebig.png')}}" alt="">
          <!-- <img src="{{URL::asset('/images/homepage/padlock.png')}}" style="height: 41px; alt=""> -->
        </div>

      </div>

      @else
        <div class="col-sm-6 col-sm-offset-3">
          <h2>You have no items in your cart.</h2>
        </div>
      @endif

    </div>
  


</div> <!-- end row -->
  
  {{ csrf_field() }}  
</form>

<script src='https://js.stripe.com/v2/' type='text/javascript'></script>
            
            
       
        
        
          <!--   <div class='form-row'>
              <div class='col-xs-12 form-group '>
                <label class='control-label'>Save Shipping Info</label>
                 <label class="checkbox-inline"><input type="checkbox" value=""></label>
              </div>
            </div> -->




      


    
    
  

<script>

      var placeSearch, addresslineone;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

 function initAutocomplete() {

        // Create the addresslineone object, restricting the search to geographical
        // location types.
        addresslineone = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('addresslineone')),
            {types: ['geocode'],componentRestrictions: {country: "ca"}});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        addresslineone.addListener('place_changed', fillInAddress);
        
}

      function fillInAddress() {
        // Get the place details from the addresslineone object.
        var place = addresslineone.getPlace();

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];

          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            // document.getElementById(addressType).value = val;
            if(addressType=="locality") {
              document.getElementById('city').value = val;
            }
            if(addressType=="postal_code") {
              document.getElementById('postalcode').value = val;
            }
            if(addressType=="street_number") {
              completeadress = val;                       
            }
            if(addressType=="route") {
                completeadress += " " + val;
                document.getElementById('addresslineone').value = completeadress;
            }
            if(addressType=="administrative_area_level_1") {
              document.getElementById('province').value = val;
            }   


            

          }
        }
      }

      // Bias the addresslineone object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            addresslineone.setBounds(circle.getBounds());
          });
        }
      }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBLZqLKt6uaThDUpT7Rg_ldp1P3ejSEBk &libraries=places&callback=initAutocomplete"
        async defer>
</script>
          
           
          
          








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
<script type="text/javascript" src="{{URL::to('srv/js/placeautocomplete.js')}}"></script>

@endsection







