@extends('adminlte::page')
@section('title', 'Administrar Convenios')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
       <h3>Administrar Convenios</h3>
      </div>
      <div class="col-sm-6">
        <a href="{{ route('usuarios.create') }}" class="btn btn-success float-sm-right"><i class="fas fa-plus"></i>
          Nuevo Convenio
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

            <!------CONTENEDOR DE TABLA------->
            <div class="card card-primary card-outline">

                <!--cabecera del contenedor--->
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-eye"></i> Convenios Registrados</h3>
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

<script src="{{ asset('/js/datatable.js') }}"></script>
    <script>


        var tabla_usuarios = $('#listarusuarios').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
                },
                "order": [[ 0, "desc" ]],
                "ajax": "{{route('usuarios.obtener')}}",
            });
     var dataDelete={convenios:{title:'Eliminar convenio',text:"¿Estas seguro de eliminar el convenio?",text2:'Eliminando convenio, espere...',text3:'Esepecialidad Eliminada!'}};
     function eliminarRegistro(ruta,id){
               Swal.fire({
                   title: dataDelete[ruta].title,
                   text: dataDelete[ruta].text,
                   icon: 'question',
                   showCancelButton: true,
                   confirmButtonColor: '#d33',
                   confirmButtonText: 'Si, eliminar'
               }).then((result) => {
                   if (result.isConfirmed) {
                       var ruta2=ruta;
                       if(ruta2=="convenios"){ruta2="usuarios";}
                       var url = ruta2+"/destroy/"+id;
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
                                   text: dataDelete[ruta].text2,
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
                                   title:dataDelete[ruta].text3,
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
               });
             }
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
