<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * in loops or simply to keep your templates clean.
 * This footer snippet is reused in all templates. In fetches information from the `site.txt` content file
 * and from the `about` page.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>

  </div>

  <footer class="footer">
    <a href="<?= url() ?>">&copy; <?= date('Y') ?> / <?= $site->title() ?></a>

    <?php if ($about = page('about')): ?>
    <nav class="social">
      <?php foreach ($about->social()->toStructure() as $social): ?>
      <a href="<?= $social->url() ?>"><?= $social->platform() ?></a>
      <?php endforeach ?>
    </nav>
    <?php endif ?>
  </footer>
  <script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
  <?= js(['assets/js/jquery-ui.min.js']) ?>
  <?= js(['assets/js/script.js']) ?>
</body>
</html>
