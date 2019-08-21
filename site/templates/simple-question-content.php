<section id="screen-" class="screen <?=$screen->slug();?>">
  <div class="screen-content">
  
    <?php 
        $questions = $screen->children();
        $question_type = 'simple';
        $question = $questions->first();
    ?>
      <h2 class="screen-title large-text"><?= $question->title();?></h2>
        <?php include('simple-question.php');?>
  </div>
  <div class="buttons">
    <a class="prev button">Previous</a>
    <a class="next button">Next</a>
  </div>

</section>