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
    </x-slot>
     <!-- |=====|| Subscription Success Start ||===============| -->
     <section class="contact1">
        <div class="content_box_100">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-5 d-flex align-items-center">
                        <img src="{{ asset('asset/img/succes-subscribe.png') }}" alt="" class="img-fluid rounded mx-auto d-block">
                    </div>
                    <div class="col-lg-7">
                        <div class="contact_page2__form">
                            <h3 class="text-center">LA SUSCRIPCIÓN HA SIDO EXITOSA</h3>
                            <p class="text-justify text-white">Estimado <strong class="text-uppercase"><span>{{$nombre_client}} {{$last_name}}</span></strong>, nos complace que te hayas suscrito a CitasMedicas.es <br>
                                Te hemos enviado un correo electrónico a <strong class="text-uppercase">{{$email}}</strong>, ve y verifica tu correo para que puedas ver los datos de acceso a tu panel de 
                                <span>CitasMedicas.es</span>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- |=====|| Subscription Success End ||=================| -->
     
    <x-slot name="js">
    </x-slot>

</x-main-layout>
