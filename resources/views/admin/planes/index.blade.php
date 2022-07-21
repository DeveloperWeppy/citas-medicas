@extends('adminlte::page')
@section('title', 'Administrar Planes')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
       <h3>Administrar Planes</h3>
      </div>
      <div class="col-sm-6">
        <a href="{{ route('plane.create') }}" class="btn btn-success float-sm-right"><i class="fas fa-plus"></i>
          Nuevo Plan
        </a>
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
                <h3 class="card-title"><i class="fas fa-eye"></i> Planes Registrados</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>

            <!--cuerpo del contenedor--->
            <div class="card-body">
               
                <!--tabla de datos--->
                <table id="listarplanes" class="display table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre del Plan</th>
                            <th>Precio</th>
                            <th>Estado</th>
                            <th>¿Es Grupal?</th>
                            <th>Acciones</th>
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
      $(document).ready(function() {});

        var tabla_usuarios = $('#listarplanes').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
                },
                "order": [[ 0, "desc" ]],
                "ajax": "{{route('plane.obtener')}}",
            });

        $(function () {

        });
        </script>
@stop