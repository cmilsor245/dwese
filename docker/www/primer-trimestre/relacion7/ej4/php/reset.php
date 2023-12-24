<?
  session_start();

  include("includes/functions.php");

  session_destroy();

  goBackToIndex("../index.php");
?>