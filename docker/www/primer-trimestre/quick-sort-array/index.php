<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 16/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: ejemplo de quick sort
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>quick sort</title>
    </head>
    <body>
      <?
        // función
        function quick_sort($arrayAOrdenar) {
          $tamanoArray = count($arrayAOrdenar);

          if ($tamanoArray <= 1) {
            return $arrayAOrdenar;
          }

          $pivot = $arrayAOrdenar[0];

          /* --------------------------------------- */

          $left = array();
          $right = array();

          // alternativa más directa
          // $left = $right = array();

          /* --------------------------------------- */

          for ($i = 1; $i < $tamanoArray; $i++) { // empieza por la segunda posición, ya que la primera es el pivote
            if ($arrayAOrdenar[$i] < $pivot) {
              $left[] = $arrayAOrdenar[$i];
            } else {
              $right[] = $arrayAOrdenar[$i];
            }
          }

          return array_merge(quick_sort($left), array($pivot), quick_sort($right));
        }

        /* --------------------------------------------------------------------------- */

        // test
        $arrayAOrdenar = array();

        for ($i = 0; $i < 10; $i++) {
          $arrayAOrdenar[] = rand(1, 100);
        }

        /* ------------------------------------ */

        echo "array original : | ";
        foreach ($arrayAOrdenar as $value) {
          echo $value . " | ";
        }
        echo "<br /><br />";

        /* ------------------------------------ */

        $arrayAOrdenar = quick_sort($arrayAOrdenar);

        echo "array ordenado : | ";
        foreach ($arrayAOrdenar as $value) {
          echo $value . " | ";
        }
      ?>
    </body>
  </html>