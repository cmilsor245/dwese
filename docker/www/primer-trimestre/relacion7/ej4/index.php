<?
  session_start();

  include("php/includes/functions.php");

  initializeSessionVariables("correct_combination", rand(1000, 9999));

  initializeSessionVariables("correct_length", false);

  initializeSessionVariables("attempts", 0);

  initializeSessionVariables("max_attempts_completed", false);

  initializeSessionVariables("correct_answer", false);
?>

<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8" />
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
    <title>guessing page</title>
    <style>
      form {
        display: inline;
      }
      span {
        color: red;
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <form method = "post" action = "php/check.php">
      <input name = "guess" type = "number" placeholder = "e.g. 1234" />
      <input type = "submit" value = "guess" />
    </form>

    <form method = "post" action = "php/reset.php">
      <input type = "submit" value = "reset" />
    </form>

    <p>
      <?
        if ($_SESSION["max_attempts_completed"]) {
          echo "has alcanzado el número de intentos máximos";
        } elseif ($_SESSION["attempts"] >= 1) {
          if (!isset($_SESSION["correct_length"]) || !$_SESSION["correct_length"]) {
            echo "el tamaño de la combinación debe ser de 4 cifras - te quedan <span>" . (4 - $_SESSION["attempts"]) . "</span> intentos";
          } elseif (isset($_SESSION["correct_answer"]) && $_SESSION["correct_answer"]) {
            echo "¡combinación correcta!";
          } else {
            echo "combinación incorrecta - te quedan <span>" . (4 - $_SESSION["attempts"]) . "</span> intentos";
          }
        }
      ?>
  </p>
  </body>
</html>