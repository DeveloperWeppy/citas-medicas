@extends('adminlte::page')
@section('title', 'Usuarios')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
       <h3>Administrar Usuarios</h3>
      </div>
      <div class="col-sm-6">
        <x-adminlte-button label="Nuevo Usuario" icon="fas fa-plus" data-toggle="modal" data-target="#modalCustom" class="bg-teal float-sm-right"/>
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

          <!----- FORMULARIO DE REGISTRO DE USUARIO ---->
          <x-form-rgister-user></x-form-rgister-user>

            <!------CONTENEDOR DE TABLA------->
            <div class="card card-primary">
                
                <!--cabecera del contenedor--->
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-eye"></i> Ver Usuarios Registrados</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <!--cuerpo del contenedor--->
                <div class="card-body">
                   
                    <!--tabla de datos--->
                    <table id="example" class="display table table-striped table-bordered table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th>Fecha y Hora</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                                {{-- @foreach($usuarios as $key => $value)

                                @php
                                        $class_status = $value->estado == 1 ? 'warning' : 'dark';
                                        $text_status = $value->estado == 1 ? 'Activo' : 'Inactivo';
                                    @endphp

                                <tr>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->email}}</td>
                                     <td>
                                      @foreach ($value->roles as $item)
                                        {{$item->name}}
                                      @endforeach
                                    </td>
                                    <td width="10%">
                                        <a style="cursor: pointer;" data-toggle="modal" data-target="#modal_InactivarUsuario-{{$value->id}}" ><span
                                                class="btn btn-<?php echo $class_status; ?>"><?php echo $text_status; ?></span>
                                        </a>

                                        <x-inactivar-usuario idusuario="{{$value->id}}" nombre="{{$value->name}}"></x-inactivar-usuario>
                                    </td>
                                    <td>{{$value->created_at}}</td>
                                    <td class="text-center">
                                        <button class="btn btn-success" data-toggle="modal" data-target="#modal_EditarUsuario-{{$value->id}}">
                                            <i class="fas fa-edit"></i> 
                                        </button>
                                         <x-modal-editar-usuario idusuario="{{$value->id}}"></x-modal-editar-usuario>

                                        <button class="btn btn-danger" data-toggle="modal" data-target="#modal_EliminarUsuario-{{$value->id}}">
                                            <i class="fas fa-trash"></i> 
                                        </button>

                                        {{-- <x-modal-eliminar-usuario idusuario="{{$value->id}}" nombre="{{$value->name}}"></x-modal-eliminar-usuario>
                                    </td>
                                </tr> 
                                @endforeach--}}
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
      var url = "{{route('usuarios.get')}}";
      $('#example').DataTable( {
        ajax: {
          headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
          url: url,
          dataType:'json',
        },
        columns: [
          {data: 'name'},
          {data: 'email'},
        ]
      } );
       $('#quickForm').validate({
            rules: {
                name: {
                required: true,
              },
              lastname:{
                required: true,
              },
              identificacion:{
                required: true,
              },
              email: {
                required: true,
              },
              telefono: {
                required: true,
                minlength:7
              },
              password: {
                required: true,
                minlength: 8
              },
            },
            messages: {
                name: {
                required: "Por favor ingrese el nombre de usuario",
              },
              lastname: {
                required: "Por favor ingrese el apellido de usuario",
              },
              identificacion: {
                required: "Por favor ingrese el nùmero de cèdula",
              },
              email: {
                required: "Por favor ingrese un Correo Electrónico",
                email: "Ingrese una dirección de correo válida",
              },
              telefono: {
                required: "Por favor ingrese un Número de Teléfono o Celular",
                minlength: "Ingrese un número válido",
              },
              password: {
                required: "Por favor ingrese una Contraseña",
                minlength: "Debe tener al menos 8 caracteres la contraseña",
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
       
        $(document).ready(function() {
            //proceso de actualizacion datos
        
           
          /*Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
          )*/
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
              telefono: {
                required: true,
                minlength:7
              },
              password: {
                required: true,
                minlength: 8
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
              telefono: {
                required: "Por favor ingrese un Número de Teléfono o Celular",
                minlength: "Ingrese un número válido",
              },
              password: {
                required: "Por favor ingrese una Contraseña",
                minlength: "Debe tener al menos 8 caracteres la contraseña",
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