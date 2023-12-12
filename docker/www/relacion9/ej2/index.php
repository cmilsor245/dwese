<?
  require_once "classes/Session.php";

  $session = new Session("name", "christian");

  echo "el valor del atributo \"name\" es: " . $session -> getAttribute("name");

  echo "<br />";

  $session -> deleteAttribute("name");
  if ($session -> getAttribute("name") == null) {
    echo "el atributo \"name\" ha sido eliminado";
  } else {
    echo "el atributo \"name\" no ha sido eliminado";
  }

  echo "<br />";

  $session -> destroySession();
  if (session_status() == PHP_SESSION_NONE) {
    echo "la sesion ha sido eliminada";
  } else {
    echo "la sesion no ha sido eliminada";
  }
?>