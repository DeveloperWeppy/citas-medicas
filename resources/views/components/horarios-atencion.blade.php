<div class="row mt-2">
    <!---------------------------- lunes-------------------------------->
    <div class="col-7">
        <p>Atención en la Mañana</p>
        <div class="row">
          <div class="col-sm-4">
              <div class="form-group">
                  <label for="">Día</label>
                  <input type="text" class="form-control" name="day[]" id="" value="Lunes" >
              </div>
          </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">De</label>
                    <input type="time" class="form-control" name="open_morning[]" value="{{$attentioShedule->lunes->open_morning}}" id="" >
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">A</label>
                    <input type="time" class="form-control" name="close_morning[]" value="{{$attentioShedule->lunes->close_morning}}" id="" >
                </div>
            </div>
        </div>
    </div>

    <div class="col-5">
        <p>Atención en la Tarde</p>
        <div class="row">

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">De</label>
                    <input type="time" class="form-control" name="open_afternoon[]" value="{{$attentioShedule->lunes->open_afternoon}}" id="" >
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">A</label>
                    <input type="time" class="form-control" name="close_afternoon[]" value="{{$attentioShedule->lunes->close_afternoon}}" id="" >
                </div>
            </div>
        </div>
    </div>

    <!---------------------------- martes-------------------------------->
    <div class="col-7">
        <div class="row">
          <div class="col-sm-4">
              <div class="form-group">
                  <input type="text" class="form-control" name="day[]" id="" value="Martes" >
              </div>
          </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="time" class="form-control" name="open_morning[]" value="{{$attentioShedule->martes->open_morning}}" id="" >
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="time" class="form-control" name="close_morning[]"  value="{{$attentioShedule->martes->close_morning}}" id="" >
                </div>
            </div>
        </div>
    </div>

    <div class="col-5">
        <div class="row">

            <div class="col-sm-6">
                <div class="form-group">
                    <input type="time" class="form-control" name="open_afternoon[]" value="{{$attentioShedule->martes->open_afternoon}}" id="" >
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="time" class="form-control" name="close_afternoon[]" value="{{$attentioShedule->martes->close_afternoon}}" id="" >
                </div>
            </div>
        </div>
    </div>

    <!---------------------------- miercoles-------------------------------->
    <div class="col-7">
        <div class="row">
          <div class="col-sm-4">
              <div class="form-group">
                  <input type="text" class="form-control" name="day[]" id="" value="Miercoles" >
              </div>
          </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="time" class="form-control" name="open_morning[]" value="{{$attentioShedule->miercoles->open_morning}}" id="" >
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="time" class="form-control" name="close_morning[]" value="{{$attentioShedule->miercoles->close_morning}}" id="" >
                </div>
            </div>
        </div>
    </div>

    <div class="col-5">
        <div class="row">

            <div class="col-sm-6">
                <div class="form-group">
                    <input type="time" class="form-control" name="open_afternoon[]" value="{{$attentioShedule->miercoles->open_afternoon}}" id="" >
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="time" class="form-control" name="close_afternoon[]" value="{{$attentioShedule->miercoles->close_afternoon}}"  id="" >
                </div>
            </div>
        </div>
    </div>

     <!---------------------------- jueves-------------------------------->
     <div class="col-7">
        <div class="row">
          <div class="col-sm-4">
              <div class="form-group">
                  <input type="text" class="form-control" name="day[]" id="" value="Jueves" >
              </div>
          </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="time" class="form-control" name="open_morning[]"  value="{{$attentioShedule->jueves->open_morning}}" id="" >
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="time" class="form-control" name="close_morning[]" value="{{$attentioShedule->jueves->close_morning}}" id="" >
                </div>
            </div>
        </div>
    </div>

    <div class="col-5">
        <div class="row">

            <div class="col-sm-6">
                <div class="form-group">
                    <input type="time" class="form-control" name="open_afternoon[]" value="{{$attentioShedule->jueves->open_afternoon}}" id="" >
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="time" class="form-control" name="close_afternoon[]" value="{{$attentioShedule->jueves->close_afternoon}}" id="" >
                </div>
            </div>
        </div>
    </div>

     <!---------------------------- viernes-------------------------------->
     <div class="col-7">
        <div class="row">
          <div class="col-sm-4">
              <div class="form-group">
                  <input type="text" class="form-control" name="day[]" id="" value="Viernes" >
              </div>
          </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="time" class="form-control" name="open_morning[]" value="{{$attentioShedule->viernes->open_morning}}" id="" >
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="time" class="form-control" name="close_morning[]" value="{{$attentioShedule->viernes->close_morning}}" id="" >
                </div>
            </div>
        </div>
    </div>

    <div class="col-5">
        <div class="row">

            <div class="col-sm-6">
                <div class="form-group">
                    <input type="time" class="form-control" name="open_afternoon[]" value="{{$attentioShedule->viernes->open_afternoon}}" id="" >
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="time" class="form-control" name="close_afternoon[]" value="{{$attentioShedule->viernes->close_afternoon}}" id="" >
                </div>
            </div>
        </div>
    </div>

     <!---------------------------- sabado-------------------------------->
     <div class="col-7">
        <div class="row">
          <div class="col-sm-4">
              <div class="form-group">
                  <input type="text" class="form-control" name="day[]" id="" value="Sábado" >
              </div>
          </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="time" class="form-control" name="open_morning[]" value="{{$attentioShedule->sabado->open_morning}}" id="" >
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="time" class="form-control" name="close_morning[]" value="{{$attentioShedule->sabado->close_morning}}" id="" >
                </div>
            </div>
        </div>
    </div>

    <div class="col-5">
        <div class="row">

            <div class="col-sm-6">
                <div class="form-group">
                    <input type="time" class="form-control" name="open_afternoon[]"  value="{{$attentioShedule->sabado->open_afternoon}}" id="" >
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="time" class="form-control" name="close_afternoon[]" value="{{$attentioShedule->sabado->close_afternoon}}" id="" >
                </div>
            </div>
        </div>
    </div>

     <!---------------------------- domingo-------------------------------->
     <div class="col-7">
        <div class="row">
          <div class="col-sm-4">
              <div class="form-group">
                  <input type="text" class="form-control" name="day[]" id="" value="Domingo" >
              </div>
          </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="time" class="form-control" name="open_morning[]" value="{{$attentioShedule->domingo->open_morning}}" id="" >
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="time" class="form-control" name="close_morning[]" value="{{$attentioShedule->domingo->close_morning}}" id="" >
                </div>
            </div>
        </div>
    </div>

    <div class="col-5">
        <div class="row">

            <div class="col-sm-6">
                <div class="form-group">
                    <input type="time" class="form-control" name="open_afternoon[]" value="{{$attentioShedule->domingo->open_afternoon}}" id="" >
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="time" class="form-control" name="close_afternoon[]" value="{{$attentioShedule->domingo->close_afternoon}}" id="" >
                </div>
            </div>
        </div>
    </div>
</div>
