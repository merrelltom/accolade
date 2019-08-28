<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site->title() ?> | <?= $page->title() ?></title>
  <?= css(['assets/css/style-1.0.css', '@auto']) ?>
  <script src="https://js.stripe.com/v3/"></script>
</head>
<body data-modifier="<?= $site->modifier();?>" data-large="<?= $site->large_trophy_price();?>" data-medium="<?= $site->medium_trophy_price();?>" data-small="<?= $site->small_trophy_price();?>">

