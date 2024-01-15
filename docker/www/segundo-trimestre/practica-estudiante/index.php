<?
  require_once 'php/classes/Estudiante.php';
  require_once 'php/classes/EstudianteGraduado.php';

  $estudiante1 = new Estudiante('Juan', 25, '1º');
  $estudiante2 = new Estudiante('Laura', 29, '2º');

  $estudiante1 -> agregarNota(9.87);
  $estudiante1 -> agregarNota(8.45);
  $estudiante1 -> agregarNota(10);

  $estudiante2 -> agregarNota(6);
  $estudiante2 -> agregarNota(7.5);
  $estudiante2 -> agregarNota(9);

  echo '
    El primer estudiante se llama <strong>'. $estudiante1 -> getNombre(). '</strong> y tiene <strong>'. $estudiante1 -> getEdad() . '</strong> años. Su curso es <strong>' . $estudiante1 -> getCurso() . '</strong>. Su nota media es de <strong>'. $estudiante1 -> obtenerMedia() . '</strong>.

    <br /><br />

    El segundo estudiante se llama <strong>'. $estudiante2 -> getNombre(). '</strong> y tiene <strong>'. $estudiante2 -> getEdad() . '</strong> años. Su curso es <strong>' . $estudiante2 -> getCurso() . '</strong>. Su nota media es de <strong>'. $estudiante2 -> obtenerMedia(). '</strong>.
  ';

  /* --------------------------------------------------------------------------------------------------------------------------------- */

  $estudiante_graduado1 = new EstudianteGraduado('Antonio', 22, '4º', 'doctorado');
  $estudiante_graduado2 = new EstudianteGraduado('María', 23, '4º', 'posgrado');

  $estudiante_graduado1 -> agregarNota(9.69);
  $estudiante_graduado1 -> agregarNota(9);
  $estudiante_graduado1 -> agregarNota(10);

  $estudiante_graduado2 -> agregarNota(10);
  $estudiante_graduado2 -> agregarNota(9.4);
  $estudiante_graduado2 -> agregarNota(10);

  echo '
    <hr />

    El primer estudiante graduado se llama <strong>'. $estudiante_graduado1 -> getNombre(). '</strong> y tiene <strong>'. $estudiante_graduado1 -> getEdad().'</strong> años. Su curso es <strong>' . $estudiante_graduado1 -> getCurso() . '</strong>. Su nota media es de <strong>'. $estudiante_graduado1 -> obtenerMedia(). '</strong>. Su nivel es <strong>'. $estudiante_graduado1 -> getNivel() . '</strong>.

    <br /><br />

    El segundo estudiante graduado se llama <strong>'. $estudiante_graduado2 -> getNombre(). '</strong> y tiene <strong>'. $estudiante_graduado2 -> getEdad().'</strong> años. Su curso es <strong>' . $estudiante_graduado2 -> getCurso() . '</strong>. Su nota media es de <strong>'. $estudiante_graduado2 -> obtenerMedia(). '</strong>. Su nivel es <strong>'. $estudiante_graduado2 -> getNivel() . '</strong>.
  ';

  /* --------------------------------------------------------------------------------------------------------------------------------- */

  // prueba de la clase estudiantegraduado -> introducir un estudiante con un nivel no válido
  $estudiante_graduado3 = new EstudianteGraduado('Lucas', 33, '3º', 'nivel_invalido');

  $estudiante_graduado3 -> agregarNota(4);
  $estudiante_graduado3 -> agregarNota(5.75);
  $estudiante_graduado3 -> agregarNota(7);

  echo '
    <hr />

    El tercer estudiante graduado se llama <strong>'. $estudiante_graduado3 -> getNombre(). '</strong> y tiene <strong>'. $estudiante_graduado3 -> getEdad().'</strong> años. Su curso es <strong>' . $estudiante_graduado3 -> getCurso() . '</strong>. Su nota media es de <strong>'. $estudiante_graduado3 -> obtenerMedia(). '</strong>.
  ';

  if ($estudiante_graduado3 -> comprobacionNivel($estudiante_graduado3 -> getNivel())) {
    echo ' Su nivel es <strong>'. $estudiante_graduado3 -> getNivel() . '</strong>';
  } else {
    echo '
      <br />

      El nivel introducido para este estudiante no es válido ("<strong>'. $estudiante_graduado3 -> getNivel(). '</strong>"). Los niveles válidos son: <strong>doctorado</strong> y <strong>posgrado</strong>.
    ';
  }
?>