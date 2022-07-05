<x-main-layout>
    <!-- title -->
    @section('title')Servicios @endsection

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
                                        <li><a href="index.php">Inicio</a></li>
                                        <li><a href="beneficios.php">Beneficios</a></li>
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
        <section class="service1 other_page">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="title2 mb-45 text-center">
                                <h4>Trusted service</h4>
                                <h2>We’re launched most powerful treatment system. They are <span>making
                                        beautifully</span>.</h2>
                                <p>Why HounLare services is best all time since 1990. desires to obtain of itself,
                                    because it is pain, but because <br class="d-none d-xl-inline-block"> occasionally
                                    circumstance procure him some great
                                    deals. </p>
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
                                        <img src=" {{ asset('asset/img/png-icon/png-icon-12.png') }}" alt="Image">
                                    </div>
                                    <div class="service1__content mb-40">
                                        <h3>Primary Health Care</h3>
                                        <p>We are line of Lorem Ipsum, Lorem ipsum dolor sit amet. comes from line in
                                            section.</p>
                                    </div>
                                    <a href="#" class="btn6"> <span>View Details</span> <i class="icofont-rounded-double-right"></i> </a>
                                </div>
                                <div class="service1__item mb-30 text-center">
                                    <div class="service1__star">
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="service1__thumb">
                                        <img src="{{ asset('asset/img/png-icon/png-icon-13.png') }}" alt="Image">
                                    </div>
                                    <div class="service1__content mb-40">
                                        <h3>Gyneological Clinic</h3>
                                        <p>We are line of Lorem Ipsum, Lorem ipsum dolor sit amet. comes from line in
                                            section.</p>
                                    </div>
                                    <a href="#" class="btn6"> <span>View Details</span> <i class="icofont-rounded-double-right"></i> </a>
                                </div>
                                <div class="service1__item mb-30 text-center">
                                    <div class="service1__star">
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="service1__thumb">
                                        <img src="{{ asset('asset/img/png-icon/png-icon-14.png') }}" alt="Image">
                                    </div>
                                    <div class="service1__content mb-40">
                                        <h3>Precise Diagnosis</h3>
                                        <p>We are line of Lorem Ipsum, Lorem ipsum dolor sit amet. comes from line in
                                            section.</p>
                                    </div>
                                    <a href="#" class="btn6"> <span>View Details</span> <i class="icofont-rounded-double-right"></i> </a>
                                </div>
                                <div class="service1__item mb-30 text-center">
                                    <div class="service1__star">
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="service1__thumb">
                                        <img src="{{ asset('asset/img/png-icon/png-icon-13.png') }}" alt="Image">
                                    </div>
                                    <div class="service1__content mb-40">
                                        <h3>Cardiac Clinic</h3>
                                        <p>We are line of Lorem Ipsum, Lorem ipsum dolor sit amet. comes from line in
                                            section.</p>
                                    </div>
                                    <a href="#" class="btn6"> <span>View Details</span> <i class="icofont-rounded-double-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="service1__bottom-text">
                                <p>Join Our conference & events know more us also be careful myself <a href="contact.html">Join us
                                        here</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Service End ||=================| -->
        <!-- |==========================================| -->


        <!-- |==========================================| -->
        <!-- |=====|| Service Start ||===============| -->
        <section class="service3 other_page">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="title2 mb-45 text-center">
                                <h4>Our Services</h4>
                                <h2><span>HounLare</span> professional services</h2>
                                <p>Why HounLare services is best all time since 1990. desires to obtain of itself,
                                    because it is pain, but because <br class="d-none d-xl-inline-block"> occasionally
                                    circumstance procure him some great
                                    deals. </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-lg-4 col-md-6">
                            <div class="service3__item mb-30">
                                <div class="service3__thumb">
                                    <img src="{{ asset('asset/img/service/service-10.jpg') }}" alt="Service">
                                    <a data-fancybox="gallery_3" data-caption="My caption" href="{{ asset('asset/img/service/service-10.jpg') }}"><i class="icofont-plus"></i></a>
                                </div>
                                <div class="service3__content text-center">
                                    <h3><a href="#">Dental Care</a></h3>
                                    <p class="m-0">Care your health make smile forever</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="service3__item mb-30">
                                <div class="service3__thumb">
                                    <img src="{{ asset('asset/img/service/service-09.jpg') }}" alt="Service">
                                    <a data-fancybox="gallery_3" data-caption="My caption" href="{{ asset('asset/img/service/service-09.jpg') }}"><i class="icofont-plus"></i></a>
                                </div>
                                <div class="service3__content text-center">
                                    <h3><a href="#">Old Care</a></h3>
                                    <p class="m-0">Care your health make smile forever</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="service3__item mb-30">
                                <div class="service3__thumb">
                                    <img src="{{ asset('asset/img/service/service-08.jpg') }}" alt="Service">
                                    <a data-fancybox="gallery_3" data-caption="My caption" href="{{ asset('asset/img/service/service-08.jpg') }}"><i class="icofont-plus"></i></a>
                                </div>
                                <div class="service3__content text-center">
                                    <h3><a href="#">Dental Care</a></h3>
                                    <p class="m-0">Care your health make smile forever</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="service3__item mb-30">
                                <div class="service3__thumb">
                                    <img src="{{ asset('asset/img/service/service-07.jpg') }}" alt="Service">
                                    <a data-fancybox="gallery_3" data-caption="My caption" href="{{ asset('asset/img/service/service-07.jpg') }}"><i class="icofont-plus"></i></a>
                                </div>
                                <div class="service3__content text-center">
                                    <h3><a href="#">Home Care</a></h3>
                                    <p class="m-0">Care your health make smile forever</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="service3__item mb-30">
                                <div class="service3__thumb">
                                    <img src="{{ asset('asset/img/service/service-06.jpg') }}" alt="Service">
                                    <a data-fancybox="gallery_3" data-caption="My caption" href="{{ asset('asset/img/service/service-06.jpg') }}"><i class="icofont-plus"></i></a>
                                </div>
                                <div class="service3__content text-center">
                                    <h3><a href="#">Baby Care</a></h3>
                                    <p class="m-0">Care your health make smile forever</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="service3__item mb-30">
                                <div class="service3__thumb">
                                    <img src="{{ asset('asset/img/service/service-05.jpg') }}" alt="Service">
                                    <a data-fancybox="gallery_3" data-caption="My caption" href="{{ asset('asset/img/service/service-05.jpg') }}"><i class="icofont-plus"></i></a>
                                </div>
                                <div class="service3__content text-center">
                                    <h3><a href="#">Dental Care</a></h3>
                                    <p class="m-0">Care your health make smile forever</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="service3__bottom-text">
                                <p class="m-0">Join Our conference & events know more us also be careful myself <a href="contact.html">Join us here</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Service End ||=================| -->
        <!-- |==========================================| -->


        <!-- |==========================================| -->
        <!-- |=====|| Counter Start ||===============| -->
        <section class="counter2">
            <div class="content_box_100_50">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-4">
                            <div class="counter2__item mb-50 text-center">
                                <h3><span class="counter">27</span>k</h3>
                                <p class="m-0">Best work experience. We love to make everything.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="counter2__item mb-50 text-center">
                                <h3><span class="counter">10</span>%</h3>
                                <p class="m-0">Our successful story cause we offer 10% every time.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="counter2__item mb-50 text-center">
                                <h3><span class="counter">100</span>+</h3>
                                <p class="m-0">100+ active health care & caregiver branches.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Counter End ||=================| -->
        <!-- |==========================================| -->


        <!-- |==========================================| -->
        <!-- |=====|| FAQ Start ||===============| -->
        <section class="faq1">
            <div class="faq1__thumb1"></div>
            <div class="faq1__thumb2"></div>
            <div class="faq1__thumb3 text-center">
                <h3>Do You Have <br class="d-none d-md-inline-block"> Emergency Case.</h3>
                <a href="#" class="btn3"> <span>Call Our Ambulance</span> <i class="icofont-rounded-double-right"></i>
                </a>
            </div>
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 offset-xl-6">
                            <div class="faq1__wrapper">
                                <h3>What is your question in mind?</h3>
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
                                <a href="#" class="btn3"> <span>More Information <span>Is Here</span></span> <i class="icofont-rounded-double-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| FAQ End ||=================| -->
        <!-- |==========================================| -->


        <!-- |==========================================| -->
        <!-- |=====|| Client Start ||===============| -->
        <section class="client1 home3">
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
    </main>
     <!-- |==========================================| -->
     <x-slot name="js">
    </x-slot>

</x-main-layout>
