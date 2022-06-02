@extends('adminlte::page')
@section('title', 'Administrar Servicios')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        @role('Prestador')
            <h3>Nuestros Servicios</h3>
        @else
            <h3>Administrar Servicios</h3>
        @endrole
      </div>
      <div class="col-sm-6">
        @can('servicios.create')
            <a href="{{ route('servicios.create') }}" class="btn btn-success float-sm-right"><i class="fas fa-plus"></i>
                Nuevo Servicio
            </a>
        @endcan
      </div>
    </div>
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
                
                <!--cabecera del contenedor--->
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-eye"></i> Servicios Registrados</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <!--cuerpo del contenedor--->
                <div class="card-body">
                   
                    <!--tabla de datos--->
                    <table id="listarservicios" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre del Servicio</th>
                                <th>Precio Normal</th>
                                <th>Precio o porcentaje con descuento</th>
                                <th>Estado</th>
                                <th>Inicio del Servicio</th>
                                <th>Fin del Servicio</th>
                                @can('servicios.acciones')
                                    <th>Acciones</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
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
       
        var tabla_usuarios = $('#listarservicios').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
                },
                "order": [[ 0, "desc" ]],
                "ajax": "{{route('servicios.obtener')}}",
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