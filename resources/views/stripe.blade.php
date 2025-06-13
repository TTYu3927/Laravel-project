<!DOCTYPE html>
<html lang="en">
    <h1>Stripe</h1>
    <form method="post" class="payment" action="{{ route('stripepay') }}" id="payment-form">
        @csrf
         <input type="hidden" name="stripeToken" id="stripetokenid"><!--needtoaddhidden -->
        <div class="stripemain">
            <div class="visa-master-part">
            <h2>Credit or debit card</h2>
            <div id="card-element" class="form-control" style="border: 1px solid purple; width: 500px;"></div>
            <div id="card-errors" role="alert"></div><br>
            <button type="button" id="pay-btn" class="btn btn-block" onclick="createToken()">Pay</button>

        </div>
        </form>

        <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
        <script type="text/javascript">
            
            var stripe = Stripe('{{env('STRIPE_KEY')}}');
            
            var elements = stripe.elements();
            var cardElement =elements.create('card');
            cardElement.mount('#card-element');
            function createToken() {
                document.getElementById('pay-btn').disabled = true;
                stripe.createToken(cardElement).then(function(result){

                    if(typeof result.error != 'undefined'){
                        document.getElementById("pay-btn").disabled = false;
                        alert(result.error.message);
                    }
                    if(typeof result.token != 'undefined') {
                        document.getElementById('stripetokenid').value = result.token.id;
                        document.getElementById('payment-form').submit();
                    }
                });
            }

        </script>