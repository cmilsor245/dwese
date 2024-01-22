<?
  class EstudianteGraduado extends Estudiante {
    private $nivel;

    public function __construct($nombre, $edad, $curso, $nivel) {
      parent::__construct($nombre, $edad, $curso);
      $this -> nivel = $nivel;
    }

    public function getNivel() {
      return $this -> nivel;
    }

    public function comprobacionNivel($nivel) {
      if ($nivel === 'doctorado' || $nivel === 'posgrado') {
        return true;
      } else {
        return false;
      }
    }
  }
?>