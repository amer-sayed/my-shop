<?php
  

  include 'admin/connect.php';



   $tel = 'include/templets/';
   $func = 'include/function/';
   $css = 'them/css/';
   $js = 'them/js/';
if (isset($_SESSION["user"])){
   $usersession = $_SESSION["user"];
}

/* include static files */

include  $func . "function.php";
include $tel . 'header.php';



