@extends('adminlte::page')
@section('title', 'Especialidades de Servicios')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
       <h3>Administrar Especialidades de Servicios</h3>
      </div>
      <div class="col-sm-6">
        <button type="button" class="btn btn-success float-sm-right" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-plus"></i> Nueva Especialidad
        </button>
          <x-form-register-especialidades></x-form-register-especialidades>
      </div>
    </div>
  </div>
@stop

@section('content')

<div class="container-fluid">

    <div class="row">
      <div class="mb-3">
         <!-- Button trigger modal -->
        
      </div>
     
    </div>
    <div class="row">
        <div class="col-12">

            <!------CONTENEDOR DE TABLA------->
            <div class="card card-primary card-outline">
                
                <!--cabecera del contenedor--->
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-eye"></i> Especialidades Registradas</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <!--cuerpo del contenedor--->
                <div class="card-body">
                   
                    <!--tabla de datos--->
                    <table id="example" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre de la Especialidad</th>
                                <th>Descripción</th>
                                <th>Observación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($specialityes as $key => $value)

                                {{-- @php
                                        $class_status = $value->estado == 1 ? 'warning' : 'dark';
                                        $text_status = $value->estado == 1 ? 'Activo' : 'Inactivo';
                                    @endphp --}}

                                <tr>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->description}}</td>
                                     <td>{{$value->observation}}</td>
                                  {{--   <td class="text-center">
                                        <button class="btn btn-success" data-toggle="modal" data-target="#modal_EditarUsuario-{{$value->id}}">
                                            <i class="fas fa-edit"></i> 
                                        </button>
                                         <x-modal-editar-usuario idusuario="{{$value->id}}"></x-modal-editar-usuario>

                                        <button class="btn btn-danger" data-toggle="modal" data-target="#modal_EliminarUsuario-{{$value->id}}">
                                            <i class="fas fa-trash"></i> 
                                        </button>

                                        <x-modal-eliminar-usuario idusuario="{{$value->id}}" nombre="{{$value->name}}"></x-modal-eliminar-usuario>
                                    </td> --}}
                                </tr> 
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
@stop

@section('js')

<script src="/js/datatable.js"></script>
    <script>
      $(document).ready(function() {

         
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
            },
            messages: {
                name: {
                required: "Por favor ingrese el nombre de la especialidad",
              },
              description: {
                required: "Por favor ingrese una descripción de la especialidad",
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
                                timer: 3000
                            });
                        }
                    }).done(function(respuesta){
                        //console.log(respuesta);
                       if (!respuesta.error) {

                          Swal.fire({
                                title: 'Usuario registrado exitosamente.',
                                icon: 'success',
                                button: true,
                                timer: 2000
                            });

                            setTimeout(function(){
                                location.reload();
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
         
            //validacion de campos vacios para formulario de editar datos de usuario
          $('#edit_user').validate({
            rules: {
                name: {
                required: true,
              },
              email: {
                required: true,
              },
              },
            messages: {
                name: {
                required: "Por favor ingrese un nombre de usuario",
              },
              email: {
                required: "Por favor ingrese un Correo Electrónico",
                email: "Ingrese una dirección de correo válida",
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
            }
          });

        });

        

        jQuery(document).on("click", ".change-status", function() {
                var $element = jQuery(this);
                var id = $element.attr('id');
                var url = "{{ route('usuarios.status') }}";
                var data = {
                    id: id
                }
                jQuery.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    encoding: "UTF-8",
                    url: url,
                    data: data,
                    dataType: 'json',
                    beforeSend:function(){
                        $element.val('Cargando');
                    },
                    success: function(response) {
                        if (response.status == 1) {
                            $element.find('span').removeAttr('class').attr('class', '');
                            $element.find('span').addClass('btn');
                            $element.find('span').addClass(response.class_status);
                            $element.find('span').text(response.text_status);
                        }
                    }
                });
            });
        </script>
@stop