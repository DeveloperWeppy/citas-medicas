<!-- Modal -->
<div class="modal fade" id="modal_EditarEspecialidad-{{$idcategory}}" tabindex="-1" aria-labelledby="exampleModalLabel" 
data-backdrop="static" aria-hidden="true" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Actualizar Especialidad</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" id="editCategory" method="post">
            <input type="hidden" name="id" value="{{ $category->id }}">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text" name="name" id="" class="form-control " placeholder="Nombre" value="{{ $category->name }}" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <textarea class="form-control" name="description" placeholder="Descripción" id="" maxlength="499" rows="3">{{ $category->description }}</textarea>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <textarea class="form-control" name="observation" placeholder="Observación(opcional)" id="" maxlength="499" rows="3">{{ $category->observation }}</textarea>
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