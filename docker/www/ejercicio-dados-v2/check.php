<?
  session_start();

  if (!isset($_SESSION["roll_results"])) {
    $_SESSION["roll_results"] = array();
  }

  if (isset($_POST["roll"])) {
    if ($_SESSION["dice_roll"] < 5) {
      $_SESSION["dice_roll"]++;

      $dice1 = rand(1, 6);
      $dice2 = rand(1, 6);

      $_SESSION["message"] = "
        <h3>tirada número " . $_SESSION["dice_roll"] . "</h3>
        <img src = \"img/" . $dice1 . ".svg\" />
        <img src = \"img/" . $dice2 . ".svg\" />
      ";

      $roll_result = $dice1 + $dice2;
      array_push($_SESSION["roll_results"], $roll_result);
    } else {
      $highest_roll = max($_SESSION["roll_results"]);
      $highest_roll_index = array_search($highest_roll, $_SESSION["roll_results"]) + 1;

      $_SESSION["message"] = "la tirada más alta es la número " . $highest_roll_index . ": " . $highest_roll;
    }
  }

  header("Location: index.php");
?>