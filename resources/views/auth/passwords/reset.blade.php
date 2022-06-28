<x-main-layout>
    <!-- title -->
    @section('title')Restablecer Contraseña @endsection
    <x-slot name="css">
    </x-slot>
  <!-- |=====|| Reset Password Start ||===============| -->
  <section class="contact1">
    <div class="content_box_100">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5 appointment1__wrapper d-flex align-items-center">
                    <img src="/asset/img/reset-pass.png" alt="" class="img-fluid rounded mx-auto d-block">
                </div>
                <div class="col-lg-7">
                    <div class="contact_page2__form">
                        <h3>Restablecer Contraseña</h3>
                        <form method="POST" id="contact-form"  action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="row mb-20">
                                <div class="col-xl-12">
                                    <input id="email" type="email" placeholder="Correo" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-xl-12">
                                    <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-xl-12">
                                    <input id="password-confirm" type="password" placeholder="Repetir Contraseña" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-12">
                                    <button type="submit" class="btn8">Restablecer Contraseña</button>
                                </div>
                            </div>
                            <p class="form-message"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- |=====|| Reset Password End ||=================| -->
<!-- |==========================================| -->

     <!-- |==========================================| -->
     <x-slot name="js">
    </x-slot>

</x-main-layout>
