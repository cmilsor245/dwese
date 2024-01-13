<?
  require_once "classes/Gato.php";
  require_once "classes/Perro.php";
  require_once "classes/Canario.php";
  require_once "classes/Pinguino.php";
  require_once "classes/Lagarto.php";

  $gato = new Gato("ada");
  echo "<b>" . $gato -> getNombre() . "</b><br />";
  $gato -> moverse();
  $gato -> maullar();
  $gato -> cazar();
  $gato -> amamantar();
  echo "<hr />";

  $perro = new Perro("dairon");
  echo "<b>" . $perro -> getNombre() . "</b><br />";
  $perro -> moverse();
  $perro -> ladrar();
  $perro -> jugar();
  $perro -> darALuz();
  echo "<hr />";

  $canario = new Canario("chico");
  echo "<b>" . $canario -> getNombre() . "</b><br />";
  $canario -> moverse();
  $canario -> volar();
  $canario -> cantar();
  $canario -> ponerHuevos();
  echo "<hr />";

  $pinguino = new Pinguino("kowalski");
  echo "<b>" . $pinguino -> getNombre() . "</b><br />";
  $pinguino -> moverse();
  $pinguino -> nadar();
  $pinguino -> deslizarse();
  $pinguino -> ponerHuevos();
  echo "<hr />";

  $lagarto = new Lagarto("godzilla");
  echo "<b>" . $lagarto -> getNombre() . "</b><br />";
  $lagarto -> moverse();
  $lagarto -> cambiarPiel();
  $lagarto -> camuflarse();
  $lagarto -> emitirSonido();
?>