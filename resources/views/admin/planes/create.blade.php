@extends('adminlte::page')
@section('title', 'Registro de Plan')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
       <h3>Administrar Plan</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Registrar Información del Plan</li>
            </ol>
      </div>
    </div>
  </div>
@stop

@section('content')

<div class="container-fluid">
  <x-form-register-plan></x-form-register-plan>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
    <link rel="stylesheet" href="/css/styles.css">
@stop

@section('js')
    <script>
        $('#cantidad_personas').hide();
        $('#customSwitch3').change(function() {
            if($(this).is(":checked")) {
                checked = true;
                $('#valor').text('Si').val();
                $('#cantidad_personas').show();
            }
            else {
                checked = false;
                $('#valor').text('No').val();
                $('#cantidad_personas').hide();
           }
        });

        $('#customSwitch4').change(function() {
            if($(this).is(":checked")) {
                checked = true;
                $('#tipo_plan').text('Anual').val();
            }
            else {
                checked = false;
                $('#tipo_plan').text('Mensual').val();
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
              duration_in_days: {
                required: true,
              },
              price: {
                required: true,
              },
            },
            messages: {
                name: {
                    required: "Por favor ingrese el nombre del Plan",
              },
              description: {
                required: "Por favor ingrese una descripción",
              },
              duration_in_days: {
                required: "Por favor ingrese la duración del Plan",
              },
              price: {
                required: "Por favor ingrese el precio del Plan",
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
                    //ruta
                    var url = "{{route('plane.store')}}";

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        type: "post",
                        encoding:"UTF-8",
                        url: url,
                        data: new FormData(form),
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
                                title: 'Plan registrado exitosamente.',
                                icon: 'success',
                                button: true,
                                timer: 2000
                            });

                            setTimeout(function(){
                                location.href = "{{route('plane.index')}}";
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
            }
          });




        $(function () {

        });
        </script>
@stop
