<?
  require_once "Mamifero.php";

  class Gato extends Mamifero {
    public function getInfo() {
      echo "este es un gato<br />";
    }
    
    public function maullar() {
      echo "el gato está maullando<br />";
    }
    
    public function cazar() {
      echo "el gato está cazando<br />";
    }
  }
?>