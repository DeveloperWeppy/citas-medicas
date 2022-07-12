
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
                                                <div class="accordion_style_01 mb-40">
                                                <div class="accordion row" id="accordionExample">
                                                    @foreach ($info_services as $index => $item)
                                                    <div class="card col-6" style="box-shadow: none;">
                                                        <div class="card-header" id="heading_0{{$index}}" style="border:0px;background-color: #f7feff;padding-left: 30px;">
                                                            <h5>
                                                                <a href="#" style="font-size:19px;color:black" data-toggle="collapse" data-target="#collapse_0{{$index}}" aria-expanded="false" aria-controls="collapse_0{{$index}}" class="collapsed">
                                                                    <input class="form-check-input" type="checkbox" checked="" name="servicios[]" value="{{$item['datos']['id']}}" disabled>{{$item['datos']['name']}}
                                                                    <i class="fas  fa-angle-down" style="float: right;margin-right: 15px;"></i>
                                                                </a>
                                                            </h5>
                                                        </div>
                                                            <div id="collapse_0{{$index}}" class="collapse" aria-labelledby="heading_0{{$index}}" data-parent="#accordionExample" style="">
                                                                <div class="card-body row text-muted">
                                                                   <label class="form-check-label col-3" style="font-weight: bold;margin-bottom:15px">Convenio</label>
                                                                   <label class="form-check-label col-4" style="font-weight: bold;margin-bottom:15px">Normal</label>
                                                                   <label class="form-check-label col-5" style="font-weight: bold;margin-bottom:15px">Con Descuento</label>
                                                                  @foreach ($userInformationServices as $index2 => $item2)
                                                                      @if ($item2['service_id']== $item['datos']['id'])
                                                                         <label class="form-check-label col-3" style="font-weight: bold;">{{$item2['name']}}</label>
                                                                         <label class="form-check-label col-4">${{convertirVa($item2['price_normal'])}}</label>
                                                                        <label class="form-check-label col-5">${{convertirVa($item2['price_discount'])}}</label>
                                                                      @endif
                                                                  @endforeach
                                                                  </div>
                                                            </div>
                                                    </div>
                                                    @endforeach
                                                  </div>
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
