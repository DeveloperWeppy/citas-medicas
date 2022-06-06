
    <div class="row">
        <div class="col-12">
           <div class="card card-default">
               <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-plus"></i> Registrar un Nuevo Convenio</h3>
               </div>
  
               <form action="" method="post" id="quickForm" enctype="multipart/form-data">
                   <div class="card-body">
                      <h4>DATOS DE USUARIO</h4>
                      <div class="row py-4">
                            <div class="col-md-4 text-center">
                            </div>
                            <div class="col-md-4 text-center">
                                <!-- Upload image input-->
                                <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                    <input id="upload" type="file" onchange="readURL(this);" name="imgLogo" class="form-control border-0">
                                    <label id="upload-label" for="upload" class="font-weight-light text-muted">Imágen</label>
                                    <div class="input-group-append">
                                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fas fa-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Subir Logo</small></label>
                                    </div>
                                </div>

                                <!-- Uploaded image area-->
                                <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                            </div>
                            <div class="col-md-4 text-center">
                            </div>
                      </div>
                      <div class="row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="email" id="" class="form-control " placeholder="Email" autocomplete="off">
                                      </div>
                                  </div>
                  
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="password" id="" class="form-control " placeholder="Contraseña" autocomplete="off">
                                      </div>
                                  </div>
                      </div>
                              <h4 class="mt-2">INFORMACIÓN DE CONTÁCTO</h4>
      
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="nit" id="txnit" class="form-control " placeholder="NIT" autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="name" id="txnombres" class="form-control " placeholder="Nombre de Entidad" autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="address" id="txaddress" class="form-control " placeholder="Dirección" autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <input type="number" name="num_phone" id="txphone" class="form-control " placeholder="Teléfono" autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="name_contact" id="txname_contact" class="form-control " placeholder="Nombre de Contácto" autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <input type="number" name="num_phone_contact" id="txphone_contact" class="form-control " placeholder="Teléfono de Contácto" autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <input type="email" name="email_contact" id="txemail_contact" class="form-control " placeholder="Correo de Contácto" autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="city" id="txcity" class="form-control " placeholder="Ciudad" autocomplete="off">
                                      </div>
                                  </div>
                              </div>
                              <p>Dado el contrato, determine las fechas de inicio y finalización del convenio</p>
                              <div class="row">
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
                              </div>
                              <h4 class="mt-2">HORARIOS DE ATENCIÓN</h4>
                              <x-horarios-atencion></x-horarios-atencion>
                   </div>
  
                   <div class="card-footer">
                    <a href="{{ route('usuarios.index') }}" class="btn btn-default">Cancelar</a>
                    <button type="submit" class="btn btn-success float-right">Guardar</button>
                    </div>
               </form>
  
           </div>
          
        </div>
       
      </div>