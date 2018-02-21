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

          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Add Product</h4>
                </div>
                <form action="{{ Route('admin.add.product') }}" method="POST" id="upload" name="add_product" enctype="multipart/form-data">
                <div class="card-body">
                  <p>Enter the product information below.</p>
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

						<!-- <div id="dropzone">
							<br><br>
							Drop files here
						</div> -->

						
						<div id="previews">
							 
							<!-- <img src="http://lorempixel.com/40/40" alt="">
		                    <a href="#" id="remove-image" class="btn btn-danger">Remove</a> -->


		                  
						</div>
						

                    </div>

                    <div class="form-group">       
                      <label>Price</label>
                      <input type="text" placeholder="Product Price" name="price" class="form-control" value="{{ old('price') }}">
                    </div>
                    <div class="form-group">       
                      <label>Quantity</label>
                      <input type="text" placeholder="Quantity" name="quantity" class="form-control" value="{{ old('quantity') }}">
                    </div>
                    <div class="form-group">       
                      <input type="submit" value="Add Product" class="btn btn-primary">
                    </div>

                    {{ csrf_field() }}
                   
                  </form>

                </div>
              </div>
            </div>
        </div>
    </div>

		
		

<section>
<br><br>
@endsection