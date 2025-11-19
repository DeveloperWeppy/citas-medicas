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
                            <div class="title2 mb-40 text-center mt-50">
                                <h2>Preguntas frecuentes sobre CitasMedicas.es</h2>
                                <p class="mt-10">Resuelve todas tus dudas sobre nuestra plataforma digital de salud preventiva y descubre cómo aprovechar cada beneficio.</p>
                            </div>

                            <!---------------- ACCORDEON START ------------->

                            <div class="accordion_style_01 mb-40">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="heading_01">
                                            <h5>
                                                <a href="#" data-toggle="collapse" data-target="#collapse_01" aria-expanded="false" aria-controls="collapse_01" class="collapsed">
                                                    <span>01.</span> ¿Qué es CitasMedicas.es?
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_01" class="collapse" aria-labelledby="heading_01" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p class="text-justify">CitasMedicas.es es una plataforma digital de salud preventiva que facilita el acceso rápido y oportuno a productos y servicios médicos al mejor precio. Gracias a nuestras alianzas con centros médicos aliados, los usuarios reciben consultas, laboratorios, exámenes diagnósticos y procedimientos con tarifas planas preferenciales durante todo el año.</p>
                                                <p class="text-justify">Diseñamos programas preventivos reales para que las personas ahorren en salud sin filas, sin trámites y sin deudas. No somos EPS, ARS, ARL, PAC, plan de medicina prepagada, póliza en salud, plan de hospitalización o cirugía, servicio de ambulancias o urgencias, servicio funerario, ONG ni plan de ayudas gubernamentales. Tampoco somos un seguro médico ni un modelo de suscripción.</p>
                                                <p class="mb-0 font-italic">Mensajes institucionales oficiales: “CitasMedicas.es; es lo que es.” “Tu salud al mejor precio siempre.” “Sin EPS, sin filas, sin trámites.”</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_02">
                                            <h5>
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_02" aria-expanded="false" aria-controls="collapse_02">
                                                    <span>02.</span> ¿Cuáles son los beneficios de tener CitasMedicas.es?
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_02" class="collapse" aria-labelledby="heading_02" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p class="text-justify">Con un único pago de $139.900 COP accedes al Programa Integral de Promoción y Prevención en Salud Humana – CitasMedicas.es, que incluye:</p>
                                                <ol>
                                                    <li>Consulta médica general preventiva.</li>
                                                    <li>Exámenes de laboratorio clínico: cuadro hemático completo (nivel IV), glicemia, colesterol total/HDL/LDL, triglicéridos, parcial de orina y coproscópico.</li>
                                                    <li>Examen de composición corporal (InBody) para adultos y niños: peso, talla, porcentaje de grasa y músculo, tasa metabólica basal, gasto calórico y distribución corporal.</li>
                                                </ol>
                                                <p class="text-justify">Durante 12 meses tendrás acceso preferencial a los convenios con nuestros centros médicos aliados con descuentos exclusivos en consultas especializadas, laboratorios, ecografías, ecocardiogramas, procedimientos y programas integrales de promoción y prevención (nutrición, control de peso, síndrome metabólico, salud cardiovascular, salud mental, hábitos de sueño, actividad física y orientación médica digital preventiva).</p>
                                                <p class="mb-0"><strong>Beneficios adicionales:</strong> precios fijos todo el año, sin trámites ni autorizaciones de EPS, atención presencial o virtual con médicos reales y cero mensualidades o deudas.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_03">
                                            <h5>
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_03" aria-expanded="false" aria-controls="collapse_03">
                                                    <span>03.</span> ¿Por qué nació CitasMedicas.es?
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_03" class="collapse" aria-labelledby="heading_03" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p class="text-justify">Nacimos como respuesta a las dificultades del modelo tradicional de salud en Colombia: filas interminables, demoras, falta de oportunidad y altos costos. Un grupo de médicos y profesionales creó una alternativa humana, eficiente y accesible para que las familias puedan acceder a atención sin EPS, sin filas y al mejor precio.</p>
                                                <p class="text-justify">Nuestro propósito es democratizar el acceso a la salud preventiva y devolverle al paciente el control sobre su tiempo, bienestar y economía mediante un modelo simple, digital y confiable.</p>
                                                <p><strong>Misión:</strong> promover la prevención, el diagnóstico temprano y el acompañamiento continuo, fortaleciendo el vínculo médico-paciente.</p>
                                                <p class="mb-0"><strong>Visión:</strong> ser la plataforma líder de salud preventiva en Latinoamérica.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_04">
                                            <h5>
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_04" aria-expanded="false" aria-controls="collapse_04">
                                                    <span>04.</span> ¿Cómo funciona CitasMedicas.es?
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_04" class="collapse" aria-labelledby="heading_04" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p class="text-justify">Operamos de forma simple, segura y totalmente digital para que cualquier persona acceda a servicios médicos de calidad sin trámites ni deudas.</p>
                                                <ol>
                                                    <li>Ingresa a www.citasmedicas.es desde tu dispositivo y conoce los beneficios.</li>
                                                    <li>Regístrate con tus datos para asignarte a la sede más cercana.</li>
                                                    <li>Realiza tu pago único en línea ($139.900 COP) con tarjeta, PSE o link Wompi.</li>
                                                    <li>Recibe confirmación inmediata por WhatsApp y correo con tu número de registro.</li>
                                                    <li>Agenda tu cita con ayuda de nuestro equipo.</li>
                                                    <li>Recibe consulta médica preventiva presencial o virtual.</li>
                                                    <li>Accede a los exámenes de laboratorio incluidos.</li>
                                                    <li>Conoce tu composición corporal (InBody) con análisis detallado.</li>
                                                    <li>Obtén orientación médica personalizada.</li>
                                                    <li>Disfruta descuentos preferenciales durante 12 meses en consultas, laboratorios, imágenes y programas de prevención.</li>
                                                </ol>
                                                <p class="mb-0"><strong>Ventajas:</strong> precios fijos, sin autorizaciones, atención presencial o virtual, sin mensualidades ni letra pequeña.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_05">
                                            <h5>
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_05" aria-expanded="false" aria-controls="collapse_05">
                                                    <span>05.</span> ¿Cuáles son los métodos de pago?
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_05" class="collapse" aria-labelledby="heading_05" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p class="text-justify">Puedes pagar de forma segura desde cualquier lugar de Colombia mediante pasarelas certificadas que protegen tus datos personales y bancarios.</p>
                                                <ol>
                                                    <li>Tarjeta débito o crédito (Visa, MasterCard, Amex, Diners).</li>
                                                    <li>Transferencia PSE.</li>
                                                    <li>Link de pago Wompi con respaldo de Bancolombia.</li>
                                                    <li>Pago asistido por WhatsApp con acompañamiento de un asesor.</li>
                                                </ol>
                                                <p class="mb-0"><strong>Importante:</strong> el pago es único por año, no hay mensualidades ni deudas y recibirás confirmación inmediata por WhatsApp y correo.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_06">
                                            <h5>
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_06" aria-expanded="false" aria-controls="collapse_06">
                                                    <span>06.</span> ¿Cómo agendo una cita médica?
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_06" class="collapse" aria-labelledby="heading_06" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ol>
                                                    <li>Recibes confirmación automática del pago vía WhatsApp y correo.</li>
                                                    <li>En máximo 24 horas hábiles un asesor te contacta para elegir fecha, hora y sede.</li>
                                                    <li>Atendemos en centros médicos aliados certificados con horarios de lunes a viernes 6:30 a.m. – 6:00 p.m. y sábados 6:30 a.m. – 1:00 p.m.</li>
                                                    <li>Te enviamos recordatorios y recomendaciones.</li>
                                                    <li>Asistes sin filas ni autorizaciones presentando tu documento.</li>
                                                    <li>Recibes órdenes y exámenes incluidos, además de seguimiento posterior.</li>
                                                </ol>
                                                <p class="mb-0"><strong>Ventajas:</strong> asistencia personalizada, atención prioritaria, recordatorios automáticos y comunicación directa por WhatsApp.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_07">
                                            <h5>
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_07" aria-expanded="false" aria-controls="collapse_07">
                                                    <span>07.</span> ¿Funciona las 24 horas del día?
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_07" class="collapse" aria-labelledby="heading_07" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p class="text-justify">Sí. Nuestra plataforma web funciona 24/7 para que te registres, pagues y recibas confirmación en cualquier momento. Puedes ingresar a www.citasmedicas.es, hacer tu pago y recibir notificación automática al instante.</p>
                                                <p class="text-justify">Los horarios de atención médica presencial son de lunes a viernes 6:30 a.m. – 6:00 p.m. y sábados 6:30 a.m. – 1:00 p.m. Nuestro soporte en línea y WhatsApp está disponible las 24 horas para pagos, solicitudes y agendamientos (las solicitudes fuera del horario hábil se gestionan el siguiente día hábil).</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_08">
                                            <h5>
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_08" aria-expanded="false" aria-controls="collapse_08">
                                                    <span>08.</span> ¿En qué países funciona?
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_08" class="collapse" aria-labelledby="heading_08" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p class="text-justify">Actualmente operamos en Colombia con cobertura nacional gracias a nuestros centros médicos aliados. Estamos preparando la expansión a nuevas ciudades y países de Latinoamérica.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_09">
                                            <h5>
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_09" aria-expanded="false" aria-controls="collapse_09">
                                                    <span>09.</span> ¿Garantizan la privacidad de mis datos personales?
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_09" class="collapse" aria-labelledby="heading_09" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p class="text-justify">Sí. Cumplimos con la Ley 1581 de 2012 sobre protección de datos personales. Tu información médica y personal es confidencial, segura y se utiliza únicamente con fines asistenciales autorizados. El tratamiento de datos sigue nuestra Política de Privacidad y Protección de Datos disponible en www.citasmedicas.es.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_10">
                                            <h5>
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_10" aria-expanded="false" aria-controls="collapse_10">
                                                    <span>10.</span> ¿Qué hago si tengo dudas o quiero una asesoría personalizada?
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_10" class="collapse" aria-labelledby="heading_10" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p class="text-justify">Comunícate con nosotros por WhatsApp al 333 033 3455, escribe a contacto@citasmedicas.es o usa el chat en www.citasmedicas.es para recibir atención inmediata. Nuestro equipo está listo para orientarte en cada paso.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_11">
                                            <h5>
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_11" aria-expanded="false" aria-controls="collapse_11">
                                                    <span>11.</span> ¿Qué es la historia clínica?
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_11" class="collapse" aria-labelledby="heading_11" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p class="text-justify">Es el documento confidencial donde se registra toda tu atención médica, diagnósticos, exámenes y tratamientos. Solo puede ser consultado por ti o tu médico tratante, según la normativa vigente.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading_12">
                                            <h5>
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse_12" aria-expanded="false" aria-controls="collapse_12">
                                                    <span>12.</span> ¿Quién entrega la historia clínica?
                                                    <i class="ti-angle-down"></i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse_12" class="collapse" aria-labelledby="heading_12" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p class="text-justify">La historia clínica pertenece al paciente. Puedes solicitar una copia directamente en el centro médico donde recibiste la atención, presentando tu documento de identidad. La entrega se realiza de forma inmediata o según la regulación aplicable.</p>
                                                <p class="mb-0">Cada prestador es responsable de custodiar y tramitar el acceso a los datos sensibles. Recuerda que CitasMedicas.es no interviene en la elección del médico ni asume responsabilidad sobre los dictámenes clínicos; tampoco es EPS, IPS ni plan de medicina prepagada.</p>
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
