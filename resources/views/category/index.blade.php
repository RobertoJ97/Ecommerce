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
        <div class="container text-center">
            <div class="m-4 p-4">
                <div class="block margin-bottom-sm">
                    <div class="col-lg-4">
                      <div class="block">

                        <div class="block-body text-left">

                            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add Product Category</button>

                            <!-- Modal-->
                            <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                              <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                    <div class="div text-center mt-3">
                                        <img src="{{ asset('images/product.jpg') }}" width="160" height="160" class="rounded-circle border border-primary">
                                    </div>
                                    <div class="div border-bottom mt-4"></div>
                                  <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Add Product Category</strong>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                  </div>
                                  <div class="modal-body">

                                    <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                                            @csrf
                                      <div class="form-group">
                                        <label>Product Category Name</label>
                                        <input type="text" placeholder="Name" name="name" class="form-control">
                                      </div>
                                        <div class="form-group">
                                            <input type="submit" value="Add Category Product" class="btn btn-primary">
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
                            <th class="text-center">Option</th>
                            </tr>

                        </thead>
                            @forelse ($categories as $category)
                            <tbody>
                                <tr>
                                <th class="text-center" scope="row">{{ $category->id }}</th>
                                <td class="text-center">{{ $category->name }}</td>
                                <td class="text-center">
                                    <form class="" action="{{ route('category.destroy',$category->id) }}" method="POST">
                                        <a href="" type="button" class="btn btn-black" data-toggle="tooltip" data-placement="top" title="Edit Product Category"><i class="fa-lg fa fa-edit"></i></a>
                                        <button class="btn btn-danger"  type="submit" data-toggle="tooltip" data-placement="top" title="Delete Product Category"><i class="fa-lg fa fa-trash"></i></button>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                </tr>
                            </tbody>
                        @empty
                        <p>No Data</p>
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
