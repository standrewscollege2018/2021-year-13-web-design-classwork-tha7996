<!-- this portal page contains links to quiz categories for teens or parents -->

<div class="container page-navbar">
  <div class="row">
    <h3 class='col-1'><a href="index.php?page=home"><</a></h3>
    <h3 class='col'><?php echo ucfirst($_SESSION['user_type'])?> Portal</h3>
    <!-- this centers the middle column -->
    <h3 class='col-1'></h3>
  </div>
</div>

<div class="container-fluid quiz-category-container">

  <h2>Questionnaires</h2>

  <a href='index.php?page=quizzes&questions=baseline'><button type="button" class="btn quiz-category-btn">Welcome/Baseline</button></a><br>
  <a href='index.php?page=quizzes&questions=weekly'><button type="button" class="btn quiz-category-btn">Weekly</button></a><br>
  <a href='index.php?page=quizzes&questions=end'><button type="button" class="btn quiz-category-btn">End of Trial</button></a><br>
</div>
