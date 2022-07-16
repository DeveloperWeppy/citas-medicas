
<x-main-layout>
<!-- title -->
@section('title')Subscribirme @endsection

<x-slot name="css">
    <link href="{{ asset('css/stylesfront.css') }}" rel="stylesheet">
</x-slot>
{{-- <div class="alert alert-danger" id="paymentErrors" role="alert">
    A simple danger alert—check it out!
  </div> --}}
<section class="pricing1 counter1__bg-01">
    <div class="content_box_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="title2 mb-60 text-center">
                        <h2>SUSCRIBIRME</h2>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-sm-12 text-center">
                  <img src="{{ asset('asset/img/LOGOFLECHA.png')}}" alt="logo banca" class="img-fluid">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <label for="" id="">Para finalizar tu proceso, da clic en el botón de suscribirme y continúa el proceso. </label>
              </div>

            </div>
            <!-------------------BLOQUE QUE CONTIENE LOS FORMULARIOS PASO A PASO PARA REALIZAR SUBSCRIPCIÓN------------------->

                <div class="row">
                  <div class="col clearfix mt-2 mb-2">
                    <button onClick="history.go(-1);" class="btn8 float-left"><i class="fas fa-angle-double-left"></i> REGRESAR</button>


                    <a  href="{{route('front.pagar',[Session::get('payment_signature'),Session::get('plane')])}}"  class="btn2 float-right">Suscribirme</a>
              </div>

        </div>
    </div>
</section>

 <x-slot name="js">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</x-slot>

</x-main-layout>
