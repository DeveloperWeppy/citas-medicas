
    <div class="row">
        <div class="col-12">
           <div class="card card-default">
               <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-plus"></i> Registrar un Nuevo Plan</h3>
               </div>
  
               <form action="" method="post" id="quickForm">
                   <div class="card-body">
      
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="" class="form-control " placeholder="Nombre del Plan" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="number" name="duration_in_days" id="" class="form-control " placeholder="Duración en Días" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-2">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-primary custom-switch-on-success">
                                            <input type="checkbox" name="type_plan" class="custom-control-input" id="customSwitch4">
                                            <label class="custom-control-label" for="customSwitch4" id="tipo_plan">Mensual
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" name="price" id="" class="form-control " placeholder="Precio" autocomplete="off">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6 mt-2">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" name="is_group" class="custom-control-input" id="customSwitch3">
                                            <label class="custom-control-label" for="customSwitch3">¿Es Plan Grupal? 
                                                <span id="valor" class="badge bg-info text-white font-italic" style="font-size: 16px;">No</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="number" name="cant_people" id="cantidad_personas" class="form-control " placeholder="Cantidad de Personas Permitidas" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="description" placeholder="Descripción" id="" maxlength="499" rows="3"></textarea>
                                        
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
                                        @if ($services->isEmpty())
                                            <span class="font-weight-bolder font-italic">No hay servicios registrados.</span>
                                        @else
                                            <div class="row">
                                                @foreach ($services as $index => $item)
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" checked="" name="servicios[]" value="{{$item->id}}">
                                                                <label class="form-check-label">{{$item->name}}</label>
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
                    <a href="{{ route('servicios.index') }}" class="btn btn-default">Cancelar</a>
                    <button type="submit" class="btn btn-success float-right">Guardar</button>
                    </div>
               </form>
  
           </div>
          
        </div>
       
      </div>