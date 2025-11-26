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
                                <h2>🩵 Preguntas frecuentes sobre Citasmedicas.es</h2>
                                <p class="mt-10">Resuelve todas tus dudas sobre nuestra plataforma digital de salud preventiva y descubre cómo aprovechar cada beneficio.</p>
                            </div>

                            <!---------------- CONTENIDO FAQ START ------------->
                            <div class="faq-content mb-40" style="text-align: left;">
                                
                                <div class="faq-item mb-40">
                                    <h3 class="mb-20" style="color: #0cb8b6; font-weight: 600;">1️⃣ ¿Qué es CitasMedicas.es?</h3>
                                    <p class="text-justify">Citasmedicas.es es una plataforma digital de salud preventiva que facilita el acceso rápido y oportuno a productos y servicios médicos al mejor precio siempre.</p>
                                    <p class="text-justify">A través de alianzas con centros médicos aliados, los usuarios acceden a consultas, laboratorios, exámenes diagnósticos y procedimientos con tarifas planas preferenciales durante todo el año.</p>
                                    <p class="text-justify">Somos expertos en programas preventivos de salud con beneficios reales, diseñados para que las personas puedan ahorrar en servicios médicos, sin filas, sin trámites y sin deudas.</p>
                                    
                                    <p class="mt-20 mb-10"><strong>No somos:</strong></p>
                                    <ul style="list-style: none; padding-left: 20px;">
                                        <li>• EPS (Entidad Promotora de Salud).</li>
                                        <li>• ARS (Administradora del Régimen Subsidiado).</li>
                                        <li>• ARL (Administradora de Riesgos Laborales).</li>
                                        <li>• PAC (Plan de Atención Complementario).</li>
                                        <li>• Plan de medicina prepagada o póliza en salud.</li>
                                        <li>• Plan de hospitalización o cirugía.</li>
                                        <li>• Servicio de ambulancias o urgencias.</li>
                                        <li>• Servicio funerario.</li>
                                        <li>• ONG ni plan de ayudas gubernamentales.</li>
                                    </ul>
                                    <p class="text-justify">Tampoco somos un seguro médico ni un modelo de suscripción.</p>
                                </div>

                                <div class="faq-item mb-40">
                                    <h3 class="mb-20" style="color: #0cb8b6; font-weight: 600;">2️⃣ ¿Cuáles son los beneficios de tener Citasmedicas.es?</h3>
                                    <p class="text-justify">Al realizar un único pago de $139.900 COP, obtienes acceso al:</p>
                                    <p class="mb-10"><strong>Programa Integral de Promoción y Prevención en Salud Humana – Citasmedicas.es, que incluye:</strong></p>
                                    <ol style="padding-left: 30px;">
                                        <li class="mb-10">Consulta médica general preventiva.</li>
                                        <li class="mb-10">Exámenes de laboratorio clínico:
                                            <ul style="list-style: none; padding-left: 20px; margin-top: 10px;">
                                                <li>◦ Cuadro hemático completo (nivel IV).</li>
                                                <li>◦ Glicemia.</li>
                                                <li>◦ Colesterol total, HDL y LDL.</li>
                                                <li>◦ Triglicéridos.</li>
                                                <li>◦ Parcial de orina.</li>
                                                <li>◦ Coproscópico.</li>
                                            </ul>
                                        </li>
                                        <li class="mb-10">Examen de composición corporal (InBody) para adultos y niños:
                                            <p style="padding-left: 20px; margin-top: 5px;">Peso, talla, % grasa, % músculo, tasa metabólica basal, gasto calórico y distribución corporal.</p>
                                        </li>
                                    </ol>
                                    <p class="text-justify mt-20">Además, tendrás acceso preferencial durante 12 meses a los convenios de tarifas planas de nuestros centros médicos aliados, con descuentos exclusivos en:</p>
                                    <ul style="list-style: none; padding-left: 20px;">
                                        <li>• Consultas con médicos especialistas.</li>
                                        <li>• Laboratorios clínicos y diagnósticos.</li>
                                        <li>• Ecografías, ecocardiogramas y procedimientos médicos.</li>
                                        <li>• Programas integrales de promoción y prevención:
                                            <ul style="list-style: none; padding-left: 20px; margin-top: 5px;">
                                                <li>◦ Educación nutricional y control de peso.</li>
                                                <li>◦ Prevención de síndrome metabólico e hipertensión.</li>
                                                <li>◦ Detección temprana de enfermedades hepáticas y digestivas.</li>
                                                <li>◦ Salud cardiovascular.</li>
                                                <li>◦ Salud mental y hábitos de sueño.</li>
                                                <li>◦ Actividad física y control del estrés.</li>
                                                <li>◦ Orientación médica digital preventiva.</li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <p class="mt-20 mb-10"><strong>🩵 Beneficios adicionales:</strong></p>
                                    <ul style="list-style: none; padding-left: 20px;">
                                        <li>• Precios fijos todo el año.</li>
                                        <li>• Sin trámites ni autorizaciones de EPS.</li>
                                        <li>• Atención presencial o virtual con médicos reales.</li>
                                        <li>• Sin mensualidades, sin deudas, sin letra pequeña.</li>
                                    </ul>
                                </div>

                                <div class="faq-item mb-40">
                                    <h3 class="mb-20" style="color: #0cb8b6; font-weight: 600;">3️⃣ ¿Por qué nació Citasmedicas.es?</h3>
                                    <p class="text-justify">Citasmedicas.es nació como una respuesta real a las dificultades del sistema tradicional de salud en Colombia.</p>
                                    <p class="text-justify">Miles de personas enfrentan largas filas, demoras, falta de oportunidad y altos costos en la atención médica privada.</p>
                                    <p class="text-justify">Ante esta realidad, un grupo de médicos y profesionales de la salud creó una alternativa más humana, eficiente y accesible, que permitiera a las familias colombianas acceder a atención médica sin EPS, sin filas y al mejor precio siempre.</p>
                                    <p class="text-justify">Nuestro propósito es democratizar el acceso a la salud preventiva, devolviéndole al paciente el control sobre su tiempo, su bienestar y su economía.</p>
                                    <p class="text-justify">Creemos que la salud no debe depender de autorizaciones ni trámites complejos, sino de un modelo simple, digital y confiable, donde el usuario pueda agendar, pagar y ser atendido con tranquilidad.</p>
                                    <p class="text-justify mb-10"><strong>"Hacer la salud más fácil, más humana y más accesible para todos."</strong></p>
                                    <p class="mb-10"><strong>💬 Misión:</strong></p>
                                    <p style="padding-left: 20px;">Promover la prevención, el diagnóstico temprano y el acompañamiento continuo, fortaleciendo el vínculo entre médico y paciente.</p>
                                    <p class="mb-10"><strong>💡 Visión:</strong></p>
                                    <p style="padding-left: 20px;">Convertirnos en la plataforma líder de salud preventiva en Latinoamérica.</p>
                                </div>

                                <div class="faq-item mb-40">
                                    <h3 class="mb-20" style="color: #0cb8b6; font-weight: 600;">4️⃣ ¿Cómo funciona Citasmedicas.es?</h3>
                                    <p class="text-justify">Citasmedicas.es funciona de manera simple, segura y completamente digital, para que cualquier persona pueda acceder a servicios médicos de calidad sin filas, sin trámites y sin deudas.</p>
                                    <p class="mt-20 mb-10"><strong>🩵 Paso a paso:</strong></p>
                                    <ol style="padding-left: 30px;">
                                        <li class="mb-10"><strong>1️⃣ Ingresa a www.citasmedicas.es</strong><br>
                                            <span style="padding-left: 20px;">Desde tu celular, computador o Tablet, conoce los beneficios del programa y completa tu registro.</span>
                                        </li>
                                        <li class="mb-10"><strong>2️⃣ Regístrate con tus datos personales.</strong><br>
                                            <span style="padding-left: 20px;">Diligencia tus datos (nombre, documento, correo, teléfono y ciudad) para asignarte a la sede médica más cercana.</span>
                                        </li>
                                        <li class="mb-10"><strong>3️⃣ Realiza tu pago único en línea.</strong><br>
                                            <span style="padding-left: 20px;">Por solo $139.900 COP, activas tu programa anual.</span><br>
                                            <span style="padding-left: 20px;">Puedes pagar con:</span>
                                            <ul style="list-style: none; padding-left: 40px; margin-top: 5px;">
                                                <li>• Tarjeta débito o crédito.</li>
                                                <li>• Transferencia PSE.</li>
                                                <li>• Link de pago Wompi.</li>
                                            </ul>
                                        </li>
                                        <li class="mb-10"><strong>4️⃣ Recibe confirmación inmediata.</strong><br>
                                            <span style="padding-left: 20px;">Una vez completes el pago, recibirás un mensaje de confirmación por WhatsApp y correo electrónico con tu número de registro.</span>
                                        </li>
                                        <li class="mb-10"><strong>5️⃣ Agenda tu cita médica.</strong><br>
                                            <span style="padding-left: 20px;">Nuestro equipo de agendamiento te ayudará a escoger la fecha, hora y sede de atención.</span>
                                        </li>
                                        <li class="mb-10"><strong>6️⃣ Consulta médica preventiva.</strong><br>
                                            <span style="padding-left: 20px;">Atención con médico general certificado, de forma presencial o virtual, según tu preferencia.</span>
                                        </li>
                                        <li class="mb-10"><strong>7️⃣ Realiza tus exámenes de laboratorio clínico:</strong>
                                            <ul style="list-style: none; padding-left: 40px; margin-top: 5px;">
                                                <li>• Cuadro hemático completo (nivel IV).</li>
                                                <li>• Glicemia.</li>
                                                <li>• Colesterol total, HDL y LDL.</li>
                                                <li>• Triglicéridos.</li>
                                                <li>• Parcial de orina.</li>
                                                <li>• Coproscópico.</li>
                                            </ul>
                                        </li>
                                        <li class="mb-10"><strong>8️⃣ Conoce tu composición corporal (InBody).</strong><br>
                                            <span style="padding-left: 20px;">Análisis detallado de peso, grasa, músculo, metabolismo y distribución corporal.</span>
                                        </li>
                                        <li class="mb-10"><strong>9️⃣ Recibe orientación médica personalizada.</strong><br>
                                            <span style="padding-left: 20px;">Tu médico te guiará en prevención, nutrición, control de peso y hábitos saludables.</span>
                                        </li>
                                        <li class="mb-10"><strong>🔟 Disfruta tus beneficios durante 12 meses.</strong><br>
                                            <span style="padding-left: 20px;">Acceso a descuentos y tarifas preferenciales en:</span>
                                            <ul style="list-style: none; padding-left: 40px; margin-top: 5px;">
                                                <li>• Consultas con médicos especialistas.</li>
                                                <li>• Laboratorios clínicos y diagnósticos.</li>
                                                <li>• Ecografías, ecocardiogramas y procedimientos médicos.</li>
                                                <li>• Programas integrales de promoción y prevención:
                                                    <ul style="list-style: none; padding-left: 20px; margin-top: 5px;">
                                                        <li>◦ Educación nutricional y control de peso.</li>
                                                        <li>◦ Prevención de síndrome metabólico e hipertensión.</li>
                                                        <li>◦ Detección temprana de enfermedades hepáticas y digestivas.</li>
                                                        <li>◦ Salud cardiovascular.</li>
                                                        <li>◦ Salud mental y hábitos de sueño.</li>
                                                        <li>◦ Actividad física y control del estrés.</li>
                                                        <li>◦ Orientación médica digital preventiva.</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ol>
                                    <p class="mt-20 mb-10"><strong>⚙️ Ventajas del modelo:</strong></p>
                                    <ul style="list-style: none; padding-left: 20px;">
                                        <li>• Precios fijos todo el año.</li>
                                        <li>• Sin trámites ni autorizaciones de EPS.</li>
                                        <li>• Atención presencial o virtual con médicos reales.</li>
                                        <li>• Sin mensualidades, sin deudas, sin letra pequeña.</li>
                                    </ul>
                                </div>

                                <div class="faq-item mb-40">
                                    <h3 class="mb-20" style="color: #0cb8b6; font-weight: 600;">5️⃣ ¿Cuáles son los métodos de pago?</h3>
                                    <p class="text-justify">Puedes pagar de forma segura y confiable desde cualquier lugar del país.</p>
                                    <p class="text-justify">Usamos pasarelas certificadas que garantizan la protección de tus datos personales y bancarios.</p>
                                    <p class="mt-20 mb-10"><strong>💳 Opciones disponibles:</strong></p>
                                    <ol style="padding-left: 30px;">
                                        <li class="mb-10"><strong>1️⃣ Tarjeta débito o crédito:</strong> Visa, MasterCard, Amex o Diners.</li>
                                        <li class="mb-10"><strong>2️⃣ Transferencia PSE:</strong> pago directo desde tu banco.</li>
                                        <li class="mb-10"><strong>3️⃣ Link de pago Wompi:</strong> recibirás un enlace por WhatsApp o correo para pagar con respaldo de Bancolombia.</li>
                                        <li class="mb-10"><strong>4️⃣ Pago asistido por WhatsApp:</strong> un asesor te acompaña paso a paso.</li>
                                    </ol>
                                    <p class="mt-20 mb-10"><strong>🩵 Importante:</strong></p>
                                    <ul style="list-style: none; padding-left: 20px;">
                                        <li>• El pago se realiza una sola vez al año.</li>
                                        <li>• Sin mensualidades ni deudas.</li>
                                        <li>• Confirmación inmediata por WhatsApp y correo electrónico.</li>
                                    </ul>
                                </div>

                                <div class="faq-item mb-40">
                                    <h3 class="mb-20" style="color: #0cb8b6; font-weight: 600;">6️⃣ ¿Cómo agendo una cita médica?</h3>
                                    <p class="text-justify">Agendar tu cita médica en CitasMedicas.es es un proceso rápido, guiado y personalizado.</p>
                                    <ol style="padding-left: 30px;">
                                        <li class="mb-10"><strong>1️⃣ Confirmación automática del pago:</strong> recibirás WhatsApp y correo con tu número de registro.</li>
                                        <li class="mb-10"><strong>2️⃣ Asesor de salud asignado:</strong> en máximo 24 horas hábiles, te contactamos para elegir fecha, hora y sede.</li>
                                        <li class="mb-10"><strong>3️⃣ Centros médicos aliados:</strong> atención en sedes certificadas, con horarios:
                                            <ul style="list-style: none; padding-left: 40px; margin-top: 5px;">
                                                <li>• Lunes a viernes: 6:30 a.m. – 6:00 p.m.</li>
                                                <li>• Sábados: 6:30 a.m. – 1:00 p.m.</li>
                                            </ul>
                                        </li>
                                        <li class="mb-10"><strong>4️⃣ Recordatorio de cita:</strong> mensaje automático con fecha, hora y recomendaciones.</li>
                                        <li class="mb-10"><strong>5️⃣ Atención sin filas ni autorizaciones:</strong> solo presenta tu documento.</li>
                                        <li class="mb-10"><strong>6️⃣ Entrega de órdenes y exámenes incluidos.</strong></li>
                                        <li class="mb-10"><strong>7️⃣ Seguimiento y orientación médica posterior.</strong></li>
                                    </ol>
                                    <p class="mt-20 mb-10"><strong>💙 Ventajas:</strong></p>
                                    <ul style="list-style: none; padding-left: 20px;">
                                        <li>• Asistencia personalizada.</li>
                                        <li>• Atención prioritaria.</li>
                                        <li>• Recordatorios automáticos.</li>
                                        <li>• Comunicación directa por WhatsApp.</li>
                                    </ul>
                                </div>

                                <div class="faq-item mb-40">
                                    <h3 class="mb-20" style="color: #0cb8b6; font-weight: 600;">7️⃣ ¿Funciona las 24 horas del día?</h3>
                                    <p class="text-justify">Sí. La plataforma web de Citasmedicas.es funciona 24/7, permitiendo registrarte, pagar y recibir confirmación en cualquier momento.</p>
                                    <p class="mt-20 mb-10"><strong>🌐 Puedes:</strong></p>
                                    <ul style="list-style: none; padding-left: 20px;">
                                        <li>• Ingresar a www.citasmedicas.es.</li>
                                        <li>• Realizar tu pago en línea a cualquier hora.</li>
                                        <li>• Recibir confirmación automática por WhatsApp y correo electrónico.</li>
                                    </ul>
                                    <p class="mt-20 mb-10"><strong>🕒 Horarios de atención médica:</strong></p>
                                    <ul style="list-style: none; padding-left: 20px;">
                                        <li>• Lunes a viernes: 6:30 a.m. – 6:00 p.m.</li>
                                        <li>• Sábados: 6:30 a.m. – 1:00 p.m.</li>
                                    </ul>
                                    <p class="mt-20 mb-10"><strong>💬 Soporte en línea y WhatsApp:</strong></p>
                                    <p style="padding-left: 20px;">Disponible las 24 horas para pagos, solicitudes o agendamientos.</p>
                                    <p style="padding-left: 20px;">Las solicitudes fuera del horario hábil se gestionan al día siguiente.</p>
                                </div>

                                <div class="faq-item mb-40">
                                    <h3 class="mb-20" style="color: #0cb8b6; font-weight: 600;">8️⃣ ¿En qué países funciona?</h3>
                                    <p class="text-justify">Actualmente, Citasmedicas.es opera en Colombia, con cobertura nacional a través de centros médicos aliados.</p>
                                    <p class="text-justify">Próximamente expandiremos nuestros servicios a otras ciudades y países de Latinoamérica.</p>
                                </div>

                                <div class="faq-item mb-40">
                                    <h3 class="mb-20" style="color: #0cb8b6; font-weight: 600;">9️⃣ ¿Garantizan la privacidad de mis datos personales?</h3>
                                    <p class="text-justify">Sí. Cumplimos con la Ley 1581 de 2012 sobre protección de datos personales.</p>
                                    <p class="text-justify">Tu información médica y personal es confidencial, segura y utilizada únicamente con fines asistenciales autorizados.</p>
                                </div>

                                <div class="faq-item mb-40">
                                    <h3 class="mb-20" style="color: #0cb8b6; font-weight: 600;">🔟 ¿Qué hago si tengo dudas o quiero una asesoría personalizada?</h3>
                                    <p class="text-justify">Puedes comunicarte con nosotros:</p>
                                    <ul style="list-style: none; padding-left: 20px;">
                                        <li><strong>📱 WhatsApp:</strong> 333 033 3455</li>
                                        <li><strong>📧 Correo:</strong> contacto@citasmedicas.es</li>
                                        <li><strong>💬 Chat en la web:</strong> atención inmediata en www.citasmedicas.es</li>
                                    </ul>
                                </div>

                                <div class="faq-item mb-40">
                                    <h3 class="mb-20" style="color: #0cb8b6; font-weight: 600;">1️⃣1️⃣ ¿Qué es la historia clínica?</h3>
                                    <p class="text-justify">Es el documento confidencial donde se registra toda tu atención médica, diagnósticos y tratamientos.</p>
                                    <p class="text-justify">Solo puede ser consultada por ti o tu médico tratante.</p>
                                </div>

                                <div class="faq-item mb-40">
                                    <h3 class="mb-20" style="color: #0cb8b6; font-weight: 600;">1️⃣2️⃣ ¿Quién entrega la historia clínica?</h3>
                                    <p class="text-justify">La historia clínica pertenece al paciente.</p>
                                    <p class="text-justify">Puedes solicitar una copia en el centro médico donde recibiste atención, presentando tu documento.</p>
                                    <p class="text-justify">La entrega suele ser inmediata o según la normativa vigente.</p>
                                </div>

                                <div class="faq-item mb-40 mt-50">
                                    <h3 class="mb-20" style="color: #0cb8b6; font-weight: 600;">📘 Mensajes institucionales oficiales:</h3>
                                    <ul style="list-style: none; padding-left: 20px;">
                                        <li>"CitasMedicas.es; es lo que es."</li>
                                        <li>"CitasMedicas.es; tu salud al mejor precio siempre."</li>
                                        <li>"Sin EPS, sin filas, sin trámites. Atención con especialistas reales y descuentos garantizados."</li>
                                        <li>"Un solo pago al año, sin filas, sin trámites, sin deudas. CitasMedicas.es; es lo que es."</li>
                                    </ul>
                                </div>

                            </div>
                            <!--------------- CONTENIDO FAQ END  ---------------->

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
