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
        <!-- |=====|| Sección de planes||===============| -->
        <x-information-planes></x-information-planes>

    </main>
     <!-- |==========================================| -->
     <x-slot name="js">
    </x-slot>

</x-main-layout>
