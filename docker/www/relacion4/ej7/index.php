<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 05/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que pide una combinación de 4 cifras al usuario para abrir una caja fuerte. si la combinación no es la correcta se muestra un mensaje de error y si es la acertada uno de confirmación. el usuario tiene 4 oportunidades
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 7</title>
    </head>
    <body>
      <?
        // al empezar las variables se inicializan a 0, pero en cada ejecución del formulario se recoge su valor
        $intentosRestantes = isset($_POST["intentosRestantes"]) ? $_POST["intentosRestantes"] : 4;

        $clave = isset($_POST["clave"]) ? $_POST["clave"] : rand(1000, 9999); // al empezar la clave se genera automáticamente, pero cada vez que se envía el formulario no se resetea gracias a que siempre le llega el mismo valor

        /* ------------------------------------------------------------------------------------ */

        if ($_SERVER["REQUEST_METHOD"] === "POST") { // comprueba si se ha enviado una petición de tipo "post" desde el servidor
          if (isset($_POST["combinacion"])) {
            $combinacion = $_POST["combinacion"];

            if ($combinacion == $clave) {
              echo "La combinación es correcta";
            } else {
              $intentosRestantes -= 1;

              if ($intentosRestantes > 0) {
                echo "
                  <form method = \"post\">
                    <input type = \"hidden\" name = \"intentosRestantes\" value = \"$intentosRestantes\" />
                    <label for = \"combinacion\">Combinación <input name = \"combinacion\" type = \"number\" min = \"1000\" max = \"9999\" required /></label>
                    <br /><br />
                    <input type = \"submit\" value = \"submit\" />
                  </form>
                ";

                echo "<br />La combinación es incorrecta, intentos restantes: $intentosRestantes";
              } else {
                echo "La combinación es incorrecta, no se ha podido abrir la caja fuerte";
              }
            }
          }
        } else {
          // mostrar el formulario por primera vez
          echo "
            <form method = \"post\">
              <input type = \"hidden\" name = \"intentosRestantes\" value = \"$intentosRestantes\" />
              <label for = \"combinacion\">Combinación <input name = \"combinacion\" type = \"number\" min = \"1000\" max = \"9999\" required /></label>
              <br /><br />
              <input type = \"submit\" value = \"submit\" />
            </form>
          ";
        }

        /* ------------------------------------------------------- */

        // botón de reset
        echo "
          <form method = \"get\">
            <input type = \"hidden\" name = \"intentosRestantes\" value = \"<?= $intentosRestantes = 4 ?>\" />
            <br />
            <input type = \"submit\" value = \"reset\" />
          </form>
        ";
      ?>
    </body>
  </html>