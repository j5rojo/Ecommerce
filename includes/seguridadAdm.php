<?php
  error_reporting(0);
  session_start();
  if ($_SESSION['autentificado'] != "SI" || $_SESSION['nivel']!=0) {
      session_destroy();
      echo "<script type='text/javascript'>window.location='index.php'</script>";
      exit();
  }
?>
