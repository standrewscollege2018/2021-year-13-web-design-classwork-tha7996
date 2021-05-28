<?php
   $quiz_id = $_GET['quiz_id'];

   // In this section I am trying to display the questions in a specific quiz
   $quiz_sql = "SELECT * FROM wp_mlw_quizzes WHERE quiz_id=$quiz_id";
   $quiz_info = mysqli_query($dbconnect, $quiz_sql);
   $quiz_aa = mysqli_fetch_assoc($quiz_info);


   // unserilize no.1 : quiz settings
   $quiz_settings = @unserialize($quiz_aa['quiz_settings']);

   // get quiz name
   $quiz_name = $quiz_aa['quiz_name'];
   echo "<h1>$quiz_name</h1>";

   // form for question
   echo("<form action='index.php?page=insert&quiz_id=$quiz_id&quiz_name=$quiz_name' method='post'>");

   // will keep track of question
   $question_number = 0;


   // QSM stores the questions for each quiz in one of two places:
   // 1. in the questions table and linked via $quiz_id
   // 2. if the order is changed, another array $qpages is created in the quiz_settings field, containing the questions
   // thus we have to first check if qpages exists so we can get questions in correct order
   if(isset($quiz_settings['qpages'])){
     $qpages = unserialize($quiz_settings['qpages']);
     $question_ids = $qpages[0]['questions'];
     // contians question ids. get questions using these, and pass each into display_question function
     foreach ($question_ids as $question_id ) {
       $sql = "SELECT * FROM wp_mlw_questions WHERE question_id=$question_id";
       $questions = mysqli_query($dbconnect, $sql);
       $aa = mysqli_fetch_assoc($questions);
       display_question($aa, $question_number);
       $question_number += 1;
     }
   }
   else{
     // else just select all questions at once and pass them in
     $sql = "SELECT * FROM wp_mlw_questions WHERE quiz_id=$quiz_id";
     $questions = mysqli_query($dbconnect, $sql);
     while($aa = mysqli_fetch_assoc($questions)){

       display_question($aa, $question_number);
       $question_number += 1;
     }
   }

   echo "<input type='submit'>";
   echo("</form>");

   function display_question($aa, $question_number){


      // -------------------------------------------------
      //                DISPLAY QUIZ QUESTIONs
      // -------------------------------------------------

      $question_id = $aa['question_id'];
      $question_settings = unserialize($aa['question_settings']);
      echo $question_settings['question_title'];
      echo "<br>";

      $answer_array = unserialize($aa['answer_array']);
      $question_type = $aa['question_type_new'];

      // 0 = required, 1 = not required
      $required = ($question_settings['required'] == 0 ? 'required' : '');

      // display question depending on question type

      // multichoice OR a description thing
      if ($question_type == 0 or $question_type == 1){
        // descriptions are for some reason stored in question_name
        if(empty($answer_array)){
          echo html_entity_decode($aa['question_name']);
          echo "<br/>";
          // don't bother executing rest, as this is all needed for this question type
          return;
        }
        else{
        // display mutlichoice options
          foreach($answer_array as $answer){
            $option = $answer[0];
            echo("<input type='radio' id='$question_number$option' name='$question_number' value='$option' $required>");
            echo("<label for='$question_number$option'>$option</label><br>");
          }
        }
      }
      // short answer question type
      else if ($question_type == 3){
        echo "<input type='text' name='$question_number' $required><br>";
      }
      // number choice
      else if ($question_type == 7){
        echo "<input type='number' name='$question_number' $required>";
      }

      // this hidden input sends the question id and type of the latest question so that this can be inserted into databases
      $info = serialize(array($question_id, $question_type));
      echo "<input type='hidden' name='type$question_number' value='$info'/>";

      echo "<br/>";
    }

    $dbconnect->close();
?>
