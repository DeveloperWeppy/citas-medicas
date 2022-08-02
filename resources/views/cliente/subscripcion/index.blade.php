@php
     function convertirVa($monto){
        $valor = number_format($monto, 2, ',', '.');
        return $valor;
    }
@endphp
@extends('adminlte::page')
@section('title', 'Suscripción a un Plan')

<!--integrar plugins necesarios-->
@section('plugins.jqueryValidation', true)
@section('content_header')
@section('plugins.Sweetalert2', true)
@stop

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"
      integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://sdk.mercadopago.com/js/v2"></script>
  <script>
      const mp = new MercadoPago("{{env('API_MECADOPAGO_PUBLIC_KEY')}}");
 </script>
<div id="container-select_plan" style="display:flex;justify-content: center;align-items: center;padding-top:80px">
  <div>
        <h4 style="text-align:center;font-weight: bold;">Seleccionar Plan</h4>

         @foreach ($plans as $index => $item)
        <div class="card border-info mb-3 col-7" style="max-width: 18rem;margin-top:50px">
                          <div class="card-body text-primary">
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="form-group clearfix">
                                          <div class="icheck-info d-inline">
                                              <input type="radio" name="plane" id="{{$item->id}}" value="{{$item->id}}"  data='{"name":"{{$item->name}}","type":"{{$item->type_plan}}","price":"{{number_format($item->price, 2, ',', '.')}}","slug":"{{$item->slug}}"}' required="">
                                              <label for="{{$item->id}}" style="font-weight: normal;color: #666;font-size: 15px !important;font-family:'Poppins', sans-serif !important;">{{$item->name}}</label>
                                          </div>
                                      </div>

                                  </div>
                                  <div class="col-sm-6">
                                      <h6 style="color: #666;font-weight: 600;">$ {{number_format($item->price, 2, ',', '.')}} / Mensual</h6>
                                  </div>
                              </div>
                            </div>
                        </div>

        @endforeach

        <div style="display: flex;justify-content: center;">
          <button type="submit" class="btn2 float-right btnContinuar">CONTINUAR<i class="icofont-rounded-double-right"></i></button>
        </div>
    </form>

  </div>
