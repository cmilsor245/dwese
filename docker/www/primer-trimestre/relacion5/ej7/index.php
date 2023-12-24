<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 11/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: array con cinco nombres de persona y se recorre mostrando el texto "conozco a alguien llamado {nombre}"
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
        $personas = ["Juan", "Pedro", "Ana", "Maria", "Luis"];

        foreach ($personas as $persona) {
          echo "conozco a alguien llamado $persona <br>";
        }
      ?>
    </body>
  </html>