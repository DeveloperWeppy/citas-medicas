<x-main-layout>
    <!-- title -->
  @section('title')Detalles del Convenio @endsection

     <!---- CSS ----->
     <x-slot name="css">
    </x-slot>

    <main>

        <!------------------------- SECTION IMAGEN BANNER START -------------------->
        <section class="page_title">
                    <div class="row">
                           <img src="{{ env('APP_URL').$conveniodetaills->image_banner}}" class="img-fluid" alt="">
                    </div>
                    <div class="row text-center imglogo" >
                        <div class="col-sm-12">
                            <img src="{{env('APP_URL').$user->logo}}" class="img-thumbnail" style="width: 200px; height: 200px;" alt="">
                        </div>
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
                            <div class="title2 mb-55 text-center">
                                <h4 class="text-uppercase">Beneficios del Convenio</h4>
                                <p>Estos son los beneficios que podrás encontrar con este convenio: </p>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <!-- accordion -->
                            <div class="accordion_style_01 mb-40">
                                <div class="accordion" id="accordionExample">
                                    @foreach($datos['category'] as $key => $value)
                                    <div class="card" style="border: 1px solid #0cb8b6; border-radius: 10px">
                                        <div class="card-header" id="heading_0{{$key+1}}">
                                            <h5>
                                                <a href="#" style="font-size:19px" data-toggle="collapse" data-target="#collapse_0{{$key+1}}" aria-expanded="false" aria-controls="collapse_0{{$key+1}}" class="">
                                                    <span>{{$key+1}}.</span>{{$value->name}}
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                            <div id="collapse_0{{$key+1}}" class="collapse " aria-labelledby="heading_0{{$key+1}}" data-parent="#accordionExample" style="">
                                                <div class="card-body">
                                                    @foreach ($datos['convenio_services'] as $item2)
                                                        @foreach($datos['services'] as $key2 => $value2)
                                                            @if ($value2->category_id==$value->id)
                                                                @if ($item2->service_id == $value2->id)
                                                                <h6 class="mt-3 pl-3"><i class="fas fa-check fa-fw"></i> {{$value2->name}}</h6>

                                                                <div class="text-center mb-5">
                                                                    <table class="table table-striped table-bordered table-hover table-responsive-sm">
                                                                        <tr>
                                                                        <th style="color: brown">Precio Normal</th>
                                                                        <th style="color: #0cb8b6">Precio con Descuento</th>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>{{number_format($item2->price_normal, 2, ',', '.')}}</td>
                                                                            <td>{{number_format($item2->price_discount, 2, ',', '.')}}</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                @endif
                                                        
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                            </div>

                                    </div>
                                    @endforeach
                                </div>
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
                                <p>Estos son los horarios de atención disponibles de este convenio </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('asset/img/hero/horarios.png') }}" class="img-fluid rounded mx-auto d-block" alt="horarios de atención">
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-sm-2">
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
        <section class="bg-3 other_page">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="about5__wrapper">
                                <div class="title2 text-center">
                                    <h2 class="text-white">¿Quieres saber dónde está ubicada la entidad del Convenio?</h2>
                                    <a href="{{$conveniodetaills->frame_ubication}}" target="_blank" class="btn6 mt-30 d-inline-block"><span>Ver Ubicación >></span>  </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!------------------------- SECTION LOCATION MAP END -------------------->
       
    </main>
     <x-slot name="js">
    </x-slot>
<script>
</script>
</x-main-layout>
