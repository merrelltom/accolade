<?php 
//  Stripe payment intent
    require_once('assets/php/stripe-php/init.php');
    
    $id = '1234';
    $size = 'large';
    $price = 30;
    
    \Stripe\Stripe::setApiKey('sk_test_5uh8JHy65XEfqeZjrHmMqczn00Tmhto1Vt');
    $intent = \Stripe\PaymentIntent::create([
        'amount' => $price,
        'currency' => 'gbp',
        'description' => 'ID:' . $id,
    ]);

  snippet('header') 
 ?>

<section id="online-payment-screen" class="screen online-payment-screen selected">
    <form action="./online-payment-end-screen" method="post" id="payment-form">
        <input id="cardholder-name" type="text">
        <input id="cardholder-email" type="text">
        <input name="id" type="hidden" value="<?php echo $id; ?>">
        <!-- placeholder for Elements -->
        <div id="card-element"></div>
        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
        <button id="card-button" data-secret="<?= $intent->client_secret ?>">
          Submit Payment
        </button>
    </form>
</section>


<div class="restart-wrapper">
  <div class="restart-alert">
    <div class="restart-alert-inner">
      <h3>Timed Out</h3>
      <p>Do you wish to continue?</p>
      <div class="button-group">
        <a class="button continue">Continue</a><a class="button restart">Restart</a>
      </div>
    </div>
  </div>
</div>
<?= js(['assets/js/stripe_pay.js']) ?>
<?php snippet('footer') ?>
