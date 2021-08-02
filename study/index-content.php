
<?php

$mode=$_GET['app'];
session_start();

    if ($mode=='browser') {
      $_SESSION["app"]=False;
    }
    else{

      $_SESSION["app"]=True;


    }

 ?>
