@php
    function convertirVa($monto){
        $valor = number_format($monto, 2, ',', '.');
        return $valor;
    }
@endphp
<x-main-layout>
    <!-- title -->
    @section('title')Inicio @endsection

    <!---- CSS ----->
    <x-slot name="css">
    </x-slot>


    <!-- Extra Info Start -->
    <div class="extra_info d-none d-lg-block">
        <div class="extra_info--icon">
            <button class="extra_info_close"><i class="ti-close"></i></button>
        </div>
        <div class="extra_info--content text-center">
            <div class="extra_info--title">
                <h3>Let's be Together</h3>
            </div>
            <div class="extra_info--thumb">
                <img class="img_100" src="assets/img/about/about-01.jpg" alt="Extra info thumb">
            </div>
            <div class="extra_info--address">
                <ul>
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <span>1547 Alfred Drive, New York</span>
                    </li>
                    <li>
                        <i class="fas fa-phone-alt"></i>
                        <span>+718-219-9927</span>
                    </li>
                    <li>
                        <i class="fas fa-envelope-open-text"></i>
                        <span>example@gmail.com</span>
                    </li>
                </ul>
            </div>
            <div class="extra_info--social mt-30">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
    <!-- Extra Info End -->
    <!-- |=====|| Header End ||=================| -->
    <!-- |==========================================| -->


    <main>
         <!-- |==========================================| -->
        <!-- |=====|| Slider Start ||===============| -->
        <section class="slider1">
            <div class="slider1__wrapper">
                <div class="slider1__active owl-carousel owl-theme slider-section-dots">
                    <div class="slider1__item slider1__height slider1__img-01 d-flex align-items-center justify-content-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="slider1__content">
                                        <div class="mb-20 fix">
                                            <h5 data-animation="fadeInUp" data-delay=".2s" data-duration=".4s" class="animated fadeInUp">Citasmedicas.es</h5>
                                        </div>
                                        <div class="mb-20 fix">
                                            <h2 data-animation="fadeInUp" data-delay=".5s" data-duration=".4s" class="animated fadeInUp">
                                                Un <span>Médico</span> <br class="d-none d-md-inline-block"> Listo Para Atenderte
                                            </h2>
                                        </div>
                                        <div class="fix mb-20">
                                            <p data-animation="fadeInUp" data-delay=".7s" data-duration=".4s" class="animated fadeInUp">
                                                Tenemos a tu dispocición todo un personal calificado que te
                                                <br class="d-none d-md-inline-block">
                                                ayudara a mejorar tu bienestar y salud.
                                            </p>
                                        </div>
                                        <div class="fix pb-35">
                                            <a data-animation="fadeInUp" data-delay=".4s" data-duration=".8s" href="services.html" class="btn3 d-inline-block animated fadeInUp mr-10">
                                                <span>Learn More</span> <i class="icofont-rounded-double-right"></i>
                                            </a>
                                            <a data-fancybox="gallery_1" data-caption="My caption" href="https://youtu.be/8rPB4A3zDnQ" data-animation="fadeInUp" data-delay=".5s" data-duration=".8s" class="btn4 ml-25 animated fadeInUp d-none d-sm-inline-block">
                                                <span>Watch
                                                    Video</span> <i class="far fa-play-circle"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider1__item slider1__height slider1__img-02 d-flex align-items-center justify-content-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="slider1__content">
                                        <div class="mb-20 fix">
                                            <h5 data-animation="fadeInUp" data-delay=".2s" data-duration=".4s" class="animated fadeInUp">Citasmedicas.es</h5>
                                        </div>
                                        <div class="mb-20 fix">
                                            <h2 data-animation="fadeInUp" data-delay=".5s" data-duration=".4s" class="animated fadeInUp">
                                                Consulta <span>Médica</span> <br class="d-none d-md-inline-block"> En Casa
                                            </h2>
                                        </div>
                                        <div class="fix mb-20">
                                            <p data-animation="fadeInUp" data-delay=".7s" data-duration=".4s" class="animated fadeInUp">
                                                Proteger tu salud desde casa es lo mejor
                                                <br class="d-none d-md-inline-block">
                                                ¡Servicio médico a domicilio!
                                            </p>
                                        </div>
                                        <div class="fix pb-35">
                                            <a data-animation="fadeInUp" data-delay=".4s" data-duration=".8s" href="services.html" class="btn3 d-inline-block animated fadeInUp mr-10">
                                                <span>Learn More</span> <i class="icofont-rounded-double-right"></i>
                                            </a>
                                            <a data-fancybox="gallery_1" data-caption="My caption" href="https://youtu.be/8rPB4A3zDnQ" data-animation="fadeInUp" data-delay=".5s" data-duration=".8s" class="btn4 ml-25 animated fadeInUp d-none d-sm-inline-block">
                                                <span>Watch
                                                    Video</span> <i class="far fa-play-circle"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Slider End ||=================| -->
        <!-- |==========================================| -->


        <!-- |==========================================| -->
        <!-- |=====|| Appointment Start ||===============| -->
        <section class="appointment1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="appointment1__wrapper">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="appointment1__item item-01">
                                        <div class="appointment1__item--thumb">
                                            <img src="assets/img/png-icon/png-icon-06.png" alt="PNG Image">
                                        </div>
                                        <div class="appointment1__item--content">
                                            <h4>Your Location</h4>
                                            <select>
                                                <option data-display="Select Your Location">Select Your Location
                                                </option>
                                                <option value="1">New York</option>
                                                <option value="2">San Jose</option>
                                                <option value="3">San Francisco</option>
                                                <option value="4">Virginia Beach</option>
                                                <option value="5">San Antonio</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="appointment1__item">
                                        <div class="appointment1__item--thumb">
                                            <img src="assets/img/png-icon/png-icon-07.png" alt="PNG Image">
                                        </div>
                                        <div class="appointment1__item--content">
                                            <h4>Select a Services</h4>
                                            <select>
                                                <option data-display="Choose a Services">Choose a Services</option>
                                                <option value="1">Old Advance Care</option>
                                                <option value="2">Home Care Services</option>
                                                <option value="3">Specialized Care</option>
                                                <option value="4">Hourly Home Care</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="appointment1__btn">
                                        <div class="appointment1__item--thumb">
                                            <img src="assets/img/png-icon/png-icon-08.png" alt="PNG Image">
                                        </div>
                                        <a href="services.html" class="btn3 d-inline-block"> <span>Send Us</span> <i
                                                class="icofont-rounded-double-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Appointment End ||=================| -->
        <!-- |==========================================| -->


         <!-- |==========================================| -->
        <!-- |=====|| About Start ||===============| -->
        <section class="about1">
            <div class="content_box_pot_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="about1__left">
                                <div class="about1__left--thumb1">
                                    <img src="assets/img/about/about-02.jpg" alt="About">
                                </div>
                                <div class="about1__left--thumb2">
                                    <a data-fancybox="gallery_1" data-caption="Your caption will be here." href="https://youtu.be/8rPB4A3zDnQ">
                                        <img src="assets/img/png-icon/png-icon-09.png" alt="About">
                                    </a>
                                </div>
                                <div class="about1__left--thumb3">
                                    <img src="assets/img/about/about-03.jpg" alt="About">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="about1__wrapper">
                                <div class="title1 mb-30">
                                    <h3>Podras tener acceso a diferentes y mejores servicios;  <span>Al mejor precio siempre.</span></h3>
                                </div>
                                <div class="about1__content row">
                                    <p>Y ademas tendrás descuentos y precios especiales en diferentes categorías como: </p>
                                    <div class="about1__item mb-65 col-md-6">
                                        <div class="about1__item--thumb about1__item--bg1">
                                            <img src="{{ asset('asset/img/png-icon/png-icon-11.png') }}" alt="About">
                                        </div>
                                        <p>Salud</p>
                                    </div>
                                    <div class="about1__item mb-65 col-md-6">
                                        <div class="about1__item--thumb about1__item--bg2">
                                            <img src="{{ asset('asset/img/png-icon/png-icon-11.png') }}" alt="About">
                                        </div>
                                        <p>Cuidado personal</p>
                                    </div>
                                    <div class="about1__item mb-65 col-md-6">
                                        <div class="about1__item--thumb about1__item--bg2">
                                            <img src="{{ asset('asset/img/png-icon/png-icon-11.png') }}" alt="About">
                                        </div>
                                        <p>Belleza</p>
                                    </div>
                                    <div class="about1__item mb-65 col-md-6">
                                        <div class="about1__item--thumb about1__item--bg2">
                                            <img src="{{ asset('asset/img/png-icon/png-icon-11.png') }}" alt="About">
                                        </div>
                                        <p>Restaurantes</p>
                                    </div>
                                    <div class="about1__btn">
                                        <a href="contact.html" class="btn3"> <span>SUSCRIBETE YA</span> <i class="icofont-rounded-double-right"></i> </a>
                                        <a href="about-us.html" class="btn5 ml-35 d-none d-sm-inline-block">Ver más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| About End ||=================| -->
        <!-- |==========================================| -->



        <!-- |==========================================| -->
        <!-- |=====|| Sección de planes||===============| -->
        <x-information-planes></x-information-planes>

         <!-- |=====|| Counter Start ||===============| -->
         <section class="counter1 counter1__bg-01">
            <div class="content_box_100_50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="title2 mb-55 text-center">
                                <h4>Tenemos</h4>
                                <h2>Muchos beneficios para tí y tu familia</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-sm-6">
                            <div class="counter1__item text-center mb-50">
                                <div class="counter1__thumb">
                                    <i class="flaticon-doctor"></i>
                                </div>
                                <div class="counter1__content">
                                    <h4 class="m-0">Atención priorizada</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="counter1__item text-center mb-50">
                                <div class="counter1__thumb">
                                    <i class="flaticon-ambulance"></i>
                                </div>
                                <div class="counter1__content">
                                    <h4 class="m-0">Especialistas calificados</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="counter1__item text-center mb-50">
                                <div class="counter1__thumb">
                                    <i class="flaticon-patient"></i>
                                </div>
                                <div class="counter1__content">
                                    <h4 class="m-0">Sin trámites</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="counter1__item text-center mb-50">
                                <div class="counter1__thumb">
                                    <i class="flaticon-medical-report"></i>
                                </div>
                                <div class="counter1__content">
                                    <h4 class="m-0">Atención en Línea</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Counter End ||=================| -->
        <!-- |==========================================| -->
        <section class="service1">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="title2 mb-45 text-center">
                                <h4>Los mejores</h4>
                                <h2>Servicios estan aquí</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="service1__carousel owl-carousel">
                                <div class="service1__item mb-30 text-center">
                                    <div class="service1__star">
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="service1__thumb">
                                        <img src="{{ asset('asset/img/png-icon/png-icon-12.png') }}" alt="Image">
                                    </div>
                                    <div class="service1__content mb-40">
                                        <h3>MÉDICOS ESPECIALISTAS</h3>
                                        <p>Aquí encuentras el servicio que necesitas</p>
                                    </div>
                                    <a href="service-details.html" class="btn6"> <span>Ver más</span> <i class="icofont-rounded-double-right"></i> </a>
                                </div>
                                <div class="service1__item mb-30 text-center">
                                    <div class="service1__star">
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="service1__thumb">
                                        <img src="{{ asset('asset/img/png-icon/png-icon-13.png') }}" alt="Image">
                                    </div>
                                    <div class="service1__content mb-40">
                                        <h3>EXÁMENES DIAGNÓSTICOS</h3>
                                        <p>Toma preferencial de muestras y radiografías</p>
                                    </div>
                                    <a href="service-details.html" class="btn6"> <span>Ver más</span> <i class="icofont-rounded-double-right"></i> </a>
                                </div>
                                <div class="service1__item mb-30 text-center">
                                    <div class="service1__star">
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="service1__thumb">
                                        <img src="{{ asset('asset/img/png-icon/png-icon-14.png') }}" alt="Image">
                                    </div>
                                    <div class="service1__content mb-40">
                                        <h3>ATENCIÓN MÉDICA INMEDIATA</h3>
                                        <p>Cobertura en toda la ciudad de Cúcuta</p>
                                    </div>
                                    <a href="service-details.html" class="btn6"> <span>Ver más</span> <i class="icofont-rounded-double-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Service End ||=================| -->
        <!-- |==========================================| -->
        <section class="blog1 overflow-hidden">
            <div class="blog1__top">
                <div class="container text-center align-middle">
                    <a href="https://blog.citasmedicas.es/" class="btn3"> <span>NUESTRO BLOG</span> <i class="icofont-rounded-double-right"></i> </a>
                </div>
            </div>
        </section>
        <!-- |=====|| Blog End ||=================| -->
        <!-- |==========================================| -->
