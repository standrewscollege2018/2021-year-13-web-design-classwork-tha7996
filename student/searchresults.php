<div class="body p-3">

<?php
  // redirect home if no search result
  if(!isset($_POST['search'])) {
    header("Location: home.php");
  }
  $search = $_POST['search'];

  // get results from SQLiteDatabase
  $result_sql = "SELECT * FROM student WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%'";
  $result_qry = mysqli_query($dbconnect, $result_sql);

  // if no results found from search
  if(mysqli_num_rows($result_qry)==0) {
      echo "<h1 class='display-6'>No results found for search: '$search'</h1>";
    }
  // else results were found
  else {
    // get results in array
    $result_aa = mysqli_fetch_assoc($result_qry);

    echo "<h1 class='display-6'>Results for search: '$search'</h1>";
    echo "<div class='row'>";

    // loop through each result
    do {
      $firstname = $result_aa['firstname'];
      $lastname = $result_aa['lastname'];
      $photo = $result_aa['photo'];

      ?>

      <!-- display information -->
      <div class="col-md-4 col-12 mb-3">
        <div class="card">
          <img class="card-img-top" src='images/<?php echo "$photo"; ?>'>
          <div class="card-body">
            <h5 class="card-title"><?php echo "$firstname $lastname"; ?></h5>
          </div>
        </div>
      </div>

      <?php


      } while ($result_aa = mysqli_fetch_assoc($result_qry));

    echo "</div>";
  }

 ?>

</div>
