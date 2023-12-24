<?
  session_start();

  if (!isset($_SESSION["correct_credentials"])) {
    $_SESSION["correct_credentials"] = false;
  }

  if ($_SESSION["correct_credentials"]) {
    echo "
      usuario validado <a href = \"views/contenido.view.php\"><button>ir al contenido</button></a>
    ";
  } else {
    echo "no se ha iniciado sesión o las credenciales no son correctas <a href = \"index.php\"><button>landing page</button></a>";
  }
?>