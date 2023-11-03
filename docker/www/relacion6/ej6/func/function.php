<!--
  @file: function.php
  @author: Christian Millán Soria
  @created: 19/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: function library for "ej6"
-->

<?
  /*
    @name: generaArrayInt
    @created: 19/10/2023
    @info: genera u array de tamaño n con números aleatorios entre "min" y "max"
    @param:
      - $min -> valor mínimo de los números aleatorios
      - $max -> valor máximo de los números aleatorios
      - $n -> tamaño del array
    @return:
      - $arrayGenerado -> array de números aleatorios
  */
  function generaArrayInt($min, $max, $n) {
    $arrayGenerado = [];
    for ($i = 0; $i < $n; $i++) {
      $arrayGenerado[] = rand($min, $max);
    }
    return $arrayGenerado;
  }

  /* ------------------------------------------------------- */

  /*
    @name: minimoArrayInt
    @created: 19/10/2023
    @info: obtiene el valor mínimo de un array
    @param:
      - $array -> array del que obtener el valor
    @return:
      - $minimo -> valor mínimo
  */
  function minimoArrayInt($array) {
    $minimo = $array[0];
    for ($i = 0; $i < count($array); $i++) {
      if ($array[$i] < $minimo) {
        $minimo = $array[$i];
      }
    }
    return $minimo;
  }

  /* ------------------------------------------------------- */

  /*
    @name: maximoArrayInt
    @created: 19/10/2023
    @info: obtiene el valor máximo de un array
    @param:
      - $array -> array del que obtener el valor
    @return:
      - $maximo -> valor máximo
  */
  function maximoArrayInt($array) {
    $maximo = $array[0];
    for ($i = 0; $i < count($array); $i++) {
      if ($array[$i] > $maximo) {
        $maximo = $array[$i];
      }
    }
    return $maximo;
  }

  /* ------------------------------------------------------- */

  /*
    @name: mediaArrayInt
    @created: 19/10/2023
    @info: devuleve la media de un array
    @param:
      - $array -> array del que obtener la media
    @return:
      - $media -> media
  */
  function mediaArrayInt($array) {
    $media = 0;
    for ($i = 0; $i < count($array); $i++) {
      $media += $array[$i];
    }
    return $media / count($array);
  }

  /* ------------------------------------------------------- */

  /*
    @name: estaEnArrayInt
    @created: 19/10/2023
    @info: indica si un número está o no en un array
    @param:
      - $array -> array
      - $num -> número a encontrar
    @return:
      - true -> si esta en el array
      - false -> si no esta en el array
  */
  function estaEnArrayInt($array, $num) {
    for ($i = 0; $i < count($array); $i++) {
      if ($array[$i] == $num) {
        return true;
      }
    }
    return false;
  }

  /* ------------------------------------------------------- */

  /*
    @name: posicionEnArray
    @created: 19/10/2023
    @info: devuelve el índice de un número en un array
    @param:
      - $array -> array
      - $num -> número a encontrar
    @return:
      - $i -> índice del número
      - -1 -> si no está en el array
  */
  function posicionEnArray($array, $num) {
    for ($i = 0; $i < count($array); $i++) {
      if ($array[$i] == $num) {
        return $i;
      }
    }
    return -1;
  }

  /* ------------------------------------------------------- */

  /*
    @name: volteaArrayInt
    @created: 19/10/2023
    @info: devuelve el array invertido
    @param:
      - $array -> array
    @return:
      - $arrayInvertido -> array invertido
  */
  function volteaArrayInt($array) {
    $arrayInvertido = [];
    for ($i = count($array) - 1; $i >= 0; $i--) {
      $arrayInvertido[] = $array[$i];
    }
    return $arrayInvertido;
  }

  /* ------------------------------------------------------- */

  /*
    @name: rotaDerechaArrayInt
    @created: 19/10/2023
    @info: Rota n posiciones a la derecha los números de un array
    @param:
      - $array -> array a rotar
      - $n -> número de posiciones a rotar
    @return:
      - $arrayRotado -> array rotado
  */

  function rotaDerechaArrayInt($array, $n) {
    $arrayRotado = [];
    $count = count($array);

    // si "n" es mayor que el tamaño del array, se calcula el resto para que no "desborde" el array - ejemplo: si "n" = 7 y el tamaño del array 5, sería lo mismo que rotar el array 2 posiciones únicamente
    if ($n >= $count) {
      $n = $n % $count;
    }

    for ($i = $count - $n; $i < $count; $i++) {
      $arrayRotado[] = $array[$i];
    }

    for ($i = 0; $i < $count - $n; $i++) {
      $arrayRotado[] = $array[$i];
    }

    return $arrayRotado;
}

  /* ------------------------------------------------------- */

  /*
    @name: rotaIzquierdaArrayint
    @created: 19/10/2023
    @info: Rota n posiciones a la izquierda los números de un array
    @param:
      - $array -> array a rotar
      - $n -> número de posiciones a rotar
    @return:
      - $arrayRotado -> array rotado
  */
  function rotaIzquierdaArrayint($array, $n) {
    $arrayRotado = [];
    $count = count($array);

    if ($n >= $count) {
      $n = $n % $count;
    }

    for ($i = $n; $i < $count; $i++) {
      $arrayRotado[] = $array[$i];
    }

    for ($i = 0; $i < $n; $i++) {
      $arrayRotado[] = $array[$i];
    }

    return $arrayRotado;
}
?>