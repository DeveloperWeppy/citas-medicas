@php
     function convertirVa($monto){
        $valor = number_format($monto, 2, ',', '.');
        return $valor;
    }
@endphp
@extends('adminlte::page')
@section('title', 'Detalles del Plan')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      @if (Session::get('ifActiveSubs'))
        <div class="col-sm-6">
          <button class="btn btn-outline-info" onClick="history.go(-1);"><i class="fas fa-long-arrow-alt-left"></i> Volver</button>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href=" {{ route('inicio.index') }}">Inicio</a></li>
              <li class="breadcrumb-item active">Información del Plan - <span class="font-weight-bolder">{{$plan->name}}</span></li>
              </ol>
        </div>
      @endif
    </div>
  </div>
@stop

@section('content')

@if ($is_owner == 1)
  @if (Session::get('ifActiveSubs'))

    @if ($plan->is_group > 0)

        @if ($total_miembros_por_registrar > 0)
          <x-note-members-registered cantidadmiembros="{{$plan->cant_people}}" idPlan="{{$plan->id}}"></x-note-members-registered>

          <x-register-member></x-register-member>
        @endif

    @endif

    @if ($plan->id > 0)
      <x-view-plan idPlan="{{$plan->id}}"></x-view-plan>
    @endif

    
  @else
      <!------CONTENEDOR DE NO SUBSCRITO------->
      <div class="card card-primary card-outline">

        <!--cuerpo del contenedor--->
        <div class="card-body">
            <div class="row">
                <div class="col-12">

                        <div class="text-center">
                            <img src="/images/Xpayment.png" class="full" alt="x-imagen-user">
                            <h2 class="text-info">¡Ops!</h2>
                            <h4>Estimado cliente <strong class="text-uppercase text-info">{{$user_name}}</strong> no presenta actualmente una subscripción activa,
                                por lo tanto no dispones de ningún plan. No olvides subscribirte y disfrutar de todos los beneficios que tiene <strong class="text-uppercase text-info">
                                  citasmedicas.es</strong> para tí. <i class="fas fa-laugh-wink text-info"></i>
                            </h4>
                        </div>


                </div>
            </div>
        </div>
    </div>
  @endif
@else
     @if ($plan->id !="")
         <x-view-plan idPlan="{{$plan->id}}"></x-view-plan>
      @endif
@endif


@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
@stop

@section('js')
    <script>

         //form of register of user
         $('#quickForm').validate({
            rules: {
              name: {
                required: true,
              },
              lastname: {
                required: true,
              },
              number_identication: {
                required: true,
                minlength:7
              },
              email: {
                required: true,
                email: true,
              },
            },
            messages: {
                name: {
                required: "Por favor ingrese el nombre del miembro",
              },
              lastname: {
                required: "Por favor ingrese el apellido del miembro",
              },
              number_identication: {
                required: "Por favor ingrese un número de identificación",
                minlength: "Ingrese un número de identificación válido",
              },
              required: "Por favor ingrese un Correo Electrónico",
                email: "Ingrese una dirección de correo válida",
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
                    var url = "{{route('miplan.store_member')}}";

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
                                confirmButtonText: "Ok"
                            });

                            setTimeout(function(){
                                location.reload();
                            },2000);

                        } else {
                            setTimeout(function(){
                              Swal.fire({
                                    title: respuesta.mensaje,
                                    icon: "error",
                                    confirmButtonText: "Ok"
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
