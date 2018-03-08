<?php 
  session_start();
  if(empty($_SESSION['user_profile'])){
    header('location:/');
  }
  $user_profile = json_decode($_SESSION['user_profile']);
  if($user_profile->ultimo_login == "0000-00-00 00:00:00"){
    header("location: primeira_vez.php");
  }
  $inside = true;

?>