<?php
  include('dbconnect.php');
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Alternative news</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="styles.css">
  <link rel="manifest" href="manifest.json">
  <meta name="theme-color" content="#ffffff" />
</head>

<body>
  <header>
    <h1>Alternative news</h1>
    <select id="sources"></select>
  </header>
  <main></main>
  <?php
    $sql = "SELECT * FROM wp_users";
    $qry = mysqli_query($dbconnect, $sql);
    $aa = mysqli_fetch_assoc($qry);
    do {
      $user = $aa['user_login'];
      echo "<p>$user</p>";
    } while ($aa = mysqli_fetch_assoc($qry));
    include('login.php');
    include("quizzes.php");
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
      include("$page.php");
    }




   ?>



  <script src="app.js"></script>
</body>

</html>
