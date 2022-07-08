@php
     function convertirVa($monto){
        $valor = number_format($monto, 2, ',', '.');
        return $valor;
    }
@endphp
@extends('adminlte::page')
@section('title', 'Suscripcion a un Plan')

<!--integrar plugins necesarios-->
@section('plugins.Datatables', true)
@section('plugins.jqueryValidation', true)
@section('plugins.Sweetalert2', true)
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
        <div class="card border-info mb-3 col-6" style="max-width: 18rem;margin-top:50px">
                          <div class="card-body text-primary">
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="form-group clearfix">
                                          <div class="icheck-info d-inline">
                                              <input type="radio" name="plane" id="1" value="1" required="">
                                              <label for="1" style="font-weight: normal;color: #666;font-size: 15px !important;font-family:'Poppins', sans-serif !important;">Plan Individual</label>
                                          </div>
                                      </div>

                                  </div>
                                  <div class="col-sm-6">
                                      <h6 style="color: #666;font-weight: 600;">$39.900,00 / Mensual</h6>
                                  </div>
                              </div>
                            </div>
        </div>
        <div class="card border-info mb-3" style="max-width: 18rem;">
                          <div class="card-body text-primary">
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="form-group clearfix">
                                          <div class="icheck-info d-inline">
                                              <input type="radio" name="plane" id="2" value="2" required="">
                                              <label style="font-weight: normal;color: #666;font-size: 15px !important;font-family:'Poppins', sans-serif !important;" for="2">Plan Grupal</label>
                                          </div>
                                      </div>

                                  </div>
                                  <div class="col-sm-6">
                                      <h6 style="color: #666;font-weight: 600;" >$79.900,00 / Mensual</h6>
                                  </div>
                              </div>
                            </div>
        </div>
        <div class="card border-info mb-3" style="max-width: 18rem;">
                          <div class="card-body text-primary">
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="form-group clearfix">
                                          <div class="icheck-info d-inline">
                                              <input type="radio" name="plane" id="3" value="3" required="">
                                              <label for="3" style="font-weight: normal;color: #666;font-size: 15px !important;font-family:'Poppins', sans-serif !important;">Plan Individual</label>
                                          </div>
                                      </div>

                                  </div>
                                  <div class="col-sm-6">
                                      <h6 style="color: #666;font-weight: 600;">$140.000,00 / Anual</h6>
                                  </div>
                              </div>
                            </div>
          </div>
          <div class="card border-info mb-3" style="max-width: 18rem;">
                          <div class="card-body text-primary">
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="form-group clearfix">
                                          <div class="icheck-info d-inline">
                                              <input type="radio" name="plane" id="4" value="4" required="">
                                              <label for="4" style="font-weight: normal;color: #666;font-size: 15px !important;font-family:'Poppins', sans-serif !important;">Plan Grupal</label>
                                          </div>
                                      </div>

                                  </div>
                                  <div class="col-sm-6">
                                      <h6 style="color: #666;font-weight: 600;">$280.000,00 / Anual</h6>
                                  </div>
                              </div>
                            </div>
        </div>
        <div style="display: flex;justify-content: center;">
          <button type="submit" class="btn2 float-right btnContinuar">CONTINUAR<i class="icofont-rounded-double-right"></i></button>
        </div>

  </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.css">
@stop

@section('js')
    <script>
    $( ".btnContinuar" ).click(function() {
      var urlPago="";
      if($('input:radio[name=plane]:checked').val()==1){
         urlPago="https://www.mercadopago.com.co/subscriptions/checkout?preapproval_plan_id=2c938084818a646a01818c274ed50099";
      }
      if($('input:radio[name=plane]:checked').val()==2){
        urlPago="https://www.mercadopago.com.co/subscriptions/checkout?preapproval_plan_id=2c9380848191d682018196139fcc0160";
      }
      if($('input:radio[name=plane]:checked').val()==3){
        urlPago="https://www.mercadopago.com.co/subscriptions/checkout?preapproval_plan_id=2c93808481b537980181b9f2461301db";
      }
      if($('input:radio[name=plane]:checked').val()==4){
        urlPago="https://www.mercadopago.com.co/subscriptions/checkout?preapproval_plan_id=2c938084818c5ade01818d9fe7420052";
      }
      if(urlPago!=""){
        window.location.href =urlPago;
      }else{
        alert("Seleciona un plan");
      }


    });

  </script>
@stop
