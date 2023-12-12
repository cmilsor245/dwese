<?
  class Animal {
    protected $nombre;

    public function __construct($nombre) {
      $this -> nombre = $nombre;
    }

    public function getNombre() {
      return $this -> nombre;
    }

    public function moverse() {
      echo "el animal se está moviendo<br />";
    }

    public function emitirSonido() {
      echo "el animal emite un sonido<br />";
    }

    public function getInfo() {
      echo "este es un animal<br />";
    }
  }
?>