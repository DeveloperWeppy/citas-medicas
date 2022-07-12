
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
                                    <input type="checkbox" name="statuss" class="custom-control-input" id="status" >
                                        <label class="custom-control-label" for="status">Estado:

                                    @if ($service->status == 0)
                                            <span id="valor_status" class="badge bg-info text-white font-italic" style="font-size: 16px;">Inactivo</span></label>
                                    @else
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
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Nombre del Servicio</label>
                                        <input type="text" name="name" id="" class="form-control " placeholder="Nombre del Servicio"
                                            autocomplete="off" value="{{$service->name}}">
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
                   </div>

                   <div class="card-footer">
                    <a href="{{ route('servicios.index') }}" class="btn btn-default">Cancelar</a>
                    <button type="submit" class="btn btn-success float-right">Actualizar</button>
                    </div>
            </form>

           </div>

        </div>

      </div>
