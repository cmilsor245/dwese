<!--
  @file: test.php
  @author: Christian Millán Soria
  @created: 19/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: testing function library for "ej1"
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
        include("functions/function.php");

        echo "<h1>esCapicua()</h1>";
        echo "esCapicua(121): " . (esCapicua(121) ? "true" : "false") . "<br>";
        echo "esCapicua(123): " . (esCapicua(123) ? "true" : "false") . "<br>";

        echo "<hr />";

        /* ----------------------------------------------------- */

        echo "<h1>esPrimo()</h1>";
        echo "esPrimo(121): " . (esPrimo(121) ? "true" : "false") . "<br>";
        echo "esPrimo(13): " . (esPrimo(13) ? "true" : "false") . "<br>";

        echo "<hr />";

        /* ----------------------------------------------------- */

        echo "<h1>siguientePrimo()</h1>";
        echo "siguientePrimo(121): " . siguientePrimo(121) . "<br>";
        echo "siguientePrimo(13): " . siguientePrimo(13) . "<br>";

        echo "<hr />";

        /* ----------------------------------------------------- */

        echo "<h1>potencia()</h1>";
        echo "potencia(2, 3): " . potencia(2, 3) . "<br>";
        echo "potencia(3, 3): " . potencia(3, 3) . "<br>";

        echo "<hr />";

        /* ----------------------------------------------------- */

        echo "<h1>digitos()</h1>";
        echo "digitos(123): " . digitos(123) . "<br>";
        echo "digitos(1234): " . digitos(1234) . "<br>";

        echo "<hr />";

        /* ----------------------------------------------------- */

        echo "<h1>voltea()</h1>";
        echo "voltea(123): " . voltea(123) . "<br>";
        echo "voltea(1234): " . voltea(1234) . "<br>";

        echo "<hr />";

        /* ----------------------------------------------------- */

        echo "<h1>digitoN()</h1>";
        echo "digitoN(123, 1): " . digitoN(123, 1) . "<br>";
        echo "digitoN(1234, 3): " . digitoN(1234, 3) . "<br>";

        echo "<hr />";

        /* ----------------------------------------------------- */

        echo "<h1>posicionDeDigito()</h1>";
        echo "posicionDeDigito(123, 1): " . posicionDeDigito(123, 1) . "<br>";
        echo "posicionDeDigito(1234, 3): " . posicionDeDigito(1234, 3) . "<br>";

        echo "<hr />";

        /* ----------------------------------------------------- */

        echo "<h1>quitarPorDetras()</h1>";
        echo "quitarPorDetras(123, 1): " . quitarPorDetras(123, 1) . "<br>";
        echo "quitarPorDetras(1234, 3): " . quitarPorDetras(1234, 3) . "<br>";

        echo "<hr />";

        /* ----------------------------------------------------- */

        echo "<h1>quitarPorDelante()</h1>";
        echo "quitarPorDelante(123, 1): " . quitarPorDelante(123, 1) . "<br>";
        echo "quitarPorDelante(1234, 3): " . quitarPorDelante(1234, 3) . "<br>";

        echo "<hr />";

        /* ----------------------------------------------------- */

        echo "<h1>pegaPorDetras()</h1>";
        echo "pegaPorDetras(123, 1): " . pegarPorDetras(123, 1) . "<br>";
        echo "pegaPorDetras(1234, 3): " . pegarPorDetras(1234, 3) . "<br>";

        echo "<hr />";

        /* ----------------------------------------------------- */

        echo "<h1>pegaPorDelante()</h1>";
        echo "pegaPorDelante(123, 1): " . pegarPorDelante(123, 1) . "<br>";
        echo "pegaPorDelante(1234, 3): " . pegarPorDelante(1234, 3) . "<br>";

        echo "<hr />";

        /* ----------------------------------------------------- */

        echo "<h1>trozoDeNumero()</h1>";
        echo "trozoDeNumero(123, 1, 3): " . trozoDeNumero(123, 1, 3) . "<br>";
        echo "trozoDeNumero(1234, 1, 3): " . trozoDeNumero(1234, 1, 3) . "<br>";

        echo "<hr />";

        /* ----------------------------------------------------- */

        echo "<h1>juntaNumeros()</h1>";
        echo "juntaNumeros(123, 87834): " . juntaNumeros(123, 87834) . "<br>";
        echo "juntaNumeros(1234, 4432): " . juntaNumeros(1234, 4432) . "<br>";
      ?>
    </body>
  </html>