
<?php

$account_type = $_SESSION['user_type'];

// capitalize first letter
echo "<h2>",ucfirst($account_type)," Participant Portal</h2>";
echo "<br><h3>Questionaires</h3>";

echo "<a href='index.php?page=quizzes&account=$account_type&questions=baseline'>Welcome/Baseline</a><br>";
echo "<a href='index.php?page=quizzes&questions=$account_type&questions=weekly'>Weekly</a><br>";
echo "<a href='index.php?page=quizzes&questions=$account_type&questions=end'>End of Trial</a><br>";





 ?>
