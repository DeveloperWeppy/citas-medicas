@extends('adminlte::page')
@section('title', 'Registro de Conveio')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
       <h3>Administrar Convenio</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Registrar Información del Convenio</li>
            </ol>
      </div>
    </div>
  </div>
@stop

@section('content')

<div class="container-fluid">
  <x-form-rgister-user></x-form-rgister-user>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
    <link rel="stylesheet" href="/css/styles.css">
@stop

@section('js')

<script src="/js/datatable.js"></script>
<script>
var datalistServ={!!$serviciosSelect!!};
var refressVal=0;
function refreshSelect2Value(tipo){
  if(tipo==1){$("#dropdown").select2("destroy");}
  $('.mi-selector-edit').select2({
      width: '100%',
      allowClear: true,
      multiple: false,
      placeholder: "Nombre de servicio",
      data: datalistServ
  });
  refressVal=1;
  $(".mi-selector-edit").each(function(){
      $(this).val($(this).attr('value')).trigger("change");
  });
  if($('#customSwitch3').is(":checked")) {
     $('.text-tarifa').text('%').val();
     $('.ceros').hide();
  }else{
      $('.text-tarifa').text('$').val();
      $('.ceros').show();
  }
  refressVal=0;
}
$(document).ready(function() {
    refreshSelect2Value(0);
    $('#customSwitch3').change(function() {
        if($(this).is(":checked")) {
            checked = true;
            $('#label_texto_descuento').text('Porcentaje de Descuento').val();
            $('.text-tarifa').text('%').val();
            $('.ceros').hide();
        }
        else {
            checked = false;
            $('#label_texto_descuento').text('Precio con Descuento').val();
            $('.ceros').show();
            $('.text-tarifa').text('$').val();
       }
    });
});
$(document).on('change', '.formNombreServicio', function() {
  var ifexiste=0;
  if($(this).val()!="" && $(this).val()!=null && refressVal==0){
      var indexIn=$('.formNombreServicio').index(this);
      var valori= $(this).val();
      var varReferencia=this;
      $(".formNombreServicio").each(function(index){
         if($(this).val()==valori && index!=indexIn){
              ifexiste=1;
         }
      });
      if(ifexiste){
        alert("servicio ya se encuentra agregado ");
        $(varReferencia).val("").trigger("change");
        $(varReferencia).attr("value","");
      }
  }
});
function agregarServicio(){
          var ifExist=true;
          $(".formNombreServicio").each(function(){
               if($(this).val()== $("#formNombreServicio").val()){
                 ifExist=false;
               }
          });
          if($("#formNombreServicio" ).val()!="" && $("#formPrecioNormal" ).val()!="" && $("#formPrecioDescuento" ).val()!="" && ifExist){
               var divNom='<div class="col-sm-5 ed"><div class="form-group "><select class="form-control mi-selector-edit formNombreServicio"  name="servicio_id[]" value="'+$("#formNombreServicio" ).val()+'" placeholder="Nombre del Servicio" autocomplete="off" required>  </select></div> </div>';
               var divPre='<div class="col-sm-3"><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text %class%">$</span> </div><input type="number" name="%name%" value="%value%"  class="form-control formPrecioNormal" placeholder="Precio Normal" autocomplete="off"> \n'+
                  '<div class="input-group-append cerosD"><span class="input-group-text">.00</span></div>  </div></div>';
               var divPreNom=divPre.replace('%value%',$("#formPrecioNormal" ).val()).replace('%name%', 'price_normal[]').replace('%class%', '');
               var divPreDes=divPre.replace('%value%',$("#formPrecioDescuento" ).val()).replace('%name%', 'price_descuento[]').replace('%class%', 'text-tarifa').replace('cerosD', 'ceros');
               $(".despusPrin").after('<div class="row ItemServ">'+divNom+divPreNom+divPreDes+'<div class="col-sm-1" style="display:table" onclick="$(this).parent().remove();"><i class="fas fa-trash-alt"  style="font-size:30px;color:red;margin-top:5px" ></i></div></div>');
               $("#formPrecioDescuento" ).val("");
               $("#formPrecioNormal" ).val("");
               $("#formNombreServicio").val("").trigger("change");
               refreshSelect2Value(1);
           }else{
              if(ifExist){
                 alert("Completar campos");
              }else{
                  alert("Servicio ya se encuentra agregado");
              }
           }
       }

      /*  ==========================================
          SHOW UPLOADED IMAGE
      * ========================================== */
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#imageResult')
                      .attr('src', e.target.result);
              };
              reader.readAsDataURL(input.files[0]);
          }
      }

      $(function () {
          $('#upload').on('change', function () {
              readURL(input);
          });
      });
      function readURLBanner(inputt) {
          if (inputt.files && inputt.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#imageResultBanner')
                      .attr('src', e.target.result);
              };
              reader.readAsDataURL(inputt.files[0]);
          }
      }

      $(function () {
          $('#uploadBanner').on('change', function () {
              readURLBanner(inputBA);
          });
      });
      /*  ==========================================
          SHOW UPLOADED IMAGE NAME
      * ========================================== */
      var input = document.getElementById( 'upload' );
      var infoArea = document.getElementById( 'upload-label' );

      input.addEventListener( 'change', showFileName );
      function showFileName( event ) {
        var input = event.srcElement;
        var fileName = input.files[0].name;
        infoArea.textContent = 'File name: ' + fileName;
      }
      var inputBA = document.getElementById( 'uploadBanner' );
      var infoAreaBanner = document.getElementById( 'upload-label-banner' );

      inputBA.addEventListener( 'change', showFileName2);
      function showFileName2( event ) {
        var input = event.srcElement;
        var fileName = input.files[0].name;
        infoAreaBanner.textContent = 'File name: ' + fileName;
      }
        //form of register of user
       $('#quickForm').validate({
            rules: {
              email: {
                required: true,
                email: true,
              },
              password: {
                required: true,
                minlength: 8
              },
              nit: {
                required: true,
              },
              name: {
                required: true,
              },
              address: {
                required: true,
              },
              city: {
                required: true,
              },
              name_contact: {
                required: true,
              },
              num_phone_contact: {
                required: true,
                minlength:7
              },
              email_contact: {
                required: true,
                email: true,
              },
              imgLogo: {
                required: true,
              },
              start_date: {
                required: true,
              },
              end_date: {
                required: true,
              },
              "price_normal[]": {
                required: true,
              },
              "price_descuento[]": {
                required: true,
              },
              "servicio_id[]": {
                required: true,
              },
            },
            messages: {
              email: {
                required: "Por favor ingrese un Correo Electrónico",
                email: "Ingrese una dirección de correo válida",
              },
              password: {
                required: "Por favor ingrese una Contraseña",
                minlength: "Debe tener al menos 8 caracteres la contraseña",
              },
              nit: {
                required: "Por favor ingrese un NIT",
              },
              name: {
                required: "Por favor ingrese el nombre de usuario",
              },
              address: {
                required: "Por favor ingrese una dirección",
              },
              city: {
                required: "Por favor ingrese la ciudad",
              },
              name_contact: {
                required: "Por favor ingrese el nombre de contácto",
              },
              num_phone_contact: {
                required: "Por favor ingrese un Número de Teléfono o Celular",
                minlength: "Ingrese un número válido",
              },
              email_contact: {
                required: "Por favor ingrese un Correo Electrónico de Contácto",
                email: "Ingrese una dirección de correo válida",
              },
              imgLogo: {
                required: "Por favor cargue el logo de la empresa",
              },
              start_date: {
                required: "Seleccione la fecha de inicio del convenio",
              },
              end_date: {
                required: "Seleccione la fecha de finalización del convenio",
              },
              "price_normal[]": {
                required: "Por favor ingresa valor normal del servicio",
              },
              "price_descuento[]": {
                required: "Por favor ingresa valor con descuento del servicio",
              },
              "servicio_id[]": {
                required: "Por favor ingresa el nombre del servicio",
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
                $('#quickForm').on('submit', function(e) {
                event.preventDefault();
                var $thisForm = $('#quickForm');
                    var formData = new FormData(this);

                    //ruta
                    var url = "{{route('usuarios.store')}}";

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
                                title: 'Validando datos, espere por favor...',
                                button: false,
                                timer: 3000,
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
                                title: 'Convenio registrado exitosamente.',
                                icon: 'success',
                                button: true,
                                timer: 2000
                            });

                            setTimeout(function(){
                                location.href = "{{route('usuarios.index')}}";
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
                        console.log(resp);
                    });
                  });
            }
          });




        $(function () {

        });
        </script>
@stop
