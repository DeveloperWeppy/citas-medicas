
    <div class="row">
        <div class="col-12">
           <div class="card card-default">
               <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="card-title"><i class="fas fa-plus"></i><strong>Registrar un Nuevo Servicio</strong> </h3>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" name="is_free" class="custom-control-input" id="customSwitch">
                                <label class="custom-control-label" for="customSwitch">¿Es un servicio gratuito?
                                    <span id="valor" class="badge bg-info text-white font-italic" style="font-size: 16px;">No</span></label>
                            </div>
                        </div>
                    </div>
                </div>
                  
               </div>
  
               <form action="" method="post" id="quickForm">
                   <div class="card-body">
      
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="name" id="" class="form-control " placeholder="Nombre del Servicio" autocomplete="off">
                                    </div>
                                </div>

                               {{--  <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" name="is_group" class="custom-control-input" id="customSwitch3">
                                            <label class="custom-control-label" for="customSwitch3" id="label_texto_descuento">Precio con Descuento
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" name="price_normal" id="" class="form-control " placeholder="Precio Normal" autocomplete="off">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3" id="div-precio-descuento">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" name="price_discount" id="precio_decuento" class="form-control " placeholder="Precio con Descuento" autocomplete="off">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                    </div>

                                    <div class="input-group mb-3" id="div-porcentaje-descuento">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        <input type="number" name="percentage_discount" id="precio_decuento" class="form-control " placeholder="Porcentaje de descuento de 0 a 100" autocomplete="off">
                                    </div>
                                </div> --}}
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Desde</label>
                                        <input type="date" class="form-control" name="start_date" id="" >
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Hasta</label>
                                        <input type="date" class="form-control" name="end_date" id="" >
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="description" placeholder="Descripción" id="" maxlength="499" rows="3"></textarea>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="observation" placeholder="Observación(opcional)" id="" maxlength="499" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Categoría</label>
                                        <select class="custom-select" name="category_id">
                                            @foreach ($categorys as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Especialidad</label>

                                        
                                        <select class="custom-select" name="specialty_id">
                                            @if ($specialitys->isEmpty())
                                                <option value="">No hay especialidades registradas</option>
                                            @else
                                                @foreach ($specialitys as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                             {{--    <div class="row">
                                    <p class="ml-3">A continuación selecciona a cuál(es) prestadores ofertan este servicio.</p>
                                </div>
                            <div class="row">
                                <div class="col-12">
                                    <fieldset class="border p-2">
                                        <legend class="float-none w-auto p-2">Prestadores de Servicio</legend>
                                        @if ($convenios->isEmpty())
                                            <span class="font-weight-bolder font-italic">No hay convenios aún registrados</span>
                                        @else
                                            <div class="row">
                                                @foreach ($convenios as $index => $item)
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" checked="" name="convenios[]" value="{{$item->id}}">
                                                                <label class="form-check-label">{{$item->name}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </fieldset>
                                </div>
                            </div> --}}
                            
                   </div>
  
                   <div class="card-footer">
                    <a href="{{ route('servicios.index') }}" class="btn btn-default">Cancelar</a>
                    <button type="submit" class="btn btn-success float-right">Guardar</button>
                    </div>
               </form>
  
           </div>
          
        </div>
       
      </div>