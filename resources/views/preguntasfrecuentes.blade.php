<x-main-layout>
    <!-- title -->
  @section('title')Preguntas Frecuentes @endsection

     <!---- CSS ----->
     <x-slot name="css">
    </x-slot>

    <main>
          <!-- |=====|| Page Title Start ||===============| -->
        <section class="page_title page_title__img-11">
            <div class="page_title__padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page_title__content">
                                <h1>Preguntas Frecuentes</h1>
                                <div class="page_title__bread-crumb">
                                    <ul>
                                        <li><a href="{{route('front.inicio')}}">Inicio</a></li>
                                        <li><a href="#">Resuelve todas tus dudas e inquietudes</a> </li>
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

        <section class="working_process1">
            <div class="working_process1__thumb2">
                <img class="img_100" src="http://127.0.0.1:8000/asset/img/png-img/png-img-05.png" alt="Image">
            </div>
            <div class="content_box_pob_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="title2 mb-60 text-center mt-50">
                                <h2>Preguntas Frecuentes</h2>
                            </div>

                            <!---------------- ACCORDEON START ------------->

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
                                                <p>Sí. La información recolectada por El grupo empresarial CITAS MEDICAS.ES WORLD SAS; a través de sus productos y servicios digitales “El portal WEB: 
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
                                                <p>Sí.
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
                                                <p>No. Actualmente nuestros clientes solo están disponibles dentro del territorio colombiano.
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
                                                <p>Sí. Puedes hacerlo al suscribirte como titular del plan familia. <br><br>
                                                    Recuerda que los menores de edad sólo pueden ser vinculados por sus padres o representantes legales debidamente certificados.
                                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_04">
                                            <h5>
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_04" aria-expanded="false" aria-controls="collapse_04">
                                                    <span>04.</span> ¿Qué métodos de pago tiene Citasmedicas.es ?
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_04" class="collapse" aria-labelledby="heading_04" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p>Los métodos de pago están disponibles únicamente a través del pago con Tarjetas de crédito, Débito y/o cualquier medio de pago autorizados por el sistema disponible en la página web www.citasmedicas.es; las cuales deben estar franquiciadas por nuestro proveedor de crédito y débito automático a la cuenta.
                                                   <br> Recuerda que los servicios ofertados en el portal web citasmedicas.es son prestados por terceros y son independientes del Portal WEB.
                                                    <br><br>
                                                    <ul>
                                                        <li>·  Ingresa a nuestro portal web www.citasmedicas.es </li>
                                                        <li>·  Elige el producto o servicio de tu interés, según su perfil profesional, ciudad, país, horario, disponibilidad o modalidad de atención.</li>
                                                        <li>·  Conversa directamente con nuestros proveedores de productos o servicios, haciendo valer tu código de suscripción, obteniendo el mejor precio siempre.</li>
                                                        <li>·   Paga en línea, a través de las diferentes plataformas de pago autorizadas por nuestros clientes.</li>
                                                    </ul>
                                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_04">
                                            <h5>
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_04" aria-expanded="false" aria-controls="collapse_04">
                                                    <span>04.</span> ¿Puedo cancelar el contrato?
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_04" class="collapse" aria-labelledby="heading_04" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p>El Usuario y/o Cliente, podrá solicitar la terminación unilateral del presente contrato en cualquier momento sin pago de multa o 
                                                    sanción alguna por la terminación anticipada, debiendo cumplir en todo caso con el procedimiento señalado en el contrato.
                                                    <br><br>
                                                    El Usuario y/o Cliente, podrá solicitar la terminación unilateral del presente contrato enviando un correo electrónico a soporte@citasmedicas.es  donde especifique el interés de cancelar la suscripción al portal web citasmedicas.es
                                                    <br><br>
                                                    El correo electrónico autorizado para tal fin, debe ser del titular de la cuenta inscrita en el portal web; que se registró a la hora de realizar la inscripción y pago en la plataforma citasmedicas.es
                                                    <br><br>
                                                    Si no le es posible por este medio, igualmente podrá comunicarse a través de todos nuestros canales de comunicación dispuestos en la página web www.citasmedicas.es; para tal fin.
                                                    <br><br>
                                                    Sin importar la causa o modalidad de cancelación de la suscripción al portal web citasmedicas.es; debe hacerse con una cancelación mínima a 30 días calendario de su siguiente cobro programado.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--------------- ACORDEON END  ---------------->

                        </div>
                    </div>
                        <div class=" text-center align-items-center mt-50">
                            <div class="about3__content">
                                <h3 class="listo">¿Necesitas saber más?</h3>
                            </div>
                            <div class="fix mt-30">
                                <a href="{{ route('front.contacto') }}" class="btn3 d-inline-block animated fadeInUp">
                                    <span>Escribenos</span> <i class="icofont-rounded-double-right"></i>
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </section>
       
        <!------------------------- SECTION LOCATION MAP END -------------------->
    </main>
     <x-slot name="js">
    </x-slot>
<script>
</script>
</x-main-layout>
