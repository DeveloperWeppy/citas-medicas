@extends('adminlte::page')
@section('title', 'Mis Intereses')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
       <h3> Mis Intereses</h3>
      </div>
      <div class="col-sm-6">
        <button type="button" class="btn btn-success float-sm-right" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-plus"></i>Registrar Mis Intereses
        </button>
          <x-register-mys-interests></x-register-mys-interests>
      </div>
    </div>
  </div>
@stop

@section('content')

    <div class="row">
      <div class="mb-3">
         <!-- Button trigger modal -->
        
      </div>
     
    </div>
    <div class="row">
        <div class="col-12">
          <!------CONTENEDOR DE TABLA------->
            <div class="card card-primary card-outline">
                

                <!--cuerpo del contenedor--->
                <div class="card-body">
                    <div class="row">
                        @if ($intereses->isEmpty())
                                <span class="font-weight-bolder font-italic">Aún no has registrado tus interéses</span>
                            @else
                                @foreach ($intereses as $index => $item)
                                    <div class="col-12 col-sm-4">
                                        <div class="info-box bg-light">
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center text-muted">{{$item->find($item->id)->nombre_interes->name}}</span>
                                                <button class="btn btn-xs btn-danger" id="" onclick="eliminarInteres({{$item->id}})">
                                                    <i class="fas fa-trash"></i> 
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                    </div>
                </div>
            </div>
        </div>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
@stop

@section('js')

    <script>
          function eliminarInteres(id){
            //console.log("soy id"+id);
                Swal.fire({
                    title: 'Quitar Interés',
                    text: "¿Estas seguro de quitar este item de la lista de intereses?",
                    icon: 'question',
                    showCancelButton: 'Cancelar',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = "/intereses/destroy-client/"+id;
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
                                    text: 'Quitando interés, espere...',
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading()
                                    },
                                });
                            }
                        }).done(function(respuesta){
                            console.log(respuesta);
                            if (!respuesta.error) {
                                Swal.fire({
                                    title: 'Interés Quitado!',
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

        // agregar data
        $('#quickForm').on('submit', function(e) {
                event.preventDefault();
                var $thisForm = $('#quickForm');
                    var formData = new FormData(this);

                    //ruta
                    var url = "{{route('misintereses.store')}}";

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
                    });
                  });
      $(document).ready(function() {

      });

        $(function () {

        });
        </script>
@stop