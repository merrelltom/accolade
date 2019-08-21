<section id="screen-" class="screen <?=$screen->slug();?>">
  <div class="screen-content">  
    <?php 
      $question_type = 'complex';
      $groups = $screen->groups()->toStructure();
    ?>
    <h2 class="screen-title large-text"><?= $screen->subtitle();?></h2>
      <?php foreach ($groups as $group):
        $group_questions = $group->group_questions()->toPages();
        $questions_to_ask = $group->questions_to_ask()->toInt();
        $questions = $group_questions->shuffle()->limit($questions_to_ask);
          foreach ($questions as $question):
            include('simple-question.php');                  
          endforeach;
      endforeach;?>
  </div>
  <div class="buttons">
    <a class="prev button">Previous</a>
    <a class="next button">Next</a>
  </div>

</section>

