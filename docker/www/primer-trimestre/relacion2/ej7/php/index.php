<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 01/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: total de la factura
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>total a pagar</title>
    </head>
    <body>
      <?
        $baseImponible = $_GET["base"];

        $impuesto = $baseImponible * 0.21;

        $totalFactura = $baseImponible + $impuesto;

        echo "
          Base Imponible: $" . $baseImponible . "<br />
          Impuesto (21%): $" . $impuesto . "<br />
          Total de la Factura: $" . $totalFactura;
      ?>
    </body>
  </html>