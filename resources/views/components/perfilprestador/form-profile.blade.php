
    <div class="col-md-3">

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-image text-info"></i> Logo</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <form action="" method="post" id="updatephotoprestador">
                <input type="hidden" name="id_userprestador" value="{{$user->id}}">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <!-- Upload image input-->
                        <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                            <input id="upload" type="file" onchange="readURL(this);" name="imgLogo" class="form-control border-0">
                            <label id="upload-label" for="upload" class="font-weight-light text-muted">Imágen</label>
                            <div class="input-group-append">
                                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fas fa-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Cambiar Logo</small></label>
                            </div>
                        </div>

                        <!-- Uploaded image area-->
                        <div class="image-area mt-4"><img id="imageResult" src="{{$user->logo}}" alt="User profile picture" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-spinner"></i> Actualizar</button>
                </div>
            </form>
        </div>
    </div>



    <div class="col-md-9">
        <!--DATOS DE userprestadorE-->
        <div class="card card-primary card-outline">
                    
            <!--cabecera del contenedor--->
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-info-circle text-info"></i> Datos de Contácto</h3>
            </div>

            <!--cuerpo del contenedor--->
            <form action="" method="post" id="updateprestador">
                <input type="hidden" name="id_userprestador" value="{{$userprestador->id}}">
                <input type="hidden" name="user_id" value="{{$userprestador->user_id }}">
                <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Nombre de la Entidad</label>
                                        <input type="text" name="name" id="" class="form-control " value="{{$userprestador->name}}" autocomplete="off">
                                    </div>
                                </div>
                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Nit</label>
                                        <input type="text" name="nit" id="" class="form-control " value="{{$userprestador->nit}}" autocomplete="off">
                                    </div>
                                </div>
                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Dirección</label>
                                        <input type="text" name="address" id="" class="form-control " value="{{$userprestador->address}}" autocomplete="off">
                                    </div>
                                </div>
                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Número de Celular/Teléfono</label>
                                        <input type="number" name="num_phone" id="" class="form-control " value="{{$userprestador->num_phone}}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Nombre de Contácto</label>
                                        <input type="text" name="name_contact" id="" class="form-control " value="{{$userprestador->name_contact}}" autocomplete="off">
                                    </div>
                                </div>
                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Número de Teléfono de Contácto</label>
                                        <input type="text" name="num_phone_contact" id="" class="form-control " value="{{$userprestador->num_phone_contact}}" autocomplete="off">
                                    </div>
                                </div>
                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Correo Electrónico de Contácto</label>
                                        <input type="text" name="email_contact" id="" class="form-control " value="{{$userprestador->email_contact}}" autocomplete="off">
                                    </div>
                                </div>
                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Ciudad</label>
                                        <input type="text" name="city" id="" class="form-control " value="{{$userprestador->city}}" autocomplete="off">
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
