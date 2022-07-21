@extends('adminlte::page')
@section('title', 'Categorias de Servicios')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
       <h3>Administrar Intereses</h3>
      </div>
      <div class="col-sm-6">
        <button type="button" class="btn btn-success float-sm-right" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-plus"></i> Nuevo Interés
        </button>
          <x-form-register-interest></x-form-register-interest>
      </div>
    </div>
  </div>
@stop

@section('content')

<div class="container-fluid">

    <div class="row">
      <div class="mb-3">
        
      </div>
     
    </div>
    <div class="row">
        <div class="col-12">

            <!------CONTENEDOR DE TABLA------->
            <div class="card card-primary card-outline">
                
                <!--cabecera del contenedor--->
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-eye"></i> Interéses Registrados</h3>
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
                                <th>Nombre del Interés</th>
                                <th>Descripción</th>
                                <th>Categoría</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                              @foreach($intereses as $key => $value)
                                @php
                                  $descri = substr ($value->description, 0,40);
                                @endphp

                                <tr class="odd">
                                  <td>{{$value->name}}</td>
                                  @if (!empty($value->description))
                                    <td style="width:30%">{{$descri}}...</td>
                                  @else
                                      <td></td>
                                  @endif
                                  <td>{{$value->find($value->id)->nombre_categoria->name}}</td>
                                  <td class="text-center">
                                      <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#modal_EditarEspecialidad-{{$value->id}}">
                                          <i class="fas fa-edit"></i>  Editar
                                      </button>
                                      <x-form-edit-interest idinteres="{{$value->id}}"></x-form-edit-interest>

                                      <button class="btn btn-xs btn-danger" onclick="eliminarInteres({{$value->id}})">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button> 
                                  </td>
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

<script src="../js/datatable.js"></script>
    <script>
      
      
      function eliminarInteres(id){
            //console.log("soy id"+id);
                Swal.fire({
                    title: 'Eliminar Categoría',
                    text: "¿Estas seguro de eliminar el registro de este interés?",
                    icon: 'question',
                    showCancelButton: "Cancelar",
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = "intereses/destroy/"+id;
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            type: "GET",
                            encoding:"UTF-8",
                            url: url,
                            dataType:'json',
                            beforeSend:function(){
                                Swal.fire({
                                    text: 'Eliminando interés, espere...',
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
                                    title: 'Interés Eliminado!',
                                    icon: 'success',
                                    showConfirmButton: true,
                                    timer: 2000
                                });
                                setTimeout(function(){
                                location.reload();
                                },2000);
                            } else {
                                setTimeout(function(){
                                    Swal.fire({
                                        title: respuesta.mensaje,
                                        icon: 'error',
                                        showConfirmButton: true,
                                        timer: 4000
                                    });
                                },2000);
                            }
                        }).fail(function(resp){
                            console.log(resp);
                        });
                    }
                })
        }
      
        //form of register of user
       $('#quickForm').validate({
            rules: {
              name: {
                required: true,
              },
              category_id: {
                required: true, 
              }
            },
            messages: {
                name: {
                required: "Por favor ingrese un nombre del interés",
              },
              category_id: {
                required: "Por favor seleccione una categoría",
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
                    var url = "{{route('intereses.store')}}";

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
                                confirmButtonText: "Ok",
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
                                    confirmButtonText: "Ok",
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
         
            //validacion de campos vacios para formulario de editar datos de usuario
        //validacion de campos vacios para formulario de editar datos de especialidad
        $('#editinterest').validate({
            rules: {
              name: {
                required: true,
              },
            },
            messages: {
                name: {
                required: "Por favor ingrese el nombre del interés",
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
                // agregar datas
                $('#editinterest').on('submit', function(e) {
                event.preventDefault();
                var $thisForm = $('#editinterest');
                    var formData = new FormData(this);
                    
                    var url = "{{route('intereses.update')}}";

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
                                confirmButtonText: "Ok",
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
                                    confirmButtonText: "Ok",
                                    timer: 4000
                                });
                            },2000);
                        } 
                    }).fail(function(resp){
                        console.log(resp);
                       /*  Swal.fire({
                                    title: resp.mensaje,
                                    icon: "error",
                                    confirmButtonText: false,
                                    timer: 4000
                                }); */
                    });
                  });
            }
          });


        });
        </script>
@stop