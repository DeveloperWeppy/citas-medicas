@extends('adminlte::page')
@section('title', 'Especialidades de Servicios')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
       <h3><i class="fas fa-history"></i> Historial de Redimidos de Clientes</h3>
      </div>
      <div class="col-sm-6">
        <button type="button" class="btn btn-success float-sm-right" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-check-circle"></i> Redimir Nuevo
        </button>
          <x-search-client-redeem></x-search-client-redeem>
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
                
                <!--cuerpo del contenedor--->
                <div class="card-body">
                   
                    <!--tabla de datos--->
                    <table id="listarredimidos" class="display table table-striped table-bordered " style="width:100%"> 
                        <thead>
                            <tr>
                                <th>Nº de Redimido</th>
                                <th>Cliente</th>
                                <th>Servicio</th>
                                <th>Fecha y hora de redención</th>
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
<script src="/js/search.js"></script>
    <script>
         var tabla_usuarios = $('#listarredimidos').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
                },
                "order": [[ 0, "desc" ]],
                "ajax": "{{route('redimidos.obtener')}}",
            });
        
        $(function () {

        });
        </script>
@stop