@extends('adminlte::page')
@section('title', 'Usuarios')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
       <h3>Administrar Usuarios</h3>
      </div>
      <div class="col-sm-6">
        <a href="{{ route('usuarios.create') }}" class="btn btn-success float-sm-right"><i class="fas fa-plus"></i>
          Nuevo Usuario
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
                    <h3 class="card-title"><i class="fas fa-eye"></i> Usuarios Registrados</h3>
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
                                <th>Id</th>
                                <th>Correo</th>
                                <th>Estado</th>
                                <th>Fecha y Hora</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                                {{-- @foreach($usuarios as $key => $value)

                                @php
                                        $class_status = $value->estado == 1 ? 'warning' : 'dark';
                                        $text_status = $value->estado == 1 ? 'Activo' : 'Inactivo';
                                    @endphp

                                <tr>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->email}}</td>
                                     <td>
                                      @foreach ($value->roles as $item)
                                        {{$item->name}}
                                      @endforeach
                                    </td>
                                    <td width="10%">
                                        <a style="cursor: pointer;" data-toggle="modal" data-target="#modal_InactivarUsuario-{{$value->id}}" ><span
                                                class="btn btn-<?php echo $class_status; ?>"><?php echo $text_status; ?></span>
                                        </a>

                                        <x-inactivar-usuario idusuario="{{$value->id}}" nombre="{{$value->name}}"></x-inactivar-usuario>
                                    </td>
                                    <td>{{$value->created_at}}</td>
                                    <td class="text-center">
                                        <button class="btn btn-success" data-toggle="modal" data-target="#modal_EditarUsuario-{{$value->id}}">
                                            <i class="fas fa-edit"></i> 
                                        </button>
                                         <x-modal-editar-usuario idusuario="{{$value->id}}"></x-modal-editar-usuario>

                                        <button class="btn btn-danger" data-toggle="modal" data-target="#modal_EliminarUsuario-{{$value->id}}">
                                            <i class="fas fa-trash"></i> 
                                        </button>

                                        {{-- <x-modal-eliminar-usuario idusuario="{{$value->id}}" nombre="{{$value->name}}"></x-modal-eliminar-usuario>
                                    </td>
                                </tr> 
                                @endforeach--}}
                        </tbody>
                    </table>
                    <x-modal-editar-usuario></x-modal-editar-usuario>
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

          //load data of users
        /*   var table = $('#listarusuarios').DataTable({
            
                ajax: '',
                language: {
                "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
                },
                serverSide: true,
                processing: true,
                aaSorting:[[0,"asc"]],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'email', name: 'email'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action'},
                ]
            }); */
          

        });
       
        var tabla_usuarios = $('#listarusuarios').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
                },
                "order": [[ 0, "desc" ]],
                "ajax": "{{route('usuarios.obtener')}}",
            });
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