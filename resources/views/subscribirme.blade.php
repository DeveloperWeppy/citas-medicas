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
                <x-bloque-de-subscripcion></x-bloque-de-subscripcion>
            </div>
        </div>
    </section>
     
     <x-slot name="js">
        <script src="{{ asset('js/scriptfront.js') }}"></script>
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
          });
        </script>
    </x-slot>

</x-main-layout>
