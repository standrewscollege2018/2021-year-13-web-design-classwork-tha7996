<script type="text/javascript">

  function notifyMe(notificationTitle='Hello World') {
    // check if the browser supports notifications
    if (!("Notification" in window)) {
      alert("This browser does not support desktop notification");
    }

    // check whether notification permissions have already been granted
    else if (Notification.permission === "granted") {
      // if so create a notification
      var notification = new Notification(notificationTitle);
    }

    // else ask user for permission
    else if (Notification.permission !== "denied") {
      Notification.requestPermission().then(function (permission) {
        // If user accepts, create a notification
        if (permission === "granted") {
          var notification = new Notification(notificationTitle);
        }
      });
    }

  // At last, if the user has denied notifications, and you
  // want to be respectful there is no need to bother them any more.
  }

</script>

<button onclick="notifyMe()">Notify me</button>

<?php
  include('dbconnect.php');

  $user_id=1;

  $sql = "SELECT * FROM wp_mlw_results WHERE user=$user_id AND time_taken_real > NOW() - INTERVAL 1 WEEK";
  $result = mysqli_query($dbconnect, $sql);

  if(mysqli_num_rows($result) == 0) {
      echo "<script>notifyMe()</script>";
  }
?>
