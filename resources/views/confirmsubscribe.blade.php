@php
 $nombre_client = Session::get('name');
 $last_name = Session::get('last_name');
 $number_identication = Session::get('number_identication');
 $date_of_birth = Session::get('date_of_birth');
 $email = Session::get('email');
 $num_phone = Session::get('num_phone');
 $department = Session::get('department');
 $city = Session::get('city');
 $address = Session::get('address');
 $neighborhood = Session::get('neighborhood');
 $plane = Session::get('plane');
 $slug = Session::get('slug');


 @endphp
<x-main-layout>
<!-- title -->
@section('title')Subscribirme @endsection

<x-slot name="css">
    <link href="{{ asset('css/stylesfront.css') }}" rel="stylesheet">
</x-slot>
{{-- <div class="alert alert-danger" id="paymentErrors" role="alert">
    A simple danger alert—check it out!
  </div> --}}
<section class="pricing1 counter1__bg-01">
    <div class="content_box_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="title2 mb-60 text-center">
                        <h2>Subscripción</h2>
                    </div>
                </div>
            </div>
            <!-------------------BLOQUE QUE CONTIENE LOS FORMULARIOS PASO A PASO PARA REALIZAR SUBSCRIPCIÓN------------------->
            <form action="{{ route('front.store') }}" method="post" id="paymentForm">
              @csrf
                @foreach ($paymenplatfor as $item)
                    <input type="hidden" name="payment_platform" value="{{$item->id}}">
                @endforeach
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
                    <div class="col-sm-6">
                        <input class="form-control" type="text" data-checkout="cardholderName" placeholder="Tu nombre" value="{{ $nombre_client }}">
                    </div>
                    <div class="col-sm-6">
                        <input class="form-control" type="email" data-checkout="cardholderEmail" placeholder="email@example.com" name="email" value="{{ $email }}">
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
                        <small class="form-text text-danger" id="paymentErrors" role="alert"></small>
                    </div>
                </div>
                <div class="row">
                  <div class="col clearfix mt-2 mb-2">
                      <button onClick="history.go(-1);" class="btn3 float-left">REGRESAR</button>
                      <button type="submit" class="btn2 float-right">SUSCRIBIRME<i class="icofont-rounded-double-right"></i></button>
                      {{-- <a mp-mode="dftl" href="https://www.mercadopago.com.co/subscriptions/checkout?preapproval_plan_id=2c938084818a646a01818c274ed50099" name="MP-payButton" class='blue-ar-l-rn-none'>Suscribirme</a> --}}
          
                  </div>
                 
                  
                  
              </div>

                <input type="hidden" id="cardNetwork" name="card_network">
                <input type="hidden" id="cardToken" name="card_token">

            </form>
            {{-- <div class="cho-container">

            </div> --}}
            {{-- <a mp-mode="dftl" href="https://www.mercadopago.com.co/subscriptions/checkout?preapproval_plan_id=2c938084818a646a01818c274ed50099" name="MP-payButton" class='blue-ar-l-rn-none'>Suscribirme</a> --}}
        </div>
    </div>
</section>
 
 <x-slot name="js">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script> --}}
  
{{-- <script src="https://sdk.mercadopago.com/js/v2"></script>

<script>
  // Agrega credenciales de SDK
  const mp = new MercadoPago("{{config('services.mercadopago.secret')}}", {
    locale: "es-CO",
    advancedFraudPrevention: true,
  });

  // Inicializa el checkout
  mp.checkout({
    preference: {
      id: "{{ $preference->id}}",
    },
    render: {
      container: ".cho-container", // Indica el nombre de la clase donde se mostrará el botón de pago
      label: "Pagar", // Cambia el texto del botón de pago (opcional)
    },
  });
</script> --}}
<script>
    const mercadoPago = window.Mercadopago;
    mercadoPago.setPublishableKey('{{ config('services.mercadopago.key') }}');
    mercadoPago.getIdentificationTypes();
</script>

