<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts\homecss')
</head>
<body>
    @include('layouts.homeheader')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col border-bottom">
                <h4 style="font-weight: bold;">Tu Carrito</h4>
            </div>

        </div>
    </div>
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class=" text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <?php
                    $amount=0;
                    ?>
                    @foreach ($carts as $cart)


                        <tbody class="align-middle">
                            <tr>
                                <td class="align-left" style="font-weight: bold;"><img class="text-left" src="{{ asset('product/'.$cart->product->image) }}" alt="" style="width: 35px;">    {{ $cart->product->name}}</td>
                                <td class="align-left">${{ $cart->product->price}}</td>
                                <td class="align-left">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm  text-center" value="1">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                            </tr>
                        </tbody>

                        <?php
                            $amount=$amount+$cart->product->price;
                         ?>


                    @endforeach
                </table>
            </div>

            <div class="col-lg-4">

                <div class="card border-secondary mb-5">
                    <div class="card-header  border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">${{ $amount }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">0</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">${{ $amount }}</h5>
                        </div>
                        <div class="text-center">
                            <a href="{{ url('stripe',$amount) }}" class="btn btn-success my-3 py-3 text-white">Proceed To Payment</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="div mt-4 pt-4">
        @include('layouts.homefooter')
    </div>



</body>
</html>
