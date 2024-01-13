<?
  require_once "Animal.php";

  class Lagarto extends Animal {
    public function getInfo() {
      echo "este es un lagarto<br />";
    }
    
    public function cambiarPiel() {
      echo "el lagarto está mudando de piel<br />";
    }
    
    public function camuflarse() {
      echo "el lagarto se está camuflando<br />";
    }
  }
?>