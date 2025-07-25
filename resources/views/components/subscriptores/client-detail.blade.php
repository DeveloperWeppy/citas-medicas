<div class="col-md-3">

    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{$cliente->photo}}" alt="User profile picture" id="zoom_01">
            </div>
                <h3 class="profile-username text-center text-uppercase">C.C. {{$cliente->number_identication}}</h3>
                <ul class="list-group list-group-unbordered mb-2">
                    <li class="list-group-item">
                        <b>Edad</b> <a class="float-right">{{$cliente->age}}</a>
                    </li>
                </ul>
                <div class="text-center ">
                    @if ($cliente->whatsapp == null)
                        <a href="#" class="redes"><i class="fab fa-whatsapp"></i></a>
                    @else
                        <a href="{{$cliente->whatsapp}}" target="_blank" class="redes"><i class="fab fa-whatsapp"></i></a>
                    @endif

                    @if ($cliente->instagram == null)
                         <a href="#" class="redes"><i class="fab fa-instagram"></i></a>
                    @else
                        <a href="{{$cliente->instagram}}" target="_blank" class="redes"><i class="fab fa-instagram"></i></a>
                    @endif

                    @if ($cliente->facebook == null)
                        <a href="#" class="redes"><i class="fab fa-facebook"></i></a>
                    @else
                        <a href="{{$cliente->facebook}}" target="_blank" class="redes"><i class="fab fa-facebook"></i></a>
                    @endif
                    
                   
                   
                </div>
            <a href="#" class="btn btn-info btn-block"><b>VER</b></a>
        </div>
    </div>
    
</div>

<div class="col-md-9">
    <!--DATOS DE CLIENTE-->
    <div class="card card-primary card-outline">
                
        <!--cabecera del contenedor--->
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-info-circle text-info"></i> Plan del Cliente: <strong>{{$name_plan}}</strong></h3>
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
                    <p class="text-muted">Nombres: <b class="d-block">{{$cliente->name}}</b></p>
                </div>

                <div class="col-sm-6">
                    <p class="text-muted">Apellidos: <b class="d-block">{{$cliente->last_name}}</b></p>
                </div>

                <div class="col-sm-6">
                    <p class="text-muted">Correo Electrónico: <b class="d-block">{{$cliente->email}}</b></p>
                </div>

                <div class="col-sm-6">
                    <p class="text-muted">Celular/Teléfono: <b class="d-block">{{$cliente->num_phone}}</b></p>
                </div>

                <div class="col-sm-6">
                    <p class="text-muted">Departamento: <b class="d-block">{{$cliente->department}}</b></p>
                </div>

                <div class="col-sm-6">
                    <p class="text-muted">Ciudad: <b class="d-block">{{$cliente->city}}</b></p>
                </div>
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>
</div>

@php
    $consultar_miembros = collect($consultar_miembros);
@endphp

@if (!$consultar_miembros->isEmpty())
         <!--DATOS DE MIEMBROS-->
        <div class="col-12">
            <div class="card card-primary card-outline">
                        
                <!--cabecera del contenedor--->
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-users text-info"></i> Miembros del Plan</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                    <div class="card-body" style="background-color: #e4f5f0">
                        <div class="row">
                            @foreach ($datos as $item)
                                <div class="col-lg-6 col-12">
                                    <div class="card card-profile mt-4">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-12 mt-n5">
                                                <a href="javascript:;">
                                                    <div class="p-3 pe-md-0">
                                                        <img class="w-100 border-radius-md shadow-lg" src="{{$item['info']['photo']}}" alt="image">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-lg-8 col-md-6 col-12 my-auto">
                                                <div class="card-body ps-lg-0">
                                                    <h5 class="mb-0 text-uppercase">{{$item['info']['name']}} {{$item['info']['last_name']}}</h5>
                                                    <h6 class="">{{$item['info']['number_identication']}}</h6>
                                                    <h6 class=""><strong>Correo:</strong> {{$item['info']['email']}}</h6>
                                                    <h6 class=""><strong>Celular:</strong> {{$item['info']['num_phone']}}</h6>
                                                    <div class="text-center">
                                                        @if ($item['info']['whatsapp'] == null)
                                                            <a href="#" class="redes"><i class="fab fa-whatsapp"></i></a>
                                                        @else
                                                            <a href="{{$item['info']['whatsapp']}}" target="_blank" class="redes"><i class="fab fa-whatsapp"></i></a>
                                                        @endif

                                                        @if ($item['info']['instagram'] == null)
                                                            <a href="#" class="redes"><i class="fab fa-instagram"></i></a>
                                                        @else
                                                            <a href="{{$item['info']['instagram']}}" target="_blank" class="redes"><i class="fab fa-instagram"></i></a>
                                                        @endif

                                                        @if ($item['info']['facebook'] == null)
                                                            <a href="#" class="redes"><i class="fab fa-facebook"></i></a>
                                                        @else
                                                            <a href="{{$item['info']['facebook']}}" target="_blank" class="redes"><i class="fab fa-facebook"></i></a>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
            </div>
        </div>
        
@endif
   