</div>
<div id="container-pagar" style="display:none">
  <div class="container ">
       <div class="row"  style="padding-top:20px;padding-bottom:20px">
         <div class=" col-4"  style="display: flex;align-items: center;">
            <img class="img-fluid" src="{{ asset('images/logo-mercado-pago.webp')}}" alt="logo banca">
         </div>

           <div class=" col-8" style="display: flex;align-items: center;">
              <h4 style="font-weight: normal;">Hola <span style="font-weight: bold;">{{$user->name}}</span> Tu pago sera Procesado Por <span style="font-weight: bold;">Mercado Pago</span> , además la compra estará protegida.</h4>
           </div>
       </div>

  </div>
   <div class="content_box_100">
        <div class="container">
            <form id="form-checkout" class=" row ">
              <div class="mb-30 col-lg-6 row" style="padding-top:30px;padding-bottom:25px;background: white;padding-left:20px;padding-right:20px">
                  <h5 class="col-lg-12" style="text-align:center;padding-bottom:20px;font-weight: bold;">Completa los datos de tu tarjeta</h5>
                   <div class="form-group col-sm-6">
                         <label style="font-weight:normal;">Número de tarjeta</label>
                         <div id="form-checkout__cardNumber-container" name ="cardNumber" class="container2"></div>
                    </div>
                    <div class="form-group col-sm-6">
                          <label style="font-weight:normal;">Vencimiento</label>
                          <div id="form-checkout__expirationDate-container" class="container2"></div>
                     </div>
                     <div class="form-group col-sm-6">
                           <label style="font-weight:normal;">Nombre del titular</label>
                           <input type="text" name="cardholderName" id="form-checkout__cardholderName"  class="container3" />
                      </div>
                      <div class="form-group col-sm-6 ">
                            <label style="font-weight:normal;">Codigo de seguridad</label>
                            <div id="form-checkout__securityCode-container" class="container2"></div>
                     </div>
                     <div class="form-group col-sm-6 ">
                           <label style="font-weight:normal;">Banco Emisor</label>
                           <select name="issuer" id="form-checkout__issuer"  class="container3"></select>
                    </div>
                     <div class="form-group  col-sm-6">
                           <label style="font-weight:normal;">Tipo documento</label>
                           <select name="identificationType" id="form-checkout__identificationType"  class="container3"></select>
                    </div>
                    <div class="form-group  col-sm-6">
                          <labelstyle="font-weight:normal;" >Numero de Documento</label>
                          <input type="text" name="identificationNumber" id="form-checkout__identificationNumber" class="container3"/>
                   </div>
                   <div class="form-group  col-sm-6" style="display:none">
                         <label style="font-weight:normal;">Cuotas</label>
                         <select name="installments" id="form-checkout__installments" class="container3"  class="container3" ></select>
                  </div>
                  <div class="form-group  col-sm-6" style="display:none">
                        <label style="font-weight:normal;">Email</label>
                        <input type="email" name="cardholderEmail" value="{{$user->email}}" id="form-checkout__cardholderEmail"  class="container3"/>
                 </div>
                 <div class="form-group  col-sm-12"><label style="display: flex;align-items: baseline;font-weight:normal;"  ><input type="checkbox" name="terminosMercadoPago" value="1" id="terminosMercadoPago" class="andes-checkbox__input" style="margin-top: 3px;margin-right: 6px;margin-left: 11px;"><span class="andes-checkbox__label andes-checkbox__label-text"><div>Acepto los <a href="https://www.mercadopago.com.co/ayuda/194" target="_blank">Términos y condiciones</a> y autorizo el uso de mis datos de acuerdo a la <a href="https://www.mercadopago.com.co/privacidad" target="_blank">Declaración de Privacidad</a><a>.</a></div></span></label></div>
              </div>
              <div class="mb-30 col-lg-6 row " style="justify-content: center;padding: 0;" >
                      <div class=" mb-30 col-lg-8" style="padding-top:30px;height: fit-content;padding-bottom: 40px;background: white;padding-left:20px;padding-right:20px">
                         <h5 class="col-lg-12" style="text-align:center;height:50px;font-weight: bold">Detalle de tu suscripción</h5>
                         <div class="row">
                               <span class="col-lg-6" id="form-plan-name"></span><span class="col-lg-6" style="text-align: center;" id="form-plan-price"> $ </span>
                               <hr class="col-lg-11">
                               <span class="col-lg-6" id="form-plan-type">Total </span><span class="col-lg-6" style="text-align: center;" id="form-plan-total"> $ </span>
                         </div>

                      </div>
                      <img class="img-fluid" src="{{ asset('images/visa-mastercard-amex.webp')}}" alt="logo banca">
              </div>
              <div class="mb-30 col-lg-6"  style="padding:0px;">
                 <button type="submit" id="form-checkout__submit" class="btn btn-primary" style="float:right;width:100px;margin-top:30px">Pagar</button>
                 <progress value="0" class="progress-bar" style="display:none">Cargando...</progress>
               </div>

            </form>
        </div>
   </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('/vendor/adminlte/dist/css/adminlte.css') }}">
@stop

