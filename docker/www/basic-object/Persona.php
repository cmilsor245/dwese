<?
  class Persona {
    public $nombre;
    public $apellidos;
    public $edad;

    public function __construct($nombre, $apellidos, $edad) {
      $this -> nombre = $nombre;
      $this -> apellidos = $apellidos;
      $this -> edad = $edad;
    }

    public function saludar() {
      echo "hola " . $this -> nombre . " " . $this -> apellidos . " de " . $this -> edad . " años";
    }

    public function __toString() {
      $message ="este es el método \"toString()\" personalizado de " . $this -> nombre . " " . $this -> apellidos;
      return $message;
    }
  }
?>