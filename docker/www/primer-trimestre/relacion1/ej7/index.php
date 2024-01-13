<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 01/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: muestra mi nombre, mi dirección y mi número de teléfono mediante el uso de variables
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
        $nombre = "Christian Millán Soria";
        $direccion = "Avenida Secretísima Nº 13";
        $telefono = "611 22 33 44";

        echo "
          <h1>$nombre</h1>
          <h1>$direccion</h1>
          <h1>$telefono</h1>
        ";
      ?>
    </body>
  </html>