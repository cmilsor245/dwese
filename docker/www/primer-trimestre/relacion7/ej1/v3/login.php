<?
  session_start();

  include("includes/functions.php");

  if (!isset($_SESSION["correct_credentials"])) {
    $_SESSION["correct_credentials"] = false;
  }

  checkLoginFormVariables();

  if (!$_SESSION["correct_credentials"]) {
    if (isset($_SESSION["username-login"]) && isset($_SESSION["password-login"])) {
      $username = $_SESSION["username-login"];
      $password = hash("sha256", $_SESSION["password-login"]);

      if ($username === "" || $password === "") {
        unsetLoginVariables();
        echo "
          el usuario o la contraseña están vacíos
          <a href = \"views/login.view.php\"><button>intentar de nuevo</button></a>
          <a href = \"registro.php\"><button>registrarse</button></a>
          <a href = \"index.php\"><button>landing page</button></a>
        ";
      } else {
        try {
          login($username, $password);
        } catch (Exception $e) {
          echo "error: " . $e -> getMessage();
        }
      }
    } else {
      header("Location: views/login.view.php");
    }
  } else {
    echo "
      ya hay una sesión iniciada
      <a href = \"contenido.php\"><button>ir al contenido</button></a>
      <a href = \"index.php\"><button>landing page</button></a>
    ";
  }
?>