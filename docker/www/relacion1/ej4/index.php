<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 01/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: muestra mi horario de clases mediante una tabla, intercalando html y php
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 4</title>
      <link rel = "stylesheet" href = "css/style.css" />
    </head>
    <body>
      <table>
        <tr>
          <th colspan = "6">HORARIO</th>
        </tr>

        <?
          echo "
            <tr>
              <td>15:15 - 16:15</td>
              <td>DWECL</td>
              <td>DWECL</td>
              <td>DWESE</td>
              <td>DWESE</td>
              <td>DIWEB</td>
            </tr>

            <tr>
              <td>16:15 - 17:15</td>
              <td>DWECL</td>
              <td>DWECL</td>
              <td>DWESE</td>
              <td>DWESE</td>
              <td>DIWEB</td>
            </tr>
          ";
        ?>

        <tr>
          <td>17:15 - 18:15</td>
          <td>DWECL</td>
          <td>DWECL</td>
          <td>DIWEB</td>
          <td>DWESE</td>
          <td>DIWEB</td>
        </tr>

        <tr>
          <td>18:30 - 19:30</td>
          <td>DWESE</td>
          <td>DAWEB</td>
          <td>DIWEB</td>
          <td>EINEM</td>
          <td>HLC</td>
        </tr>

        <?
          echo "
            <tr>
              <td>19:30 - 20:30</td>
              <td>DWESE</td>
              <td>DAWEB</td>
              <td>DIWEB</td>
              <td>EINEM</td>
              <td>HLC</td>
            </tr>

            <tr>
              <td>20:30 - 21:30</td>
              <td>DWESE</td>
              <td>DAWEB</td>
              <td>EINEM</td>
              <td>EINEM</td>
              <td>HLC</td>
            </tr>
          ";
        ?>
      </table>
    </body>
  </html>