<div class="row">

    @can('usuarios.index')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$planes}}</h3>
                    <p>Planes Registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cube"></i>
                </div>
                <a href="{{ route('plane.index') }}" class="small-box-footer">Ver Detalles  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$servicios}}</h3>
                    <p>Servicios Registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-hand-holding-medical"></i>
                </div>
                <a href="{{ route('servicios.index') }}" class="small-box-footer">Ver Detalles  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$convenios}}</h3>
                    <p>Convenios Registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <a href="{{ route('usuarios.index') }}" class="small-box-footer">Ver Detalles  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>0</h3>
                    <p>Clientes Registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">Ver Detalles  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    @endcan
    
</div>