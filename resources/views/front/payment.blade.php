<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Payment</title>

  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type='text/css'>

  <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type='text/css'>
  <style type="text/css">
 
    .globalContent {
      -ms-flex-positive: 1;
      flex-grow: 1;
    }

    .StripeElement {
      background-color: white;
      height: 40px;
      padding: 10px 12px;
      border-radius: 4px;
      border: 1px solid transparent;
      box-shadow: 0 1px 3px 0 #e6ebf1;
      -webkit-transition: box-shadow 150ms ease;
      transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
      box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
      border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
      background-color: #fefde5 !important;
    }
  </style>

  <script src="https://js.stripe.com/v3/"></script>

</head>
<body style="background-color: #f7f7fc">

  <div class="container">

    <div class="header-top">
        <ul class="pull-left">
            <li>
                <a href="#">Call us:   (012) 3456 7890</a>
            </li>
        </ul>
        @auth
            <ul class="pull-right">
                @if(Auth::user()->role == "admin" || Auth::user()->role == "super_admin")
                    <li>
                        <a href="{{ route('admin.index') }}">Admin Panel</a>
                    </li>
                @endif
                <li>
                    <a href="#">Wishlist</a>
                </li>
                <li>
                    <a href="#">My Cart</a>
                </li>
                <li>
                    <a href="#">Checkout</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
        @endauth

        @guest
            <ul class="pull-right">
                <li>
                    <a href="{{ route('register') }}">Register</a>
                </li>
                <li class="tz-header-login">
                    <a href="{{ route('login') }}">Login</a>
                </li>
            </ul>
        @endguest

    </div>
    
    <div class="globalContent" style="padding-top: 120px;">
      <div class="col-md-6 col-md-offset-3" style="border-radius: 4px;
      box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08); padding: 20px;">
        <div class="row">

          <form id="payment-form" method="POST" action="{{ route('payment.store') }}">

            {{ csrf_field() }}

            <div class="form-row">
              <label for="card-element">
                Credit or debit card
              </label>
              <div id="card-element">
                <!-- a Stripe Element will be inserted here. -->
              </div>

              <!-- Used to display Element errors -->
              <div id="card-errors" role="alert"></div>
            </div>

            <button class="btn btn-success col-md-4 col-xs-8 col-xs-offset-2 col-md-offset-4">Submit Payment</button>

          </form>
        </div>
      </div>
    </div>

  </div>

  <script type="text/javascript">

    var stripe = Stripe('pk_test_YSYk0yJX5qwXjDG436kxaGc7');
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    var style = {
      base: {
        color: '#32325d',
        lineHeight: '18px',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
          color: '#aab7c4'
        }
      },
      invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
      }
    };

    // Create an instance of the card Element
    var card = elements.create('card', {style: style});

    // Add an instance of the card Element into the `card-element` <div>
    card.mount('#card-element');

    card.addEventListener('change', function(event) {
      var displayError = document.getElementById('card-errors');
      if (event.error) {
        displayError.textContent = event.error.message;
      } else {
        displayError.textContent = '';
      }
    });

    // Create a token or display an error when the form is submitted.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
      event.preventDefault();

      stripe.createToken(card).then(function(result) {
        if (result.error) {
          // Inform the customer that there was an error
          var errorElement = document.getElementById('card-errors');
          errorElement.textContent = result.error.message;
        } else {
          // Send the token to your server
          stripeTokenHandler(result.token);
        }
      });
    });

    function stripeTokenHandler(token) {
      // Insert the token ID into the form so it gets submitted to the server
      var form = document.getElementById('payment-form');
      var hiddenInput = document.createElement('input');
      hiddenInput.setAttribute('type', 'hidden');
      hiddenInput.setAttribute('name', 'stripeToken');
      hiddenInput.setAttribute('value', token.id);
      form.appendChild(hiddenInput);

      // Submit the form
      form.submit();
    }
  </script>

</body>
</html>
