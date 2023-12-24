<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 01/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: resultado de las operaciones
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>resultado operaciones</title>
    </head>
    <body>
      <? 
        $num1 = $_GET["num1"];
        $num2 = $_GET["num2"];

        $suma = $num1 + $num2;
        $resta = $num1 - $num2;
        $division = $num1 / $num2;
        $multiplicacion = $num1 * $num2;

        echo "
          <p>Suma -> $num1 + $num2 = $suma</p>
          <p>Resta -> $num1 - $num2 = $resta</p>
          <p>División -> $num1 / $num2 = $division</p>
          <p>Multiplicación -> $num1 * $num2 = $multiplicacion</p>
        ";
      ?>
    </body>
  </html>