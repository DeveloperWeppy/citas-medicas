<x-main-layout>
    <!-- title -->
    @section('title')Beneficios @endsection

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
                                <h1>BENEFICIOS</h1>
                                <div class="page_title__bread-crumb">
                                    <ul>
                                        <li><a href="{{ route('front.inicio') }}">Inicio</a></li>
                                        <li><a href="#">Beneficios</a></li>
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
        <!-- |=====|| Service Start ||===============| -->
        <section class="about1 ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="title2 mb-10 mt-40 text-center">
                                <h2>Por donde mires <span>Citas médicas</span> es beneficios</h2>
                                <p>Encuentra múltiples beneficios en las siguientes categorías:</p>
                            </div>
                            <div class="col-lg-10 offset-lg-1">
                                    <div class="about1__content row">
                                        <div class="w100 text-center">
                                            <div class="about1__item2  mt-25">
                                                <h4>
                                                    <a href="#heading_01">
                                                        <img src="{{ asset('asset/img/png-icon/salud.png') }}" alt="About" class=" mr-10">
                                                    </a>
                                                    Salud
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="about1__item col-md-6">
                                            <ul class="list-group">
                                                <li>
                                                    <div class="about1__item2  mt-25">
                                                        <div class="about1__item--thumb2 about1__item--bg1">
                                                            <img src="{{ asset('asset/img/png-icon/bienestar-y-belleza.png') }}" alt="About">
                                                        </div>
                                                        <p>Bienestar y Belleza
                                                        </p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="about1__item2  mt-25">
                                                        <div class="about1__item--thumb2 about1__item--bg1">
                                                            <img src="{{ asset('asset/img/png-icon/entretenimiento.png') }}" alt="About">
                                                        </div>
                                                        <p>Entretenimiento
                                                        </p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="about1__item2  mt-25">
                                                        <div class="about1__item--thumb2 about1__item--bg1">
                                                            <img src="{{ asset('asset/img/png-icon/gastronomía.png') }}" alt="About">
                                                        </div>
                                                        <p>Gastronomía
                                                        </p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="about1__item2  mt-25">
                                                        <div class="about1__item--thumb2 about1__item--bg1">
                                                            <img src="{{ asset('asset/img/png-icon/hogar-y-servicios.png') }}" alt="About">
                                                        </div>
                                                        <p>Hogar y servicios
                                                        </p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="about1__item mb-65 col-md-6">
                                            <ul class="list-group">
                                                <li>
                                                    <div class="about1__item2  mt-25">
                                                        <div class="about1__item--thumb2 about1__item--bg1">
                                                            <img src="{{ asset('asset/img/png-icon/servicios.png') }}" alt="About">
                                                        </div>
                                                        <p>Servicios
                                                        </p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="about1__item2  mt-25">
                                                        <div class="about1__item--thumb2 about1__item--bg1">
                                                            <img src="{{ asset('asset/img/png-icon/ropa-y-accesorios.png') }}" alt="About">
                                                        </div>
                                                        <p>Ropa y accesorios
                                                        </p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="about1__item2  mt-25">
                                                        <div class="about1__item--thumb2 about1__item--bg1">
                                                            <img src="{{ asset('asset/img/png-icon/salud-animal.png') }}" alt="About">
                                                        </div>
                                                        <p>Salud Animal
                                                        </p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="about1__item2  mt-25">
                                                        <div class="about1__item--thumb2 about1__item--bg1">
                                                            <img src="{{ asset('asset/img/png-icon/turismo.png') }}" alt="About">
                                                        </div>
                                                        <p>Turismo
                                                        </p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
        </section>
        <!-- |=====|| Service End ||=================| -->
        <!-- |==========================================| -->

        <!-- |==========================================| -->
        <!-- |=====|| Details benfits Start ||===============| -->
        <section class="service1 other_page">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="title2 mb-45 text-center">
                                <h3>Mira los detalles de los Beneficios</h3>
                            </div>
                            <!-- accordion -->
                            <div class="accordion_style_01 mb-40">
                                <div class="accordion" id="accordionExample">
                                    @foreach($datos['category'] as $key => $value)
                                    <div class="card">
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
                                                  @foreach($datos['services'] as $key2 => $value2)
                                                    @if ($value2->category_id==$value->id)
                                                    <h6 class="mt-3 pl-3"><i class="fas fa-check fa-fw"></i> {{$value2->name}}</h6>

                                                    <p style="padding-left:38px;padding-bottom:15px">Puedes redimir este beneficio con:</p>
                                                    <div class="text-center">
                                                        <table class="table table-striped table-bordered table-hover table-responsive-sm">
                                                            <tr>
                                                              <th>Convenio</th>
                                                              <th style="color: brown">Precio Normal</th>
                                                              <th style="color: #0cb8b6">Precio con Descuento</th>
                                                            </tr>
                                                            
                                                                @foreach ($datos['convenios'] as $item)
                                                                    @foreach ($datos['userInformation'] as $item3)
                                                                        @foreach ($datos['convenio_services'] as $item2)
                                                                            @if ($item->id == $item2->convenio_id && $value2->id == $item2->service_id )

                                                                                @if ($item->responsable_id == $item3->id)
                                                                                <tr>
                                                                                    <td> <a href="{{ route('front.detallesentidad', $item->responsable_id)}}">{{$item3->name}}</a></td>
                                                                                    <td>{{number_format($item2->price_normal, 2, ',', '.')}}</td>
                                                                                    <td>{{number_format($item2->price_discount, 2, ',', '.')}}</td>
                                                                                </tr>
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                    @endforeach
                                                                @endforeach
                                                          </table>
                                                    </div>
                                                   
                                                    @endif
                                                  @endforeach
                                                </div>
                                            </div>

                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="title2 text-center">
                                <h4 class="m-0">¿Quieres acceder a estos beneficios?</h4>
                                
                                    <a href="{{ route('front.afiliate') }}" class="btn3 d-inline-block animated fadeInUp mt-3">
                                        <span>Suscribete</span> <i class="icofont-rounded-double-right"></i>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Details benefits End ||=================| -->
        <!-- |==========================================| -->


        <!-- |==========================================| -->
        <!-- |=====|| Contact Start ||===============| -->
        <section class="contact1">
            <div class="content_box_100">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-lg-5 border-0">
                            <div class="contact1__info text-center">
                                <div class="contact1__thumb-wrapper">
                                    <div class="contact1__thumb">
                                        <img src="{{ asset('asset/img/png-icon/png-icon-20.png') }}" alt="Image">
                                    </div>
                                </div>
                                <h3>Llamanos</h3>
                                <h4>+57 318 372 27 11 </h4>
                                <p class="m-0">Los mejores especialistas, exámenes diagnósticos, equipos médicos y medicamentos con tarifas y descuentos preferenciales, para ti, tu familia y tu grupo de trabajo </p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="contact_page2__form">
                                <h3>Contáctanos</h3>
                                <!------- FORM OF CONTACT ------------>
                                <x-form-contact-front></x-form-contact-front>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Contact End ||=================| -->
        <!-- |==========================================| -->

    </main>
     <!-- |==========================================| -->
     <x-slot name="js">
    </x-slot>

</x-main-layout>
