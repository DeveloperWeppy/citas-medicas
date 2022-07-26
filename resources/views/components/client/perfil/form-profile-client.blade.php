
    <div class="col-md-3">

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-portrait text-info" style="margin-right:10px"></i>  Foto de Documento de Identidad</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <form action="" method="post" id="updatephotoclient">
                <input type="hidden" name="id_cliente" value="{{$cliente->id}}">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <!-- Upload image input-->
                        <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                            <input id="upload" type="file" onchange="readURL(this);" name="imgLogo" class="form-control border-0" >
                            <label id="upload-label" for="upload" class="font-weight-light text-muted" style="display:none">Imágen</label>
                            <div class="input-group-append">
                                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fas fa-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Cambiar Foto de Documento</small></label>
                            </div>
                        </div>

                        <!-- Uploaded image area-->
                        <div class="image-area mt-4"><img id="imageResult" src="{{$cliente->photo}}" alt="User profile picture" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-spinner"></i> Actualizar</button>
                </div>
            </form>
        </div>
    </div>



    <div class="col-md-9">
        <!--DATOS DE clienteE-->
        <div class="card card-primary card-outline">

            <!--cabecera del contenedor--->
            <div class="card-header">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#datosbasicos" data-toggle="tab"><i class="fas fa-info-circle"></i> Información Básica</a></li>
                    <li class="nav-item"><a class="nav-link" href="#datoscontacto" data-toggle="tab"><i class="fas fa-id-card"></i> Datos de Contácto</a></li>
                </ul>
            </div>

            <!--cuerpo del contenedor--->
            <form action="" method="post" id="updateclient">
                <input type="hidden" name="id_cliente" value="{{$cliente->id}}">
                <input type="hidden" name="user_id" value="{{$cliente->user_id }}">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="datosbasicos">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" name="name" id="" class="form-control " value="{{$cliente->name}}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Apellidos</label>
                                        <input type="text" name="last_name" id="" class="form-control " value="{{$cliente->last_name}}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Número de Identificación</label>
                                        <input type="text" name="number_identication" id="" class="form-control " value="{{$cliente->number_identication}}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Edad</label>
                                        <input type="number" name="age" id="" class="form-control " value="{{$cliente->age}}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Sexo</label>
                                        <select class="form-control" name="gender">
                                          <option {{$cliente->gender=="Hombre"?'selected':''}}>Hombre</option>
                                          <option {{$cliente->gender=="Mujer"?'selected':''}}>Mujer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Fecha de Cumpleaños</label>
                                        <input type="date" name="date_of_birth" id="" class="form-control " value="{{$cliente->date_of_birth}}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Dirección</label>
                                        <input type="text" name="address" id="" class="form-control " value="{{$cliente->address}}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Barrio</label>
                                        <input type="text" name="neighborhood" id="" class="form-control " value="{{$cliente->neighborhood}}" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Departamento</label>
                                        <select class="form-control select-department" value="{{$cliente->department}}" name="department">
                                          <option>Selecciona Departamento</option>
                                          @foreach($departamentos as  $value)
                                          <option value="{{ $value->id_departamento}}">{{$value->departamento}}</option>
                                           @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Ciudad</label>
                                        <select class="form-control select-ciudades select-ciudadesS" name="city" value="{{$cliente->city}}" >
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="datoscontacto">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Número de Celular/Teléfono</label>
                                        <input type="text" name="num_phone" id="" class="form-control " value="{{$cliente->num_phone}}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Correo Electrónico</label>
                                        <input type="text" name="email" id="" class="form-control " value="{{$cliente->email}}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Perfil de Facebook</label>
                                        <input type="text" name="facebook" id="" class="form-control " value="{{$cliente->facebook}}" autocomplete="off">
                                        <small>Ejemplo: https://www.facebook.com/citasmedicas.es/</small>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Perfil de Instagram</label>
                                        <input type="text" name="instagram" id="" class="form-control " value="{{$cliente->instagram}}" autocomplete="off">
                                        <small>Ejemplo: https://www.instagram.com/citasmedicas.es/</small>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Número de WhatsApp</label>
                                        <input type="number" name="whatsapp" id="" class="form-control " value="{{$cliente->whatsapp}}" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <a href="{{ route('servicios.index') }}" class="btn btn-default">Cancelar</a>
                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-spinner"></i> Actualizar</button>
                </div>
            </form>
        </div>

    </div>