<script>
    function setCardNetwork()
    {
        const cardNumber = document.getElementById("cardNumber");
        mercadoPago.getPaymentMethod(
            { "bin": cardNumber.value.substring(0,6) },
            function(status, response) {
                const cardNetwork = document.getElementById("cardNetwork");
                //console.log(response.id);
                cardNetwork.value = response.id;
            }
        );
    }
</script>

<script>
    const mercadoPagoForm = document.getElementById("paymentForm");
    mercadoPagoForm.addEventListener('submit', function(e) {
        if (mercadoPagoForm.elements.payment_platform.value === "{{ $item->id }}") {
            e.preventDefault();
            mercadoPago.createToken(mercadoPagoForm, function(status, response) {
                if (status != 200 && status != 201) {
                    const errors = document.getElementById("paymentErrors");
                    errors.textContent = response.cause[0].description;
                } else {
                    const cardToken = document.getElementById("cardToken");
                    setCardNetwork();
                    cardToken.value = response.id;
                        mercadoPagoForm.submit();
                }
            });
        }
    });
</script>
{{--     <script type="text/javascript">
      (function() {
         function $MPC_load() {
            window.$MPC_loaded !== true && (function() {
            var s = document.createElement("script");
            s.type = "text/javascript";
            s.async = true;
            s.src = document.location.protocol + "//secure.mlstatic.com/mptools/render.js";
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
            window.$MPC_loaded = true;
         })();
      }
      window.$MPC_loaded !== true ? (window.attachEvent ? window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;
      })();
   </script> --}}
    <script>
       
           //form of register of user
   $('#quickForm').validate({
        rules: {
            name: {
            required: true,
          },
          last_name: {
            required: true,
          },
          number_identication: {
            required: true,
            minlength:7
          },
          date_of_birth: {
            required: true,
          },
          email: {
            required: true,
            email: true,
          },
          num_phone: {
            required: true,
            minlength:7
          },
          department: {
            required: true,
          },
          city: {
            required: true,
          },
          address: {
            required: true,
          },
          neighborhood: {
            required: true,
          },
          plane: {
            required: true,
          },
          
          
        },
        messages: {
            name: {
            required: "Por favor ingrese el nombre",
          },
          last_name: {
            required: "Por favor ingrese el apellido",
          },
          number_identication: {
            required: "Por favor ingrese el número de identificación",
            minlength: "Ingrese un número válido",
          },
          date_of_birth: {
            required: "Seleccione la fecha de nacimiento",
          },
          email: {
            required: "Por favor ingrese un Correo Electrónico",
            email: "Ingrese una dirección de correo válida",
          },
          num_phone: {
            required: "Por favor ingrese un Número de Teléfono o Celular",
            minlength: "Ingrese un número válido",
          },
          department: {
            required: "Ingrese el nombre del Departamento",
          },
          city: {
            required: "Por favor ingrese la ciudad de residencia",
          },
          address: {
            required: "Por favor ingrese la dirección de residencia",
          },
          neighborhood: {
            required: "Por favor ingrese el barrio",
          },
          plane: {
            required: "Por favor seleccione un plan",
          },
          
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
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
            // agregar data
            $('#quickForm').on('submit', function(e) {
            event.preventDefault();
            var $thisForm = $('#quickForm');
                var formData = new FormData(this);

                //ruta
                var url = "{{route('front.finis_subscribe')}}";

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    type: "post",
                    encoding:"UTF-8",
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType:'json',
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
                }).done(function(respuesta){
                    //console.log(respuesta);
                   if (!respuesta.error) {

                      Swal.fire({
                            title: respuesta.mensaje,
                            icon: 'success',
                            button: true,
                            timer: 2000
                        });

                    } else {
                        setTimeout(function(){
                          Swal.fire({
                                title: respuesta.mensaje,
                                icon: "error",
                                button: false,
                                timer: 4000
                            });
                        },2000);
                    } 
                }).fail(function(resp){
                    console.log(resp);
                });
              });
        }
      });
    </script>
</x-slot>

</x-main-layout>
