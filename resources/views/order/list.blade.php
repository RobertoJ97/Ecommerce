<!DOCTYPE html>
<html>
  <head>
    @include('layouts.css')

  </head>
  <body>
    @include('layouts.header')
    <div class="d-flex align-items-stretch">
      @include('layouts.sidebar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
        <div class="container">
            <div class="col-lg-12">
                <div class="block margin-bottom-sm">

                  <div class="table-responsive">
                    <table  id="myTable" class="table table-striped">
                      <thead>
                        <tr>

                          <th class="text-center">Constumer Name</th>
                          <th class="text-center">Address</th>
                          <th class="text-center">Email</th>
                          <th class="text-center">Product</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Option</th>
                        </tr>
                      </thead>
                      @foreach($orders as $order)
                      <tbody>
                        <tr>
                          <th scope="row" class="text-center">{{ $order->name }}</th>
                          <td class="text-center">{{ $order->rec_address }}</td>
                          <td class="text-center">{{ $order->email }}</td>

                          <td class="text-center">{{ $order->product->name }}</td>


                          <td class="text-center">
                                @if($order->status=='Delivered')
                                    <span class="text-success" >{{ $order->status }}</span>

                                @elseif ($order->status=='On the way')
                                <span class="text-warning" >{{ $order->status }}</span>

                                @endif
                            </td>
                            <td>

                                <a href="{{ url('on_way/'.$order->id) }}" type="button" class="btn btn-black" data-toggle="tooltip" data-placement="top" title="On the Way"><i class="text-warning fa-lg fa-solid fa fa-road"></i></a>
                                <a href="{{ url('delivered/'.$order->id) }}" type="button" class="btn btn-black" data-toggle="tooltip" data-placement="top" title="Delivered"><i class="text-success fa-lg fa-solid fa fa-truck"></i></a>
                                <a href="{{ url('pdf/'.$order->id) }}" type="button" class="btn btn-black" data-toggle="tooltip" data-placement="top" title="Print PDF"><i class="fa-lg fa-solid fa fa-download"></i></a>

                            </td>
                        </tr>
                    </tbody>
                      @endforeach



                    </table>
                  </div>
                </div>
              </div>
        </div>
        @include('layouts.footer')
      </div>
    </div>
    @include('layouts.js')



  </body>
</html>
