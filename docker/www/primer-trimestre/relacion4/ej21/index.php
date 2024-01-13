<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 14/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que va pidiendo números hasta que se introduce un número negativo y muestra cuántos se han introducido, la media de los impares y el mayor de los pares. el número negativo solo se utiliza como break y no se introduce en el cómputo
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 21</title>
    </head>
    <body>
      <?
        $numeroIntroducido = isset($_POST["numero"]) ? $_POST["numero"] : 0;

        $cont = isset($_POST["cont"]) ? $_POST["cont"] : 0;
        $contImpares = isset($_POST["contImpares"]) ? $_POST["contImpares"] : 0;
        $sumaImpares = isset($_POST["contImpares"]) ? $_POST["contImpares"] : 0;
        $mediaImpares = isset($_POST["mediaImpares"]) ? $_POST["mediaImpares"] : 0;
        $maxPar = isset($_POST["maxPar"]) ? $_POST["maxPar"] : 0;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if ($numeroIntroducido > 0) {
            $cont++;

            if ($numeroIntroducido % 2 != 0) {
              $contImpares++;

              $sumaImpares += $numeroIntroducido;

              $mediaImpares = $sumaImpares / $contImpares;
            }

            if ($numeroIntroducido > $maxPar) {
              $maxPar = $numeroIntroducido;
            }

            echo "
              <form method = \"post\">
                <label for = \"numero\">numero: <input type = \"number\" name = \"numero\" required /></label>
                <input type = \"hidden\" name = \"cont\" value = \"$cont\" />
                <input type = \"hidden\" name = \"contImpares\" value = \"$contImpares\" />
                <input type = \"hidden\" name = \"sumaImpares\" value = \"$sumaImpares\" />
                <input type = \"hidden\" name = \"mediaImpares\" value = \"$mediaImpares\" />
                <input type = \"hidden\" name = \"maxPar\" value = \"$maxPar\" />
                <input type = \"submit\" value = \"submit\" />
              </form>
            ";
          } else {
            if ($cont > 0) {
              echo "
                - números totales introducidos: $cont<br />
                - media de los números impares: $mediaImpares<br />
                - mayor de los números pares: $maxPar
              ";
            }
          }
        } else {
          echo "
            <form method = \"post\">
              <label for = \"numero\">numero: <input type = \"number\" name = \"numero\" required /></label>
              <input type = \"hidden\" name = \"cont\" value = \"$cont\" />
              <input type = \"hidden\" name = \"contImpares\" value = \"$contImpares\" />
              <input type = \"hidden\" name = \"sumaImpares\" value = \"$sumaImpares\" />
              <input type = \"hidden\" name = \"mediaImpares\" value = \"$mediaImpares\" />
              <input type = \"hidden\" name = \"maxPar\" value = \"$maxPar\" />
              <input type = \"submit\" value = \"submit\" />
            </form>
          ";
        }
      ?>
    </body>
  </html>