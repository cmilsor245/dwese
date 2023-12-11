<?
  require_once "Persona.php";

  $persona = new Persona("christian", "millán soria", 22);

  $persona -> saludar();

  echo "<br />" . $persona;
?>