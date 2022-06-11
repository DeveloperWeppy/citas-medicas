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

            <div class="card card-primary card-outline">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#services" data-toggle="tab">Servicios de Planes</a></li>
                        <li class="nav-item"><a class="nav-link" href="#servicesfree" data-toggle="tab">Servicios Gratuitos de Planes</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="services">

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
                                        
                        <div class="tab-pane" id="servicesfree">
                             <!--tabla de datos--->
                             <table id="listarserviciosfree" class="display table table-striped table-bordered" style="width:100%">
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
                        <div>
                                  
                    </div>
                
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

            var tabla_services_free = $('#listarserviciosfree').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
                },
                "order": [[ 0, "desc" ]],
                "ajax": "{{route('serviciosfree.obtener')}}",
            });

        $(function () {
        });
        </script>
@stop