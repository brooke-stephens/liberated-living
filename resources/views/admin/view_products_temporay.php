    {{ $images->pluck('name',$product->id) }}
  @if($image->id == $product->id)
                                  {{ $image->name }}
                                @endif


  @foreach ($products as $product)
                          <tr>
                           <th>
                              <img src="{{ URL::to('/srv/productthumbnails/'.$images->get($product->id)->name.'') }}">
                             
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


                         @foreach ($products as $product)

                          <tr>
                           <th>
                                {{$images['name']$product['id']}}
                             
                           </th>
                            <th>{{ $product['title'] }}</th>
                            <th>{{ $product['category'] }}</th>
                            <th>{{ $product['sku'] }}</th>                            
                            <th>${{ $product['price'] }}</th>
                            <th>
                             <label class="checkbox-inline"><input type="checkbox" value=""> Yes</label>
                            </th>
                            <th>
                                <a href="{{URL::to('admin/admin_single_product/'.$product['id'].'')}}"  class="btn btn-success btn-sm">Edit/View</a>
                            </th>
                            <th>
                             <button type="button" class="btn btn-danger btn-sm">Delete</button>
                           </th>
                          </tr>
                        @endforeach