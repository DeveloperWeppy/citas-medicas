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
   <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
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

        </div>
      </div>

      <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">

          <div id="relojnumerico" class="reloj float-sm-right" onload="cargarReloj();">
              <!-- Acá mostraremos el reloj desde JavaScript -->
          </div>
      </div>

    </div>
    <div   class="row" style="display:flex;justify-content: center;align-items: center;">
       <div class="col-8">
            @role('Cliente')
            @if (Session::get('ifIncompleSubs'))
                <lottie-player src="{{ asset('lottie/pay.json') }}"  background="transparent"  speed="1"  style="width: 50%; height:auto;margin:0 auto"  loop  autoplay></lottie-player>
                <h3 style="text-align:center;font-weight: bold;">Continua con tu proceso de suscripción para disfrutar de nuestros beneficios <h3>
                <div style="display:flex;justify-content: center;margin-top:30px"><a  href="{{ route('subscription.index') }}" class="btn8">Subscribirme</a></div>
            @endif
            @if (!Session::get('ifActiveSubs') && !Session::get('ifIncompleSubs') )
                <lottie-player src="{{ asset('lottie/alertpay.json') }}"  background="transparent"  speed="1"  style="width: 50%; height:auto;margin:0 auto"  loop  autoplay></lottie-player>
                <h3 style="text-align:center;font-weight: bold;">Realiza el pago de tu suscripcion para seguir usando nuestros servicios<h3>
                <div style="display:flex;justify-content: center;margin-top:30px"><a href="{{ route('subscription.index') }}"  class="btn8">Pagar</a></div>
            @endif
            @endrole
      </div>
    </div>
@stop

@section('content')

<div class="container-fluid">
  <x-view-home></x-view-home>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('/vendor/adminlte/dist/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">

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
