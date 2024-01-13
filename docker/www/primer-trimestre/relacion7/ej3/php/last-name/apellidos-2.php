<?
  session_start();

  include("../includes/functions.php");

  if (isset($_POST["last_name"]) && $_POST["last_name"] !== "") {
    $_SESSION["last_name"] = $_POST["last_name"];
    headerBackToIndex("../../index.html");
  } else {
    echo "los apellidos no pueden estar vacíos ➡️ <a href = \"apellidos-1.php\"><button>volver</button></a>";
  }
?>