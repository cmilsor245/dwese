<?
  require_once "Ave.php";

  class Pinguino extends Ave {
    public function getInfo() {
      echo "este es un pingüino<br />";
    }
    
    public function nadar() {
      echo "el pingüino está nadando<br />";
    }
    
    public function deslizarse() {
      echo "el pingüino se desliza sobre el hielo<br />";
    }
  }
?>