<?
  session_start();

  if (isset($_POST["reset"])) {
    session_destroy();
    header("Location: index.php");
  }

  if (isset($_SESSION["visitas"])) {
    $_SESSION["visitas"]++;
  } else {
    $_SESSION["visitas"] = 1;
  }

  $visitas = $_SESSION["visitas"];

  echo $visitas . " visitas";
?>

<form method="post" action="index.php">
  <button name="reset" type="submit">reset</button>
</form>