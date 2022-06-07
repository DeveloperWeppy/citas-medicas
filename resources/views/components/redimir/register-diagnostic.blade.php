
    <div class="row">
        <div class="col-12">
           <div class="card card-primary card-outline">
               <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-plus"></i>
               </div>
  
               <form action="" method="post" id="register_diagnostic">
                   <div class="card-body">
      
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="text-muted">Nombre del Cliente: <b class="d-block text-uppercase">{{$name_clien}}</b></p>
                                </div>

                                <div class="col-sm-6">
                                    <p class="text-muted">Identificación del Cliente: <b class="d-block">{{$identification_client}}</b></p>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Código del Diagnóstico</label>
                                        <select class="form-control select2 select2-hidden-accessible" id="select_diagnostics" name="code" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                           
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="callout callout-warning">
                                        <h5>Nota:</h5>
                                        <p>Si el servicio tomado por el paciente tiene más de un diagnóstico, guarde uno a uno cada diagnóstico.</p>
                                    </div>
                                </div>
                            </div>
                            
                   </div>
                   <input type="hidden" name="redeemed_service_id" value="{{$idServiceRedeemed}}">
                   <div class="card-footer">
                    <a href="{{ route('redimidos.index') }}" class="btn btn-default">Cancelar</a>
                    <button type="submit" class="btn btn-success float-right">Guardar</button>
                    </div>
               </form>
  
           </div>
          
        </div>
       
      </div>