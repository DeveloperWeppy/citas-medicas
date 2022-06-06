
    <div class="row">
        <div class="col-12">
           <div class="card card-primary card-outline">
               <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-plus"></i>
               </div>
  
               <form action="" method="post" id="quickForm">
                   <div class="card-body">
      
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="name" id="" class="form-control " placeholder="Nombre del Servicio" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>C</label>
                                        <select class="custom-select" name="specialty_id">
                                         {{--    @foreach ($specialitys as $item)
                                                @if ($item == null)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @else
                                                    <option value="">No hay especialidades registradas</option>
                                                @endif
                                                
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                   </div>
  
                   <div class="card-footer">
                    <a href="{{ route('servicios.index') }}" class="btn btn-default">Cancelar</a>
                    <button type="submit" class="btn btn-success float-right">Guardar</button>
                    </div>
               </form>
  
           </div>
          
        </div>
       
      </div>