<x-main-layout>
    <!-- title -->
    @section('title')Afíliate Ahora @endsection

    <x-slot name="css">
        
    </x-slot>
<section class="pricing1 counter1__bg-01">
  <x-slot name="css">
  </x-slot>
    <div class="content_box_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header text-center" style="background-color: #34c2b5">
                            <h3 class="text-white">¡Bienvenido a Citas Médicas!</h3>
                        </div>

                        <div class="card-body ">
                            <div class="text-center">
                                <img src="/images/email_send.png" class="img-fluid" alt="send email">
                            </div>

                            <hr>
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
     <!-- |==========================================| -->
     <x-slot name="js">
    </x-slot>

</x-main-layout>
