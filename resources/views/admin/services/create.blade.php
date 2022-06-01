@extends('adminlte::page')
@section('title', 'Registro de Servicio')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
       <h3>Administrar Servicio</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Registrar Información del Servicio</li>
            </ol>
      </div>
    </div>
  </div>
@stop

@section('content')

<div class="container-fluid">
  <x-form-register-service></x-form-register-service>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
@stop

@section('js')

<script src="/js/datatable.js"></script>
    <script>
      $('#div-porcentaje-descuento').hide();
        $('#customSwitch3').change(function() {
            if($(this).is(":checked")) {
                checked = true;
                $('#label_texto_descuento').text('Porcentaje de Descuento').val();
                $('#div-porcentaje-descuento').show();
                $('#div-precio-descuento').hide();
            }
            else {
                checked = false;
                $('#label_texto_descuento').text('Precio con Descuento').val();
                $('#div-precio-descuento').show();
                $('#div-porcentaje-descuento').hide();
           }
        });
        //form of register of user
       $('#quickForm').validate({
            rules: {
                name: {
                required: true,
              },
              description: {
                required: true,
              },
              price_normal: {
                required: true,
              },
              price_discount: {
                required: true,
              },
              redeemed_available: {
                required: true,
              },
              category_id: {
                required: true,
              },
              start_date: {
                required: true,
              },
              end_date: {
                required: true,
              },
            },
            messages: {
                name: {
                    required: "Por favor ingrese el nombre del Servicio",
              },
              description: {
                required: "Por favor ingrese una descripción",
              },
              price_normal: {
                required: "Por favor ingrese el precio normal",
              },
              price_discount: {
                required: "Por favor ingrese el precio con descuento",
              },
              redeemed_available: {
                required: "Por favor ingrese la cantidad de redimidos disponibles",
              },
              category_id: {
                required: "Por favor seleccione la categoría",
              },
              start_date: {
                required: "Seleccione la fecha de inicio del Servicio",
              },
              end_date: {
                required: "Seleccione la fecha de finalización del Servicio",
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
                    var url = "{{route('servicios.store')}}";

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
                                title: 'Servicio registrado exitosamente.',
                                icon: 'success',
                                button: true,
                                timer: 2000
                            });

                            setTimeout(function(){
                                location.href = "{{route('servicios.index')}}";
                            },2000);

                        } else {
                            setTimeout(function(){
                              Swal.fire({
                                    title: respuesta.mensaje,
                                    icon: "error",
                                    button: false,
                                    timer: 5000
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