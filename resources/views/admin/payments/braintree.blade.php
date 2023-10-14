<head>
    <meta charset="utf-8" />
    <script src="https://js.braintreegateway.com/web/dropin/1.40.2/js/dropin.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>

  <body>
    <!-- Step one: add an empty container to your page -->


    <div class="container mt-5">
      <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6">
              <div class="card">
                  <div class="card-header">
                      <h3 class="text-center">Dettagli Pagamento</h3>
                  </div>
                  <div class="card-body">
                      <form id="payment-form" action="{{ route('payment') }}" method="post">
                          @csrf
                          <div class="form-group">
                              <label for="dropin-container">Metodo di Pagamento</label>
                              <div id="dropin-container"></div>
                          </div>
                          <input type="hidden" id="nonce" name="payment_method_nonce">
                          <button type="submit" class="btn btn-primary btn-block" id="pay-button">Paga</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <script type="text/javascript">
    braintree.dropin.create({
        authorization: '{{$clientToken}}',
        container: '#dropin-container'
    }, (error, dropinInstance) => {
        if (error) console.error(error);

        const form = document.getElementById('payment-form');
        const payButton = document.getElementById('pay-button');

        form.addEventListener('submit', event => {
            event.preventDefault();

            dropinInstance.requestPaymentMethod((error, payload) => {
                if (error) {
                    console.error(error);
                } else {
                    document.getElementById('nonce').value = payload.nonce;
                    form.submit();

                    // Nascondi il pulsante dopo il clic
                    payButton.style.display = 'none';
                }
            });
        });
    });
</script>
  </body>

  <style>
    input.my_btn{
      border: 1px solid rgb(13, 110, 253);
      padding: 0.5rem;
      background-color:rgb(13, 110, 253);
      color: white;
      border-radius: 13px;
    }


    

  </style>