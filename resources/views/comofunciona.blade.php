<x-main-layout>
    <!-- title -->
    @section('title')Cómo Funciona @endsection

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
                                <h1>¿Cómo funciona?</h1>
                                <div class="page_title__bread-crumb">
                                    <ul>
                                        <li><a href="{{route('front.inicio')}}">Inicio</a></li>
                                        <li><a href="#">Cómo funciona?</a> </li>
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
                                    <img src="{{ asset('asset/img/service/CF-1.webp') }}" alt="Service">
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
                                    <img src="{{ asset('asset/img/service/CF-2.webp') }}" alt="Service">
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
                                    <img src="{{ asset('asset/img/service/CF-3.webp') }}" alt="Service">
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
                                    <img src="{{ asset('asset/img/service/CF-4.webp') }}" alt="Service">
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
                                <a href="{{ route('front.afiliate') }}" class="btn3 d-inline-block animated fadeInUp">
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
                                            <img src="{{ asset('asset/img/testimonial/testimonial-06.webp') }}" alt="Testimonial">
                                        </div>
                                        <div class="testimonial3__content">
                                            <h6>citasmedicas.es</h6>
                                            <h4>Alex Giraldo <span>CEO of K.S.M</span></h4>
                                            <p>Suscribirme a citas médicas fue una de las mejores opciones, los beneficios que se tiene son muy buenos.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial3__wrapper">
                                    <div class="testimonial3__item">
                                        <div class="testimonial3__thumb">
                                            <img src="{{ asset('asset/img/testimonial/testimonial-06.webp') }}" alt="Testimonial">
                                        </div>
                                        <div class="testimonial3__content">
                                            <h6>citasmedicas.es</h6>
                                            <h4>Andrew Jimenez <span>CEO of K.S.M</span></h4>
                                            <p>Suscribirme a citas médicas fue una de las mejores opciones, los beneficios que se tiene son muy buenos.</p>
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
                                                    <a href="#" data-toggle="collapse" data-target="#collapse_01" aria-expanded="false" aria-controls="collapse_01" class="collapsed">
                                                        <span>01.</span> ¿Garantizan la privacidad de mis datos personales?
                                                        <i class="ti-angle-down"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapse_01" class="collapse" aria-labelledby="heading_01" data-parent="#accordionExample" style="">
                                                <div class="card-body">
                                                    <p class="text-justify">Sí. La información recolectada por El grupo empresarial CITAS MEDICAS.ES WORLD SAS; a través de sus productos y servicios digitales “El portal WEB: 
                                                        www.citasmedicas.es tiene un tratamiento confidencial y exclusivo, de acuerdo a la Ley Estatutaria 1581 de 2012 y el Decreto Reglamentario 1377 de 2013. Por tal motivo, www.citasmedicas.es  se 
                                                        hace responsable de los datos personales proporcionados por los diferentes clientes y/o usuarios al momento de hacer uso de la plataforma.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="heading_02">
                                                <h5>
                                                    <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_02" aria-expanded="false" aria-controls="collapse_02">
                                                        <span>02.</span> ¿Funcionan 24 horas al día?
                                                        <i class="ti-angle-down"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapse_02" class="collapse" aria-labelledby="heading_02" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <p class="text-justify">Sí.
                                                        El portal web www.citasmedicas.es
                                                        está activo las 24 horas del día, los 7 días de la semana.
                                                        <br>
                                                        Citasmedicas.es; permite elegir diferentes productos y servicios,
                                                        haciendo valer tu código de suscripción,
                                                        obteniendo el mejor precio siempre.
                                                        <br><br>
                                                        <ul>
                                                            <li>·  Ingresa a nuestro portal web www.citasmedicas.es </li>
                                                            <li>·  Elige el producto o servicio de tu interés, según su perfil profesional, ciudad, país, horario, disponibilidad o modalidad de atención.</li>
                                                            <li>·  Conversa directamente con nuestros proveedores de productos o servicios, haciendo valer tu código de suscripción, obteniendo el mejor precio siempre.</li>
                                                        </ul>
    
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="heading_03">
                                                <h5>
                                                    <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_03" aria-expanded="false" aria-controls="collapse_03">
                                                        <span>03.</span> ¿Citasmedicas.es oferta sus productos fuera de Colombia?
                                                        <i class="ti-angle-down"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapse_03" class="collapse" aria-labelledby="heading_03" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <p class="text-justify">No. Actualmente nuestros clientes solo están disponibles dentro del territorio colombiano.
                                                        Próximamente estaremos ofertando en Estados unidos y Venezuela. <br>
                                                        Te lo haremos saber ¡
                                                        </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="heading_04">
                                                <h5>
                                                    <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_04" aria-expanded="false" aria-controls="collapse_04">
                                                        <span>04.</span> ¿Puedo vincular menores de edad a Citasmedicas.es?
                                                        
                                                        <i class="ti-angle-down"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapse_04" class="collapse" aria-labelledby="heading_04" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <p class="text-justify">Sí. Puedes hacerlo al suscribirte como titular del plan familia. <br><br>
                                                        Recuerda que los menores de edad sólo pueden ser vinculados por sus padres o representantes legales debidamente certificados.
                                                        </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- accordion -->
                                <a href="{{ route('front.preguntas') }}" class="btn3"> <span>Miralas todas <span>aquí</span></span> <i class="icofont-rounded-double-right"></i> </a>
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
