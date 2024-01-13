<!--
  @file: test.php
  @author: Christian Millán Soria
  @created: 19/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: testing function library for "ej6"
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>testing</title>
    </head>
    <body>
      <?
        include("func/function.php");

        echo "<h1>generaArrayInt()</h1>";
        echo "generaArrayInt(1, 10, 5): ";
        echo "[";
        $array = generaArrayInt(1, 10, 5);
        for ($i = 0; $i < count($array); $i++) {
          echo $array[$i];
          if ($i != count($array) - 1) {
            echo ", ";
          }
        }
        echo "]";

        echo "<br />";

        /* ------------------------------- */

        echo "generaArrayInt(100, 999, 13): ";
        echo "[";
        $array = generaArrayInt(100, 999, 13);
        for ($i = 0; $i < count($array); $i++) {
          echo $array[$i];
          if ($i != count($array) - 1) {
            echo ", ";
          }
        }
        echo "]";

        echo "<hr />";

        /* ------------------------------------------------------------------------------------------- */

        echo "<h1>minimoArrayInt()</h1>";
        echo "[";
        $array = generaArrayInt(1, 10, 5);
        for ($i = 0; $i < count($array); $i++) {
          echo $array[$i];
          if ($i != count($array) - 1) {
            echo ", ";
          }
        }
        echo "]";
        echo "<br />";
        echo "minimoArrayInt(\$array): " . minimoArrayInt($array);

        echo "<br />";

        /* ------------------------------- */

        echo "[";
        $array = generaArrayInt(100, 999, 13);
        for ($i = 0; $i < count($array); $i++) {
          echo $array[$i];
          if ($i != count($array) - 1) {
            echo ", ";
          }
        }
        echo "]";
        echo "<br />";
        echo "minimoArrayInt(\$array): " . minimoArrayInt($array);

        echo "<hr />";

        /* ------------------------------------------------------------------------------------------- */

        echo "<h1>maximoArrayInt()</h1>";
        echo "[";
        $array = generaArrayInt(1, 10, 5);
        for ($i = 0; $i < count($array); $i++) {
          echo $array[$i];
          if ($i != count($array) - 1) {
            echo ", ";
          }
        }
        echo "]";
        echo "<br />";
        echo "maximoArrayInt(\$array): " . maximoArrayInt($array);

        echo "<br />";

        /* ------------------------------- */

        echo "[";
        $array = generaArrayInt(100, 999, 13);
        for ($i = 0; $i < count($array); $i++) {
          echo $array[$i];
          if ($i != count($array) - 1) {
            echo ", ";
          }
        }
        echo "]";
        echo "<br />";
        echo "maximoArrayInt(\$array): " . maximoArrayInt($array);

        echo "<hr />";

        /* ------------------------------------------------------------------------------------------- */

        echo "<h1>mediaArrayInt()</h1>";
        echo "[";
        $array = generaArrayInt(1, 10, 5);
        for ($i = 0; $i < count($array); $i++) {
          echo $array[$i];
          if ($i != count($array) - 1) {
            echo ", ";
          }
        }
        echo "]";
        echo "<br />";
        echo "mediaArrayInt(\$array): " . mediaArrayInt($array);

        echo "<br />";

        /* ------------------------------- */

        echo "[";
        $array = generaArrayInt(100, 999, 13);
        for ($i = 0; $i < count($array); $i++) {
          echo $array[$i];
          if ($i != count($array) - 1) {
            echo ", ";
          }
        }
        echo "]";
        echo "<br />";
        echo "mediaArrayInt(\$array): " . mediaArrayInt($array);

        echo "<hr />";

        /* ------------------------------------------------------------------------------------------- */

        echo "<h1>estaEnArrayInt()</h1>";
        echo "[";
        $array = generaArrayInt(1, 10, 5);
        for ($i = 0; $i < count($array); $i++) {
          echo $array[$i];
          if ($i != count($array) - 1) {
            echo ", ";
          }
        }
        echo "]";
        echo "<br />";
        echo "estaEnArrayInt(\$array, 5): ";
        if (estaEnArrayInt($array, 5)) {
          echo "true";
        } else {
          echo "false";
        }

        echo "<br />";

        /* ------------------------------- */

        echo "[";
        $array = generaArrayInt(100, 999, 13);
        for ($i = 0; $i < count($array); $i++) {
          echo $array[$i];
          if ($i != count($array) - 1) {
            echo ", ";
          }
        }
        echo "]";
        echo "<br />";
        echo "estaEnArrayInt(\$array, 113): ";
        if (estaEnArrayInt($array, 113)) {
          echo "true";
        } else {
          echo "false";
        }

        echo "<hr />";

        /* ------------------------------------------------------------------------------------------- */

        echo "<h1>posicionEnArray()</h1>";
        echo "[";
        $array = generaArrayInt(1, 10, 5);
        for ($i = 0; $i < count($array); $i++) {
          echo $array[$i];
          if ($i != count($array) - 1) {
            echo ", ";
          }
        }
        echo "]";
        echo "<br />";
        echo "posicionEnArray(\$array, 5): ";
        echo posicionEnArray($array, 5);

        echo "<br />";

        /* ------------------------------- */

        echo "[";
        $array = generaArrayInt(100, 999, 13);
        for ($i = 0; $i < count($array); $i++) {
          echo $array[$i];
          if ($i != count($array) - 1) {
            echo ", ";
          }
        }
        echo "]";
        echo "<br />";
        echo "posicionEnArray(\$array, 113): ";
        echo posicionEnArray($array, 113);

        echo "<hr />";

        /* ------------------------------------------------------------------------------------------- */

        echo "<h1>volteaArrayInt()</h1>";
        $array_original = generaArrayInt(1, 10, 5);
        $array_invertido = volteaArrayInt($array_original);
        echo "generaArrayInt(1, 10, 5) -> original: [";
        for ($i = 0; $i < count($array_original); $i++) {
          echo $array_original[$i];
          if ($i != count($array_original) - 1) {
            echo ", ";
          }
        }
        echo "]";

        echo "<br />";

        /* ------------------------------- */

        echo "volteaArrayInt(\$array_original) -> invertido: [";
        for ($i = 0; $i < count($array_invertido); $i++) {
          echo $array_invertido[$i];
          if ($i != count($array_invertido) - 1) {
            echo ", ";
          }
        }
        echo "]";

        echo "<hr />";

        /* ------------------------------------------------------------------------------------------- */

        echo "<h1>rotaDerechaArrayInt()</h1>";
        $array_original = generaArrayInt(1, 10, 5);
        $array_rota_derecha = rotaDerechaArrayInt($array_original, 1);
        echo "generaArrayInt(1, 10, 5) -> original: [";
        for ($i = 0; $i < count($array_original); $i++) {
          echo $array_original[$i];
          if ($i != count($array_original) - 1) {
            echo ", ";
          }
        }
        echo "]";

        echo "<br />";

        /* ------------------------------- */

        echo "rotaDerechaArrayInt(\$array_original, 1) -> invertido: [";
        for ($i = 0; $i < count($array_rota_derecha); $i++) {
          echo $array_rota_derecha[$i];
          if ($i != count($array_rota_derecha) - 1) {
            echo ", ";
          }
        }
        echo "]";

        echo "<hr />";

        /* ------------------------------------------------------------------------------------------- */

        echo "<h1>rotaIzquierdaArrayint()</h1>";
        $array_original = generaArrayInt(1, 10, 5);
        $array_rota_izquierda = rotaIzquierdaArrayint($array_original, 1);
        echo "generaArrayInt(1, 10, 5) -> original: [";
        for ($i = 0; $i < count($array_original); $i++) {
          echo $array_original[$i];
          if ($i != count($array_original) - 1) {
            echo ", ";
          }
        }
        echo "]";

        echo "<br />";

        /* ------------------------------- */

        echo "rotaIzquierdaArrayint(\$array_original, 1) -> invertido: [";
        for ($i = 0; $i < count($array_rota_izquierda); $i++) {
          echo $array_rota_izquierda[$i];
          if ($i != count($array_rota_izquierda) - 1) {
            echo ", ";
          }
        }
        echo "]";
      ?>
    </body>
  </html>