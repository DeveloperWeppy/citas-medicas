@php
     function convertirVa($monto){
        $valor = number_format($monto, 2, ',', '.');
        return $valor;
    }
@endphp
@extends('adminlte::page')
@section('title', 'Suscripción a un Plan')

<!--integrar plugins necesarios-->
@section('plugins.jqueryValidation', true)
@section('content_header')

@stop

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"
      integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <style>
          .btn2{
          display: inline-block;
          text-transform: capitalize;
          padding: 15px 35px;
          font-size: 16px;
          border-radius: 100px;
          -webkit-transition: 0.3s;
          -o-transition: 0.3s;
          transition: 0.3s;
          color: #fff;
          background: #0cb8b6;
          border: none;
          font-family: "Poppins", sans-serif;
          font-weight: 500;
          letter-spacing: 0.25px;
      }
      </style>
<div style="display:flex;justify-content: center;align-items: center;padding-top:80px">
  <div >
        <h4 style="text-align:center;font-weight: bold;">Seleccionar Plan</h4>
    <form id="hacersuscripcion" >
        @foreach ($planes as $item)
        <div class="card border-info mb-3 col-6" style="max-width: 18rem;margin-top:50px">
            <div class="card-body text-primary">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group clearfix">
                            <div class="icheck-info d-inline">
                                <input type="radio" name="plane" id="{{$item->id}}" value="{{$item->id}}" required="">
                                <label for="{{$item->id}}" style="font-weight: normal;color: #666;font-size: 15px !important;font-family:'Poppins', sans-serif !important;">
                                    {{ $item->name}}
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <h6 style="color: #666;font-weight: 600;">{{number_format($item->price, 2, ',', '.')}} / {{$item->type_plan}}</h6>
                    </div>
                </div>
              </div>
        </div>
        @endforeach
       
        <div style="display: flex;justify-content: center;">
          <button type="submit" class="btn2 float-right btnContinuar">CONTINUAR<i class="icofont-rounded-double-right"></i></button>
        </div>
    </form>

  </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
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
            submitHandler: function(form){
                // agregar data
                $('#hacersuscripcion').on('submit', function(e) {
                event.preventDefault();
                var $thisForm = $('#hacersuscripcion');
                    var formData = new FormData(this);

                    //ruta
                    var url = "{{route('subscription.crearsuscripcion')}}";

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
                  });
            }
          });
  </script>
@stop
