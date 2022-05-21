<div class="modal fade" id="modal_EliminarEspecialidad-{{$idspeciality}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-dark p-5">
                <div class="row justify-content-md-center text-center">

                    <div class="col-12 text-center">
                        <h3 id="recipient-name" class="text-warning font-weight-bold">ELIMINACIÓN DE ESPECIALIDAD</h3>
                        <h5 class="mt-4 mb-5">¿Estas seguro de eliminar <span class="font-weight-bold">{{$nombre}}</span>?</h5>
                    </div>
                    <div class="col-4 col-lg-4">
                        <button type="button" class="btn btn-default border border-dark" data-dismiss="modal">No, cancelar</button>
                    </div>
                    <div class="col-6 col-lg-4">
                        <button onclick=""></button>
                        <a href="{{ route('usuarios.destroy', $idusuario) }}" class="btn btn-dark">Si, Eliminar!</a>
                    </div>

                </div>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>