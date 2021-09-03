
<?php

$mode=$_GET['app'];
$ios=$_GET['ios'];
session_start();

    if ($mode=='browser') {
      $_SESSION["app"]=False;
    }
    else{

      $_SESSION["app"]=True;
    }

    if ($ios=='false' || $ios==False || $ios==0) {
      $_SESSION["ios"]=False;
    }
    else{

      $_SESSION["ios"];
    }

 ?>
