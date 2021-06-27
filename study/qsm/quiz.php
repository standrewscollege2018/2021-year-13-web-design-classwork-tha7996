<?php
  $quiz_id = $_GET['quiz_id'];

   // In this section I am trying to display the questions in a specific quiz
   $quiz_sql = "SELECT * FROM wp_mlw_quizzes WHERE quiz_id=$quiz_id";
   $quiz_questions = mysqli_query($dbconnect, $quiz_sql);
   $quiz_aa = mysqli_fetch_assoc($quiz_questions);


     $quiz_question = $quiz_aa['quiz_settings'];



     $quiz_settings = unserialize($quiz_question);
     $quiz_options = unserialize($quiz_settings['quiz_options']);

     $quiz_name = $quiz_options['quiz_name'];
     echo "<h1>$quiz_name</h1>";

    foreach ($quiz_settings as $setting) {
      // $quiz_settings has 5 sub arrays

      $setting_un = unserialize($setting);
      // Loop through sub array looking for questions in quiz
      foreach ($setting_un as $item) {
        // if we find questions, go get them from the questions table
        if(isset($item['questions'])) {
          // print_r($item['questions']);
          foreach ($item['questions'] as $question ) {
              $sql = "SELECT * FROM wp_mlw_questions WHERE question_id=$question";
              $questions = mysqli_query($dbconnect, $sql);
              $aa = mysqli_fetch_assoc($questions);
              do {
                $question = $aa['question_settings'];

                $question_stuff = unserialize($question);
                // print_r($question_stuff);
                echo $question_stuff['question_title'];
                echo "<br/>";


              } while ($aa = mysqli_fetch_assoc($questions));
          }
        }
      }


    }


  ?>
