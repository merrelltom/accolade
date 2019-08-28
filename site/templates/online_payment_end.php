<?php snippet('header') ?>

<?php 
  $payment = null;
  if($payment == 'success'): 
      $title = $page->success_subtitle()->kirbyText();
      $body = $page->success_body_text()->kirbyText();
  elseif($payment == 'failed'):
      $title = $page->failed_subtitle()->kirbyText();
      $body = $page->failed_body_text()->kirbyText();
  else:
      $title = 'System Error';
      $body = '<p>This is page is not currently working.</p>';
  endif;
?>

<section id="online-payment-screen" class="screen online-payment-screen selected">
  <div class="screen-content">
    <h2 class="screen-title large-text"><?= $title;?></h2>
    <div class="answers">
      <p>Your purchase number is:</p>
      <p id="payment-number" class="xl-text">000000</p>
    </div>
    <div class="answers">
      <?= $body;?>
    </div>
  </div>
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

<?php snippet('footer') ?>
