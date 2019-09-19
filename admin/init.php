<?php
  

  include 'connect.php';


   $tel = 'include/templets/';
   $func = 'include/function/';
   $css = 'them/css/';
   $js = 'them/js/';



/* include static files */

include $func . 'function.php';
include $tel . 'header.php';


if (!isset($noNavbar)){include $tel . 'navbar.php';}