@section('js')
    <script>

    var planslug="";
    $( ".btnContinuar" ).click(function() {
      var urlPago="";
      if($('input:radio[name=plane]:checked').is(':checked')){
         $("#container-select_plan").hide();
         $("#container-pagar").show();
         var plan=$('input:radio[name=plane]:checked').attr("data");
         plan=JSON.parse(plan);
         $("#form-plan-price").html("$ "+plan.price);
         $("#form-plan-name").html(plan.name);
         $("#form-plan-type").html("Total "+plan.type);
         $("#form-plan-total").html("$ "+plan.price);
         planslug=plan.slug;
         //window.location.href ="{{route('subscription.index',['id'=>'/'])}}"+"/"+$('input:radio[name=plane]:checked').val();
      }else{
        alert("Seleciona un plan");
      }
    });
    var validate_form=0;
    $("#form-checkout").validate({
    rules: {
      cardNumber: {
        required: true,
      },
      expirationDate: {
        required: true,
      },
      cardholderName: {
        required: true,
      },
      securityCode: {
        required: true,
      },
      identificationNumber:{
        required: true,
      },
      terminosMercadoPago:{
        required: true,
      },

    },
    messages: {
      cardNumber: "Por favor ingrese numero de tarjeta",
      expirationDate: "Por favor ingrese fecha vencimiento",
      cardholderName: "Por favor ingrese Titular de la tarjeta",
      securityCode: "Por favor ingrese Código de seguridad",
      identificationNumber: "Por favor ingrese Número de documento",
      terminosMercadoPago: "Por favor Acepta los terminos del servicio",
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      validate_form=0;
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    },
    submitHandler: function(form){
     validate_form=1;
    }
  });


  const cardForm = mp.cardForm({
    amount: '100.5',
    iframe: true,
    form: {
      id: 'form-checkout',
      cardholderName: {
        id: 'form-checkout__cardholderName',
        placeholder: "Titular de la tarjeta",
      },
      cardholderEmail: {
        id: 'form-checkout__cardholderEmail',
        placeholder: 'E-mail'
      },
      cardNumber: {
        id: 'form-checkout__cardNumber-container',
        placeholder: 'Número de la tarjeta',
      },
      securityCode: {
        id: 'form-checkout__securityCode-container',
        placeholder: 'Código de seguridad'
      },
      installments: {
        id: 'form-checkout__installments',
        placeholder: 'Cuotas'
      },
      expirationDate: {
        id: 'form-checkout__expirationDate-container',
        placeholder: 'Fecha de vencimiento (MM/AA)',
      },
      identificationType: {
        id: 'form-checkout__identificationType',
        placeholder: 'Tipo de documento'
      },
      identificationNumber: {
        id: 'form-checkout__identificationNumber',
        placeholder: 'Número de documento'
      },
      issuer: {
        id: 'form-checkout__issuer',
        placeholder: 'Banco emisor'
      }
    },
    callbacks: {
      onFormMounted: function (error) {
        if (error) return console.log('Callback para tratar o erro: montando o cardForm ', error)
      },
      onSubmit: function (event) {
         event.preventDefault();
        const {
          paymentMethodId: payment_method_id,
          issuerId: issuer_id,
          cardholderEmail: email,
          amount,
          token,
          installments,
          identificationNumber,
          identificationType
        } = cardForm.getCardFormData();
        if(validate_form==1){
              alert(1);
              cardForm.createCardToken();
              $.ajax({
                method: "POST",
                dataType: 'json',
                url:"{{route('subscription.validar')}}",
                data:{
                    "preapproval_plan_id": planslug,
                    "email":$("#form-checkout__cardholderEmail").val(),
                    "name":$("#form-checkout__cardholderName").val(),
                    "card_token_id": cardForm.getCardFormData().token,
                    "_token": "{{ csrf_token() }}",
                  },
                  beforeSend:function(){
                      Swal.fire({
                            title: 'Validando datos, espere por favor...',
                            button: false,
                            timer: 3000,
                            timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading()
                                },
                        });
                 }
              }).done(function( respuesta ) {
                      if (!respuesta.error) {
                         Swal.fire({
                               title: 'Tu Pago fue procesado exitosamente',
                               icon: 'success',
                               button: true,
                               timer: 2000
                           });

                           setTimeout(function(){
                            location.href = "{{route('subscription.suscripcion_exitosa')}}";
                           },2000);

                       } else {
                           setTimeout(function(){
                             Swal.fire({
                                   title: JSON.stringify(respuesta.mensaje),
                                   icon: "error",
                                   button: false,
                                   timer: 4000
                               });
                           },2000);
                           //location.href = "{{route('usuarios.index')}}";
                       }
              }).fail(function( jqXHR ) {
                   alert(jqXHR.responseText);
                   setTimeout(function(){
                      Swal.fire({
                            title: jqXHR.responseJSON.message,
                            icon: "error",
                            button: false,
                            timer: 4000
                        });
                    },2000);
             });
        }
      },
      onFetching: function (resource) {
        console.log('fetching... ', resource)
        const progressBar = document.querySelector('.progress-bar')
        progressBar.removeAttribute('value')

        return () => {
          progressBar.setAttribute('value', '0')
        }
      }
    }
  });
  </script>
@stop
