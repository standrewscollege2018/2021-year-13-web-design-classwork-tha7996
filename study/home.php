<?php

$name = $_SESSION['user_name'];

?>


<div class="container-fluid home-navbar">
  <h3 class='col'>Taiora Trial</h3>
</div>

<div class="home-account-container">
  <h2>Welcome, <?php echo $name ?></h2>
  <a href='index.php?page=account'><button type="button" class="btn home-button">Manage Account</button></a><br>
</div>

<div class="container-fluid home-content-container">


  <h2>Questionnaires</h2>

  <a href='index.php?page=quizzes&questions=baseline'><button type="button" class="btn home-button">Welcome/Baseline</button></a><br>
  <a href='index.php?page=quizzes&questions=weekly'><button type="button" class="btn home-button">Weekly</button></a><br>
  <a href='index.php?page=quizzes&questions=end'><button type="button" class="btn home-button">End of Trial</button></a><br>

  <h2>About</h2>
  <a href='index.php?page=about'><button type="button" class="btn home-button">About</button></a><br>


</div>
