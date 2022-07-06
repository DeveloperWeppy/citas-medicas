<x-main-layout>
    <!-- title -->
    @section('title')Contácto @endsection

     <!---- CSS ----->
     <x-slot name="css">
    </x-slot>

    <!----------------------- body ------------------------->
    <main>
        <!-- |==========================================| -->
        <!-- |=====|| Page Title Start ||===============| -->
        <section class="page_title page_title__img-05">
            <div class="page_title__padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page_title__content">
                                <h1>Contacto</h1>
                                <div class="page_title__bread-crumb">
                                    <ul>
                                        <li><a href="index.php">Inicio</a></li>
                                        <li><a href="contacto.php">Contacto</a></li>
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
        <!-- |=====|| Info Start ||===============| -->
        <section class="info1">
            <div class="content_box_100_50">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-md-6">
                            <div class="info1__item text-center mb-50">
                                <div class="info1__thumb">
                                    <img src="assets/img/about/about-18.jpg" alt="Info">
                                </div>
                                <div class="info1__content">
                                    <h4>Our Main Office</h4>
                                    <div class="info1__icon-box">
                                        <div class="info1__icon">
                                            <i class="flaticon-office-building"></i>
                                        </div>
                                    </div>
                                    <p>2020 Beston Icecare Apt. 896, Venaville 202020, United State</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="info1__item text-center mb-50">
                                <div class="info1__thumb">
                                    <img src="assets/img/about/about-19.jpg" alt="Info">
                                </div>
                                <div class="info1__content">
                                    <h4>Los Lngeles</h4>
                                    <div class="info1__icon-box">
                                        <div class="info1__icon">
                                            <i class="flaticon-coworking"></i>
                                        </div>
                                    </div>
                                    <p>2020 Beston Icecare Apt. 896, Venaville 202020, United State</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="info1__item text-center mb-50">
                                <div class="info1__thumb">
                                    <img src="assets/img/about/about-20.jpg" alt="Info">
                                </div>
                                <div class="info1__content">
                                    <h4>Las Vegas</h4>
                                    <div class="info1__icon-box">
                                        <div class="info1__icon">
                                            <i class="flaticon-space-colony"></i>
                                        </div>
                                    </div>
                                    <p>2020 Beston Icecare Apt. 896, Venaville 202020, United State</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Info End ||=================| -->
        <!-- |==========================================| -->


        <!-- |==========================================| -->
        <!-- |=====|| Google Map Start ||===============| -->
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=14&ie=UTF8&iwloc=&output=embed">
                </iframe>
            </div>
        </div>
        <!-- |=====|| Google Map End ||=================| -->
        <!-- |==========================================| -->


        <!-- |==========================================| -->
        <!-- |=====|| Contact Start ||===============| -->
        <div class="contact_page1">
            <div class="content_box_100">
                <div class="container">
                    <div class="row mb-50">
                        <div class="col-md-12">
                            <div class="contact_page1__title text-center">
                                <h2>Contact Us Or Send Us Your Message</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="contact_page1__left mb-30">
                                <div class="contact_page1__left--heading">
                                    <h4>Quick Understanding</h4>
                                </div>
                                <p>Really we are help you as soon as posible. diam voluptua. At vero eos et accusam et
                                    justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus
                                    est Lorem dolor sit ametco.</p>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="contact_page1__form">
                                <form id="contact-form" action="assets/php/mail.php" method="POST">
                                    <div class="row mb-20">
                                        <div class="col-xl-6">
                                            <input class="form-control" type="text" name="name" placeholder="Your full name*" required>
                                        </div>
                                        <div class="col-xl-6">
                                            <input class="form-control" type="email" name="email" placeholder="Mail Address*" required>
                                        </div>
                                        <div class="col-xl-6">
                                            <input class="form-control" type="text" name="phone-number" placeholder="Phone Number*" required>
                                        </div>
                                        <div class="col-xl-6">
                                            <input class="form-control" type="text" name="subject" placeholder="Subject">
                                        </div>
                                        <div class="col-xl-12">
                                            <textarea class="form-control" name="message" placeholder="Your Message" cols="30" rows="7" required></textarea>
                                            <button type="submit" class="btn9">Send Message</button>
                                        </div>
                                    </div>
                                    <p class="form-message"></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- |=====|| Contact End ||=================| -->
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
     <!-- JS |==========================================| -->
     <x-slot name="js">
    </x-slot>

</x-main-layout>
