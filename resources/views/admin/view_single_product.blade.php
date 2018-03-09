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

        @if (count($errors))
            <div class="alert alert-danger">            
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach

            </div>
        @endif


       <form action="{{ Route('admin.single.product',[$product->id]) }}" method="POST" id="update_product" name="update_product" enctype="multipart/form-data">

          <div class="row">
           
            
            <div class="col-lg-9">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>{{$product->title}}</h4>
                </div>               
                <div class="card-body">
                  <p>Enter the product information below.</p>
                   <div class="form-group">                     
                      <div class="checkbox checkbox-primary">

                          <input id="multiplevariants" name="multiplevariants" type="checkbox" {{$multipleVariantscheckbox}}>
                          <label for="multiplevariants">
                              Will this product have multiple product variants?
                          </label>
                      </div>
                    </div>
                   <div class="form-group">
                      <label>Name</label>
                      <input type="text" placeholder="Product Name" name="name" id="name" class="form-control" value="{{$product->title}}">
                    </div>
                    <div class="form-group">       
                      <label>Description</label>
                      <input type="text" placeholder="Product Description" name="description" class="form-control" value="{{$product->description}}">
                    </div>
                    <div class="form-group">       
                      <label>Product Category</label>
                       <select name="category" id="category" class="form-control">
                            <option value="" disabled hidden>Choose here</option>  
                        @foreach ($categories as $category)                             
                            <option value="{{$category->name}}" {{ ($product->category == $category->name ? 'selected' : '') }}>{{$category->name}}</option>
                        @endforeach                     
                      </select> 
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
                      <div class="elementstohide">
                       <div class="form-group">       
                        <label>Size</label>
                        <input type="text" placeholder="Ex. 50g, 1000ml" name="size" id="size" class="form-control" value="{{$product->size}}">
                      </div>
                      <div class="form-group">       
                        <label>Price</label>
                        <input type="text" placeholder="Product Price" name="price" class="form-control" value="{{$product->price}}">
                      </div>
                      <div class="form-group">       
                        <label>Quantity</label>
                        <input type="text" placeholder="Quantity" name="quantity" class="form-control" value="{{$product->quantity}}">
                      </div>                    
                    </div> <!-- end elements to hide -->

                     
                     <label>SKU</label>
                    <div class="form-group input-group">                       
                      <input type="text" placeholder="sku" name="sku" id="skuinput" class="form-control" value="{{$product->sku}}">
                      <button class="btn btn-default" id="skugenerate">Generate</button>
                    </div>

                   <div class="form-group">                       
                        <!-- <input type="submit" value="Add Variant" data-toggle="modal" id="openVariantmodal" class="btn btn-info" data-target=".bd-example-modal-lg">          -->
                         <button class="btn btn-info" id="openVariantmodal" data-toggle="modal" data-target=".addVariantModal">Add Variant</button>
                        <input type="submit" value="Update Product" class="btn btn-primary">

                    </div> 

                              <!--    this is the Variant area below   -->
              
                  <div class="col-lg-12 addedVariants">            
                      
                                            
                          <div class="card-body">
                            <h5 class="card-title">Product Variants</h5>
                                 <div class="table-responsive">
                                <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Size</th>
                                      <th>Price</th>
                                      <th>Quantity</th>
                                      <th>SKU</th>
                                      <th>Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody id="appendvarianthere">
                                     <tr>
                                     <th scope="row">Ex.</th>
                                      <td>500ml</td>
                                      <td>$20</td>
                                      <td>10</td>
                                      <td>SKU#</td>
                                      <td>Delete</td>           
                                    </tr>
                                    @foreach($productVariants as $variant)
                                    <tr class="productvariant">
                                     <th scope="row">1</th>
                                    <td><input type="text" placeholder="Size" name="vsize[]" class="form-control" value="{{$variant->size}}"></td>
                                     <td><input type="text" placeholder="Price" name="vprice[]" class="form-control" value="{{$variant->price}}"></td>
                                     <td><input type="text" placeholder="Quantity" name="vquantity[]" class="form-control" value="{{$variant->quantity}}"></td>
                                     <td><input type="text" placeholder="SKU" name="vsku[]" class="form-control" value="{{$variant->sku}}"></td>
                                     <td><button type="button" class="btn btn-danger deleteButton">Delete</button></td></tr>
                                    @endforeach
                                  </tbody>
                                </table>
                              </div>            
                          </div>
                        
                  </div><!--  end col 6 -->
          
 <!--    end this is the Variant area below   -->   

          

                </div>


              </div>


                  

    
    
          </div>


 
        
           
         
         <div class="col-lg-3">            
              <div class="card-deck">  

               <div class="card">

                @if ($primaryImage->count() == 0)

                   <img src="{{ URL::asset ('images/adminimg/defaultimage.jpg') }}" class="w-100">            
                             
                  <div class="card-body">
                    <h5 class="card-title">No Primary Image</h5>
                   
                  </div>
                </div>
              
                   
                @endif 

                  @foreach ($primaryImage as $pimage)
                    
                    <img src="{{ url('storage/'.$pimage->name) }}" class="w-100" alt="">                
                             
                  <div class="card-body">
                    <h5 class="card-title">Primary Image</h5>
                   <!--  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                     <button type="button" id="{{ $pimage->id }}" class="btn btn-danger  deleteassociatedimage">Delete Image</button>
                  </div>
                </div>
                @endforeach  
                  

              </div>  <!-- cardeck -->

            @foreach ($associatedImages as $aimage)
               <div class="card">                             
                    <img src="{{ url('storage/'.$aimage->name) }}" class="w-100" alt="">               
                             
                  <div class="card-body">
                    <h5 class="card-title">Alternate Image</h5>
                  <!--   <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    <a href="#" class="btn btn-success">Make Primary</a>
                   
                     <button type="button" id="{{ $aimage->id }}" class="btn btn-danger  deleteassociatedimage">Delete Image</button>

                  </div>
                </div>
            @endforeach         

        </div><!--  end col 6 -->

          <!--    this is the Variant area below   -->
              
