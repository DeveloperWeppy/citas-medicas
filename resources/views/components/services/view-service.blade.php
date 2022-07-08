
    <div class="row">
        <div class="col-12">
           <div class="card card-info card-outline">
               <div class="card-header">
                  <h3 class="card-title text-uppercase"><i class="fas fa-info-circle"></i> detalles del Servicio </h3>
               </div>
                    <div class="card-body">

                            <div class="row">

                                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            @if ($service->price_discount != null && $service->percentage_discount == null)
                                                <p class="text-muted">Precio Con Descuento: <b class="d-block">${{convertirVa($service->price_discount)}}</b></p>
                                            @elseif($service->price_discount == null && $service->percentage_discount != null)
                                                <p class="text-muted">Porcentaje de Descuento: <b class="d-block">{{$service->percentage_discount}} %</b></p>
                                            @endif

                                        </div>
                                        <div class="col-sm-6">
                                            <p class="text-muted">Precio Normal: <b class="d-block">${{convertirVa($service->price_normal)}}</b></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="text-muted">Inicio del Servicio: <b class="d-block">{{date("Y-m-d", strtotime($service->start_date))}}</b></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="text-muted">Fin del Servicio: <b class="d-block">{{date("Y-m-d", strtotime($service->end_date))}}</b></p>
                                        </div>

                                        <div class="col-sm-12">
                                            <fieldset class="border p-2">
                                                <legend class="float-none w-auto p-2">Convenio(s)</legend>
                                                @if ($info_convenio == null)
                                                    <span class="font-weight-bolder font-italic">No hay prestadores de servicio registrados.</span>
                                                @else
                                                    <div class="accordion_style_01 mb-40">
                                                            <div class="accordion row" id="accordionExample ">
                                                                  @foreach ($info_convenio as $index => $item)
                                                                <div class="card col-6" style="box-shadow: none;">
                                                                    <div class="card-header" id="heading_0{{$index+1}}">
                                                                        <h5>
                                                                            <a href="#" style="font-size:19px" data-toggle="collapse" data-target="#collapse_0{{$index+1}}" aria-expanded="false" aria-controls="collapse_0{{$index+1}}" class="">
                                                                                <span> <input class="form-check-input" type="checkbox" checked="" name="servicios[]" value="{{$item['datos']['id']}}" disabled></span>{{$item['datos']['name']}}
                                                                                <i class="ti-angle-down"></i>
                                                                            </a>
                                                                        </h5>
                                                                    </div>
                                                                        <div id="collapse_0{{$index+1}}" class="collapse " aria-labelledby="heading_0{{$index+1}}" data-parent="#accordionExample" style="">
                                                                            <div class="card-body">

                                                                                <h6 style="padding-left:18px"><i class="fas fa-check fa-fw"></i> $value2->name</h6>

                                                                                <p style="padding-left:38px;padding-bottom:15px">$value2->description</p>


                                                                            </div>
                                                                        </div>

                                                                </div>
                                                                @endforeach
                                                            </div>
                                                    </div>
                                                @endif

                                            </fieldset>
                                        </div>
                                        <div class="col-sm-12 mt-3">
                                            @if ($service->observation == null)
                                            <b class="d-block">No tiene observación este servicio</b>
                                            @else
                                            <div class="callout callout-warning">
                                                <h5>Observación</h5>
                                                <p>{{$service->observation}}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                                    <h3 class="text-info"><i class="fas fa-cube"></i> {{$service->name}}</h3>

                                    <p class="text-muted">{{$service->description}}</p>
                                    <br>
                                    <div class="text-muted">
                                        <p class="text-sm">Estado:
                                            @if ($service->status == 0)
                                                <b class="d-block">Inactivo</b>
                                            @else
                                                <b class="d-block">Activo</b>
                                            @endif
                                        </p>
                                        <p class="text-sm">Categoría del Servicio
                                            <b class="d-block">{{$service->find($service->id)->nombre_categoria->name}}</b>
                                        </p>

                                        <p class="text-sm">Especialidad del Servicio
                                            @if ($service->specialty_id == null)
                                                <b class="d-block">No tiene especialidad este servicio</b>
                                            @else
                                                <b class="d-block">{{$service->find($service->id)->nombre_especialidad->name}}</b>
                                            @endif

                                        </p>

                                        <p class="text-sm">¿Es un servicio gratuito?
                                            @if ($service->specialty_id == 0)
                                                <b class="d-block">No</b>
                                            @else
                                                <b class="d-block">Sí</b>
                                            @endif
                                        </p>

                                    </div>
                                </div>
                            </div>

                   </div>

                   <div class="card-footer">
                    </div>

           </div>

        </div>

      </div>
