<?
  require_once "Poligono.php";

  class Rectangulo extends Poligono {
    private $base;
    private $altura;

    public function __construct($elemento1, $elemento2) {
      $this -> setBase($elemento1);
      $this -> setAltura($elemento2);
    }

    private function setBase($base) {
      $this -> base = $base;
    }

    private function setAltura($altura) {
      $this -> altura = $altura;
    }

    public function calcularArea() {
      return $this -> base * $this -> altura;
    }
  }
?>