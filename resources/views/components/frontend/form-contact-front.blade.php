<form id="contact-form" >
    <div class="row mb-20">
        <div class="col-xl-6">
            <input class="form-control" type="text" name="name" placeholder="Nombres*" required>
        </div>
        <div class="col-xl-6">
            <input class="form-control" type="text" name="phone" placeholder="Número de Celular o Teléfono*" required>
        </div>
        <div class="col-xl-12">
            <input class="form-control" type="email" name="email" placeholder="Correo Electrónico*" required>
        </div>
        <div class="col-xl-12">
            <textarea class="form-control" name="message" style="resize: none" placeholder="Mensaje" cols="30" rows="3" required></textarea>
            <br>
            {!! NoCaptcha::display() !!}
            <br/>
            @if ($errors->has('g-recaptcha-response'))
                <span class="feedbak-error">
                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                </span>
            @endif
            @if (Route::currentRouteName() == 'front.contacto')
                <button type="submit" class="btn9">Enviar Mensaje</button>
            @else
                <button type="submit" class="btn8">Enviar Mensaje</button>
            @endif
            
        </div>
    </div>
    {{-- <p class="form-message"></p> --}}
</form>