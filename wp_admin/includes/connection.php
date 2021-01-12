<?php

  $db=mysqli_connect("localhost","root","","adminpanel");

  if($db){
     // echo "database connected";
  }
  else{
      echo "database error";
  }

?>