<x-main-layout>
    <!-- title -->
    @section('title')Cómo Funciona @endsection

     <!---- CSS ----->
     <x-slot name="css">
    </x-slot>

    <main>
        <!-- |==========================================| -->
        <!-- |=====|| Page Title Start ||===============| -->
        <section class="page_title page_title__img-01">
            <div class="page_title__padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page_title__content">
                                <h1>¿Cómo funciona?</h1>
                                <div class="page_title__bread-crumb">
                                    <ul>
                                        <li><a href="index.php">Inicio</a></li>
                                        <li><a href="nosotros.php">Cómo funciona?</a></li>
                                    </ul>
                                </div>
                                <h3></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Page Title End ||=================| -->
        <!-- |==========================================| -->
        <!-- |==========================================| -->
        <!-- |=====|| Counter Start ||===============| -->
        <section class="counter2">
            <div class="content_box_100_50">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <div class="mb-50 text-center">
                                <h3 class="white">Llegamos para transformar la manera en que accedes a servicios de salud</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Counter End ||=================| -->
        <!-- |==========================================| -->
        <section class="working_process1">
            <div class="working_process1__thumb2">
                <img class="img_100" src="{{ asset('asset/img/png-img/png-img-05.png') }}" alt="Image">
            </div>
            <div class="content_box_pob_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="title2 mb-60 text-center mt-50">
                                <h2>¿Cómo funciona?</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="working_process1__item text-center mb-30">
                                <div class="working_process1__thumb mb-30">
                                    <img src="{{ asset('asset/img/service/service-01.jpg') }}" alt="Service">
                                </div>
                                <div class="working_process1__content">
                                    <h3>Selecciona la suscripción de tu preferencia</h3>
                                    <p class="m-0">Escoge tu plan y realiza el proceso de suscripción 100% en Línea, Paga seguro a través de Mercado pago y activa tu código de suscripción.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="working_process1__item text-center mb-30">
                                <div class="working_process1__thumb mb-30">
                                    <img src="{{ asset('asset/img/service/service-02.jpg') }}" alt="Service">
                                </div>
                                <div class="working_process1__content">
                                    <h3>Accedes a tu directorio de beneficios en salud y otras categorías</h3>
                                    <p class="m-0">Navega en nuestro directorio de Convenios por categoría para revisar las promociones, tarifas especiales y los beneficios de nuestros aliados.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="working_process1__item text-center mb-30">
                                <div class="working_process1__thumb mb-30">
                                    <img src="{{ asset('asset/img/service/service-03.jpg') }}" alt="Service">
                                </div>
                                <div class="working_process1__content">
                                    <h3>Encuentras el prestador y el servicio o producto de tu interés.
                                    </h3>
                                    <p class="m-0">Encontrarás los detalles del convenio y los medios de contacto de nuestro aliado para que gestiones la prestación del servicio.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="working_process1__item text-center mb-30">
                                <div class="working_process1__thumb mb-30">
                                    <img src="{{ asset('asset/img/service/service-01.jpg') }}" alt="Service">
                                </div>
                                <div class="working_process1__content">
                                    <h3> Te acercas con tu código de suscripción para redimir tus beneficios.</h3>
                                    <p class="m-0">Al llegar a donde nuestro aliado, solo debes mencionar que vienes de citasmedicas.es, y con tu cédula (código de suscripción) podrás redimir tus beneficios.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class=" text-center align-items-center mt-50">
                            <div class="about3__content">
                                <h3 class="listo">¡Y listo! Es así de fácil.</h3>
                            </div>
                            <div class="fix mt-30">
                                <a href="planes.php" class="btn3 d-inline-block animated fadeInUp">
                                    <span>Suscribete</span> <i class="icofont-rounded-double-right"></i>
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </section>

        <section class="client1 bg-2">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="title2 mb-45 text-center">
                                <h2>Nuestros aliados</h2>
                            </div>
                        </div>
                        <x-view-nuestros-aliados></x-view-nuestros-aliados>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Working Process End ||=================| -->
        <!-- |==========================================| -->
     <!-- |==========================================| -->
        <!-- |=====|| Testimonial Start ||===============| -->
        <section class="testimonial3">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="testimonial3__carousel owl-carousel owl-theme">
                                <div class="testimonial3__wrapper">
                                    <div class="testimonial3__item">
                                        <div class="testimonial3__thumb">
                                            <img src="assets/img/testimonial/testimonial-06.jpg" alt="Testimonial">
                                        </div>
                                        <div class="testimonial3__content">
                                            <h6>World wide Client</h6>
                                            <h3>Why they are best medical and home <br class="d-none d-lg-inline-block">
                                                care services provider.</h3>
                                            <h4>Julie F Arellano <span>CEO of K.S.M</span></h4>
                                            <p>Pleasure, but because those who do not know how to pursue pleasure
                                                rationally
                                                extremely ta sanctus est Lorem ipsum dolor sit amet.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial3__wrapper">
                                    <div class="testimonial3__item">
                                        <div class="testimonial3__thumb">
                                            <img src="assets/img/testimonial/testimonial-07.jpg" alt="Testimonial">
                                        </div>
                                        <div class="testimonial3__content">
                                            <h6>World wide Client</h6>
                                            <h3>Best medical & health <br class="d-none d-lg-inline-block"> service
                                                provider.</h3>
                                            <h4>Andrew J Prout <span>CEO of K.S.M</span></h4>
                                            <p>Pleasure, but because those who do not know how to pursue pleasure
                                                rationally
                                                extremely ta sanctus est Lorem ipsum dolor sit amet.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial3__wrapper">
                                    <div class="testimonial3__item">
                                        <div class="testimonial3__thumb">
                                            <img src="assets/img/testimonial/testimonial-08.jpg" alt="Testimonial">
                                        </div>
                                        <div class="testimonial3__content">
                                            <h6>World wide Client</h6>
                                            <h3>Best Dental & Eye <br class="d-none d-lg-inline-block"> service
                                                provider.</h3>
                                            <h4>Laverne C Avila <span>CEO of K.S.M</span></h4>
                                            <p>Pleasure, but because those who do not know how to pursue pleasure
                                                rationally
                                                extremely ta sanctus est Lorem ipsum dolor sit amet.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Testimonial End ||=================| -->
        <!-- |==========================================| -->
        <section class="suscribeteya overflow-hidden">
            <div>
                <div class="container text-center align-middle">
                    <a href="{{ route('front.afiliate') }}" class="btn6 btn6-2"> <span>SUSCRIBETE YA!</span> <i class="icofont-rounded-double-right"></i> </a>
                </div>
            </div>
        </section>
        <!-- |==========================================| -->
        <!-- |=====|| FAQ Start ||===============| -->
        <section class="faq1">
            <div class="faq1__thumb1"></div>
            <div class="faq1__thumb2"></div>
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 offset-xl-6">
                            <div class="faq1__wrapper">
                                <h3>Preguntas frecuentes</h3>
                                <!-- accordion -->
                                <div class="accordion_style_01 mb-40">
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="heading_01">
                                                <h5>
                                                    <a href="#" data-toggle="collapse" data-target="#collapse_01" aria-expanded="true" aria-controls="collapse_01">
                                                        <span>01.</span> How long dose take my check-up test? I’m 56
                                                        years.
                                                        <i class="ti-angle-down"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapse_01" class="collapse show" aria-labelledby="heading_01" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <p>Usually we try to do as much as posible so that our patients does
                                                        not have any difficults and provides prompt treatment.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="heading_02">
                                                <h5>
                                                    <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_02" aria-expanded="false" aria-controls="collapse_02">
                                                        <span>02.</span> How many people will be in the calbin workshop?
                                                        <i class="ti-angle-down"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapse_02" class="collapse" aria-labelledby="heading_02" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <p>Usually we try to do as much as posible so that our patients does
                                                        not have any difficults and provides prompt treatment.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="heading_03">
                                                <h5>
                                                    <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_03" aria-expanded="false" aria-controls="collapse_03">
                                                        <span>03.</span> What other workshop on the dates are available?
                                                        <i class="ti-angle-down"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapse_03" class="collapse" aria-labelledby="heading_03" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <p>Usually we try to do as much as posible so that our patients does
                                                        not have any difficults and provides prompt treatment.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="heading_04">
                                                <h5>
                                                    <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_04" aria-expanded="false" aria-controls="collapse_04">
                                                        <span>04.</span> Who do I contact for press related inquiries?
                                                        <i class="ti-angle-down"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapse_04" class="collapse" aria-labelledby="heading_04" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <p>Usually we try to do as much as posible so that our patients does
                                                        not have any difficults and provides prompt treatment.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- accordion -->
                                <a href="about-us.html" class="btn3"> <span>Miralas todas <span>aquí</span></span> <i class="icofont-rounded-double-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| FAQ End ||=================| -->
        <!-- |==========================================| -->



    </main>
     <!-- |==========================================| -->
     <x-slot name="js">
    </x-slot>

</x-main-layout>
