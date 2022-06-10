@php
     function convertirVa($monto){
        $valor = number_format($monto, 2, ',', '.');
        return $valor;
    }
@endphp
@extends('adminlte::page')
@section('title', 'Detalles del Plan')

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
            <li class="breadcrumb-item active">Detalle del Subscriptor - <span class="font-weight-bolder">{{$cliente->name}}</span></li>
            </ol>
      </div>
    </div>
  </div>
@stop

@section('content')

<div class="container-fluid">
    <div class="row">
        <x-client-detail idClient="{{$cliente->id}}"></x-client-detail>
    </div>
    

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
    <link rel="stylesheet" href="/css/styles.css">
@stop

@section('js')
    <script>
        var $j = jQuery.noConflict();
       
        $(function () {
        });
    </script>
@stop