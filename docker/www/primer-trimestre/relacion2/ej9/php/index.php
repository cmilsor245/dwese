<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 01/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: cálculo del volumen de un cono
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>volumen cono</title>
    </head>
    <body>
      <?
        const PI = 3.14159265359;

        $radio = $_GET['radio'];
        $altura = $_GET['altura'];

        $volumen = (1 / 3) * PI * pow($radio, 2) * $altura; // la función "pow" es la que php utiliza para las potencias: pow("numero", "potencia");

        echo "V = (1 / 3) * PI * $radio^2 * $altura = $volumen";
      ?>
    </body>
  </html>