<x-main-layout>
    <!-- title -->
  @section('title')Preguntas Frecuentes @endsection

     <!---- CSS ----->
     <x-slot name="css">
    </x-slot>

    <main>
          <!-- |=====|| Page Title Start ||===============| -->
        <section class="page_title page_title__img-05">
            <div class="page_title__padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page_title__content">
                                <h1>Preguntas Frecuentes</h1>
                                <div class="page_title__bread-crumb">
                                    <ul>
                                        <li><a href="{{route('front.inicio')}}">Inicio</a></li>
                                        <li><a href="#">Resuelve todas tus dudas</a> </li>
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
                <img class="img_100" src="{{ asset('asset/img/png-img/png-img-05.png')}}" alt="Image">
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
                                                <p class="text-justify">Sí. La información recolectada por El grupo empresarial CITAS MEDICAS.ES WORLD SAS; a través de sus productos y servicios digitales “El portal WEB:
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
                                                <p class="text-justify">Sí.
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
                                                <p class="text-justify">No. Actualmente nuestros clientes solo están disponibles dentro del territorio colombiano.
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
                                                <p class="text-justify">Sí. Puedes hacerlo al suscribirte como titular del plan familia. <br><br>
                                                    Recuerda que los menores de edad sólo pueden ser vinculados por sus padres o representantes legales debidamente certificados.
                                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_05">
                                            <h5>
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_05" aria-expanded="false" aria-controls="collapse_05">
                                                    <span>05.</span> ¿Qué métodos de pago tiene Citasmedicas.es ?
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_05" class="collapse" aria-labelledby="heading_05" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p class="text-justify">Los métodos de pago están disponibles únicamente a través del pago con Tarjetas de crédito, Débito y/o cualquier medio de pago autorizados por el sistema disponible en la página web www.citasmedicas.es; las cuales deben estar franquiciadas por nuestro proveedor de crédito y débito automático a la cuenta.
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
                                        <div class="card-header" id="heading_06">
                                            <h5>
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_06" aria-expanded="false" aria-controls="collapse_06">
                                                    <span>06.</span> ¿Puedo cancelar el contrato?
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_06" class="collapse" aria-labelledby="heading_06" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p class="text-justify">Sí. <br><br> El Usuario y/o Cliente, podrá solicitar la terminación unilateral del presente contrato en cualquier momento sin pago de multa o
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
                                    <div class="card">
                                        <div class="card-header" id="heading_07">
                                            <h5>
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_07" aria-expanded="false" aria-controls="collapse_07">
                                                    <span>07.</span> ¿Quiénes pueden disfrutar de los códigos de descuento, para adquirir productos o servicios; en Citasmedicas.es ?
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_07" class="collapse" aria-labelledby="heading_07" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p class="text-justify">El titular y los beneficiarios que estén registrados, exclusivamente en nuestro portal web
                                                    www.citasmedcicas.es
                                                    <br><br>
                                                    Aclarando que el respectivo pago y registro de sus datos personales se deben hacer única y exclusivamente a través del portal web citasmedicas.es,
                                                    quien dispone de las plataformas de pago reguladas por los entes de control y ajustadas a su política y manejo de datos del Portal WEB y “LA EMPRESA”.
                                                    <br><br>
                                                    El Usuario y/o Cliente, conoce, entiende y acepta que este acuerdo entre usted como Usuario y/o Cliente y el Portal WEB o “LA EMPRESA”, es personal e intransferible y
                                                    que solo beneficia al titular y los beneficiarios que han pagado y están inscritos en el portal web citasmedicas.es
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_08">
                                            <h5>
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_08" aria-expanded="false" aria-controls="collapse_08">
                                                    <span>08.</span> ¿Qué pasa si, se bloquea mi acceso al portal
                                                    Citasmedicas.es ?
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_08" class="collapse" aria-labelledby="heading_08" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p class="text-justify">El Usuario y/o Cliente, podrá desbloquear el acceso al portal web citasmedicas.es; mediante el pago de los
                                                    saldos adeudados ingresando a las pagina web www.citasmedica.es; zona de pagos.
                                                    <br><br>
                                                    Disponible únicamente a través del pago con Tarjetas de crédito, Débito y/o cualquier medio de pago autorizados por el sistema disponible en
                                                    la página web www.citasmedicas.es; las cuales deben estar franquiciadas por nuestro proveedor y débito automático a la cuenta.
                                                    <br><br>
                                                    El Usuario y/o Cliente, conoce, entiende y acepta que el atraso superior a 60 días en el pago de la inscripción y de la cuota mensual de suscripción en la fecha programada o la mora del Usuario y/o Cliente, podrá conllevar a la cancelación automática del  acceso del portal web citasmedicas.es y por ende a los servicios o productos ofertados por los médicos independientes,
                                                     prestadores de servicios de salud debidamente habilitados por los entes reguladores, así como los diferentes oferentes de productos y servicios de su elección.
                                                     <br><br>
                                                     El periodo empezara a contar a partir del primer pago rechazado, por nuestros medios pago autorizados por el sistema disponible en la página web www.citasmedicas.es;
                                                     las cuales deben estar franquiciadas por nuestro proveedor y débito automático a la cuenta.
                                                     <br><br>
                                                     El Usuario y/o Cliente, conoce, entiende y acepta que el incumplimiento del pago de la inscripción y de la cuota mensual de suscripción en la fecha programada o la mora del Usuario y/o Cliente, podrá conllevar a el bloqueo al acceso del portal web citasmedicas.es y por ende a los servicios o productos ofertados por los médicos independientes,
                                                     prestadores de servicios de salud debidamente habilitados por los entes reguladores, así como los diferentes oferentes de productos y servicios de su elección.
                                                     <br><br>
                                                     El Usuario y/o Cliente, conoce, entiende y acepta que el valor de la  inscripción y la cuota mensual de suscripción,
                                                     pactada entre usted como como Usuario y/o Cliente y el Portal WEB o “LA EMPRESA”,  se efectuara los cinco ( 5 ) primeros días de cada mes.
                                                      <br><br>
                                                      Debido a que los cargos son automáticos, el Usuario y/o Cliente, titular del presente contrato se obliga a mantener la tarjeta asignada débito o crédito, con crédito o saldo suficiente, en el entendido que al registrase en la plataforma web citasmedicas.es;
                                                      el primer rechazo al cargo el sistema bloqueara el acceso a la plataforma citasmedicas.es; y con ello a los servicios o productos ofertados por los médicos independientes, prestadores de servicios de salud debidamente habilitados por los entes reguladores, así como los diferentes oferentes de productos y servicios de su elección.
                                                      <br><br>
                                                      Derivado de que el Usuario y/o Cliente, titular del presente contrato, autoriza a “EL PORTAL WEB Y LA EMPRESA”,
                                                      para aplicar los cargos de manera automática a su tarjeta de crédito o débito, el Usuario y/o Cliente titular del presente contrato, acepta que en el momento que su plástico venza y/o sea ronavado, los cargos se seguirán realizando de manera normal, sin necesidad de una nueva autorización “EL PORTAL WEB Y LA EMPRESA”.
                                                      <br><br>
                                                      El Usuario y/o Cliente, titular del presente contrato, podrá revocar la presente autorización enviando un correo electrónico a soporte@citasmedicas.es
                                                      <br><br>
                                                      El correo electrónico autorizado para tal fin, debe ser del titular de la cuenta inscrita en el portal web; que se registró a la hora de realizar la inscripción y pago en la plataforma citasmedicas.es
                                                      <br><br>
                                                      Si no le es posible por este medio, igualmente podrá comunicarse a través de todos nuestros canales de comunicación dispuestos en la página web www.citasmedicas.es; para tal fin
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_09">
                                            <h5>
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_09" aria-expanded="false" aria-controls="collapse_09">
                                                    <span>09.</span> ¿Qué hago si; tengo dudas y requiero una asesoría de Citasmedicas.es ?

                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_09" class="collapse" aria-labelledby="heading_09" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p class="text-justify">Si Usted requiere información adicional o requiere un asesoramiento sobre el funcionamiento del “PORTAL citasmedicas.es”, puede contactarnos a través del correo electrónico  soporte@citasmedicas.es  o ingresando a nuestra página web en la sección:
                                                    <br><br>
                                                    www.citasmedicas.es/ayuda o cualquiera de los medios de comunicación digital disponibles en nuestra página web, donde uno de nuestros asesores le orientara de manera oportuna.

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_10">
                                            <h5>
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_10" aria-expanded="false" aria-controls="collapse_10">
                                                    <span>10.</span> ¿Qué es la historia clínica?

                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_10" class="collapse" aria-labelledby="heading_10" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p class="text-justify">La historia clínica es un documento privado y obligatorio, sometido al uso exclusivo por parte de los profesionales de la salud y sus pacientes.
                                                    En ella se ven reflejadas todas las citas médicas a las cuales ha asistido el paciente, los exámenes, así como los medicamentos y tratamientos que le hayan sido prescritos.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_11">
                                            <h5>
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_11" aria-expanded="false" aria-controls="collapse_11">
                                                    <span>11.</span> ¿Quién me entrega la historia clínica ?

                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_11" class="collapse" aria-labelledby="heading_11" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p class="text-justify">Las historias clínicas son de uso y responsabilidad exclusiva de los médicos y los centros médicos habilitados por los entes reguladores.
                                                    <br><br>
                                                    Cada oferente de producto o servicio médico, tiene la obligación de custodiar y tramitar el acceso a sus datos sensibles, así como la historia clínica.
                                                    <br><br>
                                                    <ul>
                                                        <li>·   Recuerda que nuestro portal web www.citasmedicas.es  no tienen injerencia en la elección de los médicos independientes, ni de los prestadores de servicios de salud o cualquier otro servicio o producto ofertado.</li>
                                                        <li>·   Ni el portal ni la empresa tienen responsabilidad alguna sobre los dictámenes, conceptos, recomendaciones, opiniones y/o decisiones de carácter médico que se tomen durante la relación contractual entre el
                                                             médico y/o prestador de un servicio o producto ofertado, y el paciente y/o el cliente.</li>
                                                        <li>·   Tener en cuenta que ni el portal, ni la empresa son consideradas como empresas promotoras de salud (EPS), instituciones prestadoras de servicios de salud (IPS),
                                                             planes de medicina prepagada, pólizas en salud, planes de atención complementaria (PAC); empresas del régimen contributivo o subsidiado, empresas que administren programas gubernamentales ni estatales, organizaciones no gubernamentales o ayudas humanitarias.</li>
                                                    </ul>
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
