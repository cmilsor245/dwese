<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 01/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: cálculo del salario semanal
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>salario semanal</title>
    </head>
    <body>
      <?
        const POR_HORA = 12;

        $horasTrabajadas = $_GET['horasTrabajadas'];

        $salarioSemanal = $horasTrabajadas * POR_HORA;

        echo "<p>El salario semanal correspondiente al trabajador es: $" . $salarioSemanal . "</p>";
      ?>
    </body>
  </html>