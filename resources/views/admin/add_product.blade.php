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
                      <input type="text" placeholder="Product Name" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    </div>
                     <div class="form-group">       
                      <label>Product Brand</label>
                      <!-- <input type="text" placeholder="Category" name="category" class="form-control" value="{{ old('category') }}"> -->
                      <select name="brand" id="brand" class="form-control">
                            <option value="" disabled selected="selected">Choose here</option>  
                            @foreach ($brands as $brand)
                            <option value="{{$brand->name}}">{{$brand->name}}</option>
                           
                            @endforeach
                      </select> 

                    </div>
                    <div class="form-group">       
                      <label>Description</label>
                      <!-- <input type="text" placeholder="Product Description" name="description" class="form-control" value="{{ old('description') }}"> -->
                      <textarea placeholder="Product Description" name="description" id="textareawsyi" class="form-control" value="{{ old('description') }}"></textarea>
                    </div>                     
                    <div class="form-group">       
                      <label>Product Category</label>
                      <!-- <input type="text" placeholder="Category" name="category" class="form-control" value="{{ old('category') }}"> -->
                      <select name="category" id="category" class="form-control">
                            <option value="" disabled hidden>Choose here</option>  
                        @foreach ($categories as $category)                             
                            <option value="{{$category->name}}" {{ (old('category') == $category->name ? 'selected' : '') }}>{{$category->name}}</option>
                        @endforeach                     
                      </select> 

                    </div>
                    <div class="form-group">
                                             
                     <label for="symptoms">Related product symptoms.</label>
                      <select multiple name="symptoms[]" id="symptoms" title="Select Symptom" class="form-control">
                        @foreach ($symptoms as $symptom)                             
                            <option value="{{$symptom->symptom_id}}">{{$symptom->name}}</option>
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
                        <input type="text" placeholder="Ex. 50g, 1000ml" name="size" id="size" class="form-control" value="{{ old('size') }}">
                      </div>
                      <div class="form-group">       
                        <label>Price</label>
                        <input type="text" placeholder="Product Price" name="price" class="form-control" value="{{ old('price') }}">
                      </div>
                      <div class="form-group">       
                        <label>Quantity</label>
                        <input type="text" placeholder="Quantity" name="quantity"  class="form-control" value="{{ old('quantity') }}">
                      </div>                    
                    </div> <!-- end elements to hide -->

                    <label>SKU</label>
                    <div class="form-group input-group">                       
                      <input type="text" placeholder="sku" name="sku" id="skuinput" class="form-control" value="{{ old('sku') }}">
                      <button class="btn btn-default" id="skugenerate">Generate</button>
                    </div>


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

@endsection

@section('pagescript')

    <!-- add sku generator -->
    <script type="text/javascript" src="{{ URL::to('srv/js/admin/js/skugenerator.js') }}"></script> 
        <!-- add products -->
    <script type="text/javascript" src="{{ URL::to('srv/js/admin/js/addproduct.js') }}"></script>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.9.4/trumbowyg.min.js"></script>
    

    <script>
      $.trumbowyg.svgPath = "{{ URL::asset('/images/adminimg/icons.svg') }}";

      $('#textareawsyi').trumbowyg({
           btns: [
              ['viewHTML'],
              ['undo', 'redo'], // Only supported in Blink browsers
              ['formatting'],
              ['strong', 'em'],
              // ['superscript', 'subscript'],
              // ['link'],
              // ['insertImage'],
              ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
              ['unorderedList', 'orderedList'],
              ['horizontalRule'],
              // ['removeformat'],
              ['fullscreen']
          ],
          autogrow: true,

      });

    </script>

<script   src="https://code.jquery.com/jquery-1.6.4.js"   integrity="sha256-VJZPi1gK15WpYvsnBmcV0yga4a0Toov4rt1diFnrrjc="   crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ URL::to('srv/js/admin/js/jquery.asmselect.js') }}"></script>

@stop