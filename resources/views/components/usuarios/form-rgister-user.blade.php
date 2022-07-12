    <div class="row">
        <div class="col-12">
           <div class="card card-default">
               <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-plus"></i> Registrar un Nuevo Convenio</h3>
               </div>

               <form action="" method="" id="quickForm" enctype="multipart/form-data">
                   <div class="card-body">
                      <h4>DATOS DE USUARIO</h4>
                      <input type="number" name="id_userprestador" value="{{$user->id}}" style="display:none">
                      <div class="row py-4">
                            <div class="col-md-6 text-center">
                                 <!-- Upload image input-->
                                 <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                    <input id="uploadBanner" type="file" onchange="readURLBanner(this);" name="imgBanner" class="form-control border-0">
                                    <label id="upload-label-banner" for="uploadBanner" class="font-weight-light text-muted">Imágen</label>
                                    <div class="input-group-append">
                                        <label for="uploadBanner" class="btn btn-light m-0 rounded-pill px-4"> <i class="fas fa-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Subir Imágen de Portada</small></label>
                                    </div>
                                </div>
                                <small>Dimensiones recomendadas Ancho(1920) x Alto(420)</small>

                                <!-- Uploaded image area-->
                                <div class="image-area mt-4"><img id="imageResultBanner" src="{{$userInformation->image_banner}}"  alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                            </div>

                            <div class="col-md-6 text-center">
                                <!-- Upload image input-->
                                <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                    <input id="upload" type="file" onchange="readURL(this);" name="imgLogo" class="form-control border-0">
                                    <label id="upload-label" for="upload" class="font-weight-light text-muted">Imágen</label>
                                    <div class="input-group-append">
                                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fas fa-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Subir Logo</small></label>
                                    </div>
                                </div>
                                <small>Dimensiones recomendadas Ancho(220) x Alto(220)</small>

                                <!-- Uploaded image area-->
                                <div class="image-area mt-4"><img id="imageResult" src="{{$user->logo }}" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                            </div>
                      </div>
                      <div class="row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label style="font-weight: normal;">CORREO</label>
                                          <input type="text" name="email" id=""  value="{{$user->email}}" class="form-control " placeholder="Email" autocomplete="off">
                                      </div>
                                  </div>

                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="password" id=""  value="" class="form-control " placeholder="Contraseña" autocomplete="off" {{$user->email!=""? 'style=display:none':''}}>
                                      </div>
                                  </div>
                      </div>
                      <!----------------------------------   CONTACT INFORMATION START     ---------------------->
                              <h4 class="mt-2">INFORMACIÓN DE CONTÁCTO</h4>

                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label >Nit</label>
                                          <input type="text" name="nit" id="txnit" class="form-control " value="{{$userInformation->nit}}" placeholder="NIT" autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label >Nombre de Entidad</label>
                                          <input type="text" name="name" id="txnombres" class="form-control "  value="{{$userInformation->name}}" placeholder="Nombre de Entidad" autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label >Dirección</label>
                                          <input type="text" name="address" id="txaddress" class="form-control " value="{{$userInformation->address}}" placeholder="Dirección" autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label >Teléfono</label>
                                          <input type="number" name="num_phone" id="txphone" class="form-control "  value="{{$userInformation->num_phone}}" placeholder="Teléfono" autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label >Nombre de Contácto</label>
                                          <input type="text" name="name_contact" id="txname_contact" class="form-control "   value="{{$userInformation->name_contact}}" placeholder="Nombre de Contácto" autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label style="font-weight: normal;">Teléfono de Contácto</label>
                                          <input type="number" name="num_phone_contact" id="txphone_contact" class="form-control " value="{{$userInformation->num_phone_contact}}"  placeholder="Teléfono de Contácto" autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label >Correo de Contácto</label>
                                          <input type="email" name="email_contact" id="txemail_contact" class="form-control " value="{{$userInformation->email_contact}}"  placeholder="Correo de Contácto" autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label >Ciudad</label>
                                          <input type="text" name="city" id="txcity" class="form-control " value="{{$userInformation->city}}"  placeholder="Ciudad" autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                        <label >Iframe  oogle Maps</label>
                                        <textarea name="frame_ubication" class="form-control" id="" cols="30" rows="4"  placeholder="Ingrese el iframe de la ubicación de Google Maps">{{$userInformation->frame_ubication}}</textarea>
                                    </div>
                                </div>

                              </div>
                              <!----------------------------------   CONTACT INFORMATION END     ---------------------->

                              <!----------------------------------   REDES SOCIALES START     ---------------------->
                              <h4 class="mt-2">REDES SOCIALES</h4>
                              <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="facebook" id="" class="form-control " value="{{$userInformation->facebook}}"  placeholder="Facebook" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="instagram" id="" class="form-control " value="{{$userInformation->instagram}}"  placeholder="Instagram" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="whatsapp" id="" class="form-control " value="{{$userInformation->whatsapp}}"  placeholder="WhatsApp" autocomplete="off">
                                    </div>
                                </div>
                              </div>

                              <!----------------------------------   REDES SOCIALES END     ---------------------->


                              <p>Dado el contrato, determine las fechas de inicio y finalización del convenio</p>
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label for="">Desde</label>
                                          <input type="date" class="form-control" name="start_date" value="{{date('Y-m-d',strtotime($convenio->start_date))}}"  >
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label for="">Hasta</label>
                                          <input type="date" class="form-control" name="end_date" value="{{date('Y-m-d',strtotime($convenio->end_date))}}"  id="" >
                                      </div>
                                  </div>
                              </div>
                              <!----------------------------------   HORARIOS DE ATENCIÓN START     ---------------------->
                              <h4 class="mt-2">HORARIOS DE ATENCIÓN</h4>
                              <x-horarios-atencion  :attentioShedule=$attentioShedule></x-horarios-atencion>

                              <!----------------------------------   CONTACT INFORMATION END     ---------------------->

                              <!----------------------------------   SERVICES START     ---------------------->
                              <div class="row">
                                <div class="col-sm-12 ">
                                    <h4 class="mt-2">SERVICOS QUE PRESTA </h4>
                                </div>
                                <div class="col-sm-12">
                                    <div class="callout callout-info">
                                        <h5><i class="fas fa-info"></i> Nota:</h5>
                                        Por favor indique si la tarifa del convenio será en porcentaje o precio de descuento.
                                        <div class="form-group mt-2">
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" name="discount_or_no" class="custom-control-input" id="customSwitch3">
                                                <label class="custom-control-label" for="customSwitch3" id="label_texto_descuento">Precio con Descuento
                                            </div>
                                        </div>
                                    </div>
                                </div>

                              </div>

                              <div class="row despusPrin">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                          <select class='mi-selector form-control' id="formNombreServicio" name='marcas'>
                                              <option value=''>Seleccionar un Servicio</option>
                                          @foreach($servicios as $key => $value)
                                              <option value='{{$value->id}}'>{{$value->name}}</option>
                                          @endforeach
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" name="price_no" id="formPrecioNormal" class="form-control " placeholder="Precio Normal" autocomplete="off">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text text-tarifa" >$</span>
                                            </div>
                                            <input type="number" name="price_d" id="formPrecioDescuento" class="form-control " placeholder="Precio o Porcentaje" autocomplete="off">
                                                <div class="input-group-append">
                                                    <span class="input-group-text ceros">.00</span>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1 ">
                                     <i class="fas fa-plus-circle" onclick="agregarServicio()" style="font-size:40px;color:#34c2b5"></i>
                                    </div>
                              </div>
                              @foreach($convenioServices as $key => $value)
                              <div class="row ItemServ">
                                      <div class="col-sm-5 ed">
                                            <div class="form-group">
                                              <select class='form-control mi-selector-edit formNombreServicio'   name="servicio_id[]" value="{{$value->service_id}}" placeholder="Nombre del Servicio" autocomplete="off" required>  </select>
                                            </div>
                                       </div>
                                      <div class="col-sm-3">
                                           <div class="input-group mb-3">
                                                 <div class="input-group-prepend">
                                                      <span class="input-group-text">$</span>
                                                  </div>
                                                  <input type="number" name="price_normal[]" value="{{$value->price_normal}}" class="form-control formPrecioNormal" placeholder="Precio Normal" autocomplete="off">
                                                  <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                  </div>
                                            </div>
                                     </div>
                                     <div class="col-sm-3">
                                          <div class="input-group mb-3">
                                               <div class="input-group-prepend">
                                                    <span class="input-group-text text-tarifa">$</span>
                                               </div>
                                               <input type="number" name="price_descuento[]" value="{{$value->price_discount}}" class="form-control formPrecioNormal" placeholder="Precio Normal" autocomplete="off">
                                               <div class="input-group-append ceros">
                                                    <span class="input-group-text">.00</span>
                                               </div>
                                          </div>
                                        </div>
                                        <div class="col-sm-1" style="display:table" onclick="$(this).parent().remove();"><i class="fas fa-trash-alt" style="font-size:30px;color:red;margin-top:5px"></i>
                                        </div>
                                </div>
                              @endforeach
                              <!----------------------------------   SERVICES END     ---------------------->
                   </div>
                   <div class="card-footer">
                    <a href="{{ route('usuarios.index') }}" class="btn btn-default">Cancelar</a>
                    <button type="submit" class="btn btn-success float-right">Guardar</button>
                    </div>
               </form>

           </div>

        </div>

      </div>
