<?
  require_once "classes/Triangulo.php";
  require_once "classes/Cuadrado.php";
  require_once "classes/Rectangulo.php";

  $triangulo = new Triangulo(3, 4);
  echo "área triángulo: " . $triangulo -> calcularArea() . "<br />";

  $cuadrado = new Cuadrado(5);
  echo "área cuadrado: " . $cuadrado -> calcularArea() . "<br />";

  $rectangulo = new Rectangulo(6, 7);
  echo "área rectángulo: " . $rectangulo -> calcularArea() . "<br />";
?>