<!--                   <div class="col-lg-9 addedVariants">            
                      
                       <div class="card">                           
                          <div class="card-body">
                            <h5 class="card-title">Product Variants</h5>
                                 <div class="table-responsive">
                                <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Size</th>
                                      <th>Price</th>
                                      <th>Quantity</th>
                                      <th>SKU</th>
                                      <th>Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody id="appendvarianthere">
                                     <tr>
                                     <th scope="row">Ex.</th>
                                      <td>500ml</td>
                                      <td>$20</td>
                                      <td>10</td>
                                      <td>SKU#</td>
                                      <td>Delete</td>           
                                    </tr>
                                    @foreach($productVariants as $variant)
                                    <tr class="productvariant">
                                     <th scope="row">1</th>
                                    <td><input type="text" placeholder="Size" name="vsize[]" class="form-control" value="{{$variant->size}}"></td>
                                     <td><input type="text" placeholder="Price" name="vprice[]" class="form-control" value="{{$variant->price}}"></td>
                                     <td><input type="text" placeholder="Quantity" name="vquantity[]" class="form-control" value="{{$variant->quantity}}"></td>
                                     <td><input type="text" placeholder="SKU" name="vsku[]" class="form-control" value="{{$variant->sku}}"></td>
                                     <td><button type="button" class="btn btn-danger deleteButton">Delete</button></td></tr>
                                    @endforeach
                                  </tbody>
                                </table>
                              </div>            
                          </div>
                        </div>          
                   
                  </div><!--  end col 6 --> 
          
 <!--    end this is the Variant area below   -->   
{{ csrf_field() }}                  
</form>


  </div>
</div>     



<!-- Large modal -->

 <form id="modalform" name="modalform" >
<div class="modal fade addVariantModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product Variant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Add Size (Ex. 50g, 1000ml)</label>
          <input type="text" placeholder="Ex. 50g, 1000ml" name="vsize" id="vsize" class="form-control" value="">
        </div>
        <div class="form-group">
          <label>Add Price</label>
         <input type="text" placeholder="Price" name="vprice" id="vprice" class="form-control" value="">
        </div>
         <div class="form-group">
          <label>Add Quantity</label>
          <input type="text" placeholder="Quantity" name="vquantity" id="vquantity" class="form-control" value="">
        </div>

          <label>SKU</label>
          <div class="form-group input-group">                       
            <input type="text" placeholder="sku" name="vsku" id="vsku" class="form-control" value="">
            <button class="btn btn-default" id="vskugenerate">Generate</button>
         </div>
          <label for="vsku" class="error" generated="true"></label>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <!-- <button type="button" class="btn btn-primary addVariant">Add</button> -->
        <input type="submit" class="btn btn-primary addVariant" value="submit">
      </div>
    </div>
  </div>
</div>    
  </form> 
<!-- end Large modal -->

<section>
<br><br>
@endsection

@section('pagescript')
    <!-- add sku generator -->
    <script type="text/javascript" src="{{ URL::to('srv/js/admin/js/skugenerator.js') }}"></script> 
        <!-- add products -->
    <script type="text/javascript" src="{{ URL::to('srv/js/admin/js/addproduct.js') }}"></script> 

@stop