<!-- |==========================================| -->
        <!-- |=====|| Client Start ||===============| -->
        <section class="client1">
            <h3 class="hidden">Client Section</h3>
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="client1__active owl-carousel">
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="{{ asset('asset/img/client/c1.png') }}" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="{{ asset('asset/img/client/c2.png') }}" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="{{ asset('asset/img/client/c3.png') }}" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="{{ asset('asset/img/client/c4.png') }}" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="{{ asset('asset/img/client/c5.png') }}" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="{{ asset('asset/img/client/c6.png') }}" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="{{ asset('asset/img/client/c7.png') }}" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="{{ asset('asset/img/client/c8.png') }}" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="{{ asset('asset/img/client/c9.png') }}" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="{{ asset('asset/img/client/c10.png') }}" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="{{ asset('asset/img/client/c11.png') }}" alt="Client"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Client End ||=================| -->
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
                                        <img src="{{ asset('asset/img/png-icon/png-icon-20.png') }}" alt="Image">
                                    </div>
                                </div>
                                <h3>Llamanos</h3>
                                <h4>+273-649300</h4>
                                <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. cumsan lacus vel facilisis. </p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="contact_page2__form">
                                <h3>Contáctanos</h3>
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
    <x-slot name="js">
      <script>
      $( "#customSwitches1" ).change(function() {
         if($("#customSwitches1").is(':checked')){
           $(".planMensual").css("display","block");
           $(".planAnual").css("display","none"); 
           $(".swith-off").css("color","#768495");
           $(".swith-on").css("color","#007bff");
         }else{
           $(".swith-off").css("color","#007bff");
           $(".swith-on").css("color","#768495");
           $(".planAnual").css("display","block");
           $(".planMensual").css("display","none");
         }

      });
      </script>
    </x-slot>

</x-main-layout>
