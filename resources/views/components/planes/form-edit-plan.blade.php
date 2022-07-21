
    <div class="row">
        <div class="col-12">
           <div class="card card-default">
                <form action="" method="post" id="editPlan">
                    <div class="card-header">


                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="card-title"><i class="fas fa-plus"></i> Editar datos del Plan</h3>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" name="statuss" class="custom-control-input" id="status">
                                                <label class="custom-control-label" for="status">Estado:
                                            @if ($plan->status == 0)

                                                    <span id="valor_status" class="badge bg-info text-white font-italic" style="font-size: 16px;">Inactivo</span></label>
                                            @else
                                                    <span id="valor_status" class="badge bg-info text-white font-italic" style="font-size: 16px;">Activo</span></label>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                            </div>
                    </div>


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
                                            <input type="checkbox" name="is_group" class="custom-control-input" id="customSwitch3" >
                                                <label class="custom-control-label" for="customSwitch3">¿Es Plan Grupal?
                                            @if ($plan->is_group == 0)

                                                    <span id="valor" class="badge bg-info text-white font-italic" style="font-size: 16px;">No</span></label>
                                            @else
                                                    <span id="valor" class="badge bg-info text-white font-italic" style="font-size: 16px;">Sí</span></label>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 mt-3">
                                    <div class="form-group">
                                        @if ($plan->is_group == 1)
                                            <input type="number" name="cant_people" id="cantidad_personas" class="form-control " value="{{$plan->cant_people}}" placeholder="Cantidad de Personas Permitidas" autocomplete="off">
                                        @else
                                            <input type="number" name="cant_people" id="cantidad_personas" class="form-control " placeholder="Cantidad de Personas Permitidas" autocomplete="off">
                                        @endif
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
                            <div class="row despusPrinFrees">
                                  <div class="col-sm-12 ">
                                      <h4 class="mt-2">SERVICIOS GRATUITOS</h4>
                                  </div>
                                  <div class="col-sm-5">
                                      <div class="form-group">
                                        <select class='mi-selector form-control' id="formNombreServicioFree" name='marcas'>
                                            <option value=''>Seleccionar un Servicio</option>
                                        @foreach($serviciosSelect as $key => $value)
                                            <option value='{{$value["id"]}}'>{{$value['text']}}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                  </div>
                                  <div class="col-sm-3">
                                      <div class="input-group mb-3">
                                          <input type="number" name="formDurationDays" id="formDurationDays" class="form-control " placeholder="Duracion en dias" autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-sm-1 ">
                                   <i class="fas fa-plus-circle" onclick="agregarServicioFree()" style="font-size:40px;color:#34c2b5"></i>
                                  </div>
                            </div>
                            @foreach($servicesFree as $key => $value)
                            <div class="row">
                                  <div class="col-sm-5">
                                      <div class="form-group">
                                        <select class='mi-selector-edit form-control' value="{{$value->service_id}}" name='free_servicio_id[]' >

                                        </select>
                                      </div>
                                  </div>
                                  <div class="col-sm-3">
                                      <div class="input-group mb-3">
                                          <input type="number" name="duration_day[]" value="{{$value->duration_in_days}}" class="form-control " placeholder="Duracion en dias" autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-sm-1" style="display:table" onclick="$(this).parent().remove();"><i class="fas fa-trash-alt" style="font-size:30px;color:red;margin-top:5px"></i>
                                  </div>
                            </div>
                            @endforeach
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
                        <input type="hidden" name="id" value="{{$plan->id}}">
                        <div class="card-footer">
                                <a href="{{ route('plane.index') }}" class="btn btn-default">Cancelar</a>
                                <button type="submit" class="btn btn-success float-right">Actualizar</button>
                            </div>
                        </div>
                </form>
            </div>

        </div>

      </div>
      <script>
      var datalistServ={!!json_encode($serviciosSelect)!!};
      function refreshSelect2Value(tipo){
        $('.mi-selector-edit').select2({
            width: '100%',
            allowClear: true,
            multiple: false,
            placeholder: "Nombre de servicio",
            data: datalistServ
        });
        $(".mi-selector-edit").each(function(){
            $(this).val($(this).attr('value')).trigger("change");
        });
      }
      function agregarServicioFree(){
        var ifExist=true;
        $(".formNombreServicioFree").each(function(){
             if($(this).val()== $("#formNombreServicioFree").val()){
               ifExist=false;
             }
        });
        if($("#formNombreServicioFree" ).val()!="" && $("#formDurationDays" ).val()!=""  && ifExist){
               var divNom='<div class="row"><div class="col-sm-5 ed"><div class="form-group "><select class="form-control mi-selector-edit formNombreServicioFree"  name="free_servicio_id[]" value="'+$("#formNombreServicioFree" ).val()+'" placeholder="Nombre del Servicio" autocomplete="off" required> </select></div> </div>';
               var divDay='<div class="col-sm-3"><div class="input-group mb-3">  <input type="number" name="duration_day[]" class="form-control" value="'+$("#formDurationDays" ).val()+'"  placeholder="Duracion en dias" autocomplete="off"></div></div>';
               $(".despusPrinFrees").after(divNom+divDay+'<div class="col-sm-1" style="display:table" onclick="$(this).parent().remove();"><i class="fas fa-trash-alt"  style="font-size:30px;color:red;margin-top:5px" ></i></div></div></div>');
               $("#formDurationDays" ).val("");
               $("#formNombreServicioFree").val("").trigger("change");
               refreshSelect2Value(1);
        }else{
           if(ifExist){
              alert("Completar campos");
           }else{
               alert("Servicio ya se encuentra agregado");
           }
        }

      }
      </script>
