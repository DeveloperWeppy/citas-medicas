<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" 
data-backdrop="static" aria-hidden="true" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-check"></i> Registrar Miembro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" id="quickForm" method="post">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text" name="name" id="" class="form-control " placeholder="Nombre del Miembro" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text" name="lastname" id="" class="form-control " placeholder="Apellido del Miembro" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="number" name="number_identication" id="" class="form-control " placeholder="Número de Identificación" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text" name="email" id="" class="form-control " placeholder="Correo Electrónico" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
      </div>
    </div>
</div>