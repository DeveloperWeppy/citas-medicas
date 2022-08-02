@extends('adminlte::page')
@section('title', 'Registro de Diagnóstico')

<!--integrar plugins necesarios-->
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
       <h3>Registrar Diagnóstico</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('inicio.index') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Registrar Diagnóstico del Servicio Redimido</li>
        </ol>
      </div>
    </div>
  </div>
@stop

@section('content')

<div class="container-fluid">
  <x-register-diagnostic idServiceRedeemed="{{$id_service_redeemed}}"></x-register-diagnostic>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('/vendor/adminlte/dist/css/adminlte.css') }}">
@stop

@section('js')
  <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
    theme: 'bootstrap4'
    });

    var loadbancosco = $('#select_diagnostics');

    loadbancosco.empty();
              $.ajax({
                    url: "{{ route('redimidos.get_diagnostics') }}",
                    type: 'GET',
                    dataType: 'json',
                    beforeSend:function(){
                    },
                    success: function (response) {
                      //console.log(response);
                        $.each(response.data, function (key, value) {
                          loadbancosco.append("<option value='" + value.id + "'>" + value.clave + " - " + value.descripcion + "</option>");
                        });
                    },
                    error : function(){
                      $('.loader').hide();
                        alert('Hubo un error al obtener los códigos cie10!');
                    }
                  });
  });

              // agregar data
              $('#register_diagnostic').on('submit', function(e) {
                event.preventDefault();
                var $thisForm = $('#register_diagnostic');
                    var formData = new FormData(this);

                    //ruta
                    var url = "{{route('redimidos.store_diagnostico')}}";

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
                                timer: 2000,
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
                                title: respuesta.mensaje,
                                icon: 'success',
                                button: true,
                                timer: 2000
                            });

                        } else {
                            setTimeout(function(){
                              Swal.fire({
                                    title: respuesta.mensaje,
                                    icon: "error",
                                    button: false
                                });
                            },2000);
                        } 
                    }).fail(function(resp){
                        //console.log(resp);
                    });
              });
  </script>
@stop