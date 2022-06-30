<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Correo Electrónico</title>

        <style type="text/css">

            .css_table_main {
                margin-left: auto;
                margin-right: auto;
                padding: 0;
                box-shadow: 0 0 10px rgba(0,0,0,.2);
                font-family: sans-serif;
                font-size: 14px;
                background: #FFF;
                border: 1px solid #ddd;
                width: 635px;
                color: #555555;
                line-height: 18px;
                border-spacing: 0;
                border-radius: 6px;
            }

            .css_h1_main {
                color: #555;
            }

            .css_hr {
                display: block;
                border: none;
                border-top: 2px solid #f2f2f2;
            }

            .css_footer {
                display: block;
                padding: 15px;
                margin: 0;
                background: #2bcdcbe0;
                color: #FFF;
                text-align: center;
                font-size:14px;
            }

            .css_footer_link {
                color: #fff !important;
                text-decoration: none;
            }

            .css_footer_redes {
                text-align: center;
                margin-bottom: 10px;
            }

            .css_footer_redes a{
                text-decoration: none;
            }

            .css_footer_redes img{
                width: 30px;
            }

            .css_table_secondary {
                width: 100%;
                border: 1px solid #ddd;
                border-bottom: 0;
                border-spacing: 0;
                line-height: 16px;
            }

            .css_table_secondary_body_th {
                border-bottom: 1px solid rgb(171, 169, 169);
                padding: 5px;
                background-color: #dadada;
                text-align: left;
                border-right: 1px solid #ddd;
            }

            .css_table_secondary_body_td {
                border-bottom: 1px solid #ddd;
                padding: 5px;
                background-color: #fff;
                text-align: left;
                border-right: 1px solid #ddd;
            }

        </style>
    </head>

    <body style="background: #f4f4f4; padding: 20px;">
        <table width="635" border="0" valign="top" class="css_table_main">
            <tbody>
                <tr>
                    <td style="padding: 0; margin: 0; border: 0; width: 635px;">
                        <img src="cid:img_header" style="border-radius: 6px 6px 0 0; border-bottom:1px solid #f2f2f2">
                    </td>
                </tr>
                <tr>
                    <!-- TITULAR -->
                    <td style="display: block; padding: 5px 15px; text-align: center;">
                        <h1 class="css_h1_main">{{ $title }}</h1>
                    </td>
                </tr>

                <tr>
                    <!-- SEPARADOR -->
                    <td style="display: block; padding: 0 15px;">
                        <hr class="css_hr">
                    </td>
                </tr>

                <tr><!-- CONTENIDO TITULAR -->
                    <td style="display: block; padding: 5px 15px;">
                       <p style="font-size:12px;">Estimado Sr(a) <strong>{{ $nombre_client }}</strong>,  Esto es una copia de su suscripción a través de nuestro sitio web.</p>
                       <p style="font-size:12px;">Desde ahora podrás acceder a:</p>
                       <ul style="font-size:12px;">
                          <li>Beneficios con diferentes convenios</li>
                          <li>Ofertas </li>
                       </ul>
                       <p style="font-size:12px;">Para iniciar sesión en nuestro panel, haz click en el botón "Iniciar Sesión", ubicado en la parte superior derecha de la página e introduce tu usuario y contraseña o <a href="{{ route('login') }}">dando click aqui</a></p>
                    </td>
                 </tr>

                <tr><!-- CONTENIDO -->
                    <td style="display: block; padding: 5px 15px;">
                       <table width="100%" border="0" class="css_table_secondary">
                         <tbody>
                             <tr style="border-bottom: 1px solid #ddd; vertical-align: top;">
                                <th width="30%" class="css_table_secondary_body_th">Usuario:</th>
                                <td width="70%" class="css_table_secondary_body_td">{{ $email }}</td>
                             </tr>
                             <tr style="border-bottom: 1px solid #ddd; vertical-align: top;">
                                <th width="30%" class="css_table_secondary_body_th">Contraseña:</th>
                                <td width="70%" class="css_table_secondary_body_td">{{ $number_identication }}</td>
                             </tr>
                          </tbody>
                       </table>
                    </td>
                 </tr>

                <tr>
                    <!-- SEPARADOR -->
                    <td style="display: block; padding: 15px;">
                        <hr class="css_hr">
                    </td>
                </tr>

                <tr><!-- CONTENIDO DEL PLAN -->
                    <td style="display: block; padding: 5px 15px;">
                       <table width="100%" border="0" class="css_table_secondary">
                         <tbody>
                             <tr style="border-bottom: 1px solid #ddd; vertical-align: top;">
                                <th width="30%" class="css_table_secondary_body_th">Plan Adquirido:</th>
                                <td width="70%" class="css_table_secondary_body_td">{{ $plan->name }}</td>
                             </tr>
                          </tbody>
                       </table>
                    </td>
                 </tr>

                 <tr>
                    <!-- SEPARADOR -->
                    <td style="display: block; padding: 15px;">
                        <hr class="css_hr">
                    </td>
                </tr>

                <tr>
                    <!-- REDES SOCIALES -->
                    <td class="css_footer_redes">
                        <p>Siguenos en nuestras Redes Sociales!</p>
                        <a href="https://www.facebook.com/Citasmedicas.es/" target="_blank">
                            <img src="cid:correo_facebook" style="padding: 0px 10px;">
                        </a>
                        <a href="https://www.instagram.com/citasmedicas.es" target="_blank">
                            <img src="cid:correo_instagram" style="padding: 0px 10px;">
                        </a>
                       {{--  <a href="{{ $configuracion->red_social_whatsapp }}" target="_blank">
                            <img src="cid:correo_whatsapp" style="padding: 0px 10px;">
                        </a> --}}
                    </td>
                </tr>

                <tr>
                    <!-- AVISO RESPUESTA AUTOMATICA -->
                    <td
                        style="display: block; padding: 10px; background: #f6f6f6; color:#999; margin-top: 10px; text-align: center;">
                        Este correo se ha generado de forma automatica, favor no responder.
                    </td>
                </tr>

                <tr>
                    <!-- FOOTER -->
                    <td class="css_footer">
                        <a href="{{ route('front.inicio') }}" target="_self" class="css_footer_link">{{ date('Y') }} - CitasMedicas.es</a>
                    </td>
                </tr>
            </tbody>
        </table>

    </body>

</html>