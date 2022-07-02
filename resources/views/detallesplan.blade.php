<x-main-layout>
    <!-- title -->
  @section('title')Conoce mas sobre nuestros planes y servicio @endsection

     <!---- CSS ----->
     <x-slot name="css">
    </x-slot>

<div class=" service1">
    <img   src="{{ asset('asset/img/bannerfamilia.jpg')}}" class="img_100" src="assets/img/bannerfamilia.jpg" alt="banner plan">
    <div class="row justify-content-center ">
         <div class="col-xl-6 service1" >
                            <div class="faq1__wrapper ">
                                <h2 style="font-weight: bold;margin-top:50px"> {{$datos['plan']->name}}</h2>
                                <p>{{$datos['plan']->description}}</p>
                                <p><span style="font-weight: bold;">Tipo de Plan</span>: {{$datos['plan']->type_plan}}</p>
                                <p><span style="font-weight: bold;">Usuarios</span>: {{$datos['plan']->cant_people}}</p>
                                <h3 style="margin-top:50px">Nuestros servicios </h3>
                                <!-- accordion -->
                                <div class="accordion_style_01 mb-40">
                                    <div class="accordion" id="accordionExample">
                                        @foreach($datos['category'] as $key => $value)
                                        <div class="card">
                                            <div class="card-header" id="heading_0{{$key+1}}">
                                                <h5>
                                                    <a href="#" style="font-size:19px" data-toggle="collapse" data-target="#collapse_0{{$key+1}}" aria-expanded="false" aria-controls="collapse_0{{$key+1}}" class="">
                                                        <span>{{$key+1}}.</span>{{$value->name}}
                                                        <i class="ti-angle-down"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                                <div id="collapse_0{{$key+1}}" class="collapse " aria-labelledby="heading_0{{$key+1}}" data-parent="#accordionExample" style="">
                                                    <div class="card-body">
                                                      @foreach($datos['services'] as $key2 => $value2)
                                                        @if ($value2->category_id==$value->id)
                                                        <h6 style="padding-left:18px"><i class="fas fa-check fa-fw"></i> {{$value2->name}}</h6>
                                                        <p style="padding-left:38px;padding-bottom:15px">{{$value2->description}}</p>
                                                        @endif
                                                      @endforeach
                                                    </div>
                                                </div>

                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <h3 style="text-align: center;">$ {{number_format($datos['plan']->price, 2, ',', '.')}}</h3>
                                <div style="display:flex;justify-content: center;margin-bottom:50px">
                                   <a href="{{ route('front.subscribirme') }}" class="btn8">Subscribirme</a>
                                </div>
                            </div>
        </div>
    </div>
</div>
     <x-slot name="js">
    </x-slot>
<script>
</script>
</x-main-layout>
