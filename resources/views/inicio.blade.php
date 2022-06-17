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
                    <div
                        class="slider1__item slider1__height slider1__img-01 d-flex align-items-center justify-content-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="slider1__content">
                                        <div class="mb-20 fix">
                                            <h5 data-animation="fadeInUp" data-delay=".2s" data-duration=".4s"
                                                class="animated fadeInUp">Medical Center.</h5>
                                        </div>
                                        <div class="mb-20 fix">
                                            <h2 data-animation="fadeInUp" data-delay=".5s" data-duration=".4s"
                                                class="animated fadeInUp">
                                                Best <span>Medical &</span> <br class="d-none d-md-inline-block"> Health
                                                Care Center.
                                            </h2>
                                        </div>
                                        <div class="fix mb-20">
                                            <p data-animation="fadeInUp" data-delay=".7s" data-duration=".4s"
                                                class="animated fadeInUp">
                                                Pleasure, but because those who do not know how to pursue
                                                <br class="d-none d-md-inline-block">
                                                pleasure rationally extremely painful.
                                            </p>
                                        </div>
                                        <div class="fix pb-35">
                                            <a data-animation="fadeInUp" data-delay=".4s" data-duration=".8s"
                                                href="services.html"
                                                class="btn3 d-inline-block animated fadeInUp mr-10">
                                                <span>Learn More</span> <i class="icofont-rounded-double-right"></i>
                                            </a>
                                            <a data-fancybox="gallery_1" data-caption="My caption"
                                                href="https://youtu.be/8rPB4A3zDnQ" data-animation="fadeInUp"
                                                data-delay=".5s" data-duration=".8s"
                                                class="btn4 ml-25 animated fadeInUp d-none d-sm-inline-block">
                                                <span>Watch
                                                    Video</span> <i class="far fa-play-circle"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="slider1__item slider1__height slider1__img-02 d-flex align-items-center justify-content-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="slider1__content">
                                        <div class="mb-20 fix">
                                            <h5 data-animation="fadeInUp" data-delay=".2s" data-duration=".4s"
                                                class="animated fadeInUp">Medical Center.</h5>
                                        </div>
                                        <div class="mb-20 fix">
                                            <h2 data-animation="fadeInUp" data-delay=".5s" data-duration=".4s"
                                                class="animated fadeInUp">
                                                Best <span>Medical &</span> <br class="d-none d-md-inline-block"> Health
                                                Care Center.
                                            </h2>
                                        </div>
                                        <div class="fix mb-20">
                                            <p data-animation="fadeInUp" data-delay=".7s" data-duration=".4s"
                                                class="animated fadeInUp">
                                                Pleasure, but because those who do not know how to pursue
                                                <br class="d-none d-md-inline-block">
                                                pleasure rationally extremely painful.
                                            </p>
                                        </div>
                                        <div class="fix pb-35">
                                            <a data-animation="fadeInUp" data-delay=".4s" data-duration=".8s"
                                                href="services.html"
                                                class="btn3 d-inline-block animated fadeInUp mr-10">
                                                <span>Learn More</span> <i class="icofont-rounded-double-right"></i>
                                            </a>
                                            <a data-fancybox="gallery_1" data-caption="My caption"
                                                href="https://youtu.be/8rPB4A3zDnQ" data-animation="fadeInUp"
                                                data-delay=".5s" data-duration=".8s"
                                                class="btn4 ml-25 animated fadeInUp d-none d-sm-inline-block">
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
                                    <a data-fancybox="gallery_1" data-caption="Your caption will be here."
                                        href="https://youtu.be/8rPB4A3zDnQ">
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
                                    <h4>Acerca de citasmédicas.es</h4>
                                    <h2>We’re lanced most <span>powerful treatment</span> system. They are making
                                        beautifully.</h2>
                                </div>
                                <div class="about1__content">
                                    <p>Every patient getting best care from us. again is there anyone who of itself,
                                        because it is pain, but because occasionally circumstance procure him some great
                                        pleasure. </p>
                                    <div class="about1__item mb-35 mt-25">
                                        <div class="about1__item--thumb about1__item--bg1">
                                            <img src="assets/img/png-icon/png-icon-10.png" alt="About">
                                        </div>
                                        <p>Popular belief Lorem Ipsum is not simply random text. It has roots in a piece
                                            of clasrs old Richard McClintock.</p>
                                    </div>
                                    <div class="about1__item mb-65">
                                        <div class="about1__item--thumb about1__item--bg2">
                                            <img src="assets/img/png-icon/png-icon-11.png" alt="About">
                                        </div>
                                        <p>Easy pament process belief Lorem Ipsum is not simply random text. It has
                                            roots in a McClintock.</p>
                                    </div>
                                    <div class="about1__btn">
                                        <a href="contact.html" class="btn3"> <span>Book Now</span> <i
                                                class="icofont-rounded-double-right"></i> </a>
                                        <a href="about-us.html" class="btn5 ml-35 d-none d-sm-inline-block">Learn
                                            More</a>
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
     
        <!-- |==========================================| -->
        <!-- |=====|| Counter Start ||===============| -->
        <section class="counter1 counter1__bg-01">
            <div class="content_box_100_50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="title2 mb-55 text-center">
                                <h4>Beneficios</h4>
                                <h2>Take a look at our health</h2>
                                <p>Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                                </p>
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
                                    <h3 class="counter">180</h3>
                                    <p class="m-0">Total Doctors</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="counter1__item text-center mb-50">
                                <div class="counter1__thumb">
                                    <i class="flaticon-ambulance"></i>
                                </div>
                                <div class="counter1__content">
                                    <h3 class="counter">20</h3>
                                    <p class="m-0">Ambulance</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="counter1__item text-center mb-50">
                                <div class="counter1__thumb">
                                    <i class="flaticon-patient"></i>
                                </div>
                                <div class="counter1__content">
                                    <h3 class="counter">1080</h3>
                                    <p class="m-0">Total Beds</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="counter1__item text-center mb-50">
                                <div class="counter1__thumb">
                                    <i class="flaticon-medical-report"></i>
                                </div>
                                <div class="counter1__content">
                                    <h3 class="counter">1136</h3>
                                    <p class="m-0">Total Patients</p>
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
                                <h4>Servicios</h4>
                                <h2>HounLare professional services</h2>
                                <p>Why HounLare services is best all time since 1990. desires to obtain of itself,
                                    because it is pain,
                                    but because occasionally circumstance procure him some great deals. </p>
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
                                        <img src="assets/img/png-icon/png-icon-12.png" alt="Image">
                                    </div>
                                    <div class="service1__content mb-40">
                                        <h3>Primary Health Care</h3>
                                        <p>We are line of Lorem Ipsum, Lorem ipsum dolor sit amet. comes from line in
                                            section.</p>
                                    </div>
                                    <a href="service-details.html" class="btn6"> <span>View Details</span> <i
                                            class="icofont-rounded-double-right"></i> </a>
                                </div>
                                <div class="service1__item mb-30 text-center">
                                    <div class="service1__star">
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="service1__thumb">
                                        <img src="assets/img/png-icon/png-icon-13.png" alt="Image">
                                    </div>
                                    <div class="service1__content mb-40">
                                        <h3>Gynecological Clinic</h3>
                                        <p>We are line of Lorem Ipsum, Lorem ipsum dolor sit amet. comes from line in
                                            section.</p>
                                    </div>
                                    <a href="service-details.html" class="btn6"> <span>View Details</span> <i
                                            class="icofont-rounded-double-right"></i> </a>
                                </div>
                                <div class="service1__item mb-30 text-center">
                                    <div class="service1__star">
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="service1__thumb">
                                        <img src="assets/img/png-icon/png-icon-14.png" alt="Image">
                                    </div>
                                    <div class="service1__content mb-40">
                                        <h3>Precise Diagnosis</h3>
                                        <p>We are line of Lorem Ipsum, Lorem ipsum dolor sit amet. comes from line in
                                            section.</p>
                                    </div>
                                    <a href="service-details.html" class="btn6"> <span>View Details</span> <i
                                            class="icofont-rounded-double-right"></i> </a>
                                </div>
                                <div class="service1__item mb-30 text-center">
                                    <div class="service1__star">
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="service1__thumb">
                                        <img src="assets/img/png-icon/png-icon-13.png" alt="Image">
                                    </div>
                                    <div class="service1__content mb-40">
                                        <h3>Cardiac Clinic</h3>
                                        <p>We are line of Lorem Ipsum, Lorem ipsum dolor sit amet. comes from line in
                                            section.</p>
                                    </div>
                                    <a href="service-details.html" class="btn6"> <span>View Details</span> <i
                                            class="icofont-rounded-double-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="service1__bottom-text">
                                <p>Join Our conference & events know more us also be careful myself <a href="#">Join us
                                        here</a></p>
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
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="title2 text-center">
                                <h4>Blog</h4>
                                <h2>Noticias & Blog</h2>
                                <p>We are the best medical services provider in the Worldipsum dolor sit amet,
                                    consectetur adipiscing elit, sed do eiudolore magnaveniam</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog1__bottom">
                <div class="blog1__wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="blog1__item mb-30">
                                    <div class="blog1__thumb">
                                        <img class="img_100" src="assets/img/blog/blog-01.jpg" alt="Blog">
                                    </div>
                                    <div class="blog1__content">
                                        <div class="blog1__data">
                                            <span>
                                                <i class="far fa-user"></i>
                                                <a href="#">Post By: Rt Shuvro</a>
                                            </span>
                                            <span>
                                                <i class="far fa-clone"></i>
                                                <a href="#">Hospital</a>
                                            </span>
                                        </div>
                                        <h3><a href="#">Why we are the best in the world most popular hospital ever?</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="blog1__item mb-30">
                                    <div class="blog1__thumb">
                                        <img class="img_100" src="assets/img/blog/blog-02.jpg" alt="Blog">
                                    </div>
                                    <div class="blog1__content">
                                        <div class="blog1__data">
                                            <span>
                                                <i class="far fa-user"></i>
                                                <a href="#">Post By: Rt Shuvro</a>
                                            </span>
                                            <span>
                                                <i class="far fa-clone"></i>
                                                <a href="#">Medical</a>
                                            </span>
                                        </div>
                                        <h3><a href="#">10 best medical consulting events
                                                you can join and learn much.</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="blog1__item mb-30">
                                    <div class="blog1__thumb">
                                        <img class="img_100" src="assets/img/blog/blog-03.jpg" alt="Blog">
                                    </div>
                                    <div class="blog1__content">
                                        <div class="blog1__data">
                                            <span>
                                                <i class="far fa-user"></i>
                                                <a href="#">Post By: Rt Shuvro</a>
                                            </span>
                                            <span>
                                                <i class="far fa-clone"></i>
                                                <a href="#">Sexual</a>
                                            </span>
                                        </div>
                                        <h3><a href="#">Why we are the best in the world
                                                most popular hospital ever?</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="blog1__btn text-center">
                                    <a href="blog-2.html" class="btn8">See All Post</a>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <a href="#"><img src="assets/img/client/client-01.png" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="assets/img/client/client-02.png" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="assets/img/client/client-03.png" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="assets/img/client/client-04.png" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="assets/img/client/client-05.png" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="assets/img/client/client-02.png" alt="Client"></a>
                                    </div>
                                </div>
                                <div class="client1__item d-flex justify-content-center align-items-center">
                                    <div class="client1__thumb">
                                        <a href="#"><img src="assets/img/client/client-04.png" alt="Client"></a>
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
                                        <img src="assets/img/png-icon/png-icon-20.png" alt="Image">
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
                                            <input class="form-control" type="text" name="name"
                                                placeholder="Full name *" required>
                                        </div>
                                        <div class="col-xl-6">
                                            <input class="form-control" type="text" name="phone-number"
                                                placeholder="Your phone *">
                                        </div>
                                        <div class="col-xl-12">
                                            <input class="form-control" type="text" name="subject"
                                                placeholder="I’m interested in *">
                                        </div>
                                        <div class="col-xl-12">
                                            <input class="form-control" type="email" name="email"
                                                placeholder="Your email *" required>
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
    </x-slot>

</x-main-layout>
