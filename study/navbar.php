<!-- navbar -->
<nav style="background-color:red; padding: 10px 30px;">
  <h1 style="color:white;">Taiora Trial</h1>
  <div class="links">

    <?php

      if(!isset($_SESSION['user_ID'])){

        echo "<a style='text-decoration:none; color:white;' href='index.php?page=login'>Login</a>";
      }
      else{

        $account_type = ucfirst($_SESSION['user_type']);

        echo "<a style='text-decoration:none; color:white;' href='index.php?page=portal'>$account_type Portal</a>";

        echo "<a style='text-decoration:none; color:white;' href='index.php?page=account'>Account</a>";
      }

     ?>

  </div>
</nav>
