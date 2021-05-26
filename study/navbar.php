<!-- navbar -->

<nav style="background-color:red; padding: 10px 30px;">
  <h1 style="color:white;">Taiora Trial</h1>
  <div class="links">

    <a style="text-decoration:none; color:white;" href="index.php?page=quizzes">Quizzes</a>

    <?php

      if(!isset($_SESSION['user_ID'])){
        echo "<a style='text-decoration:none; color:white;' href='index.php?page=login'>Login</a>";
      }
      else{
        echo "<a style='text-decoration:none; color:white;' href='index.php?page=account'>Account</a>";
      }

     ?>



  </div>
</nav>
