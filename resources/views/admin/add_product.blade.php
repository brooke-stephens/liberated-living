@extends('admin.admin_layout')

@section('title')
    Admin Dashboard
@endsection

@section('content')

<section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <!-- <h1 class="h3 display">Forms            </h1> -->
          </header>

        @if (count($errors))
		        <div class="alert alert-danger">            
		            @foreach($errors->all() as $error)
		                {{ $error }}
		            @endforeach

		        </div>
		    @endif
        
      <form action="{{ Route('admin.add.product') }}" method="POST" id="upload" name="add_product" enctype="multipart/form-data">

      <div class="row">           


          <div class="col-lg-6">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Add Product</h4>
                </div>
                



                <div class="card-body">
                  <p>Enter the product information below.</p>
                    <div class="form-group">                     
                      <div class="checkbox checkbox-primary">
                          <input id="multiplevariants" name="multiplevariants" type="checkbox">
                          <label for="multiplevariants">
                              Will this product have multiple product variants?
                          </label>
                      </div>
                    </div>
                   <div class="form-group">
                      <label>Name</label>
                      <input type="text" placeholder="Product Name" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">       
                      <label>Description</label>
                      <input type="text" placeholder="Product Description" name="description" class="form-control" value="{{ old('description') }}">
                    </div>
                     <div class="form-group">       
                      <label>SKU</label>
                      <input type="text" placeholder="sku" name="sku" class="form-control" value="{{ old('sku') }}">
                    </div>
                    <div class="form-group">       
                      <label>Product Category</label>
                      <input type="text" placeholder="Category" name="category" class="form-control" value="{{ old('category') }}">
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
                        <input type="text" placeholder="Ex. 50g, 1000ml" name="size" class="form-control" value="{{ old('size') }}">
                      </div>
                      <div class="form-group">       
                        <label>Price</label>
                        <input type="text" placeholder="Product Price" name="price" class="form-control" value="{{ old('price') }}">
                      </div>
                      <div class="form-group">       
                        <label>Quantity</label>
                        <input type="text" placeholder="Quantity" name="quantity" class="form-control" value="{{ old('quantity') }}">
                      </div>                    
                    </div> <!-- end elements to hide -->

                    <div class="form-group">                       
                        <!-- <input type="submit" value="Add Variant" data-toggle="modal" id="openVariantmodal" class="btn btn-info" data-target=".bd-example-modal-lg">          -->
                         <button class="btn btn-info" id="openVariantmodal" data-toggle="modal" data-target=".addVariantModal">Add Variant</button>
                        <input type="submit" value="Add Product" class="btn btn-primary">

                    </div>         
                  </div>

              </div> <!-- end card -->
          </div><!-- end col 6 -->


            

<!--    this is the Variant area below   -->
              
                  <div class="col-lg-6 addedVariants">            
                      <div class="card-deck">
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
                                      <th>SKU</th>
                                      <th>Quantity</th>
                                      <th>Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody id="appendvarianthere">
                                     <tr>
                                     <th scope="row">Ex.</th>
                                      <td>500ml</td>
                                      <td>$20</td>
                                      <td>SKU#</td>
                                      <td>10</td>
                                      <td>Delete</td>           
                                    </tr>
                                  </tbody>
                                </table>
                              </div>            
                          </div>
                        </div>          
                    </div>  <!-- cardeck -->
                  </div><!--  end col 6 -->
          
 <!--    end this is the Variant area below   -->            

{{ csrf_field() }}                  
</form>




    </div>
</div>














<!-- Large modal -->

 <form id="test" name="test" >
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
         <div class="form-group">
          <label>Add SKU (Each product must have a unique SKU)</label>
          <input type="text" placeholder="SKU" name="vsku" id="vsku" class="form-control" value="">
        </div>
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




<section>
<br><br>
@endsection