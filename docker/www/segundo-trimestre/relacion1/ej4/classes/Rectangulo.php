<?
  require_once "Poligono.php";

  class Rectangulo extends Poligono {
    private $base;
    private $altura;

    public function __construct($base, $altura) {
      $this -> setBase($base);
      $this -> setAltura($altura);
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