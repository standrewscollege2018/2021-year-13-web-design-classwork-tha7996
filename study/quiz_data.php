<?php
// these are the quiz ids of each question set
// hese are used to:
// 1. display a specific set in the 'quizzes' page

define("TEEN_BASELINE_QUIZ_IDS", [20,5,8,12,13,15,21,23,26,27,29,48]);
define("TEEN_WEEKLY_QUIZ_IDS", [25,30,31,37,40,43,49]);
define("TEEN_END_QUIZ_IDS", [9,17,32,33,34,35,36,38,41,42,44,50]);
define("PARENT_BASELINE_QUIZ_IDS", [7,14,16,22,28,39,52]);
define("PARENT_WEEKLY_QUIZ_IDS", [24]);
define("PARENT_END_QUIZ_IDS", [11,47,51]);

// this used in quiz.php, to check whether user has right permissions to access data
define("TEEN_QUIZZES", array_merge(TEEN_BASELINE_QUIZ_IDS, TEEN_WEEKLY_QUIZ_IDS, TEEN_END_QUIZ_IDS));
define("PARENT_QUIZZES", array_merge(PARENT_BASELINE_QUIZ_IDS, PARENT_WEEKLY_QUIZ_IDS, PARENT_END_QUIZ_IDS));
 ?>
