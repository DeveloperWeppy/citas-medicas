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
                    </div>
                </div>
            </div>
        </section>
        <!-- |=====|| Page Title End ||=================| -->
        <!-- |==========================================| -->


        <!-- |==========================================| -->
        <!-- |=====|| Contact Start ||===============| -->
        <div class="about3">
            <div class="content_box_100">
                <div class="container">
                    <div class="row mb-50">
                        <div class="col-md-12">
                            <div class="contact_page1__title text-center">
                                <h2>Contáctenos o envienos su mensaje </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="contact_page1__left mb-30">
                                <div class="contact_page1__left--heading ">
                                    <h4>Contáctanos</h4>
                                </div>
                                <p>
                                  <span style="color: #0cb8b6"><i class="fas fa-envelope"></i></span> contacto@citasmedicas.es
                                    <br><br>
                                   <span style="color: #0cb8b6">  <i class="fas fa-phone-volume"></i></span> +57 11111111111
                                </p>
                              
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="contact_page1__form">
                                <!------- FORM OF CONTACT ------------>
                                <x-form-contact-front></x-form-contact-front>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- |=====|| Contact End ||=================| -->
        <!-- |==========================================| -->

        <!------------------------- SECTION NETWORK SOCIALS START -------------------->
        <section class="appointment2">
            <div class="content_box_100_70">
                <div class="container">
                    <div class="row">
                        <div class="col-12 pb-5 text-center">
                            <h2>Redes Sociales</h2>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="appointment2__item mb-30">
                                <div class="appointment2__thumb-wrapper">
                                    <div class="appointment2__thumb">
                                        <i class="fab fa-facebook"></i>
                                    </div>
                                </div>
                                <div class="appointment2__content">
                                    <h4>FACEBOOK</h4>
                                    <p class="m-0"><a href="https://www.facebook.com/Citasmedicases-103022412424200" target="_blank">Citasmedicas.es</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="appointment2__item mb-30">
                                <div class="appointment2__thumb-wrapper">
                                    <div class="appointment2__thumb">
                                        <i class="fab fa-instagram-square"></i>
                                    </div>
                                </div>
                                <div class="appointment2__content">
                                    <h4>INSTAGRAM</h4>
                                    <p class="m-0"><a href="https://www.instagram.com/citasmedicas.es/" target="_blank">@citasmedicas.es</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="appointment2__item mb-30">
                                <div class="appointment2__thumb-wrapper">
                                    <div class="appointment2__thumb">
                                        <i class="fab fa-whatsapp"></i>
                                    </div>
                                </div>
                                <div class="appointment2__content">
                                    <h4>WHATSAPP</h4>
                                    <p class="m-0"><a href="https://api.whatsapp.com/send?phone=+57&text=Hola, quisiera saber más del convenio con CitasMedicas&source=&data=&app_absent=" target="_blank">Enviar Mensaje</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!------------------------- SECTION NETWORK SOCIALS END -------------------->

    </main>
    {!! NoCaptcha::renderJs() !!}
     <!-- JS |==========================================| -->
     <x-slot name="js">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
                        //form of form contact
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
                              Swal.fire({
                                    title: respuesta.mensaje,
                                    icon: "error",
                                    button: false,
                                    timer: 4000
                                });
                        } 
                    }).fail(function(resp){
                        console.log(resp);
                    });
                  });
            }
          });
        </script>
    </x-slot>

</x-main-layout>
