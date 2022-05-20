@extends('adminlte::page')
@section('title', 'Gestión de Planes')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
       <h3>Administrar Planes</h3>
      </div>
      <div class="col-sm-6">
        <a href="{{ route('usuarios.create') }}" class="bg-teal float-sm-right"><i class="fas fa-minus"></i>
          Nuevo Usuario
        </a>
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
            <div class="card card-primary card-outline">
                
                <!--cabecera del contenedor--->
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-eye"></i> Usuarios Registrados</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <!--cuerpo del contenedor--->
                <div class="card-body">
                   
                    <!--tabla de datos--->
                    <table id="listarusuarios" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Correo</th>
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
                    <x-modal-editar-usuario></x-modal-editar-usuario>
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

          //load data of users
          var table = $('#listarusuarios').DataTable({
            
                ajax: '',
                language: {
                "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
                },
                serverSide: true,
                processing: true,
                aaSorting:[[0,"asc"]],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'email', name: 'email'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action',
                   /*  render: function(data,t,r,meta){
                          return "<button class='btn btn-danger' onClick='ConfirmarBorrado("+data+")'>Eliminar</button>";
                      } */
                    },
                ]
            });

        });
        function ConfirmarBorrado(idUser){
            $('#idUser').val(idUser);
            $('#modal_EditarDivisa').modal('show');
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
         
          //para la imagen agg
        $('#imgSalida').attr("src", "/images/user.png");
            $('#customFile').change(function (e) {
                addImage(e);
            });
            function addImage(e) {
                var file = e.target.files[0],
                        imageType = /image.*/;
                if (!file.type.match(imageType))
                    return;
                var reader = new FileReader();
                reader.onload = function (e) {
                    var result = e.target.result;
                    $('#imgSalida').attr("src", result);
                }
                reader.readAsDataURL(file);
            }
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