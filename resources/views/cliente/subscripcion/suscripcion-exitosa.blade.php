@php
     function convertirVa($monto){
        $valor = number_format($monto, 2, ',', '.');
        return $valor;
    }
@endphp
@extends('adminlte::page')
@section('title', 'Suscripcion a un Plan')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)
@section('content_header')

@stop

@section('content')
 <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
 <lottie-player src="{{ asset('lottie/payE.json') }}"  background="transparent"  speed="1"  style="width: 30%; height:auto;margin:0 auto"  loop  autoplay></lottie-player>
 <h3  style="text-align:center;font-weight: bold;">LA SUSCRIPCIÓN HA SIDO EXITOSA</h3>
 <h3  class="text-center">Estimado {{$nombre_client}} {{$last_name}}  nos complace que te hayas suscrito a CitasMedicas.es ,disfruta de nuestros veneficios<h3>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
@stop

@section('js')
    <script>

  </script>
@stop
