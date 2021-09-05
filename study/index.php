<!DOCTYPE html>


<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- set up PWA -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="manifest" href="manifest.json">
    <!-- ios support -->
    <link rel="apple-touch-icon" href="images/icons/icon-72x72.png">
    <link rel="apple-touch-icon" href="images/icons/icon-96x96.png">
    <link rel="apple-touch-icon" href="images/icons/icon-128x128.png">
    <link rel="apple-touch-icon" href="images/icons/icon-144x144.png">
    <link rel="apple-touch-icon" href="images/icons/icon-152x152.png">
    <link rel="apple-touch-icon" href="images/icons/icon-192x192.png">
    <link rel="apple-touch-icon" href="images/icons/icon-384x384.png">
    <link rel="apple-touch-icon" href="images/icons/icon-512x512.png">
    <meta name="apple-mobile-web-app-status-bar" content="#db4938">
    <meta name="theme-color" content="#db4938">
    <title>UC Study</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>

  <body onload='getPWADisplayMode()'>


  <?php


    session_start();


    if ($_SESSION['app']==true) {

      if (isset($_GET['page'])) {
        if ($_GET['page']!='login' && $_GET['page']!='logout' && !isset($_SESSION['user_ID'])){
            header('Location: index.php?page=login&error=loggedout');
          }

          // if logged in, display page
          $page = $_GET['page'];
          include("$page.php");

        }
        else{
          header('Location: index.php?page=login&error=loggedout');
        }
    }

    else{

      echo '<div class="landing-page">';

      // pwa is not installed. However, ios does not allow custom install experiences. Therefore, a different process is needed for each platform.
      // if android
      if($_SESSION['ios']==False){
        ?>

          <h1>Taiora Trial App</h1>
          <p>To download our app, please press the button below.</p>
          <!-- install button will prompt user to install app -->
          <button class="install-button" name="button" style="margin-bottom: 8px;">Install Taiora!</button>
          <br>
          <b>If you have already installed the app, please open it from the homescreen.</b><br>
          <b>If you are on the installed app, please refresh this page by clicking </b><a style='color: blue; padding: 0px;' href='index.php'>here</a>.</p>


        <?php
      }
      // ios
      else{
        ?>

          <h1>Taiora Trial App</h1>
          <p>To install our app, please follow the below instructions:</p>
          <ol style='list-style:none;'>
            <li><b>1.</b> Please navigate to this same page on Safari, if you are not already.</li>
            <li><b>2.</b> Press the button in the centre bottom of your screen.</li>
            <li><b>3.</b> Scroll down and select 'Add to Home Screen'</li>
            <li><b>4.</b> Click 'Add'</li>
            <li><b>5.</b> Open the app from the homescreen.</li>
          </ol>

          <b>If you have already installed the app, please open it from the homescreen.</b><br>
          <b>If you are on the installed app, please refresh this page by clicking </b><a style='color: blue; padding: 0px;' href='index.php'>here</a>.</p>




        <?php
      }


      echo "</div>";
    }



  ?>

    <script src="js/main.js"></script>

    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>
