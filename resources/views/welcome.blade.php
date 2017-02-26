<!DOCTYPE html>
<html>
<head>
    <title>Payment Checkout</title>

    <script>
        
    var Laravel={

        csrfToken:"{{csrf_token()}}",
        stripeKey:"{{config('services.stripe.key')}}"

    };

    </script>
</head>
<body>

            
                 
               <div id="app"> 
                <checkout-form :plans="{{ $plans }}"></checkout-form>
                </div>

                <script src="https://checkout.stripe.com/checkout.js"></script>
                <script src="/js/app.js"></script>


</body>
</html>