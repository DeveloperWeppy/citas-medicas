@extends('adminlte::page')
@section('title', 'Redimir Servicio')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
          @if ($subscrito == 'si')
            <h3><i class="fas fa-check-circle"></i> Redimir Servicio al cliente <strong class="text-uppercase text-info">{{$name_client}}</strong></h3>
          @endif
       
      </div>
      <div class="col-sm-6">
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

            @if ($subscrito == 'si')
                <x-check-redension clientId="{{$client_id}}"></x-check-redension>
            @else
                <!------CONTENEDOR DE NO SUBSCRITO------->
                <div class="card card-primary card-outline">
                    
                    <!--cuerpo del contenedor--->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                            
                                    <div class="text-center">
                                        <img src="/images/Xpayment.png" class="full" alt="x-imagen-user">
                                        <h2 class="text-info">¡Ops!</h2>
                                        <h4>El cliente <strong class="text-uppercase text-info">{{$name_client}}</strong> no presenta actualmente una subscripción activa,
                                            por lo tanto no podrá disfrutar de los beneficios de tus servicios
                                        </h4>
                                    </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            @endif
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
    <link rel="stylesheet" href="css/styles.css">
@stop

@section('js')

<script src="/js/datatable.js"></script>
<script src="/js/search.js" type="module"></script>
    <script>
        
        $(function () {

        });
        </script>
@stop