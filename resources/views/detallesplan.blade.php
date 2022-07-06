<x-main-layout>
    <!-- title -->
  @section('title')Detalles del Plan @endsection

     <!---- CSS ----->
     <x-slot name="css">
    </x-slot>

    <main>
        <section class="page_title page_title__img-01">
            <div class="page_title__padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page_title__content">
                                <h1>{{$datos['plan']->name}}</h1>
                                <div class="page_title__bread-crumb">
                                    <ul>
                                        <li><a href="">Tipo de Plan</a></li>
                                        <li><a href="">{{$datos['plan']->type_plan}}</a></li>
                                    </ul>
                                    <ul>
                                        @if ($datos['plan']->is_group == 1)
                                            <li><a href="">Podrás tener acceso tú y {{$datos['plan']->cant_people}} miembros más a este Plan Familiar</a></li>
                                        @else
                                            <li><a href="">Suscribete y disfruta de los beneficios que tenemos para tí con este Plan Individual</a></li>
                                        @endif
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<div class=" service1">

    {{-- <img   src="{{ asset('asset/img/bannerfamilia.jpg')}}" class="img_100" src="assets/img/bannerfamilia.jpg" alt="banner plan"> --}}
    <div class="row justify-content-center ">
        <div class="col-xl-6 service1" >
                            <div class="faq1__wrapper ">
                                <h2 style="font-weight: bold;margin-top:50px"> Descripción del Plan</h2>
                                <p>{{$datos['plan']->description}}</p>
                                <h3 style="margin-top:50px">Nuestros Beneficios </h3>

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
