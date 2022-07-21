@extends('adminlte::page')
@section('title', 'Actualizar Plan')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
       <h3>Administrar Plan</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Actualizar Información del Plan <span>{{$plan->name}}</span></li>
            </ol>
      </div>
    </div>
  </div>
@stop

@section('content')

<div class="container-fluid">
  <x-form-edit-plan idPlan="{{$plan->id}}"></x-form-edit-plan>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
    <link rel="stylesheet" href="/css/styles.css">
@stop

@section('js')
    <script>
    $(document).ready(function() {
        refreshSelect2Value(0);
    });
      $('#cantidad_personas').show();
          //event for switch of type of plan (group or individual)
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
        $(function () {
            var texto = $('#valor').text();
            var texto2 = $('#valor_status').text();

            if (texto == "Sí") {
                $('#customSwitch3').prop("checked", true);
                $('#cantidad_personas').show();
            } else {
                $('#customSwitch3').prop("checked", false);
                $('#cantidad_personas').hide();
            }

            if (texto2 == "Activo") {
                $('#status').prop("checked", true);
            } else {
                $('#status').prop("checked", false);
            }
        });



        //event for switch of status of plan
        $('#status').change(function() {
            if($(this).is(":checked")) {
                checked = true;
                $('#valor_status').text('Activo').val();
            }
            else {
                checked = false;
                $('#valor_status').text('Inactivo').val();
           }
        });

        //form of register of user
       $('#editPlan').validate({
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
                    var url = "{{route('plane.update')}}";

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        type: "post",
                        encoding:"UTF-8",
                        url: url,
                        data: new FormData(form),,
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
                        //console.log(respuesta.dato);
                       if (!respuesta.error) {

                          Swal.fire({
                                title: 'Plan actualizado exitosamente.',
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


        </script>
@stop
