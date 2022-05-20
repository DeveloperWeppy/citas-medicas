@extends('adminlte::page')
@section('title', 'Registro de Conveio')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
       <h3>Administrar Convenio</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Registrar Información del Convenio</li>
            </ol>
      </div>
    </div>
  </div>
@stop

@section('content')

<div class="container-fluid">
  <x-form-rgister-user></x-form-rgister-user>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
@stop

@section('js')

<script src="/js/datatable.js"></script>
    <script>
        //form of register of user
       $('#quickForm').validate({
            rules: {
              email: {
                required: true,
                email: true,
              },
              password: {
                required: true,
                minlength: 8
              },
              nit: {
                required: true,
              },
              name: {
                required: true,
              },
              address: {
                required: true,
              },
              city: {
                required: true,
              },
              name_contact: {
                required: true,
              },
              num_phone_contact: {
                required: true,
                minlength:7
              },
              email_contact: {
                required: true,
                email: true,
              },
              imgLogo: {
                required: true,
              },
            },
            messages: {
              email: {
                required: "Por favor ingrese un Correo Electrónico",
                email: "Ingrese una dirección de correo válida",
              },
              password: {
                required: "Por favor ingrese una Contraseña",
                minlength: "Debe tener al menos 8 caracteres la contraseña",
              },
              nit: {
                required: "Por favor ingrese un NIT",
              },
              name: {
                required: "Por favor ingrese el nombre de usuario",
              },
              address: {
                required: "Por favor ingrese una dirección",
              },
              city: {
                required: "Por favor ingrese la ciudad",
              },
              name_contact: {
                required: "Por favor ingrese el nombre de contácto",
              },
              num_phone_contact: {
                required: "Por favor ingrese un Número de Teléfono o Celular",
                minlength: "Ingrese un número válido",
              },
              email_contact: {
                required: "Por favor ingrese un Correo Electrónico de Contácto",
                email: "Ingrese una dirección de correo válida",
              },
              imgLogo: {
                required: "Por favor cargue el logo de la empresa",
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
                    var url = "{{route('usuarios.store')}}";

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
                                timer: 3000
                            });
                        }
                    }).done(function(respuesta){
                        //console.log(respuesta);
                       if (!respuesta.error) {

                          Swal.fire({
                                title: 'Usuario registrado exitosamente.',
                                icon: 'success',
                                button: true,
                                timer: 2000
                            });

                            setTimeout(function(){
                                location.reload();
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
                  });
            }
          });
       
        

        
        $(function () {
         
          //para la imagen agg
        $('#imgSalida').attr("src", "/images/user.png");
            $('#customFile').change(function (e) {
                addImage(e);
            });
            function addImage(e) {
                var file = e.target.files[0],
                        imageType = /image.*/;
                if (!file.type.match(imageType))
                    return;
                var reader = new FileReader();
                reader.onload = function (e) {
                    var result = e.target.result;
                    $('#imgSalida').attr("src", result);
                }
                reader.readAsDataURL(file);
            }

        });
        </script>
@stop