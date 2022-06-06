@extends('adminlte::page')
@section('title', 'Registro de Diagnóstico')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
       <h3>Registrar Diagnóstico</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('inicio.index') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Registrar Diagnóstico del Servicio Redimido</li>
        </ol>
      </div>
    </div>
  </div>
@stop

@section('content')

<div class="container-fluid">
  <x-register-diagnostic idServiceRedeemed="{{$id_service_redeemed}}"></x-register-diagnostic>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
@stop

@section('js')

@stop