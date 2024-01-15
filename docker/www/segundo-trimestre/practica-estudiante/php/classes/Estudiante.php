<?
  class Estudiante {
    private $nombre;
    private $edad;
    private $curso;
    private $notas = array();

    public function __construct($nombre, $edad, $curso) {
      $this -> nombre = $nombre;
      $this -> edad = $edad;
      $this -> curso = $curso;
    }

    public function agregarNota($nota) {
      $this -> notas[] = $nota;
    }

    public function obtenerMedia() {
      $total = 0;
      foreach ($this -> notas as $nota) {
        $total += $nota;
      }
      return $total / count($this -> notas);
    }

    public function getNombre() {
      return $this -> nombre;
    }

    public function getEdad() {
      return $this -> edad;
    }

    public function getCurso() {
      return $this -> curso;
    }
  }
?>