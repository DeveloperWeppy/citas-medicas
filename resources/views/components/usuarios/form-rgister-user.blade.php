
    <div class="row">
        <div class="col-12">
           <div class="card card-default">
               <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-plus"></i> Registrar un Nuevo Convenio</h3>
               </div>
  
               <form action="" method="post">
                   <div class="card-body">
                      <h4>DATOS DE USUARIO</h4>
                      <div class="row">
                          <div class="col-md-4 text-center">
                          </div>
                          <div class="col-md-4 text-center">
                            <div class="form-group">
                              <img id="imgSalida" width="40%" class="img-fluid rounded" height="40%" src="" />
                              <div class="custom-file">
                                  <input type="file" name="imgLogo" class="custom-file-input" id="customFile" accept="image/png,image/jpeg">
                                  <label class="custom-file-label" for="customFile">Subir Logo</label>
                              </div>
                          </div>
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
                                          <input type="text" name="name" id="txnombres" class="form-control " placeholder="Nombre" autocomplete="off">
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