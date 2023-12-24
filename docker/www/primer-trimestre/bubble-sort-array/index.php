<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 16/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: ejemplo de bubble sort
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>bubble sort</title>
    </head>
    <body>
      <?
        // función
        function bubble_sort($arrayAOrdenar) {
          $tamanoArray = count($arrayAOrdenar);

          for ($i = 0; $i < $tamanoArray; $i++) {
            for ($j = $i + 1; $j < $tamanoArray; $j++) {
              if ($arrayAOrdenar[$i] > $arrayAOrdenar[$j]) { // si la anterior es mayor que la siguiente se intercambia
                $aux = $arrayAOrdenar[$i];
                $arrayAOrdenar[$i] = $arrayAOrdenar[$j];
                $arrayAOrdenar[$j] = $aux;
              }
            }
          }

          return $arrayAOrdenar;
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

        $arrayAOrdenar = bubble_sort($arrayAOrdenar);

        echo "array ordenado : | ";
        foreach ($arrayAOrdenar as $value) {
          echo $value . " | ";
        }
      ?>
    </body>
  </html>