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
                    <h3>{{$clientes}}</h3>
                    <p>Clientes Registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('subscriptores.index') }}" class="small-box-footer">Ver Detalles  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    @endcan

    @can('plan.index')
    
        <div class="col-sm-6">
        
            <lottie-player src="{{ asset('lottie/ahorro.json') }}"  background="transparent"  speed="1"  style="width: 100%; height:auto;margin:0 auto"  loop  autoplay></lottie-player>
        </div>
        @if ($cant_servi_redeemed > 0)
            <div class="col-sm-6 align-items-center">
                <div class="text-center mt-3">
                <strong> <h2>¡Mira todo lo que te has <span style="color: #34C2B5">Ahorrado!</span> </h2></strong>

                    <p class="mt-3 mb-3">
                        Has redimido <strong>{{$cant_servi_redeemed}}</strong> beneficios. Si quieres ver en detalle los beneficios redimidos da clic <a href="{{ route('redimidos.index') }}">aquí</a>.
                    </p>
                </div>
                <ul>
                    <li style="list-style: none"><span class="fas fa-check-circle" style="color: #34C2B5"></span> Total en servicios como particular: 
                        <span class="badge bg-danger">$<del>{{convertirVa($tota_precios_normales)}}</del></span> </li>
                    <li style="list-style: none"><span class="fas fa-check-circle" style="color: #34C2B5"></span> Total en servicios redimidos con Citas Médicas: 
                        <span class="badge bg-success">${{convertirVa($tota_precios_descuentos)}}</span> </li>
                </ul>
                <h4 class="mt-5 text-center">Has Ahorrado</h4>
                <h2 class="text-center"><span class="badge bg-success">${{convertirVa($tota_ahorrado)}}</span></h2>
                
                <div class="mt-5 text-center">
                    <small>*Recuerda seguir disfrutando de los beneficios que tiene tu suscripción con <strong>Citasmedicas.es</strong> </small>
                </div>
                
            </div>
        @else
            <div class="col-sm-6 d-flex align-items-center">
                <strong><h2>No has redimido ningún beneficio aún. Recuerda que con <span style="color: #34C2B5">Citasmedicas.es</span> tienes acceso a grandes descuentos.</h2></strong>
            </div>
            
        @endif
       
    @endcan
    
</div>