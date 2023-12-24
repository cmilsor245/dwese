<!--
  @file: function.php
  @author: Christian Millán Soria
  @created: 19/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: testing function library for "ej7"
-->

<?
  /*
    @name: generaArrayBilnt
    @created: 19/10/2023
    @info: genera un array bidimensional de enteros aleatorios
    @param:
      - n -> número de filas
      - m -> número de columnas
      - min -> número mínimo
      - max -> número máximo
    @return:
      - $array_bidimensional -> array generado
  */
  function generaArrayBilnt($n, $m, $min, $max) {
    $array_bidimensional = [];
    for($i = 0; $i < $n; $i++){
      for($j = 0; $j < $m; $j++){
        $array_bidimensional[$i][$j] = rand($min, $max);
      }
    }

    return $array_bidimensional;
  }

  /* ----------------------------------------------------------------- */

  /*
    @name: filaDeArrayBilnt
    @created: 24/10/2023
    @info: devuelve la fila i-ésima de un array bidimensional
    @param:
      - fila -> fila a buscar
      - array_bidimensional -> array del que se extrae
    @return:
      - $array_bidimensional[$fila] -> fila seleccionada
      - null -> si la fila no existe
  */
  function filaDeArrayBilnt($fila, $array_bidimensional) {
    if (isset($array_bidimensional[$fila])) {
      return $array_bidimensional[$fila];
    } else {
      return null;
    }
  }

  /* ----------------------------------------------------------------- */

  /*
  @name: columnaDeArrayBilnt
  @created: 24/10/2023
  @info: devuelve la columna i-ésima de un array bidimensional
  @param:
    - columna -> columna a buscar
    - array_bidimensional -> array del que se extrae
  @return:
    - $columna_seleccionada -> columna seleccionada
    - null -> si la columna no existe
*/
function columnaDeArrayBilnt($columna, $array_bidimensional) {
  $columna_seleccionada = [];

  if ($columna >= 0 && $columna < count($array_bidimensional[0])) {
    foreach ($array_bidimensional as $fila) {
      $columna_seleccionada[] = $fila[$columna];
    }
    return $columna_seleccionada;
  } else {
    return null;
  }
}
?>