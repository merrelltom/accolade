<?php snippet('header') ?>

<section id="online-payment-screen" class="screen online-payment-screen selected">
  <div class="screen-content">
    <h2 class="screen-title large-text"><?= $page->subtitle();?></h2>
    <div class="answers">
      <p>Your purchase number is:</p>
      <p id="payment-number" class="xl-text">000000</p>
    </div>
    <div class="answers">
      <p>Your personalised price valid for today:</p>
      <p id="price" class="xl-text">00000</p>
    </div>
    <div class="answers">
      <?= $page->body_text()->kirbyText();?>
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
