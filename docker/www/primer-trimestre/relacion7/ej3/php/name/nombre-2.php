<?
  session_start();

  include("../includes/functions.php");

  if (isset($_POST["name"]) && $_POST["name"] !== "") {
    $_SESSION["name"] = $_POST["name"];
    headerBackToIndex("../../index.html");
  } else {
    echo "el nombre no puede estar vacío ➡️ <a href = \"nombre-1.php\"><button>volver</button></a>";
  }
?>