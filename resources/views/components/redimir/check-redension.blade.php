<div class="col-md-3">

    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{$client->photo}}" alt="User profile picture">
            </div>
                <h3 class="profile-username text-center text-uppercase">{{$client->name}}</h3>
                <p class="text-muted text-center">C.C. {{$client->number_identication}}</p>
                <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Edad</b> <a class="float-right">{{$client->age}}</a>
                </li>
                </ul>
            {{-- <a href="#" class="btn btn-primary btn-block"><b>VER</b></a> --}}
        </div>
    </div>
    
</div>

<div class="col-md-9">
    <!--DATOS DE CLIENTE-->
    <div class="card card-primary card-outline">
                
        <!--cabecera del contenedor--->
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-info-circle text-info"></i> Datos del Cliente</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <!--cuerpo del contenedor--->
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <p class="text-muted">Nombres: <b class="d-block">{{$client->name}}</b></p>
                </div>

                <div class="col-sm-6">
                    <p class="text-muted">Apellidos: <b class="d-block">{{$client->last_name}}</b></p>
                </div>

                <div class="col-sm-6">
                    <p class="text-muted">Correo Electrónico: <b class="d-block">{{$client->email}}</b></p>
                </div>

                <div class="col-sm-6">
                    <p class="text-muted">Celular/Teléfono: <b class="d-block">{{$client->num_phone}}</b></p>
                </div>

                <div class="col-sm-6">
                    <p class="text-muted">Departamento: <b class="d-block">{{$client->department}}</b></p>
                </div>

                <div class="col-sm-6">
                    <p class="text-muted">Ciudad: <b class="d-block">{{$client->city}}</b></p>
                </div>
            </div>
        </div>
    </div>

    <!--DATOS DE SERVICIOS-->
    <div class="card card-primary card-outline">
                
        <!--cabecera del contenedor--->
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-check-double text-info"></i> Servicio a Redimir</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <!--cuerpo del contenedor--->
        <form action="" id="register_redeemed">
            <div class="card-body">
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
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input class="" type="radio" name="id_service" id="{{$item['datos']['id']}}" value="{{$item['datos']['id']}}" checked="">
                                                    <label for="{{$item['datos']['id']}}" >{{$item['datos']['name']}}</label>
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
            <input type="hidden" name="id_client" value="{{$client->id}}">
            <input type="hidden" name="prestador_id" value="{{$id_user_information}}">
            <div class="card-footer">
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Redimir <i class="fas fa-thumbs-up"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>