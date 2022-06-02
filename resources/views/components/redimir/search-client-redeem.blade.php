<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" 
data-backdrop="static" aria-hidden="true" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-search"></i> Buscar Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                            <div class="input-group">
                                <input type="search" class="form-control form-control-lg" id="mysearch" placeholder="Buscar cliente por número de cédula">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default" disabled>
                                    <i class="fa fa-search"></i>
                                    </button>
                                </div>
                                <ul id="showlist" tabindex='1' class="list-group"></ul>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
      </div>
    </div>
</div>