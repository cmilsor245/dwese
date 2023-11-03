<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 02/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: script for "ej9"
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>resolución de la ecuación</title>
    </head>
    <body>
      <?
        // código extraído de "https://www.artesaniaweb.es/articulo.php?titulo=ecuacion-de-segundo-grado-con-php-bvupa" y adaptado por mi
        /* $a = $_GET["a"];
        $b = $_GET["b"];
        $c = $_GET["c"];
        $rd = 4; // número de decimales

        function ecu2grado($a, $b, $c, $rd) {
          // cálculos más básicos de la ecuación
          $menosB = $b * -(1);
          $oper1 = pow($b, 2);
          $oper2 = 4 * $a * $c;
          $resta = $oper1 - $oper2;

          if ($resta < 0) {
            return "No hay soluciones reales"; // si el discriminante (resta) es negativo, no hay soluciones reales
          };

          $raiz = sqrt($resta);
          $dosa = 2 * $a;

          $result1 = round(($menosB + $raiz) / $dosa, $rd);
          $result2 = round(($menosB - $raiz) / $dosa, $rd);

          $arrayResultados = array(1 => $result1, 2 => $result2); // se almacenan los resultados en un array
          return $arrayResultados;
        };

        $resultadosEcuacion = ecu2grado($a, $b, $c, $rd);

        if (is_array($resultadosEcuacion)) {
          echo "<p>Ecuación: " . $a . "x<sup>2</sup> + " . $b . "x + " . $c . " = 0 </p>";
          echo "<p>Solución 1 = " . $resultadosEcuacion[1] . "</p>";
          echo "<p>Solución 2 = " . $resultadosEcuacion[2] . "</p>";
        } else {
          echo "<p>Ecuación: " . $a . "x<sup>2</sup> + " . $b . "x + " . $c . " = 0 </p>";
          echo "<p>" . $resultadosEcuacion . "</p>";
        }; */

        /* ----------------------------------------------------------------------------------------------- */

        if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["a"]) && isset($_GET["b"]) && isset($_GET["c"])) {
          $a = $_GET["a"];
          $b = $_GET["b"];
          $c = $_GET["c"];

          $discriminant = $b * $b - 4 * $a * $c;

          if ($discriminant > 0) {
            $x1 = (-$b + sqrt($discriminant)) / (2 * $a);
            $x2 = (-$b - sqrt($discriminant)) / (2 * $a);
            echo "Las soluciones son x1 = $x1 y x2 = $x2.";
          } elseif ($discriminant == 0) {
            $x1 = -$b / (2 * $a);
            echo "La solución es x1 = $x1.";
          } else {
            echo "La ecuación no tiene soluciones reales.";
          }
        }
      ?>
    </body>
  </html>