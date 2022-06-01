<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" 
    data-backdrop="static" aria-hidden="true" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Registrar Mis Intereses</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" id="quickForm">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <fieldset class="border p-2">
                            <legend class="float-none w-auto p-2">Interéses</legend>
                            @if ($intereses->isEmpty())
                                <span class="font-weight-bolder font-italic">No hay intereses para registrar</span>
                            @else
                                <div class="row">
                                    @foreach ($intereses as $index => $item)
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="intereses[]" value="{{$item->id}}">
                                                    <label class="form-check-label">{{$item->name}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </fieldset>
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