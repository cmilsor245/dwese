<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 02/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: script for "ej4"
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>salario semanal total</title>
    </head>
    <body>
      <?
        const ORDINARIAS = 12;
        const EXTRAORDINARIAS = 16;

        $horas = $_GET["horasTrabajadas"];

        if ($horas <= 40) {
          $salario = $horas * 12;
        } else {
          $salario = (40 * 12) + ((($horas - 40) * 16));
        };

        echo "Salario semanal total: $salario";
      ?>
    </body>
  </html>