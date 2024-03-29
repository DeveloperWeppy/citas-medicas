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
                <img class="img_100" src="{{ asset('asset/img/about/about-01.jpg')}} " alt="Extra info thumb">
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
                                                CONSULTA MÉDICA DESDE <span>$39.900?</span>
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
                                            <a data-animation="fadeInUp" data-delay=".4s" data-duration=".8s" href="#planess" class="btn3 d-inline-block animated fadeInUp mr-10">
                                                <span>Suscribete</span> <i class="icofont-rounded-double-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider1__item slider1__height slider1__img-02 d-flex align-items-center justify-content-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="slider1__content">
                                        <div class="mb-20 fix">
                                            <h5 data-animation="fadeInUp" data-delay=".2s" data-duration=".4s" class="animated fadeInUp">Citasmedicas.es</h5>
                                        </div>
                                        <div class="mb-20 fix">
                                            <h2 data-animation="fadeInUp" data-delay=".5s" data-duration=".s" class="animated fadeInUp">
                                                Agendar con especialistas en 1 día?
                                            </h2>
                                        </div>
                                        <div class="fix pb-35">
                                            <a data-animation="fadeInUp" data-delay=".4s" data-duration=".8s" href="#planess" class="btn3 d-inline-block animated fadeInUp mr-10">
                                                <span>Suscribete</span> <i class="icofont-rounded-double-right"></i>
                                            </a>
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
        <!-- |=====|| About Start ||===============| -->
        <section class="about1">
            <div class="content_box_pot_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="about1__left">
                                <div class="about1__left--thumb1">
                                    <img src="{{ asset('asset/img/png-icon/que-es-citas-medicas.png') }}" alt="About">
                                </div>

                                <div class="about1__left--thumb3">
                                    <img src="{{ asset('asset/img/about/beneficios.png') }}" alt="About">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="about1__wrapper">
                                <div class="title1 mb-30">
                                    <h3>¿Qué es citasmedicas.es?</h3>
                                </div>
                                <div class="about1__content row">
                                    <p>Es una plataforma web de pago mensual que conecta suscriptores con los mejores médicos y especialistas de manera inmediata y siempre al mejor precio.
                                        Además de darte acceso a numerosos convenios, ofertas y precios especiales en otras categorías como:
                                    </p>
                                    <div class="w100 text-center">
                                        <div class="about1__item2  mt-25">
                                            <h4><img src="{{ asset('asset/img/png-icon/salud.png') }}" alt="About" class=" mr-10">Salud</h4>
                                        </div>
                                    </div>
                                    <div class="about1__item mb-65 col-md-6">
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
            </div>
        </section>
        <!-- |=====|| About End ||=================| -->
        <!-- |==========================================| -->

        <section class="bg-1 other_page">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="about5__wrapper">
                                <div class="title2 text-center">
                                    <h2 class="text-white">¿Por qué citas médicas?</h2>
                                    <p class="text-white">Sabemos que acceder a servicios de salud suele ser una pesadilla, el sistema de salud público es un caos y las pólizas de medicina prepagada están por las nubes, a demás del calvario para conseguir una cita médica o con especialista puede tardar más de 15 días o incluso meses.
                                        Por eso…
                                        En Citas Médicas hemos diseñado una serie de convenios para que tengas acceso a los mejores médicos y especialistas con el mejor precio siempre a través de una membresía para ti y los tuyos.
                                        Llegamos para transformar la manera en que accedes a servicios de salud
                                    </p>
                                    <a href="{{ route('front.afiliate') }}" class="btn6 mt-30">Suscribirme</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about3">
            <div class="content_box_100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="about3__left-area">
                                <div class="about3__thumb">
                                    <img src="{{ ('asset/img/about/beneficios-citas-medicas.webp') }}" alt="About">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="about3__right-area">
                                <div class="title1 mb-30">
                                    <h4><span>¿Cómo</span> funciona?</h4>
                                    <h3>Acceder a los beneficios que tiene Citas Médicas para ti es muy fácil.</h3>
                                </div>
                                <div class="about3__content">
                                    <ul class="list-group">
                                        <li>
                                            <div class="about1__item3">
                                                <p>1. Selecciona la suscripción de tu preferencia</p>
                                                <p>2. Accedes a tu directorio de beneficios en salud y otras categorías</p>
                                                <p>3. Seleccionas el prestador y el servicio o producto de tu interés</p>
                                                <p>4. Te acercas con tu código de suscripción para redimir tus beneficios</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="about3__content">
                                        <h4 class="listo">¡Y listo! Es así de fácil.</h4>
                                    </div>
                                    <div class="fix">
                                        <a href="{{ route('front.afiliate') }}" class="btn3 d-inline-block animated fadeInUp">
                                            <span>Suscribete</span> <i class="icofont-rounded-double-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- |==========================================| -->
        <!-- |=====|| Sección de planes||===============| -->
        <x-information-planes></x-information-planes>

<!-- |==========================================| -->
        <!-- |=====|| Client Start ||===============| -->
        <section class="client1">
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
        <!-- |=====|| Client End ||=================| -->
        <!-- |==========================================| -->

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
    {!! NoCaptcha::renderJs() !!}
    <x-slot name="js">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>

      $( "#customSwitch1" ).change(function() {
         if($("#customSwitch1").is(':checked')){
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
      $('#contact-form').validate({
            rules: {
                name: {
                required: true,
              },
              phone: {
                required: true,
                minlength:7
              },
              email: {
                required: true,
                email: true,
              },
              message: {
                required: true,
              },
            },
            messages: {
                name: {
                required: "Por favor ingrese el nombre",
              },
              num_phone: {
                required: "Por favor ingrese un Número de Teléfono o Celular",
                minlength: "Ingrese un número válido",
              },
              email: {
                required: "Por favor ingrese un Correo Electrónico",
                email: "Ingrese una dirección de correo válida",
              },
              message: {
                required: "Por favor ingrese el mensaje a enviar",
              },


            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            },
            submitHandler: function(form){
                // agregar data
                $('#contact-form').on('submit', function(e) {
                event.preventDefault();
                var $thisForm = $('#contact-form');
                    var formData = new FormData(this);

                    //ruta
                    var url = "{{route('front.enviarCorreoContacto')}}";

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        type: "post",
                        encoding:"UTF-8",
                        url: url,
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType:'json',
                        beforeSend:function(){
                          Swal.fire({
                                title: 'Enviando mensaje...',
                                button: false,
                                timer: 2000,
                                timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading()
                                    },
                            });
                        }
                    }).done(function(respuesta){
                        //console.log(respuesta);
                      if (!respuesta.error) {

                          Swal.fire({
                                title: respuesta.mensaje,
                                icon: 'success',
                                button: true,
                                timer: 2000
                            });
                            setTimeout(function(){
                                location.reload();
                                },2000);

                        } else {
                            setTimeout(function(){
                              Swal.fire({
                                    title: respuesta.mensaje,
                                    icon: "error",
                                    button: false,
                                    timer: 4000
                                });
                            },2000);
                        }
                    }).fail(function(resp){
                        Swal.fire({
                                    title: 'No has verificado el recaptcha',
                                    icon: "error",
                                    button: false,
                                    timer: 4000
                        });
                    });
                  });
            }
          });
      </script>

    </x-slot>

</x-main-layout>
