@php
    function convertirVa($monto){
        $valor = number_format($monto, 2, ',', '.');
        return $valor;
    }
@endphp
<x-main-layout>
    <!-- title -->

    @section('title')Subscribirme @endsection
    <x-slot name="css">

        <link href="{{ asset('css/stylesfront.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"
        integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    </x-slot>
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
                <div class="contact_page1__form">
                  <!------- FORM OF CONTACT ------------>
                  <x-bloque-de-subscripcion></x-bloque-de-subscripcion>
              </div>

            </div>
        </div>
    </section>

     <x-slot name="js">
        <script src="{{ asset('js/scriptfront.js') }}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" ></script>
        <script>

            var departamentoselected = $('#departments');
            var ciudades = $('.ciudadess');
            var span = $('#texto');

             //function to get banks in agreement to the selected currency
             departamentoselected.change(function(){

              var departmentId = $(this).val();
              ciudades.empty();

                if (departmentId) {
                    $.ajax({
                    url: "{{ route('front.getCiudades') }}",
                    type: 'GET',
                    data: { departmen_id: departmentId },
                    dataType: 'json',
                    beforeSend:function(){
                     Swal.fire({
                            title: 'Cargando..',
                            button: false,
                            timer: 1000,
                            timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading()
                                },
                        });
                    },
                    success: function (response) {
                      //console.log(response);
                        $.each(response.data, function (key, value) {
                          //console.log(value.municipio);
                          span.text(value.municipio).val();
                          //ciudades.append("<option value='" + value.id_municipio + "'>" + value.municipio + "</option>");
                          ciudades.append("<option value='" + value.id_municipio + "' >" + value.municipio + "</option>");
                        });
                    },
                    error : function(){
                      Swal.fire({
                        title: "Ha ocurrido un error",
                        icon: "error",
                        button: false,
                        timer: 2000
                      });
                    }
                  });
                }
              });
           $(document).ready(function() {
             $('.select-department').select2({
              language: "es"
             });
            $('.select-department').removeClass(".select2-hidden-accessible");
             $('.select-department').removeClass(".select2-container");
             $('.select-department').removeClass(".select2-selection--single");

             //Initialize Select2 Elements
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            });
           });

               //form of register of user
       $.validator.addMethod("dateRange", function() {
         var toDate = new Date();
         toDate.setFullYear(toDate.getFullYear()-18);
         var toDatef = toDate.toISOString().slice(0,10).replace(/-/g,"/");
         toDate= new Date(toDatef);
         var event_date = new Date( $("input[name='date_of_birth']").val());
         if( event_date <= toDate )
           return true;
         return false;
       }, "Please specify a correct date:");

       $('#contact-form').validate({
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
                  required: true, date: true, dateRange: true
              },
              email: {
                required: true,
                email: true,
              },
              num_phone: {
                required: true,
                minlength:7,
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
                dateRange: "Debe ser mayor de edad",
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
                var url = "{{route('front.store_client')}}";
                $.ajax({
                  headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        type: "post",
                        encoding:"UTF-8",
                        url: url,
                        data: new FormData(form),
                        processData: false,
                        contentType: false,
                        dataType:'json',
                        beforeSend:function(){
                          Swal.fire({
                                title: 'Validando datos, espere por favor...',
                                button: false,

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

                            setTimeout(function(){
                                location.href = "{{route('front.finis_subscribe')}}";
                            },2000);

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
            }
          });
        </script>
    </x-slot>

</x-main-layout>
