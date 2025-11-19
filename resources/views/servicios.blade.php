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
                                    <div class="card">
                                        <div class="card-header" id="heading_benefit_01">
                                            <h5>
                                                <a href="#" style="font-size:19px" data-toggle="collapse" data-target="#collapse_benefit_01" aria-expanded="false" aria-controls="collapse_benefit_01" class="collapsed">
                                                    <span>01.</span> Sin EPS, sin filas, sin trámites
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_benefit_01" class="collapse" aria-labelledby="heading_benefit_01" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p class="font-italic">“Usted sabe cuánto se demora una cita con médico especialista por la EPS, ¿verdad? Aquí puede tener todo eso resuelto hoy mismo, sin filas ni papeleos.”</p>
                                                <p>Agende en minutos, sin papeles ni demoras. Nuestro acompañamiento digital elimina la burocracia y le permite llegar directo al especialista.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_benefit_02">
                                            <h5>
                                                <a href="#" style="font-size:19px" data-toggle="collapse" data-target="#collapse_benefit_02" aria-expanded="false" aria-controls="collapse_benefit_02" class="collapsed">
                                                    <span>02.</span> Médicos reales, atención real
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_benefit_02" class="collapse" aria-labelledby="heading_benefit_02" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p class="font-italic">“Vale la pena pagar por una atención donde lo escuchen.”</p>
                                                <p>Aquí lo atienden profesionales con empatía, tiempo y criterio clínico. Nada de robots ni llamadas impersonales: recibirá medicina con rostro humano.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_benefit_03">
                                            <h5>
                                                <a href="#" style="font-size:19px" data-toggle="collapse" data-target="#collapse_benefit_03" aria-expanded="false" aria-controls="collapse_benefit_03" class="collapsed">
                                                    <span>03.</span> Acceso rápido y oportuno
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_benefit_03" class="collapse" aria-labelledby="heading_benefit_03" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p>Encuentre su cita en horas y reciba atención cuando más la necesita, sin depender de una EPS ni soportar esperas interminables.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_benefit_04">
                                            <h5>
                                                <a href="#" style="font-size:19px" data-toggle="collapse" data-target="#collapse_benefit_04" aria-expanded="false" aria-controls="collapse_benefit_04" class="collapsed">
                                                    <span>04.</span> Un solo pago, todo incluido
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_benefit_04" class="collapse" aria-labelledby="heading_benefit_04" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p>Con una única inversión recibe consulta médica, laboratorios clínicos e InBody, más acceso al directorio de descuentos durante 12 meses.</p>
                                                <p class="font-italic">“Y lo mejor es que, al pagar hoy, deja fijo su descuento en todos los servicios médicos por los próximos 12 meses.”</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_benefit_05">
                                            <h5>
                                                <a href="#" style="font-size:19px" data-toggle="collapse" data-target="#collapse_benefit_05" aria-expanded="false" aria-controls="collapse_benefit_05" class="collapsed">
                                                    <span>05.</span> Tarifas planas todo el año
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_benefit_05" class="collapse" aria-labelledby="heading_benefit_05" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p>Precios claros, sin letra pequeña. Siempre sabrá cuánto paga y cuánto ahorra en cada servicio médico, sin sorpresas.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_benefit_06">
                                            <h5>
                                                <a href="#" style="font-size:19px" data-toggle="collapse" data-target="#collapse_benefit_06" aria-expanded="false" aria-controls="collapse_benefit_06" class="collapsed">
                                                    <span>06.</span> Prevención antes que enfermedad
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_benefit_06" class="collapse" aria-labelledby="heading_benefit_06" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p>Actúe a tiempo. El programa preventivo permite detectar lo que su cuerpo necesita cuidar hoy para evitar complicaciones mañana.</p>
                                                <p class="font-italic">“Usted sabe que prevenir siempre cuesta menos que enfermarse.”</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_benefit_07">
                                            <h5>
                                                <a href="#" style="font-size:19px" data-toggle="collapse" data-target="#collapse_benefit_07" aria-expanded="false" aria-controls="collapse_benefit_07" class="collapsed">
                                                    <span>07.</span> Acompañamiento médico continuo
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_benefit_07" class="collapse" aria-labelledby="heading_benefit_07" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p>No es solo una cita. Reciba orientación, seguimiento y descuentos permanentes durante todo el año.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_benefit_08">
                                            <h5>
                                                <a href="#" style="font-size:19px" data-toggle="collapse" data-target="#collapse_benefit_08" aria-expanded="false" aria-controls="collapse_benefit_08" class="collapsed">
                                                    <span>08.</span> Respaldo institucional Sanaty IPS
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_benefit_08" class="collapse" aria-labelledby="heading_benefit_08" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p>Todos los servicios son prestados por Sanaty IPS, con especialistas, equipos modernos y garantía de calidad médica.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_benefit_09">
                                            <h5>
                                                <a href="#" style="font-size:19px" data-toggle="collapse" data-target="#collapse_benefit_09" aria-expanded="false" aria-controls="collapse_benefit_09" class="collapsed">
                                                    <span>09.</span> Confianza, seguridad y tranquilidad
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_benefit_09" class="collapse" aria-labelledby="heading_benefit_09" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p>Sin filas, sin trámites y sin deudas; solo atención honesta, confiable y cercana.</p>
                                                <p class="font-italic">“Más de mil pacientes ya se han beneficiado del programa preventivo.”</p>
                                                <p class="mb-0 font-italic">“CitasMedicas.es es acceso rápido y oportuno a servicios médicos al mejor precio siempre.”</p>
                                            </div>
                                        </div>
                                    </div>
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
