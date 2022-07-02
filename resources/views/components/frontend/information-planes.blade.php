<section class="pricing1 counter1__bg-01">
    <div class="content_box_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="title2 mb-60 text-center">
                        <h4>Planes</h4>
                        <h2>Make life easier with comfortable pricing</h2>
                    </div>
                </div>
            </div>

            <!-- Default checked -->

              <div class="custom-control custom-switch" style="margin: 0 auto;width: fit-content;">
                <label  class="option-off" style="position: relative;margin-bottom: 0;right:40px;font-weight: bold;">Anual</label>
                <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                <label class="custom-control-label" for="customSwitch1"></label>
                <label class="option-on " style="position: relative;margin-bottom: 0;right:5px;color:#007bff;font-weight: bold;"> Mensual</label>
             </div>
            <div class="row no-gutters pricing1__row">
               @foreach ($planes as $item)
                <div class=" color_white plan{{$item->type_plan}}" {{$item->type_plan=="Anual"? 'style=display:none':''}}>

                    <div class="pricing1__item">
                        <div class="pricing1__wrapper text-center">
                            <div class="pricing1__thumb--style">
                                <div class="pricing1__thumb">
                                    <img src="{{ asset('asset/img/png-icon/png-icon-19.png')}}" alt="Image">
                                </div>
                            </div>
                            <div class="pricing1__content mt-85">
                                <h4>{{$item->name}}</h4>
                                <p class="m-0">{{$item->type_plan}}</p>
                                <h3>${{convertirVa($item->price)}}</h3>
                                <ul>

                                    @foreach ($datas as $index => $itemm)
                                        @foreach ($itemm['servicios'] as $services)
                                            @if ($services->plan_id == $item->id)
                                                <li>
                                                    {{$services->find($services->id)->servicioss->name}}
                                                </li>
                                            @endif
                                        @endforeach
                                    @endforeach

                                </ul>
                                <a  href="{{ route('front.detallesplan',['id'=>$item->id]) }}" class="btn5 mb-2 d-none d-sm-inline-block">Ver Todos los Servicios</a>

                                <a href="{{ route('front.subscribirme') }}" class="btn8">Subscribirme</a>
                            </div>
                        </div>
                    </div>
                </div>
               @endforeach

            </div>
        </div>
    </div>
</section>
