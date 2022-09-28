@extends("layouts.master")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-md-6">
                <div class="card alert alert-secondary">
                    @php $total = 0 @endphp
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif

                    <br>
                    <h1 class="h3 mb-2 text-gray-800 text-center font-italic text-uppercase">Payment</h1>
                    <div class="display-td" >                            
                        <img src="{{ asset('assets/images/visa.png') }}" alt="" style="width: 10%;">
                        <img src="{{ asset('assets/images/mastercard.png') }}" style="width: 10%;">
                        <img src="{{ asset('assets/images/aba.png') }}" style="width: 6%;">
                    </div>
                    <hr>
                    <div class="card-body">
                    <form 
                            role="form" 
                            action="{{ route('stripe-detail') }}" 
                            method="" 
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                        @csrf
                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Name on Card</label> 
                                    <input class="form-control @error('name') is-invalid @enderror" size='4' type='text' name="name">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Card Number</label> 
                                    <input autocomplete='off' class="form-control card-number @error('number') is-invalid @enderror" size='20' type='text' name="number">
                                    @error('number')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('number') }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label> 
                                    <input autocomplete='off' class="form-control card-cvc @error('cvc') is-invalid @enderror" placeholder='ex. 311' size='4' type='text' name="cvc">
                                    @error('cvc')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('cvc') }}
                                    </div>
                                    @enderror
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label> 
                                    <input class="form-control card-expiry-month @error('month') is-invalid @enderror" placeholder='MM' size='2' type='text' name="month">
                                    @error('month')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('month') }}
                                    </div>
                                    @enderror
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label> 
                                    <input class="form-control card-expiry-year @error('year') is-invalid @enderror" placeholder='YYYY' size='4' type='text' name="year">
                                    @error('year')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('year') }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay (${{$total}})</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
        
    </div>

 


@endsection


<!-- <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
   
    var $form         = $(".require-validation");
   
    $('form.require-validation').bind('submit', function(e) {
       var $form = $(".require-validation"),
                inputSelector = ['input[type=text]'].join(', '),
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
</script> -->




<!-- https://onlinewebtutorblog.com/stripe-payment-gateway-integration-in-laravel-8/ -->


