<?php snippet('header') ?>

<form method="get" name="accolade-pricing-form" action=" ">   
  
  <section id="screen-1" class="screen start-screen">
    <div class="screen-content">
      <h1 class="main-title screen-title">Accolade</h1>
      
      <div class="answers">
        <p>
        Welcome to the online pricing algorithm for Accolade.   By answering a series of questions designed to measure various factors which effect a person’s chances of achieving societal success you will be presented with a personalised price adjusted according to the responses.  
        </p>
        <p>
        All questions are optional and those who might often find themselves penalised in the various games that society plays may be rewarded with significant discounts.
        </p>
        <p>
        Once you have been presented with the personalised price you can decide whether or not you would like to purchase the artwork.
        </p>
        <p>
        All data other than the final price and selected trophy size will be automatically deleted [insert time frame? Daily etc.].
        </p>
        <p>
        You must be 18 or over to participate.
        </p>
      </div>
    </div>
    
    <div class="buttons">
      <a class="next button">Proceed</a>
    </div>

  </section>


  <section id="screen-2" class="screen postcode-screen">
    
    <div class="screen-content">
      <h2 class="screen-title large-text">What is your postcode?</h2>
      <ul class="answers no-border">
        <li class="input-wrapper">
          <input type="text" class="postcode" placeholder="Enter your postcode..." name="postcode">
        </li>
        <li class="answer">
          <label class="container">Not applicable / rather not say
            <input name="postcode-na" value="0" type="checkbox">
            <span class="checkmark"></span>
          </label>
        </li> 
      </ul>
    </div>

    <div class="buttons">
      <a class="prev button">Previous</a>
      <a class="next button">Next</a>
    </div>

  </section>


  <?php $screens = $page->children();?>
  
  <?php $count= 3; foreach($screens as $screen): ?>

    <section id="screen-<?=$count;?>" class="screen <?=$screen->slug();?>">
      <div class="screen-content">
      <?php 
        $questions = $screen->children();
        if($questions->count() == 1): ?>

          <?php $question_type = 'simple';?>
          <?php $question = $questions->first();?>
          <h2 class="screen-title large-text"><?= $question->title();?></h2>
          <?php include('simple-question.php');?>

        <?php else : ?>

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
      <?php endif;?>
    </div>
    <div class="buttons">
      <a class="prev button">Previous</a>
      <a class="next button">Next</a>
    </div>

  </section>

  <?php $count++; endforeach ?>


</form>

<?php snippet('footer') ?>
