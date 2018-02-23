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
<img src="<?php echo asset('storage/public/productimages/8344fa4e08eb8500c3d9840aded5d9f7.jpg'); ?>" width="300" alt="">
<img src="<?php echo asset('storage/public/productimages/464b49b8fae20dd45f5d53b883e380fe.jpg'); ?>" width="300" alt="">
<img src="{{ URL::to('/srv/productthumbnails/test3.jpg') }}">

      
          <div class="row">
            
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Your Products</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Product Name</th>
                          <th>Category</th>
                          <th>SKU</th>
                          <th>Price</th>
                          <th>On Sale</th>
                          <th>Update</th>
                          <th>Delete</th>
                        </tr>
                      </thead>

                      <tbody>
                        
                       

                      @foreach ($products as $product)

                          <tr>
                           <th>
                              @foreach ($images as $image)
                                @if($image->product_id == $product->id)

                                  <img src="{{ URL::to('/srv/productthumbnails/'.$image->name.'') }}">
                                  
                                @endif
                              @endforeach
                              
                             
                           </th>
                            <th>{{ $product->title }}</th>
                            <th>{{ $product->category }}</th>
                            <th>{{ $product->sku }}</th>                            
                            <th>${{ $product->price }}</th>
                            <th>
                             <label class="checkbox-inline"><input type="checkbox" value=""> Yes</label>
                            </th>
                            <th>
                                <a href="{{URL::to('admin/admin_single_product/'.$product->id.'')}}"  class="btn btn-success btn-sm">Edit/View</a>
                            </th>
                            <th>
                             <button type="button" class="btn btn-danger btn-sm">Delete</button>
                           </th>
                          </tr>
                        @endforeach
                        

                     
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

		
		
</div>
<section>
<br><br>
@endsection