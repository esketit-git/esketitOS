<?php

if(!isset($_SESSION) ||
    empty($_SESSION) ||
    session_status() == PHP_SESSION_NONE ||
    session_id() == '') die();

 //check_session.php

 if(isset($_SESSION['u']))
 {
      $i = '0';     //session not expired
 }
 else
 {
      $i = '1';     //session expired
 }

  $return_arr[] = array("is_valid" => $i, "u" => $_SESSION['u']);
  echo json_encode($return_arr);
 ?>
