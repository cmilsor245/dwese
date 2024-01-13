<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 02/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: script for "ej3"
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>día correspondiente al número</title>
    </head>
    <body>
      <?
        $numero = $_GET["numero"];

        switch ($numero) {
          case 1:
            echo "Lunes";
            break;
          case 2:
            echo "Martes";
            break;
          case 3:
            echo "Miércoles";
            break;
          case 4:
            echo "Jueves";
            break;
          case 5:
            echo "Viernes";
            break;
          case 6:
            echo "Sábado";
            break;
          case 7:
            echo "Domingo";
            break;
          default:
            echo "No es un número válido";
            break;
        }
      ?>
    </body>
  </html>