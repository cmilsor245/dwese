<?
  session_start();

  if (isset($_POST["username-sign-up"]) && isset($_POST["password-sign-up"]) && isset($_POST["password2-sign-up"])) {
    $_SESSION["username-sign-up"] = $_POST["username-sign-up"];
    $_SESSION["password-sign-up"] = $_POST["password-sign-up"];
    $_SESSION["password2-sign-up"] = $_POST["password2-sign-up"];
    $hashed_password_sign_up = hash("sha512", $_SESSION["password-sign-up"]);
    $hased_password2_sign_up = hash("sha512", $_SESSION["password2-sign-up"]);

    if ($hashed_password_sign_up !== $hased_password2_sign_up) {
      echo "
        <p>las contraseñas no coinciden</p>
        <br />
        <a href = \"views/registro.view.php\"><button>intentarlo de nuevo</button></a>
      ";
    } else {
      if ($_SESSION["username-sign-up"] === "test" && hash("sha512", "test") === $hashed_password_sign_up) {
        echo "
          <p>el usuario ya existe</p>
          <a href = \"views/login.view.php\"><button>login</button></a>
        ";
        session_destroy();
      } else {
        echo "
          <p>usuario inválido</p>
          <a href = \"views/registro.view.php\"><button>intentarlo de nuevo</button></a>
        ";
      }
    }
  }
?>