<x-main-layout>
    <!-- title -->
  @section('title')Detalles de la Entidad @endsection

     <!---- CSS ----->
     <x-slot name="css">
    </x-slot>

    <main>

        <!------------------------- SECTION IMAGEN BANNER START -------------------->
        <section class="page_title">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                           <img src="{{$conveniodetaills->image_banner}}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
        </section>
        <!------------------------- SECTION IMAGEN BANNER END -------------------->

        <!------------------------- SECTION NETWORK SOCIALS START -------------------->
        <section class="appointment2">
            <div class="content_box_100_70">
                <div class="container">
                    <div class="row">
                        <div class="col-12 pb-5 text-center">
                            <h2>Redes Sociales</h2>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="appointment2__item mb-30">
                                <div class="appointment2__thumb-wrapper">
                                    <div class="appointment2__thumb">
                                        <i class="fab fa-facebook"></i>
                                    </div>
                                </div>
                                <div class="appointment2__content">
                                    <h4>FACEBOOK</h4>
                                    @if ($conveniodetaills->facebook == null)
                                        <p class="m-0">No Disponible</p>
                                    @else
                                        <p class="m-0"><a href="{{$conveniodetaills->facebook}}" target="_blank">Visitar Página</a></p>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="appointment2__item mb-30">
                                <div class="appointment2__thumb-wrapper">
                                    <div class="appointment2__thumb">
                                        <i class="fab fa-instagram-square"></i>
                                    </div>
                                </div>
                                <div class="appointment2__content">
                                    <h4>INSTAGRAM</h4>
                                    @if ($conveniodetaills->facebook == null)
                                        <p class="m-0">No Disponible</p>
                                    @else
                                        <p class="m-0"><a href="{{$conveniodetaills->instagram}}" target="_blank">Visitar Página</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="appointment2__item mb-30">
                                <div class="appointment2__thumb-wrapper">
                                    <div class="appointment2__thumb">
                                        <i class="fab fa-whatsapp"></i>
                                    </div>
                                </div>
                                <div class="appointment2__content">
                                    <h4>WHATSAPP</h4>
                                    @if ($conveniodetaills->whatsapp == null)
                                        <p class="m-0">No Disponible</p>
                                    @else
                                        <p class="m-0"><a href="{{$conveniodetaills->whatsapp}}" target="_blank">Visitar Página</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!------------------------- SECTION NETWORK SOCIALS END -------------------->

        <!------------------------- SECTION LOCATION MAP START -------------------->
        <section class="page_title">
            <div class="row">
                <div class="col-lg-12">
                    {!! $conveniodetaills->frame_ubication !!}
                </div>
            </div>
                
        </section>
        <!------------------------- SECTION LOCATION MAP END -------------------->
    </main>
<div class=" service1">

    {{-- <img   src="{{ asset('asset/img/bannerfamilia.jpg')}}" class="img_100" src="assets/img/bannerfamilia.jpg" alt="banner plan"> --}}
    <div class="row justify-content-center ">
        <div class="col-xl-6 service1" >
        </div>
    </div>
</div>
     <x-slot name="js">
    </x-slot>
<script>
</script>
</x-main-layout>
