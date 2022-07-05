@php

    function convertirVa($monto){
        $valor = number_format($monto, 2, ',', '.');
        return $valor;
    }
@endphp
<x-main-layout>
    <!-- title -->
    @section('title')Suscripción Exitosa @endsection

    <x-slot name="css">
        <link href="{{ asset('css/stylesfront.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css" 
        integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </x-slot>
    <section class="pricing1 counter1__bg-01">
        <div class="content_box_100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="title2 mb-60 text-center">
                            <img src="{{ asset('asset/img/succes-subscribe.png')}}" class="img-thumbnails" alt="succes subscription">
                        </div>
                    </div>
                </div>
                <!-------------------BLOQUE QUE CONTIENE LOS FORMULARIOS PASO A PASO PARA REALIZAR SUBSCRIPCIÓN------------------->

                <div class="text-center">
                    <h3>LA SUSCRIPCIÓN HA SIDO EXITOSA </h3>
                    <p>Estimado <span>{{$nombre_client}} {{$last_name}}</span>, nos complace que te hayas suscrito a CitasMedicas.es <br>
                        Te hemos enviado un correo electrónico a <strong>{{$email}}</strong>, ve y verifica tu correo para que puedas ver los datos de acceso a tu panel de 
                        <span>CitasMedicas.es</span>.
                    </p>
                </div>
                
            </div>
        </div>
    </section>
     
     <x-slot name="js">
        <script src="{{ asset('js/scriptfront.js') }}"></script>
    </x-slot>

</x-main-layout>
