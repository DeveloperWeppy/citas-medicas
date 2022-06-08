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
                            <h3>Miembros del Plan <span class="badge badge-info right">{{$total_miembros_por_registrar}} </span></h3>
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
                                <table id="listarusuarios" class="display table table-striped table-bordered" style="width:100%">
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
@stop

@section('js')

<script src="/js/datatable.js"></script>
    <script>
      $(document).ready(function() {
          

        });
       
        var tabla_usuarios = $('#listarusuarios').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
                },
                "order": [[ 0, "desc" ]],
                "ajax": "{{route('usuarios.obtener')}}",
            });

            function eliminarEspecialidad(id){
            //console.log("soy id"+id);
                Swal.fire({
                    title: 'Eliminar Especialidad',
                    text: "¿Estas seguro de eliminar la especialidad?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = "especialidades/destroy/"+id;
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
                                    text: 'Eliminando especialidad, espere...',
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
                                    title: 'Esepecialidad Eliminada!',
                                    icon: 'success',
                                    showConfirmButton: true,
                                    timer: 2000
                                });
                                setTimeout(function(){
                                location.reload();
                                },2000);
                            } else {
                                setTimeout(function(){
                                    Swal.fire({
                                        title: espuesta.mensaje,
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
        $(function () {
         
        

        });

        

        jQuery(document).on("click", ".change-status", function() {
                var $element = jQuery(this);
                var id = $element.attr('id');
                var url = "{{ route('usuarios.status') }}";
                var data = {
                    id: id
                }
                jQuery.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    encoding: "UTF-8",
                    url: url,
                    data: data,
                    dataType: 'json',
                    beforeSend:function(){
                        $element.val('Cargando');
                    },
                    success: function(response) {
                        if (response.status == 1) {
                            $element.find('span').removeAttr('class').attr('class', '');
                            $element.find('span').addClass('btn');
                            $element.find('span').addClass(response.class_status);
                            $element.find('span').text(response.text_status);
                        }
                    }
                });
            });
        </script>
@stop