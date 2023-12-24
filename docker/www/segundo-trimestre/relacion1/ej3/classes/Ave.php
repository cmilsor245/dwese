<?
  require_once "Animal.php";

  abstract class Ave extends Animal {
    abstract public function getInfo();
    
    public function volar() {
      echo "el ave está volando<br />";
    }
    
    public function ponerHuevos() {
      echo "el ave pone huevos<br />";
    }
  }
?>