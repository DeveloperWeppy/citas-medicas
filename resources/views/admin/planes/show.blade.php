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
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Información del Plan - <span class="font-weight-bolder">{{$plan->name}}</span></li>
            </ol>
      </div>
    </div>
  </div>
@stop

@section('content')

<div class="container-fluid">
  <x-view-plan idPlan="{{$plan->id}}"></x-view-plan>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('/vendor/adminlte/dist/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
@stop

@section('js')
    <script>

        $(function () {
            var texto = $('#valor').text();
            var texto2 = $('#valor_status').text();
            
            if (texto == "Sí") {
                $('#customSwitch3').prop("checked", true);
            } else {
                $('#customSwitch3').prop("checked", false);
            } 

            if (texto2 == "Activo") {
                $('#status').prop("checked", true);
            } else {
                $('#status').prop("checked", false);
            } 
        });
       
        
        </script>
@stop