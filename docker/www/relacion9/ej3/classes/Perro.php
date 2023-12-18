<?
  require_once "Mamifero.php";

  class Perro extends Mamifero {
    public function getInfo() {
      echo "este es un perro<br />";
    }
    
    public function ladrar() {
      echo "el perro está ladrando<br />";
    }
    
    public function jugar() {
      echo "el perro está jugando<br />";
    }
}
?>