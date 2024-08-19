<?php
include 'view22/header.php';
error_reporting(0);
switch ($_GET['page']) {

  default:
    include "view22/home.php";
    break;

  case "home";
    include 'view22/home.php';
    break;

    case "profile";
    include 'view22/profile.php';
    break;
     
  case "sejarah";
    include 'view22/sejarah.php';
    break;

  case "informasi";
  include 'view22/informasi.php';
  break;

  case "sejarah";
  include 'view22/sejarah.php';
  break;

  case "login";
    include "login.php";
    break;
}
include 'view22/footer.php';
?>
