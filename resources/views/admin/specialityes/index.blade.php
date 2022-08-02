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
                    <table id="example" class="display table table-striped table-bordered " style="width:100%"> 
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

                                @php
                                    $descri = substr ($value->description, 0,40);
                                    $obser = substr ($value->observation, 0,40);
                                @endphp
                                <tr class="odd">
                                    <td>{{$value->name}}</td>
                                    <td style="width:30%; ">{{$descri}} ...</td>

                                    @if (!empty($value->observation))
                                      <td style="width:30%">{{$obser}}...</td>
                                    @else
                                        <td></td>
                                    @endif
                                    
                                    <td class="text-center">
                                        <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#modal_EditarEspecialidad-{{$value->id}}">
                                            <i class="fas fa-edit"></i>  Editar
                                        </button>
                                         <x-form-edit-speciality idspeciality="{{$value->id}}"></x-form-edit-speciality>

                                        <button class="btn btn-xs btn-danger" id="" onclick="eliminarEspecialidad({{$value->id}})">
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
    <link rel="stylesheet" href="{{ asset('/vendor/adminlte/dist/css/adminlte.css') }}">
@stop

@section('js')

<script src="../js/datatable.js"></script>
    <script>

        function eliminarEspecialidad(id){
            //console.log("soy id"+id);
                Swal.fire({
                    title: 'Eliminar Especialidad',
                    text: "¿Estas seguro de eliminar la especialidad?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = "especialidades/destroy/"+id;
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
                                    text: 'Eliminando especialidad, espere...',
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
                                    title: 'Esepecialidad Eliminada!',
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
                                        title: espuesta.mensaje,
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
                    //ruta
                    var url = "{{route('especialidades.store')}}";

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
                       // console.log(respuesta.error);
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
            }
          });
       
        

        
        $(function () {
         
            //validacion de campos vacios para formulario de editar datos de especialidad
            $('#editSpeciality').validate({
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
                // agregar datas
                $('#editSpeciality').on('submit', function(e) {
                event.preventDefault();
                var $thisForm = $('#editSpeciality');
                    var formData = new FormData(this);
                    //var updateId = formData.find('input[name="id"]').val()
                    //ruta
                    
                    var url = "{{route('especialidades.update')}}";

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
                        //console.log(resp);
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