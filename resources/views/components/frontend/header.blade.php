<div class="preloader">
    <div class="preloader__content">
        <div class="preloader__wrapper">
            <div class="preloader__spinner"></div>
            <div class="preloader__txt">
                <span data-text-preloader="C" class="letters-loading">C</span>
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="T" class="letters-loading">T</span>
                <span data-text-preloader="A" class="letters-loading">A</span>
                <span data-text-preloader="S" class="letters-loading">S</span>
                <span data-text-preloader="M" class="letters-loading">M</span>
                <span data-text-preloader="E" class="letters-loading">E</span>
                <span data-text-preloader="D" class="letters-loading">D</span>
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="C" class="letters-loading">C</span>
                <span data-text-preloader="A" class="letters-loading">A</span>
                <span data-text-preloader="S" class="letters-loading">S</span>
            </div>
        </div>
    </div>
</div>
<!-- |=====|| Preloader End ||=================| -->
<!-- |==========================================| -->


<!-- |==========================================| -->
<!-- |=====|| Header Start ||===============| -->
<header class="header home1">
    <!-- Header Middle Start -->
    <div class="header__middle1">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="header__logo">
                        <a href="index.html"><img src="{{ asset('asset/img/logo/logo.png') }}" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-lg-9 col-sm-6">
                    <div class="header__middle1--right text-right">

                        <div class="header__middle1--btn">
                            <a href="contact.html" class="btn2">SUSCRIBIRSE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Middle End -->
    <!-- Header Menu Start -->
    <div class="header__menu">
        <div class="header__menu-wrapper">
            <div class="container">
                <div class="header__menu-outer">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header__side-nav f_right d-none d-lg-block">
                                <ul>
                                    <li class="search_box_container">
                                        <button class="search_btn button"><i class="fas fa-search"></i></button>
                                        <div class="search_form">
                                            <form action="#">
                                                <input type="text" placeholder="Search...">
                                                <button><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </li>
                                    <li class="extra_info_btn">
                                        <button class="button">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li><a href="{{ route('front.inicio') }}">INICIO</a></li>
                                        <li><a href="{{ route('front.nosotros') }}">NOSOTROS</a></li>
                                        <li><a href="{{ route('front.servicios') }}">SERVICIOS</a></li>
                                        <li><a href="{{ route('front.afiliate') }}">AFÍLIATE AHORA</a></li>
                                        <li><a href="{{ route('front.contacto') }}">CONTACTANOS</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Menu End -->
</header>