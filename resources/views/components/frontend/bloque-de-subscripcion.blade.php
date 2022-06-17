<form action="" method="post" id="quickForm" enctype="multipart/form-data">
    <div class="row">
        <!-------------------------------------------- FORM OF REGISTER USER ------------------------------------------------->
        <div class="col-8">
            <div class="title2 mb-60">
                <h4>Datos de Facturación</h4>
            </div>
            
            <div class="row">
                
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="username">Nombre</label>
                        <input type="text" name="name" id="username" class="form-control" autocomplete="off"/>
                    </div>
                    
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="position">Apellidos</label>
                        <input type="text" name="last_name" class="form-control" id="" autocomplete="off"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="position">Numero de identifiación</label>
                        <input type="number" name="number_identication" class="form-control" id="" autocomplete="off"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="position">Fecha de nacimiento</label>
                        <input type="date" name="date_of_birth" class="form-control" id="" autocomplete="off"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="position">Correo</label>
                        <input type="text" name="email" class="form-control" id="" autocomplete="off"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="position">Celular / Teléfono</label>
                        <input type="number" name="num_phone" class="form-control" id="" autocomplete="off"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="position">Departamento</label>
                        <input type="text" name="department" class="form-control" id="" autocomplete="off"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="position">Ciudad de residencia</label>
                        <input type="text" name="city" class="form-control" id="" autocomplete="off"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="position">Dirección</label>
                        <input type="text" name="address" class="form-control" id="" autocomplete="off"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="position">Barrio</label>
                        <input type="text" name="neighborhood" class="form-control" id="" autocomplete="off"/>
                    </div>
                </div>
                <div class="col-sm-12">
                                    <!-- Upload image input-->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                                <input id="upload" type="file" accept="image/png, image/gif, image/jpeg, image/jpg" onchange="readURL(this);" name="imgLogo" class="form-control dnone border-0">
                                                <label id="upload-label" for="upload" class="pd2 font-weight-light w50 text-muted">Foto frontal del documento</label>
                                                <div class="input-group-append w50">
                                                    <label for="upload" class="btn w100 btn-light m-0 rounded-pill px-4"> <i class="fas fa-upload mr-2  white"></i><small class="text-uppercase font-weight-bold white">Subir Foto</small></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                        <div class="image-area mt-4"><img id="imageResult" src="{{ asset('asset/img/background/preview.png') }}" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                                        </div>
                                    </div>
        
                                    <!-- Uploaded image area-->
                    <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                </div>
                <div class="boton">
                    <label for="position"></label>
                    <button type="submit" class="btn btn-next width-50 ml-auto">Siguiente</button>
                    
                </div>
            </div>
        </div>

         <!-------------------------------------------- FORM OF SELECT PLAN AND PAYMENT PLATFORM------------------------------------------------->
        <div class="col-4">
            <div class="row">
                <div class="col-lg-10">
                    <div class="title2 mb-60">
                        <h4>Seleccionar Plan</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    
                    @foreach ($planes as $item)
                    <div class="card border-primary mb-3" style="max-width: 18rem;">
                        <div class="card-body text-primary">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" name="payment_platform" id="{{$item->id}}" value="" required>
                                            <label for="{{$item->id}}">{{$item->name}}</label>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-sm-4">
                                    <h6>{{$item->price}} / {{$item->type_plan}}</h6>
                                </div>
                                <div class="col-sm-auto">
                                    
                                </div>
                            </div>
                          </div>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
        
    </div>
</form>