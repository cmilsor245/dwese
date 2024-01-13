<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 01/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: muestra las operaciones básicas realizadas con las variables "x" e "y" con valores "144" y "999" respectivamente
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 5</title>
    </head>
    <body>
      <?
        $x = 144;
        $y = 999;

        echo "
          <p>x -> $x</p>
          <p>y -> $y</p>

          <!-- ------------------------------------------- -->

          <hr />

          <p>suma -> $x + $y = ".$x + $y."</p>
          <p>resta -> $x - $y = ".$x - $y."</p>
          <p>división -> $x / $y = ".$x / $y."</p>
          <p>multiplicación -> $x * $y = ".$x * $y."</p>
        ";
      ?>
    </body>
  </html>