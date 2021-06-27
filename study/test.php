<?php
// just a test to see how tairoa stares their questions
  include("dbconnect.php");


  $quiz_sql = "SELECT * FROM wp_mlw_quizzes";
  $qry = mysqli_query($dbconnect, $quiz_sql);

  $qs = 'a:5:{s:17:"quiz_leaderboards";s:28:"a:1:{s:8:"template";s:0:"";}";s:12:"quiz_options";s:1447:"a:42:{s:6:"system";s:1:"0";s:21:"loggedin_user_contact";s:1:"0";s:21:"contact_info_location";s:1:"0";s:9:"user_name";s:1:"2";s:9:"user_comp";s:1:"2";s:10:"user_email";s:1:"2";s:10:"user_phone";s:1:"2";s:15:"comment_section";s:1:"1";s:16:"randomness_order";s:1:"0";s:19:"question_from_total";s:1:"0";s:16:"total_user_tries";s:1:"0";s:12:"social_media";s:1:"0";s:10:"pagination";s:1:"0";s:11:"timer_limit";s:1:"0";s:18:"question_numbering";s:1:"0";s:14:"require_log_in";s:1:"0";s:19:"limit_total_entries";s:1:"0";s:20:"scheduled_time_start";s:0:"";s:18:"scheduled_time_end";s:0:"";s:23:"disable_answer_onselect";s:1:"0";s:17:"ajax_show_correct";s:1:"0";s:9:"form_type";i:0;s:14:"score_roundoff";i:0;s:12:"progress_bar";i:0;s:29:"enable_result_after_timer_end";i:0;s:27:"skip_validation_time_expire";i:1;s:15:"randon_category";s:0:"";s:15:"store_responses";i:1;s:24:"contact_disable_autofill";i:0;s:21:"form_disable_autofill";i:0;s:22:"show_category_on_front";i:0;s:22:"enable_quick_result_mc";i:0;s:17:"end_quiz_if_wrong";i:0;s:32:"enable_quick_correct_answer_info";i:0;s:25:"enable_retake_quiz_button";i:0;s:22:"enable_pagination_quiz";i:0;s:22:"enable_deselect_option";i:0;s:29:"disable_description_on_result";i:0;s:34:"disable_scroll_next_previous_click";i:0;s:14:"quiz_animation";s:0:"";s:20:"result_page_fb_image";s:92:"https://localhost/wordpress-test/wp-content/plugins/quiz-master-next/assets/icon-200x200.png";s:14:"legacy_options";s:0:"";}";s:9:"quiz_text";s:2867:"a:30:{s:14:"message_before";s:157:"Welcome to your {e396ca87efa363b0ce0145116211e6665b99d378fbe5c9d4af7384d99919d1cd}QUIZ_NAME{e396ca87efa363b0ce0145116211e6665b99d378fbe5c9d4af7384d99919d1cd}";s:15:"message_comment";s:37:"Please fill in the comment box below.";s:20:"message_end_template";s:0:"";s:18:"comment_field_text";s:8:"Comments";s:24:"question_answer_template";s:298:"{e396ca87efa363b0ce0145116211e6665b99d378fbe5c9d4af7384d99919d1cd}QUESTION{e396ca87efa363b0ce0145116211e6665b99d378fbe5c9d4af7384d99919d1cd}<br />{e396ca87efa363b0ce0145116211e6665b99d378fbe5c9d4af7384d99919d1cd}USER_ANSWERS_DEFAULT{e396ca87efa363b0ce0145116211e6665b99d378fbe5c9d4af7384d99919d1cd}";s:18:"submit_button_text";s:6:"Submit";s:15:"name_field_text";s:4:"Name";s:19:"business_field_text";s:8:"Business";s:16:"email_field_text";s:5:"Email";s:16:"phone_field_text";s:12:"Phone Number";s:21:"total_user_tries_text";s:57:"You have utilized all of your attempts to pass this quiz.";s:20:"twitter_sharing_text";s:371:"I just scored {e396ca87efa363b0ce0145116211e6665b99d378fbe5c9d4af7384d99919d1cd}CORRECT_SCORE{e396ca87efa363b0ce0145116211e6665b99d378fbe5c9d4af7384d99919d1cd}{e396ca87efa363b0ce0145116211e6665b99d378fbe5c9d4af7384d99919d1cd} on {e396ca87efa363b0ce0145116211e6665b99d378fbe5c9d4af7384d99919d1cd}QUIZ_NAME{e396ca87efa363b0ce0145116211e6665b99d378fbe5c9d4af7384d99919d1cd}!";s:21:"facebook_sharing_text";s:371:"I just scored {e396ca87efa363b0ce0145116211e6665b99d378fbe5c9d4af7384d99919d1cd}CORRECT_SCORE{e396ca87efa363b0ce0145116211e6665b99d378fbe5c9d4af7384d99919d1cd}{e396ca87efa363b0ce0145116211e6665b99d378fbe5c9d4af7384d99919d1cd} on {e396ca87efa363b0ce0145116211e6665b99d378fbe5c9d4af7384d99919d1cd}QUIZ_NAME{e396ca87efa363b0ce0145116211e6665b99d378fbe5c9d4af7384d99919d1cd}!";s:20:"previous_button_text";s:8:"Previous";s:16:"next_button_text";s:4:"Next";s:19:"require_log_in_text";s:38:"This quiz is for logged in users only.";s:24:"limit_total_entries_text";s:107:"Unfortunately, this quiz has a limited amount of entries it can recieve and has already reached that limit.";s:24:"scheduled_timeframe_text";s:0:"";s:30:"question_answer_email_template";s:121:"%QUESTION%<br />Answer Provided: %USER_ANSWER%<br/>Correct Answer: %CORRECT_ANSWER%<br/>Comments Entered: %USER_COMMENTS%";s:14:"button_section";i:0;s:23:"validation_text_section";i:0;s:16:"empty_error_text";s:36:"Please complete all required fields!";s:16:"email_error_text";s:27:"Not a valid e-mail address!";s:17:"number_error_text";s:28:"This field must be a number!";s:20:"incorrect_error_text";s:32:"The entered text is not correct!";s:18:"other_text_section";i:0;s:9:"hint_text";s:4:"Hint";s:32:"quick_result_correct_answer_text";s:42:"Correct! You have selected correct answer.";s:30:"quick_result_wrong_answer_text";s:38:"Wrong! You have selected wrong answer.";s:14:"legacy_options";s:0:"";}";s:6:"qpages";s:341:"a:1:{i:0;a:5:{s:2:"id";s:1:"1";s:6:"quizID";s:2:"30";s:7:"pagekey";s:13:"60999cdd996e2";s:12:"hide_prevbtn";s:1:"0";s:9:"questions";a:14:{i:0;s:3:"459";i:1;s:3:"460";i:2;s:3:"461";i:3;s:3:"462";i:4;s:3:"463";i:5;s:3:"464";i:6;s:3:"465";i:7;s:3:"466";i:8;s:3:"475";i:9;s:3:"486";i:10;s:3:"476";i:11;s:3:"477";i:12;s:3:"478";i:13;s:3:"479";}}}";s:5:"pages";s:217:"a:1:{i:0;a:14:{i:0;s:3:"459";i:1;s:3:"460";i:2;s:3:"461";i:3;s:3:"462";i:4;s:3:"463";i:5;s:3:"464";i:6;s:3:"465";i:7;s:3:"466";i:8;s:3:"475";i:9;s:3:"486";i:10;s:3:"476";i:11;s:3:"477";i:12;s:3:"478";i:13;s:3:"479";}}";}';



  function loop_array($array){
    foreach($array as $x=>$xitem){
      if(gettype($xitem)=='array'){
        loop_array($array);
      }
      else{
        var_dump($x);
      }
    }
  }

  loop_array(unserialize($qs));
echo"<br><br>";
  $x = unserialize($qs);
  var_dump(unserialize($x['qpages']));

 ?>
