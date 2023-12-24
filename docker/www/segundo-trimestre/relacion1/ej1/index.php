<?
  require_once "classes/Persona.php";

  $persona = new Persona("christian", "millán soria", 22);

  echo $persona -> nombreCompleto();

  echo "<br />";

  if ($persona -> mayorEdad()) {
    echo "es mayor de edad";
  } else {
    echo "no es mayor de edad";
  }
?>