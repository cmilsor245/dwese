<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 10/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que genera 100 números aleatorios del 0 al 200 y los muestra por pantalla separados por espacios. se piden dos valores y se sustituye el primero por el segundo introducido
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 4</title>
    </head>
    <body>
      <?
        $array = [];

        if (isset($_POST["array"])) {
          $array = explode(',', $_POST["array"]); // si se ha enviado ya el formulario se genera el array con los valores anteriores
        } else {
          for ($i = 0; $i < 100; $i++) {
            $array[$i] = rand(0, 200);
          }
        }

        echo "<table>";
        for ($i = 0; $i < 100; $i++) {
          echo "<td>" . $array[$i] . "</td>";
          if (($i + 1) % 10 == 0) {
            echo "</tr><tr>";
          }
        }
        echo "</tr></table>";

        /* ---------------------------------- */

        echo "
          <br /><br />
          <form method = \"post\">
            <input type = \"hidden\" name = \"array\" value = \"" . implode(',', $array) . "\"> <!-- se envía el array en un input oculto para mantener el anterior -->
            <label for = \"num1\">numero 1: <input type = \"number\" name = \"num1\" /></label>
            <label for = \"num2\">numero 2: <input type = \"number\" name = \"num2\" /></label>
            <input type = \"submit\" value = \"submit\" />
          </form>
        ";

        /* ---------------------------------- */

        if (isset($_POST["num1"]) && isset($_POST["num2"])) {
          $num1 = $_POST["num1"];
          $num2 = $_POST["num2"];

          $cont = 0;

          for ($i = 0; $i < 100; $i++) {
            if ($array[$i] == $num1) {
              $array[$i] = $num2;
              $cont++;
            }
          }

          /* ---------------------------------- */

          echo "
            <br /><br />
            Se han encontrado $cont coincidencias con el numero $num1:
          ";

          echo "
            <table>
          ";
          for ($i = 0; $i < 100; $i++) {
            echo "<td>" . $array[$i] . "</td>";
            if (($i + 1) % 10 == 0) {
              echo "</tr><tr>";
            }
          }
          echo "</tr></table>";
        }
      ?>
    </body>
  </html>