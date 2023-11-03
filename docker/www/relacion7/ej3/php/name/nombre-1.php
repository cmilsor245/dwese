<?
  session_start();

  include("../includes/functions.php");

  if (isset($_SESSION["name"])) {
    echo $_SESSION["name"];
    backToIndexButton("../../index.html");
  } else {
    inputDisplay("nombre-2.php", "name", "tu nombre", "../../index.html");
  }
?>

<style>
  form {
    display: inline;
  }
</style>