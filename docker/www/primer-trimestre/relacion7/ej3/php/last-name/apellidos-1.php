<?
  session_start();

  include("../includes/functions.php");

  if (isset($_SESSION["last_name"])) {
    echo $_SESSION["last_name"];
    backToIndexButton("../../index.html");
  } else {
    inputDisplay("apellidos-2.php", "last_name", "tus apellidos", "../../index.html");
  }
?>

<style>
  form {
    display: inline;
  }
</style>