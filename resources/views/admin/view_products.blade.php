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





      
          <div class="row">

            
            <div class="col-lg-12">

              <div class="card">
                <div class="card-header">
                  <h4>Your Products (Ordered by {{$columnname}})</h4>
                  <br>{!! $products->render(new \Illuminate\Pagination\BootstrapFourPresenter($products)) !!}
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th><a href="{{ route('admin.view.products',['columnname'=>'title','sortmethod' => $sortmethod]) }}">Product Name</a></th>
                          <th><a href="{{ route('admin.view.products',['columnname'=>'category','sortmethod' => $sortmethod]) }}">Category</a></th>
                          <th><a href="{{ route('admin.view.products',['columnname'=>'sku','sortmethod' => $sortmethod]) }}">SKU</a></th>
                          <th><a href="{{ route('admin.view.products',['columnname'=>'price','sortmethod' => $sortmethod]) }}">Price</a></th>
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
                             <button type="button" id="{{ $product->id }}" class="btn btn-danger btn-sm delete">Delete</button>
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


{!! $products->render(new \Illuminate\Pagination\BootstrapFourPresenter($products)) !!}



<div id="ajaxresults">
</div>

</div>
<section>
<br><br>
@endsection

