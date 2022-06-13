@extends('adminlte::page')
@section('title', 'Administrar Miembros del Plan')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <button class="btn btn-outline-info" onClick="history.go(-1);"><i class="fas fa-long-arrow-alt-left"></i> Volver</button>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('inicio.index') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Mi Perfil</li>
            </ol>
      </div>
    </div>
  </div>
@stop

@section('content')

<div class="container-fluid">
    <div class="row">
        @role('Prestador')
            <x-form-profile idPrestador="{{$info_prestador->id}}"></x-form-profile>
        @endrole
        
        @role('Cliente')
            <x-form-profile-client idClient="{{$info_cliente->id}}"></x-form-profile-client>
        @endrole

        @role('Gestor')
            <x-form-profile-client></x-form-profile-client>
        @endrole
    </div>
    

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
    <link rel="stylesheet" href="/css/styles.css">
@stop

@section('js')
    <script>
      $(document).ready(function() {

        });
       
      /*  ==========================================
          SHOW UPLOADED IMAGE
      * ========================================== */
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#imageResult')
                      .attr('src', e.target.result);
              };
              reader.readAsDataURL(input.files[0]);
          }
      }

      $(function () {
          $('#upload').on('change', function () {
              readURL(input);
          });
      });

      /*  ==========================================
          SHOW UPLOADED IMAGE NAME
      * ========================================== */
      var input = document.getElementById( 'upload' );
      var infoArea = document.getElementById( 'upload-label' );

      input.addEventListener( 'change', showFileName );
      function showFileName( event ) {
        var input = event.srcElement;
        var fileName = input.files[0].name;
        infoArea.textContent = 'File name: ' + fileName;
      }
        var tabla_miembros = $('#listarmiembros').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
                },
                "order": [[ 0, "desc" ]],
                "ajax": "{{route('miembros.obtener')}}",
            });


            /********************************************************************* CLIENT***********************************************************/
             //form of photo updated
         $('#updatephotoclient').validate({
            rules: {
              imgLogo: {
                required: true,
              },
            },
            messages: {
              imgLogo: {
                required: "Por favor Seleccione una foto",
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
                $('#updatephotoclient').on('submit', function(e) {
                event.preventDefault();
                var $thisForm = $('#updatephotoclient');
                    var formData = new FormData(this);

                    //ruta
                    var url = "{{route('cliente.updatedphoto')}}";

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
                                timer: 2000,
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
                                confirmButtonText: "Ok"
                            });

                        } else {
                            setTimeout(function(){
                              Swal.fire({
                                    title: respuesta.mensaje,
                                    icon: "error",
                                    confirmButtonText: "Ok"
                                });
                            },2000);
                        } 
                    }).fail(function(resp){
                        //console.log(resp);
                    });
                  });
            }
          });

          //form of data updated client
         $('#updateclient').validate({
            rules: {
              name: {
                required: true,
              },
              last_name: {
                required: true,
              },
              number_identication: {
                required: true,
              },
              age: {
                required: true,
              },
              date_of_birth: {
                required: true,
              },
              address: {
                required: true,
              },
              neighborhood: {
                required: true,
              },
              email: {
                required: true,
                email: true,
              },
              num_phone: {
                required: true,
              },
            },
            messages: {
              name: {
                required: "Ingresa Nombre(s)",
              },
              last_name: {
                required: "Ingresa Apellido(s)",
              },
              number_identication: {
                required: "Ingresa el número de identificación",
              },
              age: {
                required: "Ingresa tu edad",
              },
              date_of_birth: {
                required: "Selecciona la fecha de cumpleaños",
              },
              address: {
                required: "Ingresa una dirección",
              },
              neighborhood: {
                required: "Ingresa el barrio",
              },
              email: {
                required: "Ingresa el correo electrónico",
                email: "Ingrese una dirección de correo válida",
              },
              num_phone: {
                required: "Ingresa un número de teléfono",
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
                $('#updateclient').on('submit', function(e) {
                event.preventDefault();
                var $thisForm = $('#updateclient');
                    var formData = new FormData(this);

                    //ruta
                    var url = "{{route('cliente.updatedclient')}}";

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
                                timer: 2000,
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
                                confirmButtonText: "Ok"
                            });

                            setTimeout(function(){
                                location.reload();
                            },2000);

                        } else {
                            setTimeout(function(){
                              Swal.fire({
                                    title: respuesta.mensaje,
                                    icon: "error",
                                    confirmButtonText: "Ok"
                                });
                            },2000);
                        } 
                    }).fail(function(resp){
                        //console.log(resp);
                    });
                  });
            }
          });

           /********************************************************************* PRESTADOR DE SERVICIOS ***********************************************************/
             //form of photo updated
         $('#updatephotoprestador').validate({
            rules: {
              imgLogo: {
                required: true,
              },
            },
            messages: {
              imgLogo: {
                required: "Por favor Seleccione un LOGO",
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
                $('#updatephotoprestador').on('submit', function(e) {
                event.preventDefault();
                var $thisForm = $('#updatephotoprestador');
                    var formData = new FormData(this);

                    //ruta
                    var url = "{{route('prestador.updatedphoto')}}";

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
                                timer: 2000,
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
                                confirmButtonText: "Ok"
                            });

                        } else {
                            setTimeout(function(){
                              Swal.fire({
                                    title: respuesta.mensaje,
                                    icon: "error",
                                    confirmButtonText: "Ok"
                                });
                            },2000);
                        } 
                    }).fail(function(resp){
                        //console.log(resp);
                    });
                  });
            }
          });

          //form of data updated client
         $('#updateprestador').validate({
            rules: {
              name: {
                required: true,
              },
              nit: {
                required: true,
              },
              name_contact: {
                required: true,
              },
              email_contact: {
                required: true,
                email: true,
              },
              address: {
                required: true,
              },
              num_phone: {
                required: true,
              },
              city: {
                required: true,
              },
            },
            messages: {
              name: {
                required: "Ingresa Nombre de la entidad",
              },
              nit: {
                required: "Ingresa el NIT de la entidad",
              },
              name_contact: {
                required: "Ingresa un nombre de contácto",
              },
              email_contact: {
                required: "Ingresa un correo electrónico de contácto",
                email: "Ingrese una dirección de correo válida",
              },
              address: {
                required: "Ingresa una dirección",
              },
              num_phone: {
                required: "Ingresa un número de teléfono",
              },
              city: {
                required: "Ingresa la ciudad",
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
                $('#updateprestador').on('submit', function(e) {
                event.preventDefault();
                var $thisForm = $('#updateprestador');
                    var formData = new FormData(this);

                    //ruta
                    var url = "{{route('prestador.updatedprestador')}}";

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
                                timer: 2000,
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
                                confirmButtonText: "Ok"
                            });

                            setTimeout(function(){
                                location.reload();
                            },2000);

                        } else {
                            setTimeout(function(){
                              Swal.fire({
                                    title: respuesta.mensaje,
                                    icon: "error",
                                    confirmButtonText: "Ok"
                                });
                            },2000);
                        } 
                    }).fail(function(resp){
                        //console.log(resp);
                    });
                  });
            }
          });

         
        $(function () {

        });
        </script>
@stop