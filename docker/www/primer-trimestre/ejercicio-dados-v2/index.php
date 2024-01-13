<?
  session_start();

  if (!isset($_SESSION["dice_roll"])) {
    $_SESSION["dice_roll"] = 0;
  }

  if (!isset($_SESSION["message"])) {
    $_SESSION["message"] = "";
  }

  echo "
    <form method = \"post\" action = \"check.php\">
      <input type = \"submit\" name = \"roll\" value = \"tirar\">
    </form>
  ";

  echo "
    <form method = \"post\" action = \"reset.php\">
      <input type = \"submit\" name = \"reset\" value = \"reset\">
    </form>
  ";

  if ($_SESSION["dice_roll"] > 0) {
    echo "<h3>" . $_SESSION["message"] . "</h3>";
  }
?>

<style>
  form {
    display: inline;
  }
</style>