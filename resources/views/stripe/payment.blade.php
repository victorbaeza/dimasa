@extends('layouts.admin.main')

@section('content')
    <form id="payment-form" method="POST" action="{{route('orders.do_create')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <label class="input-label required">Nombre tarjeta</label>
                    <input id="cardholder-name" name="cardholder-name" class="input-field payment-field is-empty" required="" placeholder="Max Muster" />
                </div>
                <div class="col-12">
                    <label class="input-label">Número tarjeta</label>
                    <div id="card-number" class="input-field">
                        <!-- A Stripe Element will be inserted here. -->
                    </div>
                </div>
                <div class="col-6">
                    <label class="input-label">Fecha vencimiento</label>
                    <div id="card-expiry" class="input-field"></div>
                </div>
                <div class="col-6">
                    <label class="input-label">Número seguridad</label>
                    <div id="card-cvc" class="input-field"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 offset-6">
                    <button tyoe="submit" class="btn-block btn btn-primary">Realizar el pago</button>
                </div>
            </div>
            <div class="row margin0">
                <div class="col-12">
                    <div id="card-errors" role="alert" class="text-danger error"></div>
                </div>
            </div>
        </div>

    </form>
@endsection

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        $(function(){
            let stripe;

            fetch('/ajax/stripe/payment', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then(result => result.json())
            .then(data => setUpElements(data))
            .then((data) => {
                let form = document.getElementById('payment-form');
                form.addEventListener('submit', function(event){
                    event.preventDefault();
                    pay(data.stripe, data.cardNumber, data.clientSecret)
                })
            });

            function setUpElements(data){
                stripe = Stripe(data.key);
                // Create references to the main form and its submit button.

                const elementStyles = {
                    base: {
                        fontWeight: 400,
                        fontFamily: 'Roboto, Serif',
                        fontSize: '13px',
                        fontSmoothing: 'antialiased'
                    },
                    empty: {
                        color: '#ddd',
                        '::placeholder': {
                            color: '#ddd'
                        }
                    },
                    invalid: {
                        color: '#fff',
                        '::placeholder': {
                            color: '#fff'
                        }
                    }
                };

                const elementClasses = {
                    focus: 'focused',
                    empty: 'empty',
                    invalid: 'invalid'
                };

                // Create an instance of Elements.
                const elements = stripe.elements({locale: '{{app()->getLocale()}}', hidePostalCode: true});

                // Create card number element
                const cardNumber = elements.create('cardNumber',
                    {
                        style: elementStyles,
                        classes: elementClasses
                    });
                cardNumber.mount('#card-number');

                const cardExpiry = elements.create('cardExpiry',
                    {
                        style: elementStyles,
                        classes: elementClasses
                    });
                cardExpiry.mount('#card-expiry');

                const cardCvc = elements.create('cardCvc',
                    {
                        style: elementStyles,
                        classes: elementClasses
                    });
                cardCvc.mount('#card-cvc');

                // Listen for errors from each Element, and show error messages in the UI.
                const savedErrors = {};
                [cardNumber, cardExpiry, cardCvc].forEach(function(element, idx) {
                    element.on('change',
                        function(event) {
                            var displayError = document.getElementById('card-errors');
                            if (event.error) {
                                displayError.classList.add('visible');
                                savedErrors[idx] = event.error.message;
                                displayError.innerText = event.error.message;
                            } else {
                                savedErrors[idx] = null;

                                // Loop over the saved errors and find the first one, if any.
                                var nextError = Object.keys(savedErrors)
                                    .sort()
                                    .reduce(function(maybeFoundError, key) {
                                            return maybeFoundError || savedErrors[key];
                                        },
                                        null);

                                if (nextError) {
                                    // Now that they've fixed the current error, show another one.
                                    displayError.innerText = nextError;
                                } else {
                                    // The user fixed the last error; no more errors.
                                    displayError.classList.remove('visible');
                                }
                            }
                        });
                });
                // Handle real-time validation errors from the card Element.
                cardNumber.addEventListener('change',
                    function(event) {
                        var displayError = document.getElementById('card-errors');
                        if (event.error) {
                            displayError.textContent = event.error.message;
                        } else {
                            displayError.textContent = '';
                        }
                    });

                return {
                    stripe: stripe,
                    cardNumber: cardNumber,
                    cardExpiry: cardExpiry,
                    cardCvc: cardCvc,
                    clientSecret: data.clientSecret
                }
            }

            function pay(stripe, card, clientSecret){
                stripe.confirmCardPayment(clientSecret, {payment_method: {card: card}})
                .then((result) => {
                    if(result.error){
                        //mostrar error
                    }else{
                        //redirigir a compra exitosa pagina
                        orderComplete(clientSecret);
                        document.getElementById('payment-form').submit();
                    }
                }).catch((err) => {
                    console.log(err);
                })
            }

            //Post pago
            function orderComplete(clientSecret){
                stripe.retrievePaymentIntent(clientSecret).then((result) => {
                        var paymentIntent = result.paymentIntent;

                        console.log(paymentIntent);
                })
            }
        })
    </script>
@endsection
