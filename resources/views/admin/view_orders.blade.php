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
                  <h4>Orders</h4>
                  {!! $orders->render(new \Illuminate\Pagination\BootstrapFourPresenter($orders)) !!}
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Satus</th>
                          <th>Order #</th>
                          <th>Items</th>
                          <th>User</th>
                          <th>Total</th>
                          <th>Date</th>
                          <th>View/Edit</th>
                        </tr>
                      </thead>
                      <tbody>  
                        @foreach ($orders as $order)
                        <tr>
                           <?php 
                            switch ($order->Status->id) {
                              case 1: // orderpending
                                $badge = 'info';
                                break;
                              case 2: // Processing
                                $badge = 'success'; 
                                break;
                              case 3: // Completed
                                $badge = 'primary'; 
                                break;
                              case 4: //Cancelled
                                $badge = 'secondary'; 
                                break;
                               case 5: // Error
                                $badge = 'danger'; 
                                break;
                              case 6: // On Hold
                                $badge = 'warning'; 
                                break;
                              case 7: //Refunded
                                $badge = 'secondary'; 
                                break;                                       
                              default:
                                $badge = 'primary';
                                break;
                            }
                          ?>
                          <th><span class="badge badge-{{$badge}}" style="font-size: 13px;">{{ $order->Status->name }}</span></th>
                          <th>{{ $order->id }}</th>
                          <th>{{ $order->cart->totalQty }}</th>
                          <th>{{ $order->User->email ? $order->User->email : $order->firstname }}</th>
                          <th>{{ $order->cart->subTotal }}</th>
                          <th>{{ $order->created_at->format('F j, Y') }}</th>
                          <th><a href="{{URL::to('admin/admin_single_order/'.$order->id.'')}}"  class="btn btn-info btn-sm">Edit/View</a></th>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>


                  </div>
                </div>
              </div> <!-- end card -->
            </div>
          </div>


 {!! $orders->render(new \Illuminate\Pagination\BootstrapFourPresenter($orders)) !!}

</div>
<section>

@endsection

