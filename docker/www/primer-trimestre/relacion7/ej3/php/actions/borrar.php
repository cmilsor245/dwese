<?
  session_start();

  include("../includes/functions.php");

  echo "la sesión se ha destruido";
  backToIndexButton("../../index.html");

  session_destroy();
?>