@extends('adminlte::page')
@section('title', 'Administrar Miembros del Plan')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
<div class="container-fluid">
    @if ($is_owner == 1)
        @if (optional(auth()->user())->hasActiveSubscription())
            @if ($plan->is_group > 0)
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h3>Miembros del Plan</h3>
                        </div>
                        @if ($total_miembros_por_registrar > 0)
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-outline-info float-sm-right" data-toggle="modal" data-target="#exampleModal">
                                Añadir Miembro <i class="fas fa-plus-circle"></i></button>
                                <x-register-member></x-register-member>
                        </div>
                        @endif
                    </div>
            @endif
        @endif
    @endif
  </div>
@stop

@section('content')

<div class="container-fluid">

    <div class="row">
      <div class="mb-3">
         <!-- Button trigger modal -->
        
      </div>
     
    </div>
    <div class="row">
        <div class="col-12">

            <!------CONTENEDOR DE TABLA------->
            <div class="card card-primary card-outline">
                @if ($is_owner == 1)
                    @if (optional(auth()->user())->hasActiveSubscription())
                        @if ($plan->is_group > 0)
                            <!--cabecera del contenedor--->
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-eye"></i> Miembros Registrados</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <!--cuerpo del contenedor--->
                            <div class="card-body">
                                <!--tabla de datos--->
                                <table id="listarmiembros" class="display table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Nº Identificación</th>
                                            <th>Correo</th>
                                            <th>Fecha y Hora</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <div class="text-center">
                                        <img src="/images/single_plan.png" class="thumbail" alt="x-imagen-single_plan">
                                        <h4>Sigue disfrutando los beneficios de tu plan individual</h4>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                    @else
                        <div class="row">
                            <div class="col-sm-12 mt-3">
                                <div class="text-center">
                                    <img src="/images/Xpayment.png" class="thumbail" alt="x-imagen-single_plan">
                                    <h4>Solo el propietario de la subscripción podrá administrar los miembros del plan.</h4>
                                </div>
                            </div>
                        </div>
                @endif
            </div>
        </div>
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

            function eliminarMiembro(id){
            //console.log("soy id"+id);
                Swal.fire({
                    title: 'Eliminar Miembro',
                    text: "¿Estás seguro de eliminar a este miembro del plan?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = "miembros-plan/destroy/"+id;
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            type: "GET",
                            encoding:"UTF-8",
                            url: url,
                            dataType:'json',
                            beforeSend:function(){
                                Swal.fire({
                                    text: 'Eliminando miembro, espere...',
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading()
                                    },
                                });
                            }
                        }).done(function(respuesta){
                            console.log(respuesta);
                            if (!respuesta.error) {
                                Swal.fire({
                                    title: 'Miembro eliminado del Plan!',
                                    icon: 'success',
                                    showConfirmButton: true,
                                    timer: 2000
                                });
                                tabla_miembros.ajax.reload();
                            } else {
                                setTimeout(function(){
                                    Swal.fire({
                                        title: respuesta.mensaje,
                                        icon: 'error',
                                        showConfirmButton: true,
                                        timer: 4000
                                    });
                                },2000);
                            }
                        }).fail(function(resp){
                            console.log(resp);
                        });
                    }
                })
        }
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