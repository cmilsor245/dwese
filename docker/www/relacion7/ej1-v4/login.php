<?
  session_start();

  include("includes/functions.php");

  if (!isset($_SESSION["correct_credentials"])) {
    $_SESSION["correct_credentials"] = false;
  }

  checkLoginFormVariables();

  if (isset($_SESSION["username-login"]) && isset($_SESSION["password-login"])) {
    $username = $_SESSION["username-login"];
    $password = hash("sha256", $_SESSION["password-login"]);

    if ($username === "test" && $password === hash("sha256", "test")) {
      $_SESSION["correct_credentials"] = true;
      header("Location: contenido.php");
    } else {
      unsetLoginVariables();
      echo "
        el usuario no existe o la contraseña es incorrecta
        <a href = \"views/login.view.php\"><button>intentar de nuevo</button></a>
        <a href = \"registro.php\"><button>registrarse</button></a>
        <a href = \"index.php\"><button>landing page</button></a>
      ";
    }
  } else {
    header("Location: views/login.view.php");
  }
?>