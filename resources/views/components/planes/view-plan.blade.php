
    <div class="row">
        <div class="col-12">
           <div class="card card-info card-outline">
               <div class="card-header">
                  <h3 class="card-title text-uppercase"><i class="fas fa-info-circle"></i> detalles del plan </h3>
               </div>
                    <div class="card-body">
      
                            <div class="row">

                                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="text-muted">Duración del Plan: <b class="d-block">{{$plan->duration_in_days}} días</b></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="text-muted">Precio del Plan: <b class="d-block">${{convertirVa($plan->price)}}</b></p>
                                        </div>
                                        <div class="col-12">
                                            <fieldset class="border p-2">
                                                <legend class="float-none w-auto p-2">Servicios</legend>
                                                @if ($info_services == null)
                                                    <span class="font-weight-bolder font-italic">No hay servicios registrados.</span>
                                                @else
                                                    <div class="row">
                                                        @foreach ($info_services as $index => $item)
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" checked="" name="servicios[]" value="{{$item['datos']['id']}}" disabled>
                                                                        <label class="form-check-label">{{$item['datos']['name']}}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                                    <h3 class="text-info"><i class="fas fa-cube"></i> {{$plan->name}}</h3>

                                    <p class="text-muted">{{$plan->description}}</p>
                                    <br>
                                    <div class="text-muted">
                                        <p class="text-sm">Estado:
                                            @if ($plan->status == 0)
                                                <b class="d-block">Inactivo</b>
                                            @else
                                                <b class="d-block">Activo</b>
                                            @endif
                                        </p>
                                        <p class="text-sm">¿Es Plan Grupal?
                                            @if ($plan->is_group == 0)
                                                <b class="d-block">No</b>
                                            @else
                                                <b class="d-block">Sí</b>
                                            @endif
                                        
                                        </p>
                                        @if ($plan->is_group == 1)
                                        <p class="text-sm">Cantidad de Beneficiarios
                                            <b class="d-block">{{$plan->cant_people}}</b>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                   </div>
  
                   <div class="card-footer">
                    </div>
  
           </div>
          
        </div>
       
      </div>