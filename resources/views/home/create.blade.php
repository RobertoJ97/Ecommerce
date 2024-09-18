<!DOCTYPE html>
<html>

@include('layouts\homecss')

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('layouts.homeheader')
    <!-- end header section -->


    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->

  <div class="container pt-2 mt-2">

    <div class="row mt-2">
        <div class="col">
            <p class="" style="font-size:13px">{{ $product->category->name }}/{{ $product->name }}</p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <img class="text-left" src="{{ asset('product/'.$product->image) }}" style="width: 330px !important; height:330px;">

        </div>
        <div class="col-md-5">
         <h5 class="text-center text-primary"style="font-size:30px; font-weight:bold;">{{ $product->name }}</h5>
         <div class="border-bottom"></div>
         <div class="row">
            <div class="col">
                <p class="mt-2" style="font-size:14px; font-weight:bold;">Color</p>
            </div>
            <div class="col">
                <p class="mt-2 text-secondary" style="font-size:15px; font-weight:bold;">{{ $product->color }}</p>
            </div>
         </div>

         <div class="row">
            <div class="col">
                <p class="mt-2" style="font-size:14px; font-weight:bold;">Material</p>
            </div>
            <div class="col">
                <p class="mt-2 text-secondary" style="font-size:15px; font-weight:bold;">{{ $product->material }}</p>
            </div>
         </div>
         <div class="row">
            <div class="col">
                <p class="mt-2" style="font-size:14px; font-weight:bold;">Capacidad</p>
            </div>
            <div class="col">
                <p class="mt-2 text-secondary" style="font-size:15px; font-weight:bold;">{{ $product->capacidad }}</p>
            </div>
         </div>
         <div class="row">
            <div class="col">
                <p class="mt-2" style="font-size:14px; font-weight:bold;">Precio</p>
            </div>
            <div class="col">
                <p class="mt-2 text-left text-secondary" style="font-size:15px; font-weight:bold;">US${{ $product->price }}</p>
            </div>
         </div>
         <div class="border-bottom"></div>
         <div class="row"></div>
         <span class="mt-3" style="font-size:20px; font-weight:bold;">Sobre el articulo</span>
         <p class="mr-4" style="font-size:14px;">
            {{ $product->description }}
         </p>
        </div>
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <p class="card-title text-primary"style="font-size:23px; font-weight:bold;">US${{ $product->price }}</p>
                  <h6 class="card-subtitle mt-3 mb-2 text-body-secondary style="font-size:25px; font-weight:bold;">Envio gratis</h6>
                  <p class="card-text mt-3"style="font-size:20px; color:green;">Disponible</p>
                   <div class="row">
                        <select class="form-control" name="category_id" id="category_id">

                            <option value="1">Cantidad:1</option>

                        </select>
                   </div>
                  <div style="padding: 10px" class="text-center">
                    <a href="{{ url('stripe') }}" class="btn btn-danger">Buy Now!!</a>
                    <a href="{{ url('add_cart',$product->id) }}" class="btn btn-primary">Add to Cart</a>
                 </div>
                  <div class="border-bottom"></div>
                  <p class="card-text text-center" style="font-size:12px; font-weight:bold;">Vendido por:asdasdsadsad </p>
                  <p class="card-text text-center" style="font-size:12px; font-weight:bold;">Enviado por</p>
                  <p class="card-text text-center" style="font-size:12px; font-weight:bold;">Devoluciones</p>
                </div>
              </div>

           </div>
    </div>

  </div>

  <!-- end shop section -->





<div class="div mt-4 pt-4">
    @include('layouts.homefooter')
</div>




  <!-- end info section -->


 @include('layouts.homejs')

</body>

</html>
