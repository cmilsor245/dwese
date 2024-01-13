<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 02/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: script for "ej1"
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>asignatura a primera hora</title>
    </head>
    <body>
      <?
        $dia = strtolower($_GET["dia"]);

        switch ($dia) {
          case "lunes":
            echo "DWECL";
            break;
          case "martes":
            echo "DWECL";
            break;
          case "miércoles":
            echo "DWESE";
            break;
          case "jueves":
            echo "DWESE";
            break;
          case "viernes":
            echo "DIWEB";
            break;
          default:
            echo "No es un día de la semana válido";
            break;
        };
      ?>
    </body>
  </html>