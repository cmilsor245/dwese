<?
  require_once "Animal.php";

  abstract class Mamifero extends Animal {
    abstract public function getInfo();

    public function amamantar() {
      echo "el mamífero está amamantando a su cría<br />";
    }

    public function darALuz() {
      echo "el mamífero dio a luz<br />";
    }
  }
?>