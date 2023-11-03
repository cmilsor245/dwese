<?
  session_start();

  if (isset($_POST["username-login"]) || isset($_POST["password-login"])) {
    $_SESSION["username-login"] = $_POST["username-login"];
    $_SESSION["password-login"] = $_POST["password-login"];
    $hashed_password_login = hash("sha512", $_SESSION["password-login"]);

    if ($_SESSION["username-login"] === "test" && hash("sha512", "test") === $hashed_password_login) {
      header("Location: contenido.php");
    }
  }

  echo "
    <p>usuario incorrecto</p>
    <a href = \"views/registro.view.php\"><button>sign up</button></a>
  ";
?>