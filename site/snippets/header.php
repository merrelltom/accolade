<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site->title() ?> | <?= $page->title() ?></title>

  <?= css(['assets/css/index.css', '@auto']) ?>
  <?= css(['assets/css/style-1.0.css', '@auto']) ?>

</head>
<body>

  <div class="page">
    
    <header class="header">
      <div class="wrapper">
        <div class="row">
          <h1><a class="logo" href="<?= $page->url() ?>"><?= $page->title() ?></a></h1>
        </div>
      </div>
    </header>

