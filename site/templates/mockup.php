<?php snippet('header') ?>

<main>
  <div class="wrapper full-width">
    <div class="grid">
      <?php $images = $page->files()->sortBy('sort');?>
      <?php foreach ($images as $image):?>
      	<div class="grid-item col-xs-4">
      		<div class="grid-item-inner">
      			<figure>
		        	<img class="img-cover" src="<?= $image->url();?>"/>
				</figure>
			</div>
	    </div>
      <?php endforeach;?>
    </div>
  </div>
</main>

<?php snippet('footer') ?>
