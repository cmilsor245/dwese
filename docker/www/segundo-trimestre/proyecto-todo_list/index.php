<?
  session_start();

  if (!isset($_SESSION["logged_in"])) {
    $_SESSION["logged_in"] = false;
  }

  if (!$_SESSION["logged_in"]) {
    header("Location: views/index.html");
  } else {
    header("Location: views/content.view.php");
  }
?>