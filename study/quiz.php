<?php
  $quiz_id = $_GET['quiz_id'];

   // In this section I am trying to display the questions in a specific quiz
   $quiz_sql = "SELECT * FROM wp_mlw_quizzes WHERE quiz_id=$quiz_id";
   $quiz_info = mysqli_query($dbconnect, $quiz_sql);
   $quiz_aa = mysqli_fetch_assoc($quiz_info);


   // unserilize no.1 : quiz settings
   $quiz_settings = unserialize($quiz_aa['quiz_settings']);
   // unserilize no. 2: quiz options
   $quiz_options = unserialize($quiz_settings['quiz_options']);

   // get quiz name
   $quiz_name = $quiz_options['quiz_name'];
   echo "<h1>$quiz_name</h1>";

   foreach ($quiz_settings as $setting) {
    // $quiz_settings has 5 sub arrays
    // unserialize each sub array
    $setting_un = unserialize($setting);

    // Loop through sub array looking for questions in quiz
    foreach ($setting_un as $item) {
      // if we find questions, go get them from the questions table
      if(isset($item['questions'])) {

        // -------------------------------------------------
        //                DISPLAY QUIZ QUESTIONS
        // -------------------------------------------------


        echo("<form action='insert.php?quiz_id=$quiz_id&quiz_name=$quiz_name' method='post'>");

        $question_number = 0;

        foreach ($item['questions'] as $question_id ) {
            $sql = "SELECT * FROM wp_mlw_questions WHERE question_id=$question_id";
            $questions = mysqli_query($dbconnect, $sql);
            $aa = mysqli_fetch_assoc($questions);
            do {

              $question_settings = unserialize($aa['question_settings']);
              echo $question_settings['question_title'];
              echo "<br>";

              $answer_array = unserialize($aa['answer_array']);
              $question_type = $aa['question_type_new'];

              // multichoice question type
              if ($question_type == 0){
              // display mutlichoice options
                foreach($answer_array as $answer){
                  $option = $answer[0];
                  echo("<input type='radio' name='$question_number' value='$option'>$option<br>");
                }
              }
              // short answer question type
              else if ($question_type == 3){
                echo "<input type='text' name='$question_number'><br>";
              }
              // number choice
              else if ($question_type == 7){
                echo "<input type='number' name='$question_number'>";
              }

              // this hidden input sends the question type of the latest question so that this can be inserted into databases
              $info = serialize(array($question_id, $question_type));
              echo "<input type='hidden' name='type$question_number' value='$info'/>";

              $question_number += 1;


              echo "<br/>";


            } while ($aa = mysqli_fetch_assoc($questions));

        }
        echo "<input type='submit'>";
        echo("</form>");
      }
    }


  }


?>
