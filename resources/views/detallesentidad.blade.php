<x-main-layout>
    <!-- title -->
  @section('title')Detalles de la Entidad @endsection

     <!---- CSS ----->
     <x-slot name="css">
    </x-slot>

    <main>

        <!------------------------- SECTION IMAGEN BANNER START -------------------->
        <section class="page_title">
                    <div class="row">
                           <img src="{{$conveniodetaills->image_banner}}" class="img-fluid" alt="">
                    </div>
        </section>
        <!------------------------- SECTION IMAGEN BANNER END -------------------->

        <!------------------------ SECTION INFORMATION CONVENIO START ------------------->
        <section class="about3">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title2 mb-55 text-center">
                                <h2 class="text-uppercase">{{$conveniodetaills->name}}</h2>
                                <p>Encuentra los principales datos de contácto de la entidad. </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="why_choose_us1__item mb-30">
                                <div class="why_choose_us1__thumb">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="why_choose_us2__content text-center">
                                    <h4>Nit</h4>
                                    <p class="m-0">{{$conveniodetaills->nit}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="why_choose_us1__item mb-30">
                                <div class="why_choose_us1__thumb">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="why_choose_us2__content text-center">
                                    <h4>Teléfono de Contácto</h4>
                                    <p class="m-0">{{$conveniodetaills->num_phone_contact}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="why_choose_us1__item mb-30">
                                <div class="why_choose_us1__thumb">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="why_choose_us2__content text-center">
                                    <h4>Correo de Contácto</h4>
                                    <p class="m-0">{{$conveniodetaills->email_contact}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="why_choose_us1__item mb-30">
                                <div class="why_choose_us1__thumb">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="why_choose_us2__content text-center">
                                    <h4>Dirección</h4>
                                    <p class="m-0">{{$conveniodetaills->address}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-20">
                        <div class="col-md-12 text-center">
                            <div class="service3__bottom-text">
                                <p class="m-0">Para más información de la entidad visita su sitio web <a href="#">Join us here</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-----------------------  SECTION INFORMATION CONVEIO END----------------------->

        <!------------------------ SECTION ATTENTION SHEDULE START ------------------->
        <section class="why_choose_us1">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title2 mb-55 text-center">
                                <h2 class="text-uppercase">Horarios de Atención</h2>
                                <p>Estos son los horarios de atención disponibles de esta entidad </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('asset/img/access.png') }}" class="img-fluid rounded mx-auto d-block" alt="horarios de atención">
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="title2 mb-55 float-right">
                                        <h4>Día</h4>
                                        @foreach ($attention_shedule as $item)
                                            @if ($item->open_morning != null)
                                            <strong><p class="text-white">{{$item->day}}</p></strong>
                                            @endif
                                            
                                        @endforeach

                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="title2 mb-55 ">
                                        <h4>Horario en la Mañana</h4>
                                        @foreach ($attention_shedule as $item)
                                            @if ($item->open_morning != null)
                                            <strong><p class="text-white">{{date('h:i:s a ', strtotime($item->open_morning))}} - {{date('h:i:s a ', strtotime($item->close_morning))}}</p></strong>
                                            @endif
                                            
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="title2 mb-55 ">
                                        <h4>Horario en la Tarde</h4>
                                        @foreach ($attention_shedule as $item)
                                            @if ($item->open_morning != null)
                                            <strong><p class="text-white">{{date('h:i:s a ', strtotime($item->open_afternoon))}} - {{date('h:i:s a ', strtotime($item->close_afternoon))}}</p></strong>
                                            @endif
                                            
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row pt-20">
                        <div class="col-md-12 text-center">
                            <div class="service3__bottom-text">
                                <p class="m-0">Join Our conference &amp; events know more us also be careful myself <a href="contact.html">Join us here</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-----------------------  SECTION ATTENTION SHEDULE END----------------------->

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
                                        <p class="m-0"><a href="https://api.whatsapp.com/send?phone=+57{{$conveniodetaills->whatsapp}}&text=Hola, quisiera saber más del convenio con CitasMedicas&source=&data=&app_absent=" target="_blank">Enviar Mensaje</a></p>
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
