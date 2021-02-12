

<?php

  $tutor_sql = "SELECT * FROM tutorgroup";
  $tutor_qry = mysqli_query($dbconnect, $tutor_sql);
  $tutor_aa = mysqli_fetch_assoc($tutor_qry);

?>

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-navy">

  <!-- home links -->
  <a class="navbar-brand" href="#"><img src="images/logo.png" alt="stac-logo"></a>
  <a class="collapse navbar-collapse text-white" href="index.php"><h1>St Andrew's College</h1></a>

  <!-- tutor group dropdown -->
  <div class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Tutor
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <?php
        do {
          $tutorgroupID = $tutor_aa['tutorgroupID'];
          $tutorcode = $tutor_aa['tutorcode'];

          echo "<a class='dropdown-item' href='index.php?page=tutorgroup&tutorgroupID=$tutorgroupID&tutorcode=$tutorcode'>$tutorcode</a>";

         } while ($tutor_aa = mysqli_fetch_assoc($tutor_qry))
      ?>

    </div>
  </div>




  <!-- search bar -->
  <div class="nav-item mr-auto">
    <form class="form-inline my-2 my-lg-0" action="index.php?page=searchresults" method="post">
     <input class="form-control mr-sm-2" required type="text" name="search" placeholder="Search">
     <button class="btn" type="submit" name="button"><i class="fas fa-search"></i></button>
    </form>
  </div>






</nav>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
