<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 01/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: muestra 10 palabras en inglés junto con su traducción correspondiente en una tabla
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 3</title>
      <link rel = "stylesheet" href = "css/style.css" />
    </head>
    <body>
      <table>
        <?
          echo "
            <tr>
              <th>English</th>
              <th>Español</th>
            </tr>

            <tr>
              <td>Variable</td>
              <td>Variable</td>
            </tr>

            <tr>
              <td>Function</td>
              <td>Función</td>
            </tr>

            <tr>
              <td>Array</td>
              <td>Arreglo</td>
            </tr>

            <tr>
              <td>Loop</td>
              <td>Bucle</td>
            </tr>

            <tr>
              <td>Condition</td>
              <td>Condición</td>
            </tr>

            <tr>
              <td>Database</td>
              <td>Base de datos</td>
            </tr>

            <tr>
              <td>Statement</td>
              <td>Instrucción</td>
            </tr>

            <tr>
              <td>File</td>
              <td>Archivo</td>
            </tr>

            <tr>
              <td>Class</td>
              <td>Clase</td>
            </tr>

            <tr>
              <td>Object</td>
              <td>Objeto</td>
            </tr>
          ";
        ?>
      </table>
    </body>
  </html>