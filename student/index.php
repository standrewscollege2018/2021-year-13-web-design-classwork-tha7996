

<?php
// set up site
  include("dbconnect.php");
  include("bootstrap.php");
  include("navbar.php");

echo "<body style='background-color:#d5dae1'>";

// display content using get array
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  include("$page.php");
} else {
  include("home.php");
}
 ?>
