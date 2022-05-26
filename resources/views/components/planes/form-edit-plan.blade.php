
    <div class="row">
        <div class="col-12">
           <div class="card card-default">
               <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-plus"></i> Editar datos del Plan</h3>
               </div>
  
               <form action="" method="post" id="editPlan">
                   <div class="card-body">
      
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Nombre del Plan</label>
                                        <input type="text" name="name" id="" class="form-control " value="{{$plan->name}}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Duración en Días</label>
                                        <input type="number" name="duration_in_days" id="" class="form-control " value="{{$plan->duration_in_days}}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Precio</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" name="price" id="" class="form-control " value="{{$plan->price}}" autocomplete="off">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    
                                </div>
                                <div class="col-sm-6 mt-3">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            @if ($plan->is_group == 0)
                                                <input type="checkbox" name="is_group" class="custom-control-input" id="customSwitch3" value="off">
                                                <label class="custom-control-label" for="customSwitch3">¿Es Plan Grupal? 
                                                    <span id="valor" class="badge bg-info text-white font-italic" style="font-size: 16px;">No</span></label>
                                            @else
                                                <input type="checkbox" name="is_group" class="custom-control-input" id="customSwitch3" value="on">
                                                <label class="custom-control-label" for="customSwitch3">¿Es Plan Grupal? 
                                                    <span id="valor" class="badge bg-info text-white font-italic" style="font-size: 16px;">Sí</span></label>
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 mt-3">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            @if ($plan->status == 0)
                                                <input type="checkbox" name="status" class="custom-control-input" id="status" value="off">
                                                <label class="custom-control-label" for="status">Estado: 
                                                    <span id="valor_status" class="badge bg-info text-white font-italic" style="font-size: 16px;">Inactivo</span></label>
                                            @else
                                                <input type="checkbox" name="status" class="custom-control-input" id="status" value="on">
                                                <label class="custom-control-label" for="status">Estado
                                                    <span id="valor_status" class="badge bg-info text-white font-italic" style="font-size: 16px;">Activo</span></label>
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Descripción</label>
                                        <textarea class="form-control" name="description" id="" maxlength="499" rows="3">
                                            {{$plan->description}}
                                        </textarea>
                                        
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <p class="ml-2">Seleccione a continuación los servicios que estarán asociados a este nuevo Plan.</p>
                            </div>
                            <div class="row">
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
                                                                <input class="form-check-input" type="checkbox" checked="" name="servicios[]" value="{{$item['datos']['id']}}">
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
  
                   <div class="card-footer">
                    <a href="{{ route('plane.index') }}" class="btn btn-default">Cancelar</a>
                    <button type="submit" class="btn btn-success float-right">Guardar</button>
                    </div>
               </form>
  
           </div>
          
        </div>
       
      </div>