<?
  setcookie("nombre_apellidos", "christian millán soria", time() + 60, "/");

  // TODO: recargar la página cuando pase el tiempo para comprobar el cambio
  if (isset($_COOKIE["nombre_apellidos"])) {
    echo "la cookie \"nombre_apellidos\" existe. valor: " . $_COOKIE["nombre_apellidos"];
  } else {
    echo "la cookie \"nombre_apellidos\" no existe";
  }
?>