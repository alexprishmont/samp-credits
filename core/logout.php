<?php
  session_start ();
  $url = $_GET['forum'];
  unset ($_SESSION['logged']);
  session_destroy ();
  header ("Location: ".$url);
?>
