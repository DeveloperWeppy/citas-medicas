<div class="col-md-3">

    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{$client->photo}}" alt="User profile picture">
            </div>
                <h3 class="profile-username text-center text-uppercase">{{$client->name}}</h3>
                <p class="text-muted text-center">{{$client->number_identication}}</p>
                <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Edad</b> <a class="float-right">{{$client->age}}</a>
                </li>
                </ul>
            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
        </div>
    
    </div>
    
    
</div>

<div class="col-md-9">
    <div class="card card-primary card-outline">
                
        <!--cabecera del contenedor--->
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-info-circle"></i> Datos del Cliente</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <!--cuerpo del contenedor--->
        <div class="card-body">
        </div>
    </div>
</div>