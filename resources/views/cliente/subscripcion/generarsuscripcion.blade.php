@php
     function convertirVa($monto){
        $valor = number_format($monto, 2, ',', '.');
        return $valor;
    }
@endphp
@extends('adminlte::page')
@section('title', 'Completar Suscripción')

<!--integrar plugins necesarios-->
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)

@stop

@section('content')

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('/vendor/adminlte/dist/css/adminlte.css') }}">
@stop

@section('js')
    <script>
         $('#hacersuscripcion').validate({
            rules: {
                plane: {
                required: true,
              },
            },
            messages: {
                plane: {
                    required: "Por favor seleccione un Plan",
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

        });
  </script>
@stop
