<!DOCTYPE html>
<html>

@include('layouts\homecss')

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('layouts.homeheader')
    <!-- end header section -->
    @include('layouts.homeslider')

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
        @foreach ($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box">

                <div class="img-box">
                  <img src="{{ asset('product/'.$product->image) }}" alt="">
                </div>
                <div class="detail-box">
                  <h6>
                    {{ $product->name }}
                  </h6>
                </div>
                <div class="detail-box">
                    <h6>
                      <span>
                        US${{ $product->price }}
                      </span>

                    </h6>
                  </div>
                <div class="new">
                  <span>
                    {{ $count+=1 }}
                  </span>
                </div>
                <div class="border-bottom bg-primary"></div>
                 <div style="padding: 10px" class="text-center">
                    <a href="{{ url('product_details',$product->id) }}" class="btn btn-danger">Details</a>
                    <a href="{{ url('add_cart',$product->id) }}" class="btn btn-primary">Add to Cart</a>
                 </div>
            </div>
          </div>
        @endforeach


</div>
      <div class="btn-box">
        <a href="">
          View All Products
        </a>
      </div>
    </div>
  </section>

  <!-- end shop section -->








  @include('layouts.homefooter')

  <!-- end info section -->


 @include('layouts.homejs')

</body>

</html>

