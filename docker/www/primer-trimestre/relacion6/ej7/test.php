<!--
  @file: test.php
  @author: Christian Millán Soria
  @created: 19/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: testing function library for "ej7"
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>testing</title>
      <style>
        table {
          text-align: center;
        }
      </style>
    </head>
    <body>
      <?
        include("func/function.php");

        echo "<h1>generaArrayBilnt()</h1>";
        echo "generaArrayBilnt(3, 4, 1, 10): <br>";
        $array_bidimensional = generaArrayBilnt(3, 4, 1, 10);
        echo "<table>";
        for ($i = 0; $i < count($array_bidimensional); $i++) {
          echo "<tr>";
          for ($j = 0; $j < count($array_bidimensional[$i]); $j++) {
            echo "<td>" . $array_bidimensional[$i][$j] . "</td>";
          }
          echo "</tr>";
        }
        echo "</table>";

        echo "<hr />";

        /* ---------------------------------------------------------- */

        echo "<h1>filaDeArrayBilnt()</h1>";
        echo "generaArrayBilnt(3, 4, 1, 10): <br>";
        $array_bidimensional = generaArrayBilnt(3, 4, 1, 10);
        echo "<table>";
        for ($i = 0; $i < count($array_bidimensional); $i++) {
          echo "<tr>";
          for ($j = 0; $j < count($array_bidimensional[$i]); $j++) {
            echo "<td>" . $array_bidimensional[$i][$j] . "</td>";
          }
          echo "</tr>";
        }
        echo "</table>";

        echo "filaDeArrayBilnt(2, \$array_bidimensional): ";
        $filaSeleccionada = filaDeArrayBilnt(2, $array_bidimensional);
        if ($filaSeleccionada !== null) {
          echo "<table>";
          echo "<tr>";
          foreach ($filaSeleccionada as $valor) {
            echo "<td>" . $valor . "</td>";
          }
          echo "</tr>";
          echo "</table>";
        } else {
          echo "la fila no existe en el array.";
        }

        echo "<hr />";

        /* ---------------------------------------------------------- */

        echo "<h1>columnaDeArrayBilnt()</h1>";
        echo "generaArrayBilnt(3, 4, 1, 10): <br>";
        $array_bidimensional = generaArrayBilnt(3, 4, 1, 10);
        echo "<table>";
        for ($i = 0; $i < count($array_bidimensional); $i++) {
          echo "<tr>";
          for ($j = 0; $j < count($array_bidimensional[$i]); $j++) {
            echo "<td>" . $array_bidimensional[$i][$j] . "</td>";
          }
          echo "</tr>";
        }
        echo "</table>";

        echo "columnaDeArrayBilnt(2, \$array_bidimensional): ";
        $columnaSeleccionada = columnaDeArrayBilnt(2, $array_bidimensional);
        if ($columnaSeleccionada !== null) {
          echo "<table>";
          echo "<tr>";
          foreach ($columnaSeleccionada as $valor) {
            echo "<td>" . $valor . "</td>";
          }
          echo "</tr>";
          echo "</table>";
        } else {
          echo "la columna no existe en el array.";
        }
      ?>
    </body>
  </html>