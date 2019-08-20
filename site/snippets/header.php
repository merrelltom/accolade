<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * This header snippet is reused in all templates. 
 * It fetches information from the `site.txt` content file and contains the site navigation.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>

<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <!-- The title tag we show the title of our site and the title of the current page -->
  <title><?= $site->title() ?> | <?= $page->title() ?></title>

  <!-- Stylesheets can be included using the `css()` helper. Kirby also provides the `js()` helper to include script file. 
        More Kirby helpers: https://getkirby.com/docs/reference/templates/helpers -->
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

