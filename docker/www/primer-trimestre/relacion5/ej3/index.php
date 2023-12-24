<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 10/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: programa que genera 15 números aleatorios y los almacena en un array. se rotan los elementos una posición hacia adelante. el elemento en la última posición pasa a la primera posición. se muestra el array antes y después de este proceso
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 3</title>
    </head>
    <body>
      <?
        $array = [];

        for ($i = 0; $i < 15; $i++) {
          $array[$i] = rand();
        }

        for ($i = 0; $i < 15; $i++) {
          echo $array[$i] . "<br />";
        }

        echo "<br /><br /><br />";

        /* ---------------------------------- */

        for ($i = 0; $i < 15; $i++) {
          $aux = $array[$i];
          $array[$i] = $array[0];
          $array[0] = $aux;
        }

        for ($i = 0; $i < 15; $i++) {
          echo $array[$i] . "<br />";
        }
      ?>
    </body>
  </html>