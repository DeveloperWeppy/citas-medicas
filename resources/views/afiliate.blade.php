@php
    function convertirVa($monto){
        $valor = number_format($monto, 2, ',', '.');
        return $valor;
    }
@endphp
<x-main-layout>
    <!-- title -->
    @section('title')Afíliate Ahora @endsection

     <!---- CSS ----->
     <x-slot name="css">
    </x-slot>

    <main>
         <!-- |==========================================| -->
        <!-- |=====|| Page Title Start ||===============| -->
        <section class="page_title page_title__img-05">
            <div class="page_title__padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page_title__content">
                                <h1>Nuestros Planes</h1>
                                <div class="page_title__bread-crumb">
                                    <ul>
                                        <li><a href="{{ route('front.inicio') }}">Inicio</a></li>
                                        <li><a href="#">Elije el Plan de tu preferencia y disfruta de todos los beneficios</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Page Title End ||=================| -->
        <!-- |==========================================| -->
        <!-- |==========================================| -->
        <!-- |=====|| Sección de planes||===============| -->
        <x-information-planes></x-information-planes>

    </main>
     <!-- |==========================================| -->
     <x-slot name="js">
    </x-slot>

</x-main-layout>
