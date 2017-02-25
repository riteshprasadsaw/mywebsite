<!DOCTYPE html>
<html>
<head>
    <title>Payment Checkout</title>
</head>
<body>

            

                <form id="chargeForm" method="POST" action="/purchases">
                 {{csrf_field()}}
                <input type="number" name="amount" id="custom-donation" placeholder="Enter an amount" min="1.00" step "10.00"/>
                <input type="hidden" name="stripeToken" id="stripeToken" value="">
                <input type="hidden" name ="stripeEmail" id="stripeEmail" value="">
                <button id="customButton" class="btn btn-lg"> Back this project </button>

                </form>

                <script src="https://checkout.stripe.com/checkout.js"></script>

                <script>
                    var handler = StripeCheckout.configure({
                        key:"{{config('services.stripe.key')}}",
                        //image
                        token: function(token, args) {
                            document.getElementById("stripeToken").value = token.id;
                            document.getElementById("stripeEmail").value = token.email;
                            document.getElementById("chargeForm").submit();
                        }
                    })

                    document.getElementById('customButton').addEventListener('click', function(e) {
                        handler.open({
                            name:        'My Book',
                            description: 'Testing',
                            amount:      2500,
                            currency:    'usd',
                        });
                        e.preventDefault();
                    });
                </script>

</body>
</html>