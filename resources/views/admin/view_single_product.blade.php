@extends('admin.admin_layout')

@section('title')
    Admin Dashboard
@endsection

@section('content')

<section class="forms">
  <div class="container-fluid">
          <!-- Page Header-->
          <header>          
          </header>


          <div class="row">
           
            
            <div class="col-lg-9">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>{{$product->title}}</h4>
                </div>
                <form action="{{ Route('admin.single.product',[$product->id]) }}" method="POST" id="update_product" name="update_product" enctype="multipart/form-data">
                <div class="card-body">
                  <p>Enter the product information below.</p>
                   <div class="form-group">
                      <label>Name</label>
                      <input type="text" placeholder="Product Name" name="name" class="form-control" value="{{$product->title}}">
                    </div>
                    <div class="form-group">       
                      <label>Description</label>
                      <input type="text" placeholder="Product Description" name="description" class="form-control" value="{{$product->description}}">
                    </div>
                     <div class="form-group">       
                      <label>SKU</label>
                      <input type="text" placeholder="sku" name="sku" class="form-control" value="{{$product->sku}}">
                    </div>
                    <div class="form-group">       
                      <label>Product Category</label>
                      <input type="text" placeholder="Category" name="category" class="form-control" value="{{$product->category}}">
                    </div>

                    <div class="form-group">       
                      <label>Primary Product Images</label>
                        <ul>
                          <li>
                            Select one file
                            <input type="file" class="form-control" id="primaryimage" name="primaryimage"/>
                          </li>
                      </ul>            
                    </div>
                    <div class="form-group">       
                      <label>Alternative Product Images</label>             
                        <ul>                        
                          <li>
                            Select muiltple files
                            <input type="file" class="form-control" id="alternativeimages" name="alternativeimages[]" multiple="multiple"/>
                          </li>
                        </ul>           
                    </div>
                    <div class="form-group">       
                      <label>Price</label>
                      <input type="text" placeholder="Product Price" name="price" class="form-control" value="{{$product->price}}">
                    </div>
                    <div class="form-group">       
                      <label>Quantity</label>
                      <input type="text" placeholder="Quantity" name="quantity" class="form-control" value="{{$product->quantity}}">
                    </div>
                    <div class="form-group">       
                      <input type="submit" value="Update Product" class="btn btn-primary">
                    </div>

                    {{ csrf_field() }}
                   
                  </form>

                </div>
              </div>


                  

		
		
          </div>
           
         
         <div class="col-lg-3">            
              <div class="card-deck">  

               <div class="card">

                  @foreach ($primaryImage as $pimage)
                     
                    <img src="http://liberatedliving.dev/storage/{{$pimage->name}}" class="w-100" alt="">                
                  @endforeach               
                  <div class="card-body">
                    <h5 class="card-title">Primary Image</h5>
                   <!--  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    <a href="#" class="btn btn-danger">Delete Image</a>
                  </div>
                </div>
  
                  

              </div>  <!-- cardeck -->

            @foreach ($associatedImages as $aimage)
               <div class="card">                             
                    <img src="http://liberatedliving.dev/storage/{{$aimage->name}}" class="w-100" alt="">               
                             
                  <div class="card-body">
                    <h5 class="card-title">Alternate Image</h5>
                  <!--   <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    <a href="#" class="btn btn-success">Make Primary</a>
                    <a href="#" class="btn btn-danger">Delete Image</a>
                  </div>
                </div>
            @endforeach         

        </div><!--  end col 6 -->



  </div>
</div>     
<section>
<br><br>
@endsection


