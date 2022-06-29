
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

                   {{--  BOTON PARA PLAN DE 1.600
                 <a mp-mode="dftl" href="https://www.mercadopago.com.co/subscriptions/checkout?preapproval_plan_id=2c938084818c5ade01818d9fe7420052" 
                      name="MP-payButton" class='btn2 float-right'>SUSCRIBIRME <i class="fas fa-handshake"></i></a> --}} 
                     {{--  BOTON DE PLAN DE 1.650
                      <a mp-mode="dftl" href="https://www.mercadopago.com.co/subscriptions/checkout?preapproval_plan_id=2c93808481aa17bd0181aaa254490087" 
                      name="MP-payButton" class='btn2 float-right'>SUSCRIBIRME <i class="fas fa-handshake"></i></a> 

                      <a mp-mode="dftl" target="_blank" href="https://www.mercadopago.com.co/subscriptions/checkout?preapproval_plan_id=2c93808481ad6df90181afe4f5fb00a2" 
                      name="MP-payButton" class='btn2 float-right'>Suscribirme</a>--}}

                      <a target="_blank" href="https://www.mercadopago.com.co/subscriptions/checkout?preapproval_plan_id=2c93808481ad6df90181afe4f5fb00a2" 
                      name="MP-payButton" class='btn2 float-right'>Suscribirme</a>

                       {{--<a mp-mode="dftl" id="plane_ind_month" href="https://www.mercadopago.com.co/subscriptions/checkout?preapproval_plan_id=2c938084818a646a01818c274ed50099" 
                      name="MP-payButton" class='btn2 float-right'>SUSCRIBIRME <i class="fas fa-handshake"></i></a> 
                      {{--<a mp-mode="dftl" id="plane_fami_month" href="https://www.mercadopago.com.co/subscriptions/checkout?preapproval_plan_id=2c9380848191d682018196139fcc0160" 
                      name="MP-payButton" class='btn2 float-right'>SUSCRIBIRME <i class="fas fa-handshake"></i></a> --}}
                  </div>
              </div>
            
        </div>
    </div>
</section>
 
 <x-slot name="js">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
       

      $(function () {
        $("#plane_ind_month").hide();
        $("#plane_fami_month").hide();

            var texto2 = $("#plan_recibed").text();

            if (texto2 == 1) {
                 $("#plane_ind_month").show();
                 $("#plane_fami_month").hide();
            } else {
              $("#plane_fami_month").show();
              $("#plane_ind_month").hide();
            } 
      });
    </script>
</x-slot>

</x-main-layout>
