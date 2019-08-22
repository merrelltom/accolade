<?php snippet('header') ?>

<form method="get" name="accolade-pricing-form" id="accolade-pricing-form" action=" ">   
  
  <?php //// Start Screen //// ?>

  <section id="start-screen" class="screen start-screen selected">
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
        <input type="checkbox" name="start" value="0" class="invisible" checked>
      </div>
    </div>
    
    <div class="buttons">
      <a class="next button">Proceed</a>
    </div>

  </section>


  <?php //// Post Code Screen //// ?>

  <section id="postcode-screen" class="screen postcode-screen">
    <div class="screen-content">
      <h2 class="screen-title large-text">What is your postcode?</h2>
      <ul class="answers no-border">
        <li class="input-wrapper">
        <input type="text" id="postcode" class="postcode" placeholder="Enter your postcode...">

        </li>
        <button type=button onclick="postcode_func()"/>Check Postcode</button>
        <hr>
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


  <?php //// Age Screen //// 
    $screen = $page->children()->find('screen-2-Age');
    if($screen):
      include('simple-question-content.php');
    endif;
  ?>

  <?php //// Trophy Selection ////
    $screen = $page->children()->find('screen-3-Trophy-Selection'); 
    if($screen):
      include('simple-question-content.php');
    endif;
  ?>

  <?php //// Intention ////
    $screen = $page->children()->find('screen-4-Intention'); 
    if($screen):
      include('simple-question-content.php');
    endif;
  ?>

  <?php //// Upbringing 1 ////
    $screen = $page->children()->find('screen-5-Upbringing'); 
    if($screen):
      include('simple-question-content.php');
    endif;
  ?>


  <?php //// Upbringing 2 ////
    $screen = $page->children()->find('screen-6-Upbringing'); 
    if($screen):
      include('simple-question-content.php');
    endif;
  ?>

  <?php //// Upbringing 3 ////
    $screen = $page->children()->find('screen-7-Upbringing'); 
    if($screen):
      include('simple-question-content.php');
    endif;
  ?>

  <?php //// Upbringing 4 ////
    $screen = $page->children()->find('screen-8-Upbringing'); 
    if($screen):
      include('simple-question-content.php');
    endif;
  ?>

  <?php //// Upbringing 5 ////
    $screen = $page->children()->find('screen-10-Upbringing'); 
    if($screen):
      include('simple-question-content.php');
    endif;
  ?>

  <?php //// Social Capital ////
    $screen = $page->children()->find('screen-9-Social-Capital'); 
    if($screen):
      include('simple-question-content.php');
    endif;
  ?>

  <?php //// Ask 1 of 2 Cultural Social Questoins //// 
    $int = rand(1,100);
    if($int < 60){
      $screen = $page->children()->find('screen-11-Cultural-Capital'); 
    }else{
      $screen = $page->children()->find('screen-11b-Cultural-Capital'); 
    }
    if($screen):
      include('simple-question-content.php');
    endif;
  ?>  

  <?php //// Big5 Extraversion //// 
    $screen = $page->children()->find('screen-12-Big5-Extraversion'); 
    if($screen):
      include('complex-question-content.php');
    endif;
  ?>

  <?php //// Dospert Social ////
    $screen = $page->children()->find('screen-13-Dospert-Social'); 
    if($screen):
      $questions = $screen->children()->shuffle()->limit(3);
      if($questions){
        foreach ($questions as $question):?>
          <section id="<?=$screen->slug();?>" class="screen <?=$screen->slug();?>">
            <div class="screen-content">
            
              <?php 
                  $question_type = 'simple';
              ?>
                <h2 class="screen-title large-text"><?= $question->title();?></h2>
                  <?php include('simple-question.php');?>
            </div>
            <div class="buttons">
              <a class="prev button">Previous</a>
              <a class="next button">Next</a>
            </div>

          </section>

        <?php endforeach;
      }
    endif;
  ?>

  <?php //// Hidden Labour ////
    $screen = $page->children()->find('screen-14-Hidden-Labour'); 
    if($screen):
      $questions = $screen->children()->shuffle()->limit(2);
      if($questions){
        foreach ($questions as $question):?>
          <section id="<?=$screen->slug();?>" class="screen <?=$screen->slug();?>">
            <div class="screen-content">
            
              <?php 
                  $question_type = 'simple';
              ?>
                <h2 class="screen-title large-text"><?= $question->title();?></h2>
                  <?php include('simple-question.php');?>
            </div>
            <div class="buttons">
              <a class="prev button">Previous</a>
              <a class="next button">Next</a>
            </div>

          </section>

        <?php endforeach;
      }
    endif;
  ?>

  <?php //// Financial Screen ////
    $screen = $page->children()->find('screen-15-Optional-Finance-Economic-Capital'); 
    if($screen):?>
       <section id="<?=$screen->slug();?>" class="screen financial-screen">
            <div class="screen-content">
              <h2 class="screen-title large-text"><?= $screen->subtitle();?></h2>
              <ul class="answers">
                  <li class="answer">
                  <label class="container">Yes
                    <input name="financial-consent" value="yes" type="radio">
                    <span class="checkmark"></span>
                  </label>
                </li> 
                <li class="answer">
                  <label class="container">No
                    <input name="financial-consent" value="no" type="radio">
                    <span class="checkmark"></span>
                  </label>
                </li>               
              </ul>
              <div class="financial-conditional-questions invisible">
                  <?php 
                    $questions = $screen->children();
                    $question_type = 'complex';
                    foreach ($questions as $question):
                      include('simple-question.php');                  
                    endforeach;
                  ?>
              </div>
            </div>
            <div class="buttons">
              <a class="prev button">Previous</a>
              <a class="next button">Next</a>
            </div>

          </section>
  <?php endif;?>

  <?php //// Additional ////
    $screen = $page->children()->find('screen-16-Additional'); 
    if($screen):
      $questions = $screen->children()->shuffle()->limit(1);
      if($questions){
        foreach ($questions as $question):?>
          <section id="<?=$screen->slug();?>" class="screen <?=$screen->slug();?>">
            <div class="screen-content">
            
              <?php 
                  $question_type = 'simple';
              ?>
                <h2 class="screen-title large-text"><?= $question->title();?></h2>
                  <?php include('simple-question.php');?>
            </div>
            <div class="buttons">
              <a class="prev button">Previous</a>
              <a class="next button submit">Submit Answers</a>
            </div>

          </section>

        <?php endforeach;
      }
    endif;
  ?> 

</form>

<section id="results-screen" class="screen results-screen">

  <div class="screen-content">
    <h2 class="screen-title large-text">Results</h2>
    <ul id="results-list" class="answers">
        
    </ul>
  </div>  

</section>

<?php snippet('footer') ?>
