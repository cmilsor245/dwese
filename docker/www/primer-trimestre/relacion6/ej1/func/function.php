<!--
  @file: function.php
  @author: Christian Millán Soria
  @created: 19/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: function library for "ej1"
-->

<?
  /*
    @name: esCapicua
    @created: 19/10/2023
    @info: comprueba si un número es capicúa o no
    @param:
      - $num -> número a comprobar
    @return:
      - true -> si es capicúa
      - false -> si no es capicúa
  */
  function esCapicua($num) {
    $reverse_num = voltea($num);

    if ($reverse_num == $num) {
      return true;
    } else {
      return false;
    }

    // return $reverse_num == $num;
  }

  /* ------------------------------------------------------------- */

  /*
    @name: esPrimo
    @created: 19/10/2023
    @info: comprueba si un número es primo o no
    @param:
      - $num -> número a comprobar
    @return:
      - true -> si es primo
      - false -> si no es primo
  */
  function esPrimo($num) {
    for ($i = 2; $i < $num; $i++) {
      if ($num % $i == 0) {
        return false;
      }
    }
    return true;
  }

  /* ------------------------------------------------------------- */

  /*
    @name: siguientePrimo
    @created: 19/10/2023
    @info: devuelve el menor primo que es mayor que el número introducido por parámetro
    @param:
      - $num -> número
    @return:
      - $siguiente_primo -> el siguiente primo
  */
  function siguientePrimo($num) {
    $siguiente_primo = $num + 1;
    while (!esPrimo($siguiente_primo)) { // se utiliza la función para comprobar si es primo para no repetir código
      $siguiente_primo++;
    }
    return $siguiente_primo;
  }

  /* ------------------------------------------------------------- */

  /*
    @name: potencia
    @created: 19/10/2023
    @info: dada una base y un exponente, devuelve la potencia
    @param:
      - $base -> base
      - $exponente -> exponente
    @return:
      - $result -> resultado de la potencia
  */
  function potencia($base, $exponente) {
    $result = 1;
    for ($i = 0; $i < $exponente; $i++) {
      $result *= $base;
    }
    return $result;
  }

  /* ------------------------------------------------------------- */

  /*
    @name: digitos
    @created: 19/10/2023
    @info: cuenta el número de dígitos de un número entero
    @param:
      - $num -> número a contar
    @return:
      - $digitos -> número de dígitos
  */
  function digitos($num) {
    $digitos = 0;
    while ($num > 0) {
      $digitos++;
      $num = (int) ($num / 10);
    }
    return $digitos;
  }

  /* ------------------------------------------------------------- */

  /*
    @name: voltea
    @created: 19/10/2023
    @info: voltea un número
    @param:
      - $num -> número a voltear
    @return:
      - $volteado -> número volteado
  */
  function voltea($num) {
    $volteado = 0;
    while ($num > 0) {
      $volteado = $volteado * 10 + $num % 10;
      $num = (int) ($num / 10);
    }
    return $volteado;
  }

  /* ------------------------------------------------------------- */

  /*
    @name: digitoN
    @created: 19/10/2023
    @info: devuelve el dígito que está en la posición n de un número entero. se empieza contando por el 0 y de izquierda a derecha
    @param:
      - $num -> número a comprobar
      - $n -> posición del dígito a devolver
    @return:
      - $digito -> dígito
  */
  function digitoN($num, $n) {
    $num_str = (string)$num;
    if ($n >= 0 && $n < strlen($num_str)) { // se comprueba que el n sea válido
      $digito = $num_str[$n];
      return (int)$digito;
    } else {
      return -1; // esto indica que la posición está fuera de los límites
    }
  }

  /* ------------------------------------------------------------- */

  /*
    @name: posicionDeDigito
    @created: 19/10/2023
    @info: devuelve la posición de la primera ocurrencia de un dígito dentro de un número entero. si no se encuentra devuelve -1
    @param:
      - $num -> número a comprobar
      - $digito -> dígito
    @return:
      - $posicion -> primera ocurrencia
  */
  function posicionDeDigito($num, $digito) {
    $num_str = (string)$num;
    $posicion = -1;
    for ($i = 0; $i < strlen($num_str); $i++) {
      if ($num_str[$i] == $digito) {
        $posicion = $i;
        break;
      }
    }
    return $posicion;
  }

  /* ------------------------------------------------------------- */

  /*
    @name: quitarPorDetras
    @created: 19/10/2023
    @info: elimina un número n de dígitos de un número entero por detrás
    @param:
      - $num -> número a editar
      - $n -> número de dígitos a eliminar
    @return:
      - $num_editado -> número editado
  */
  function quitarPorDetras($num, $n) {
    $num_str = (string)$num;
    $num_str = substr($num_str, 0, -$n);
    return (int)$num_str;
  }

  /* ------------------------------------------------------------- */

  /*
    @name: quitarPorDelante
    @created: 19/10/2023
    @info: elimina un número n de dígitos de un número entero por delante
    @param:
      - $num -> número a editar
      - $n -> número de dígitos a eliminar
    @return:
      - $num_editado -> número editado
  */
  function quitarPorDelante($num, $n) {
    $num_str = (string)$num;
    $num_str = substr($num_str, $n);
    return (int)$num_str;
  }

  /* ------------------------------------------------------------- */

  /*
    @name: pegaPorDetras
    @created: 19/10/2023
    @info: añade un número n al final de un número entero
    @param:
      - $num -> numero a editar
      - $n -> dígito a añadir
    @return:
      - $num_editado -> numero editado
  */
  function pegarPorDetras($num, $n) {
    return (int)($num . $n); // se tratan como strings en su paréntesis y se convierten a int depués
  }

  /* ------------------------------------------------------------- */

  /*
    @name: pegarPorDelante
    @created: 19/10/2023
    @info: anade un número n al inicio de un número entero
    @param:
      - $num -> numero a editar
      - $n -> dígito a anadir
    @return:
      - $num_editado -> numero editado
  */
  function pegarPorDelante($num, $n) {
    return (int)($n . $num);
  }

  /* ------------------------------------------------------------- */

  /*
    @name: trozoDeNumero
    @created: 19/10/2023
    @info: devuelve el trozo de un número que se encuentra entre dos posiciones
    @param:
      - $num -> número
      - $posicionInicial -> primera posición
      - $posicionFinal -> segunda posición
    @return:
      - $trozo -> trozo
  */
  function trozoDeNumero($num, $posicionInicial, $posicionFinal) {
    $num_str = (string)$num;
    $trozo = substr($num_str, $posicionInicial, $posicionFinal);
    return (int)$trozo;
  }

  /* ------------------------------------------------------------- */

  /*
    @name: juntaNumeros
    @created: 19/10/2023
    @info: pega dos números para formar uno
    @param:
      - $num1 -> primer número
      - $num2 -> segundo número
    @return:
      - $num_junta -> número final
  */
  function juntaNumeros($num1, $num2) {
    return (int)($num1 . $num2);
  }
?>