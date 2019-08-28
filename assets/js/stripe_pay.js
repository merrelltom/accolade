var stripe = Stripe('pk_test_Zko2pCiERVKRRHiD69eTsZ2z00MuTeMrFi');

var elements = stripe.elements();
var cardElement = elements.create('card');
cardElement.mount('#card-element');
var cardholderName = document.getElementById('cardholder-name');
var cardholderEmail = document.getElementById('cardholder-email');
var cardButton = document.getElementById('card-button');
var clientSecret = cardButton.dataset.secret;

var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  stripe.handleCardPayment(
    clientSecret, cardElement, {
      payment_method_data: {
        billing_details: {name: cardholderName.value}
      },
      receipt_email: cardholderEmail.value
    }
  ).then(function(result) {
    if (result.error) {
        console.log(result);
      // Display error.message in your UI.
    } else {
        console.log(result);
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'payment_id');
        hiddenInput.setAttribute('value', result.paymentIntent.id);
        form.appendChild(hiddenInput);
//        form.submit();
    }
  });
});