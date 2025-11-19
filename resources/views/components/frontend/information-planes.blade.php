<section class="pricing1 counter1__bg-01" id="planess">
    <div class="content_box_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="title2 mb-60 text-center">
                        <h4></h4>
                        <h2>Nuestros Planes</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center pricing1__row">
               @forelse ($planes as $index => $item)
                <div class="col-lg-6 col-md-8 color_white" style="margin-bottom: 70px;">
                    <div class="pricing1__item">
                        <div class="pricing1__wrapper text-center">
                            <div class="pricing1__thumb--style">
                                <div class="pricing1__thumb">
                                    <img src="{{ asset('asset/img/png-icon/personal.png')}}" alt="Image">
                                </div>
                            </div>
                            <div class="pricing1__content mt-85">
                                <h4>{{$item->name}}</h4>
                                <p class="m-0">{{$item->type_plan}}</p>
                                <h3>${{convertirVa($item->price)}}</h3>
                                <ul>
                                    @php
                                        $servicesList = $datas[$index]['servicios'] ?? [];
                                    @endphp
                                    @forelse ($servicesList as $services)
                                        @if ($services->plan_id == $item->id && $services->servicioss)
                                            <li>{{$services->servicioss->name}}</li>
                                        @endif
                                    @empty
                                        <li>Pronto anunciaremos más beneficios incluidos.</li>
                                    @endforelse
                                </ul>
                                <a  href="{{ route('front.detallesplan',['id'=>$item->id]) }}" class="btn5 mb-2 d-none d-sm-inline-block">Ver Todos los Beneficios</a>
                                <a href="{{ route('front.subscribirme') }}" class="btn8">Subscribirme</a>
                            </div>
                        </div>
                    </div>
                </div>
               @empty
                <div class="col-12 text-center">
                    <p class="m-0">Pronto anunciaremos nuestros planes disponibles.</p>
                </div>
               @endforelse
            </div>
        </div>
    </div>
</section>
