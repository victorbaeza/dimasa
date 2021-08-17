<div class="container">
    <form id="payment-form" action="{{route('order.do_payment.paypal')}}" method="POST">
        @csrf
        <input type="hidden" id="token" name="token">
        <input type="hidden" id="orderId" name="orderUuid" value="{{$order->uuid}}">
        <div id="paypal-button-container" class="center"></div>
    </form>
</div>

@section('paypal_scripts')

<script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_CLIENT_ID')}}&currency=EUR&disable-funding=card,venmo,bancontact,eps,giropay,ideal,mybank,sofort"></script>
<script>
    $(function(){
        paypal.Buttons({
            style: {
                layout:  'vertical',
                color:   'gold',
                shape:   'pill',
                label:   'paypal'
            },
            createOrder: function(data, actions) {
                // Esta funcion sirve para poner los detalles de la transaccion.
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: {{$order->total}},
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details){
                    if(details.status === 'COMPLETED'){
                        alert('Pago realizado correctamente');
                        // insertamos el token id en el form para pasarlo al servidor
                        let hiddenInput = $("#token");
                        hiddenInput.val(data.orderID);
                        $("#payment-form").submit();
                    }else{
                        alert('Pago no realizado');
                    }
                })
            },
            //onCancel:,
            onError: function (err) {
                alert('Error en el pago')
            }
        }).render('#paypal-button-container');
    })
</script>

@endsection
