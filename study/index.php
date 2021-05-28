<!DOCTYPE html>

<?php
  include('dbconnect.php');
 ?>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- set up PWA -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
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
  </head>
  <body>


    <?php

      session_start();

      include('navbar.php');

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

     ?>

    <script src="js/app.js"></script>
  </body>
</html>
