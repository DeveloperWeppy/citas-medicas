<label class="mt-3">Detalles de la Tarjeta:</label>

<div class="form-group form-row">
    <div class="col-sm-5">
        <input class="form-control" type="text" id="cardNumber" data-checkout="cardNumber" placeholder="Card Number">
    </div>

    <div class="col-sm-2">
        <input class="form-control" type="text" data-checkout="securityCode" placeholder="CVC">
    </div>

    <div class="col-1"></div>

    <div class="col-sm-2">
        <input class="form-control" type="text" data-checkout="cardExpirationMonth" placeholder="MM">
    </div>

    <div class="col-sm-2">
        <input class="form-control" type="text" data-checkout="cardExpirationYear" placeholder="YY">
    </div>
</div>



<div class="form-group form-row">
    <div class="col-5">
        <input class="form-control" type="text" data-checkout="cardholderName" placeholder="Tu nombre" value="{{ $nombre_client }}">
    </div>
    <div class="col-5">
        <input class="form-control" type="email" data-checkout="cardholderEmail" placeholder="email@example.com" name="email">
    </div>
</div>


<div class="form-group form-row">
    <div class="col-2">
        <select class="custom-select" data-checkout="docType"></select>
    </div>
    <div class="col-3">
        <input class="form-control" type="text" data-checkout="docNumber" placeholder="Document">
    </div>
</div>

<div class="form-group form-row">
    <div class="col">
        <small class="form-text text-mute"  role="alert" >Your payment will be converted to {{ strtoupper(config('services.mercadopago.base_currency')) }}</small>
    </div>
</div>

<div class="form-group form-row">
    <div class="col">
        <small class="form-text text-danger" id="paymentErrors" role="alert"></small>
    </div>
</div>

<input type="hidden" id="cardNetwork" name="card_network">
<input type="hidden" id="cardToken" name="card_token">