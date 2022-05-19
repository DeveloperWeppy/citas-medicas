<!-- Modal -->
<div class="modal fade" id="modalCustom" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" aria-hidden="true" data-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-user-plus"></i> Nuevo Prestador de Servicio</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" id="quickForm" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="modal-body">
                <div class="row">

                    <div class="col-4 d-flex align-items-center">
                        <div class="row">
                            <div class="col-md-auto text-center ">
                                <div class="form-group">
                                    <img id="imgSalida" width="40%" class="img-fluid rounded" height="40%" src="" />
                                    <div class="custom-file">
                                        <input type="file" name="imgLogo" class="custom-file-input" id="customFile" accept="image/png,image/jpeg">
                                        <label class="custom-file-label" for="customFile">Subir Logo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        <h4>DATOS DE USUARIO</h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="email" id="txcorreo" class="form-control " placeholder="Email" autocomplete="off">
                                </div>
                            </div>
            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="password" id="text2" class="form-control " placeholder="Contraseña" autocomplete="off">
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

                        <h4>HORARIOS DE ATENCIÓN</h4>
                        <div class="row">

                        </div>
                       
                    </div>
                    
                </div>
    
            </div>

            <!---FOOTER---->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>