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
      @if (optional(auth()->user())->hasActiveSubscription())
        <div class="col-sm-6">
          <button class="btn btn-outline-info" onClick="history.go(-1);"><i class="fas fa-long-arrow-alt-left"></i> Volver</button>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href=" {{ route('inicio.index') }}">Inicio</a></li>
              <li class="breadcrumb-item active">Información del Plan - <span class="font-weight-bolder">{{$plan->name}}</span></li>
              </ol>
        </div>
      @endif
    </div>
  </div>
@stop

@section('content')

@if (optional(auth()->user())->hasActiveSubscription())
    <x-view-plan idPlan="{{$plan->id}}"></x-view-plan>
  @else
      <!------CONTENEDOR DE NO SUBSCRITO------->
      <div class="card card-primary card-outline">
                    
        <!--cuerpo del contenedor--->
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                
                        <div class="text-center">
                            <img src="/images/Xpayment.png" class="full" alt="x-imagen-user">
                            <h2 class="text-info">¡Ops!{{optional(auth()->user())->hasActiveSubscription()}}</h2>
                            <h4>Estimado cliente <strong class="text-uppercase text-info">{{$user_name}}</strong> no presenta actualmente una subscripción activa,
                                por lo tanto no dispones de ningún plan. No olvides subscribirte y disfrutar de todos los beneficios que tiene <strong class="text-uppercase text-info">
                                  citasmedicas.es</strong> para tí. <i class="fas fa-laugh-wink text-info"></i>
                            </h4>
                        </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
  @endif
  
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
    <link rel="stylesheet" href="/css/styles.css">
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