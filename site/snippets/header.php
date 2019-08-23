<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site->title() ?> | <?= $page->title() ?></title>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
  <?= css(['assets/css/style-1.0.css', '@auto']) ?>
  <script>
      function gen_result(p,m,s) {
            return (p *(1 + m/100) ^ s);
       }
  </script>
</head>
<body data-modifier="<?= $site->modifier();?>" data-large="<?= $site->large_trophy_price();?>" data-medium="<?= $site->medium_trophy_price();?>" data-small="<?= $site->small_trophy_price();?>">

