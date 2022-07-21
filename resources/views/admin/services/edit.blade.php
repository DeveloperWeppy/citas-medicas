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
            <li class="breadcrumb-item"><a href="{{route('servicios.index')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Actualizar Servicio de <span>{{$service->name}}</span></li>
            </ol>
      </div>
    </div>
  </div>
@stop

@section('content')

<div class="container-fluid">
  <x-form-edit-service idService="{{$service->id}}"></x-form-edit-service>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
    <link rel="stylesheet" href="/css/styles.css">
@stop

@section('js')

<script src="/js/datatable.js"></script>
    <script>

          $(function () {
            var texto2 = $('#valor_status').text();
            console.log(texto2);

            if (texto2 == 'Activo') {
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
       $('#editService').validate({
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
              percentage_discount: {
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
              percentage_discount: {
                required: "Por favor ingrese el porcentaje de descuento",
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
                    //ruta
                    var url = "{{route('servicios.update')}}";

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
                                title: 'Servicio actualizado exitosamente.',
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
                                    timer: 4000
                                });
                            },2000);
                        } 
                    }).fail(function(resp){
                        //console.log(resp);
                    });
            }
          });
       
        

        
        $(function () {

        });
        </script>
@stop