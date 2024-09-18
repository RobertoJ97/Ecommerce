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
                    <div class="col-lg-4">
                      <div class="block">

                        <div class="block-body text-left">
                          <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add Product</button>

                          <!-- Modal-->
                          <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header"><strong id="exampleModalLabel" class="modal-title" style="font-family:cursive;">Add Product</strong>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">

                                  <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                      <label>Product Name</label>
                                      <input type="text" placeholder="Name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type=tText" placeholder="Description" name="description" class="form-control">
                                      </div>
                                      <div class="row form-group">
                                            <div class="col">
                                                <label>Stock</label>
                                                <input type="text" placeholder="Stock" name="stock" class="form-control">
                                            </div>

                                            <div class="col">
                                                <label>Category</label>
                                      <select class="form-control" name="category_id" id="category_id">
                                        @foreach ($category as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                      </select>
                                            </div>
                                        </div>



                                      <div class="row form-group">
                                            <div class="col">
                                                <label>Price</label>
                                                <input type="text" placeholder="Price" name="price" class="form-control">
                                            </div>

                                            <div class="col">
                                                <label>Color</label>
                                                <input type="text" placeholder="Color" name="color" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col">
                                                <label>Material</label>
                                                <input type="text" placeholder="material" name="material" class="form-control">
                                            </div>

                                            <div class="col">
                                                <label>Capacidad</label>
                                                <input type="text" placeholder="Capacidad" name="capacidad" class="form-control">
                                            </div>
                                        </div>

                                    <div class="form-group">
                                      <label>Photo</label>
                                      <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                      <input type="submit" value="Add Product" class="btn btn-primary">
                                    </div>
                                  </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="border-bottom"></div>
                  <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Name</th>
                          <th class="text-center">Price</th>
                          <th class="text-center">Stock</th>
                          <th class="text-center">Category</th>
                          <th class="text-center">Photo</th>
                          <th class="text-center">Option</th>
                        </tr>
                      </thead>
                      @forelse ($products as $product)
                      <tbody>
                        <tr>
                          <th scope="row" class="text-center">{{ $product->id }}</th>
                          <td class="text-center">{{ $product->name }}</td>
                          <td class="text-center">{{ $product->price }}</td>
                          <td class="text-center">{{ $product->stock }}</td>
                          <td class="text-center">{{ $product->category->name }}</td>
                          <td>
                            <img src="{{ asset('product/'.$product->image) }}" width="50" height="50" class="rounded-circle border border-primary">
                            </td>
                          <td><form class="" action="{{ route('product.destroy',$product->id)}}" method="POST">
                                        <a href="" type="button" class="btn btn-black" data-toggle="tooltip" data-placement="top" title="Edit Product"><i class="fa-lg fa fa-edit"></i></a>
                                        <button class="btn btn-danger"  type="submit" data-toggle="tooltip" data-placement="top" title="Delete Product"><i class="fa-lg fa fa-trash"></i></button>
                                        @csrf
                                        @method('DELETE')
                                    </form></td>
                        </tr>
                    </tbody>
                      @empty

                      @endforelse

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
