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
                        <h2>SUSCRIBIRME</h2>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <img src="{{ asset('asset/img/LOGOFLECHA.png')}}" alt="logo banca" class="img-fluid">
              </div>
            </div>
            <div class="row">
              <input type="hidden" name="" id="plan_recibed" value="{{$plane}}">
              <div class="col-sm-12">
                <label for="" id="">Para finalizar tu proceso, da clic en el botón de suscribirme y continúa el proceso.</label>
              </div>
              
            </div>
            <!-------------------BLOQUE QUE CONTIENE LOS FORMULARIOS PASO A PASO PARA REALIZAR SUBSCRIPCIÓN------------------->
            
                <div class="row">
                  <div class="col clearfix mt-2 mb-2">
                    {{$plane}}
                    <button onClick="history.go(-1);" class="btn8 float-left"><i class="fas fa-angle-double-left"></i> REGRESAR</button>

                   {{--  BOTON PARA PLAN DE 1.600
                 <a mp-mode="dftl" href="https://www.mercadopago.com.co/subscriptions/checkout?preapproval_plan_id=2c938084818c5ade01818d9fe7420052" 
                      name="MP-payButton" class='btn2 float-right'>SUSCRIBIRME <i class="fas fa-handshake"></i></a> --}} 
                     {{--  BOTON DE PLAN DE 1.650
                      <a mp-mode="dftl" href="https://www.mercadopago.com.co/subscriptions/checkout?preapproval_plan_id=2c93808481aa17bd0181aaa254490087" 
                      name="MP-payButton" class='btn2 float-right'>SUSCRIBIRME <i class="fas fa-handshake"></i></a> --}}

                      <a mp-mode="dftl" id="" href="https://www.mercadopago.com.co/subscriptions/checkout?preapproval_plan_id=2c938084818a646a01818c274ed50099" 
                      name="MP-payButton" class='btn2 float-right'>SUSCRIBIRME <i class="fas fa-handshake"></i></a>

                       {{--<a mp-mode="dftl" id="plane_ind_month" href="https://www.mercadopago.com.co/subscriptions/checkout?preapproval_plan_id=2c938084818a646a01818c274ed50099" 
                      name="MP-payButton" class='btn2 float-right'>SUSCRIBIRME <i class="fas fa-handshake"></i></a> 
                      {{--<a mp-mode="dftl" id="plane_fami_month" href="https://www.mercadopago.com.co/subscriptions/checkout?preapproval_plan_id=2c9380848191d682018196139fcc0160" 
                      name="MP-payButton" class='btn2 float-right'>SUSCRIBIRME <i class="fas fa-handshake"></i></a> --}}
                  </div>
              </div>
            
        </div>
    </div>
</section>
 
 <x-slot name="js">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <script>
    const mercadoPago = window.Mercadopago;
    mercadoPago.setPublishableKey('{{ config('services.mercadopago.key') }}');
    mercadoPago.getIdentificationTypes();
</script> --}}

  <script type="text/javascript">
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
   </script> 
   
    <script>
       

      $(function () {
        $("#plane_ind_month").hide();
        $("#plane_fami_month").hide();

            var texto2 = $("#plan_recibed").text();

            if (texto2 == 1) {
                 $("#plane_ind_month").show();
                 $("#plane_fami_month").hide();
            } else {
              $("#plane_fami_month").show();
              $("#plane_ind_month").hide();
            } 
      });
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
