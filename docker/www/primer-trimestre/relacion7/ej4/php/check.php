<?
  session_start();

  include("includes/functions.php");

  if (isset($_POST["guess"])) {
    $guess = $_POST["guess"];

    $_SESSION["attempts"]++;

    if (!$_SESSION["correct_answer"]) {
      if ($_SESSION["attempts"] === 4) {
        $_SESSION["max_attempts_completed"] = true;
      } elseif (strlen($guess) !== 4) {
        $_SESSION["correct_length"] = false;
      } else {
        $_SESSION["correct_length"] = true;
        if ((int)$guess === $_SESSION["correct_combination"]) {
          $_SESSION["correct_answer"] = true;
        } else {
          $_SESSION["correct_answer"] = false;
        }
      }
    }

    goBackToIndex("../index.php");
  }
?>