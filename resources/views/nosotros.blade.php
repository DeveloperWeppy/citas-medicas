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
            <div class="working_process1__thumb1">
                <img class="img_100" src="{{ asset('asset/img/png-img/png-img-04.png') }}" alt="Image">
            </div>
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
                </div>
            </div>
        </section>
        <!-- |=====|| Working Process End ||=================| -->
        <!-- |==========================================| -->
        <!-- |==========================================| -->
        <!-- |=====|| About Start ||===============| -->
       
        <!-- |=====|| Appointment End ||=================| -->
        <!-- |==========================================| -->


        <!-- |==========================================| -->
        <!-- |=====|| Contact Start ||===============| -->
        <section class="contact1">
            <div class="content_box_100">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-lg-5">
                            <div class="contact1__info text-center">
                                <div class="contact1__thumb-wrapper">
                                    <div class="contact1__thumb">
                                        <img src="assets/img/png-icon/png-icon-20.png" alt="Image">
                                    </div>
                                </div>
                                <h3>Emergency call</h3>
                                <h4>+273-649300</h4>
                                <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. cumsan lacus vel facilisis. </p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="contact_page2__form">
                                <h3>Get appointment</h3>
                                <form id="contact-form" action="assets/php/mail.php" method="POST">
                                    <div class="row mb-20">
                                        <div class="col-xl-6">
                                            <input class="form-control" type="text" name="name" placeholder="Full name *" required>
                                        </div>
                                        <div class="col-xl-6">
                                            <input class="form-control" type="text" name="phone-number" placeholder="Your phone *">
                                        </div>
                                        <div class="col-xl-12">
                                            <input class="form-control" type="text" name="subject" placeholder="I’m interested in *">
                                        </div>
                                        <div class="col-xl-12">
                                            <input class="form-control" type="email" name="email" placeholder="Your email *" required>
                                        </div>
                                        <div class="col-xl-12">
                                            <button type="submit" class="btn8">Send Us</button>
                                        </div>
                                    </div>
                                    <p class="form-message"></p>
                                </form>
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
