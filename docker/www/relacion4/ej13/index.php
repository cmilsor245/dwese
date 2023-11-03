<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 09/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que lee una lista de 10 números y determina cuántos son positivos y cuántos son negativos
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 13</title>
    </head>
    <body>
      <?
        $positivosCont = isset($_POST["positivosCont"]) ? $_POST["positivosCont"] : 0;
        $negativosCont = isset($_POST["negativosCont"]) ? $_POST["negativosCont"] : 0;
        $total = isset($_POST["total"]) ? $_POST["total"] : 0;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $numeroIntroducido = isset($_POST["numero"]) ? $_POST["numero"] : 0;

          if ($numeroIntroducido > 0) {
            $positivosCont++;
          } elseif ($numeroIntroducido < 0) {
            $negativosCont++;
          }

          $total++;

          if ($total <= 9) {
            echo "
              <form method = \"post\">
                <input type = \"hidden\" name = \"positivosCont\" value = \"$positivosCont\" />
                <input type = \"hidden\" name = \"negativosCont\" value = \"$negativosCont\" />
                <input type = \"hidden\" name = \"total\" value = \"$total\" />
                <label for = \"numero\">Número <input name = \"numero\" type = \"number\" required /></label>
                <br /><br />
                <input type = \"submit\" value = \"submit\" />
              </form>

              <br />

              <p>Se han introducido un total de $total números por ahora.</p>
            ";
          } else {
            echo "Se han introducido un total de $positivosCont números positivos y $negativosCont negativos";
          }
        } else {
          // mostrar el formulario por primera vez
          echo "
            <form method = \"post\">
              <input type = \"hidden\" name = \"positivosCont\" value = \"$positivosCont\" />
              <input type = \"hidden\" name = \"negativosCont\" value = \"$negativosCont\" />
              <input type = \"hidden\" name = \"total\" value = \"$total\" />
              <label for = \"numero\">Número <input name = \"numero\" type = \"number\" required /></label>
              <br /><br />
              <input type = \"submit\" value = \"submit\" />
            </form>

            <br />

            <p>Se han introducido un total de $total números por ahora.</p>
          ";
        }
      ?>
    </body>
  </html>