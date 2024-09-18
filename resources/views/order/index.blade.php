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
                <h4 style="font-weight: bold;">CheckOut</h4>
            </div>
        </div>
    </div>
     <div class="container">
        <div class="card mt-3 text-center" style="width: 40%%;">

            <div class="card-body">
                @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
                <form method="POST" action="{{ route('order.pay') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-group">
                        <div class="col">
                            <label class="text-left">Name</label>
                            <input type="text" placeholder="Name" name="name"  class="form-control" value="{{ Auth::user()->name }}">
                        </div>

                        <div class="col">
                            <label>Address</label>
                            <input type="text" placeholder="Address"  name="rec_address" class="form-control" value="{{ Auth::user()->address }}">
                        </div>
                    </div>
                        <div class="row form-group">
                            <div class="col">
                                <label>Email Address</label>
                                <input type="email" placeholder="Email Address"  name="email" class="form-control" value="{{ Auth::user()->email }}">
                            </div>

                            <div class="col">
                                <label>Phone Number</label>
                                <input type="text" placeholder="Phone Number" name="phone"   class="form-control" value="{{ Auth::user()->name }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary text-center" type="submit">Confirm Order Information</button>
                            </div>
                        </div>
                    </form>



            </div>
          </div>
     </div>


    <div class="div mt-4 pt-4">
        @include('layouts.homefooter')
    </div>

    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">

        $(function() {

            /*------------------------------------------
            --------------------------------------------
            Stripe Payment Code
            --------------------------------------------
            --------------------------------------------*/

            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                                 'input[type=text]', 'input[type=file]',
                                 'textarea'].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                  var $input = $(el);
                  if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                  }
                });

                if (!$form.data('cc-on-file')) {
                  e.preventDefault();
                  Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                  Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                  }, stripeResponseHandler);
                }

            });

            /*------------------------------------------
            --------------------------------------------
            Stripe Response Handler
            --------------------------------------------
            --------------------------------------------*/
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
        </script>
</body>
</html>
