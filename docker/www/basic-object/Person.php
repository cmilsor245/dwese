<?
  class Person {
    public $name;
    public $last_name;
    public $age;

    public function __construct($name, $last_name, $age) {
      $this -> name = $name;
      $this -> last_name = $last_name;
      $this -> age = $age;
    }

    public function greet() {
      echo "hola " . $this -> name . " " . $this -> last_name . " de " . $this -> age . " años";
    }

    public function __toString() {
      $message ="este es el método \"toString()\" personalizado de " . $this -> name . " " . $this -> last_name;
      return $message;
    }
  }
?>