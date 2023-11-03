<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 3</title>
      <style>
        p {
          margin: 0; /* mismo problema que en el ejercicio 1 */
        }
      </style>
    </head>
    <body>
      <?
        function esPrimo($num) {
          for ($i = 2; $i < $num; $i++) {
            if ($num % $i == 0) {
              return false;
            }
          }
          return true;
        }

        /* --------------------------------------------------- */

        if (isset($_POST["numero"])) {
          $numero = $_POST["numero"];

          if ($numero !== "") {
            if ($numero >= 2 && $numero <= 1000) {
              for ($i = 2; $i <= $numero; $i++) {
                if (esPrimo($i)) {
                  echo "<p>" . $i . "</p>";
                }
              }
            } else {
              echo "ERROR -> <a href = \"../index.html\">VOLVER AL FORMULARIO</a>";
            }
          } else {
            echo "ERROR -> <a href = \"../index.html\">VOLVER AL FORMULARIO</a>";
          }
        }
      ?>
    </body>
  </html>