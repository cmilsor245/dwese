<?
  function obtenerCartaAleatoria(&$cartas) {
    $indice = array_rand($cartas);
    $carta = $cartas[$indice];

    unset($cartas[$indice]);

    return $carta;
  }
?>