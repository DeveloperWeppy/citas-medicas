@php
     function convertirVa($monto){
        $valor = number_format($monto, 2, ',', '.');
        return $valor;
    }
@endphp
@extends('adminlte::page')
@section('title', 'Dashboard')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="row mb-2">
      <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
        <div class="row">
          <div class="col-12 col-sm-6">
            @role('Admin')
              @can('usuarios.index')
                <h3>Administrador Citas Médicas</h3>
              @endcan
            @else
              <h3>¡Bienvenido, <span class="text-uppercase font-weight-bold text-deal">{{ $name_client }}!</span></h3> 
            @endrole
            
            
          </div>
          <div class="col-12 col-sm-6">

            @role('Cliente')
            @if (!optional(auth()->user())->hasActiveSubscription())
                <a class="btn btn-outline-citasmedicas" href="#"> Subscribirse <i class="fas fa-hand-point-up"></i></a>
            @endif
            @endrole
          </div>
        </div>
      </div>
      
      <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
        
          <div id="relojnumerico" class="reloj float-sm-right" onload="cargarReloj();">
              <!-- Acá mostraremos el reloj desde JavaScript --> 
          </div>
      </div>
     
    </div>
@stop

@section('content')

<div class="container-fluid">
  <x-view-home></x-view-home>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
    <link rel="stylesheet" href="/css/styles.css">
    
@stop

@section('js')
    <script>

        $(function () {
        });
        function cargarReloj(){

        // Haciendo uso del objeto Date() obtenemos la hora, minuto y segundo 
        var fechahora = new Date();
        var hora = fechahora.getHours(); 
        var minuto = fechahora.getMinutes(); 
        var segundo = fechahora.getSeconds(); 

        // Variable meridiano con el valor 'AM' 
        var meridiano = "AM";


        // Si la hora es igual a 0, declaramos la hora con el valor 12 
        if(hora == 0){

            hora = 12;
            
        }

        // Si la hora es mayor a 12, restamos la hora - 12 y mostramos la variable meridiano con el valor 'PM' 
        if(hora > 12) {

            hora = hora - 12;

            // Variable meridiano con el valor 'PM' 
            meridiano = "PM";

        }

        // Formateamos los ceros '0' del reloj 
        hora = (hora < 10) ? "0" + hora : hora;
        minuto = (minuto < 10) ? "0" + minuto : minuto;
        segundo = (segundo < 10) ? "0" + segundo : segundo;

        // Enviamos la hora a la vista HTML 
        var tiempo = hora + ":" + minuto + ":" + segundo + " " + meridiano;    
        document.getElementById("relojnumerico").innerText = tiempo;
        document.getElementById("relojnumerico").textContent = tiempo;

        // Cargamos el reloj a los 500 milisegundos 
        setTimeout(cargarReloj, 500);

        }

        // Ejecutamos la función 'CargarReloj' 
        cargarReloj();
       
        
    </script>
@stop