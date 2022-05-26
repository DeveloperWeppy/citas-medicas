
    <div class="row">
        <div class="col-12">
           <div class="card card-default">
            <form action="" method="post" id="editService">
               <div class="card-header">
                   
                   <div class="row">
                       <div class="col-sm-6">
                            <h3 class="card-title"><i class="fas fa-plus"></i> Editar datos del Servicio</h3>
                       </div>

                       <div class="col-sm-6">
                           <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    @if ($service->status == 0)
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
                   </div>
                 
               </div>
  
               
                   <input type="hidden" name="id" value="{{$service->id}}">
                   <div class="card-body">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="">Nombre del Servicio</label>
                                        <input type="text" name="name" id="" class="form-control " placeholder="Nombre del Servicio" 
                                            autocomplete="off" value="{{$service->name}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Nº de Redimidos disponibles</label>
                                        <input type="number" name="redeemed_available" id="" class="form-control " placeholder="Nº de Redimidos disponibles" 
                                        value="{{$service->redeemed_available}}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Precio Normal</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        
                                        <input type="number" name="price_normal" id="" class="form-control " placeholder="Precio Normal" value="{{$service->price_normal}}" autocomplete="off">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Precio con Descuento</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" name="price_discount" id="" class="form-control " placeholder="Precio con Descuento" value="{{$service->price_discount}}" autocomplete="off">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Desde</label>
                                        <input type="date" class="form-control" name="start_date" id="" value="{{date("Y-m-d", strtotime($service->start_date))}}" aria-invalid="false">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Hasta</label>
                                        <input type="date" class="form-control" name="end_date" id="" value="{{date("Y-m-d", strtotime($service->end_date))}}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Descripción</label>
                                        <textarea class="form-control" name="description" placeholder="Descripción" id="" maxlength="499" rows="3">{{$service->description}}</textarea>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Observación</label>
                                        <textarea class="form-control" name="observation" placeholder="Observación(opcional)" id="" maxlength="499" rows="3">{{$service->observation}}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Categoría</label>
                                        <select class="custom-select" name="category_id">
                                            @foreach ($categorys as $item)
                                            {{-- @php
                                                $selected = $service->category_id == $item->id ? 'selected="selected"' : '';
                                            @endphp --}}
                                                <option value="{{$item->id}}" {{($item->id == $service->category_id) ? 'selected':'' }}>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Especialidad</label>
                                        <select class="custom-select" name="specialty_id">
                                            @foreach ($specialitys as $item)
                                                @if ($item == null)
                                                    <option value="{{$item->id}} {{($item->id == $service->specialty_id ) ? 'selected':'' }}">{{$item->name}}</option>
                                                @else
                                                    <option value="">No hay especialidades registradas</option>
                                                @endif
                                                
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <p class="ml-3">A continuación selecciona a cuál(es) prestadores ofertan este servicio.</p>
                                </div>

                            <div class="row">
                                <div class="col-12">
                                    <fieldset class="border p-2">
                                        <legend class="float-none w-auto p-2">Prestadores de Servicio</legend>
                                        @if ($info_convenio == null)
                                            <span class="font-weight-bolder font-italic">No hay prestadores de servicios registrados.</span>
                                        @else
                                            <div class="row">
                                                @foreach ($info_convenio as $index => $item)
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" checked="" name="convenios[]" value="{{$item['datos']['id']}}">
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
                    <a href="{{ route('servicios.index') }}" class="btn btn-default">Cancelar</a>
                    <button type="submit" class="btn btn-success float-right">Guardar</button>
                    </div>
            </form>
  
           </div>
          
        </div>
       
      </div>