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
            <li class="breadcrumb-item active">Mi Perfil- <span class="font-weight-bolder"></span></li>
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

<script src="/js/datatable.js"></script>
    <script>
      $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip()
        $('#element').tooltip('show')

        });
       
        var tabla_miembros = $('#listarmiembros').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
                },
                "order": [[ 0, "desc" ]],
                "ajax": "{{route('miembros.obtener')}}",
            });
             //form of register of user
         $('#quickForm').validate({
            rules: {
              name: {
                required: true,
              },
              lastname: {
                required: true,
              },
              number_identication: {
                required: true,
                minlength:7
              },
              email: {
                required: true,
                email: true,
              },
            },
            messages: {
                name: {
                required: "Por favor ingrese el nombre del miembro",
              },
              lastname: {
                required: "Por favor ingrese el apellido del miembro",
              },
              number_identication: {
                required: "Por favor ingrese un número de identificación",
                minlength: "Ingrese un número de identificación válido",
              },
              required: "Por favor ingrese un Correo Electrónico",
                email: "Ingrese una dirección de correo válida",
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
                    var url = "{{route('miplan.store_member')}}";

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