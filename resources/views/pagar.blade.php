<x-main-layout>
    <!-- title -->
  @section('title')Detalles del Plan @endsection

     <!---- CSS ----->
     <x-slot name="css">
       <script src="https://sdk.mercadopago.com/js/v2"></script>
       <script>
           const mp = new MercadoPago('APP_USR-bdeb0f9f-a2bd-4a91-8710-2da582130cea');
      </script>
      <style>
      #form-checkout {
      }

      .container2 {
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0.75rem;
        display: inline-block;
        border-radius: 0.375em;
        -webkit-box-shadow: 0 0 0 1px rgb(0 0 0 / 25%);
        box-shadow: 0 0 0 1px rgb(0 0 0 / 25%);
      }
      .container3 {
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0.75rem;
        border-style: solid;
        border: 1px solid #bfbfbf;
        border-radius: 0.375em;
        width:97%;
      }
</style>
     </x-slot>
      <div class="content_box_100" style="background:#eeeeee">
           <div class="container">
               <form id="form-checkout" class=" row ">
                 <div class="contact_page1__left mb-30 col-lg-6 row" style="padding-top:30px;padding-bottom:25px">
                     <h5 class="col-lg-12" style="text-align:center;padding-bottom:20px;">Completa los datos de tu tarjeta</h5>
                      <div class="form-group col-sm-6">
                            <label>Número de tarjeta</label>
                            <div id="form-checkout__cardNumber-container" class="container2"></div>
                       </div>
                       <div class="form-group col-sm-6">
                             <label>Vencimiento</label>
                             <div id="form-checkout__expirationDate-container" class="container2"></div>
                        </div>
                        <div class="form-group col-sm-6">
                              <label>Nombre del titular</label>
                              <input type="text" name="cardholderName" id="form-checkout__cardholderName"  class="container3" />
                         </div>
                         <div class="form-group col-sm-6 ">
                               <label>Codigo de seguridad</label>
                               <div id="form-checkout__securityCode-container" class="container2"></div>
                        </div>
                        <div class="form-group col-sm-6 ">
                              <label>Banco Emisor</label>
                              <select name="issuer" id="form-checkout__issuer"  class="container3"></select>
                       </div>
                        <div class="form-group  col-sm-6">
                              <label>Tipo documento</label>
                              <select name="identificationType" id="form-checkout__identificationType"  class="container3"></select>
                       </div>
                       <div class="form-group  col-sm-6">
                             <label>Numero de Documento</label>
                             <input type="text" name="identificationNumber" id="form-checkout__identificationNumber" class="container3"/>
                      </div>
                      <div class="form-group  col-sm-6">
                            <label>Cuotas</label>
                            <select name="installments" id="form-checkout__installments" class="container3"  class="container3" ></select>
                     </div>
                     <div class="form-group  col-sm-6" style="display:none">
                           <label>email</label>
                           <input type="email" name="cardholderEmail" id="form-checkout__cardholderEmail"  class="container3"/>
                    </div>
                 </div>
                 <div class="mb-30 col-lg-6 row " style="justify-content: center;padding: 0;" >
                         <div class="contact_page1__left mb-30 col-lg-8" style="padding-top:30px;height: fit-content;padding-bottom: 40px;">
                            <h5 class="col-lg-12" style="text-align:center;height:50px">Detalle de tu suscripción</h5>
                            <div class="row">
                                  <span class="col-lg-6">Plan Familiar Mensual</span><span class="col-lg-6" style="text-align: center;"> $ 79.900</span>
                                  <hr class="col-lg-11">
                                  <span class="col-lg-6">Total por mes</span><span class="col-lg-6" style="text-align: center;"> $ 79.900</span>
                            </div>

                         </div>
                 </div>
                 <div class="mb-30 col-lg-6"  style="padding:0px;">
                    <button type="submit" id="form-checkout__submit" class="btn btn-primary" style="float:right;width:100px">Pagar</button>
                    <progress value="0" class="progress-bar" style="display:none">Cargando...</progress>
                  </div>

               </form>
           </div>
      </div>
     <x-slot name="js">
       <script>
       $("#form-checkout").validate({
   rules: {
     cardNumber: {
       required: true,
     },
     expirationDate: {
       required: true,
     },
     cardholderName: {
       required: true,
     },
     securityCode: {
       required: true,
     },
     identificationNumber:{
       required: true,
     },
   },
   messages: {
     cardNumber: "Por favor ingrese numero de tarjeta",
     expirationDate: "Por favor ingrese fecha vencimiento",
     cardholderName: "Por favor ingrese Titular de la tarjeta",
     securityCode: "Por favor ingrese Código de seguridad",
     identificationNumber: "Por favor ingrese Número de documento",
   },
 });
 const cardForm = mp.cardForm({
   amount: '100.5',
   iframe: true,
   form: {
     id: 'form-checkout',
     cardholderName: {
       id: 'form-checkout__cardholderName',
       placeholder: "Titular de la tarjeta",
     },
     cardholderEmail: {
       id: 'form-checkout__cardholderEmail',
       placeholder: 'E-mail'
     },
     cardNumber: {
       id: 'form-checkout__cardNumber-container',
       placeholder: 'Número de la tarjeta',
     },
     securityCode: {
       id: 'form-checkout__securityCode-container',
       placeholder: 'Código de seguridad'
     },
     installments: {
       id: 'form-checkout__installments',
       placeholder: 'Cuotas'
     },
     expirationDate: {
       id: 'form-checkout__expirationDate-container',
       placeholder: 'Fecha de vencimiento (MM/AA)',
     },
     identificationType: {
       id: 'form-checkout__identificationType',
       placeholder: 'Tipo de documento'
     },
     identificationNumber: {
       id: 'form-checkout__identificationNumber',
       placeholder: 'Número de documento'
     },
     issuer: {
       id: 'form-checkout__issuer',
       placeholder: 'Banco emisor'
     }
   },
   callbacks: {
     onFormMounted: function (error) {
       if (error) return console.log('Callback para tratar o erro: montando o cardForm ', error)
     },
     onSubmit: function (event) {
       event.preventDefault();
       const {
         paymentMethodId: payment_method_id,
         issuerId: issuer_id,
         cardholderEmail: email,
         amount,
         token,
         installments,
         identificationNumber,
         identificationType
       } = cardForm.getCardFormData();
        $.ajax({
          method: "POST",
          dataType: 'json',
          url:"{{route('front.pagar')}}",
          data:{
              "preapproval_plan_id": "2c93808481ad6df90181afe4f5fb00a2",
              "email":email,
              "card_token_id": cardForm.getCardFormData().token,
              "_token": "{{ csrf_token() }}",
            }
        }).done(function( msg ) {
              alert("2="+JSON.stringify(msg));
        }).fail(function( jqXHR, textStatus ) {
             alert("3="+JSON.stringify(jqXHR));
       });
     },
     onFetching: function (resource) {
       console.log('fetching... ', resource)
       const progressBar = document.querySelector('.progress-bar')
       progressBar.removeAttribute('value')

       return () => {
         progressBar.setAttribute('value', '0')
       }
     }
   }
 });
 </script>
    </x-slot>
</x-main-layout>
