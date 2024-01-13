<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 14/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que permite ir introduciendo una serie indeterminada de números hasta que la suma de ellos supere el valor 10000. cuando esto último ocurre, se muestra el total acumulado, el contador de los números introducidos y la media de ellos
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 23</title>
    </head>
    <body>
      <?
        $numeroIntroducido = isset($_POST["numero"]) ? $_POST["numero"] : 0;

        $total = isset($_POST["total"]) ? $_POST["total"] : 0;
        $cont = isset($_POST["cont"]) ? $_POST["cont"] : 0;
        $media = isset($_POST["media"]) ? $_POST["media"] : 0;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $total += $numeroIntroducido;
          $cont++;
          $media = $total / $cont;
          if ($total > 10000) {
            echo "
              <p>total acumulado: $total</p>
              <p>contador de números introducidos: $cont</p>
              <p>media de los números introducidos: $media</p>
            ";
          } else {
            echo "
              <form method = \"post\">
                <label for = \"numero\">numero: <input type = \"number\" name = \"numero\" required /></label>
                <input type = \"hidden\" name = \"total\" value = \"$total\" />
                <input type = \"hidden\" name = \"cont\" value = \"$cont\" />
                <input type = \"hidden\" name = \"media\" value = \"$media\" />
                <input type = \"submit\" value = \"submit\" />
              </form>
            ";
          }
        } else {
          echo "
            <form method = \"post\">
              <label for = \"numero\">numero: <input type = \"number\" name = \"numero\" required /></label>
              <input type = \"hidden\" name = \"total\" value = \"$total\" />
              <input type = \"hidden\" name = \"cont\" value = \"$cont\" />
              <input type = \"hidden\" name = \"media\" value = \"$media\" />
              <input type = \"submit\" value = \"submit\" />
            </form>
          ";
        }
      ?>
    </body>
  </html>