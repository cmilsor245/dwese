<?
  session_start();

  include("includes/functions.php");

  if (!isset($_SESSION["correct_credentials"])) {
    $_SESSION["correct_credentials"] = false;
  }

  checkSignUpFormVariables();

  if (!$_SESSION["correct_credentials"]) {
    if (isset($_SESSION["username-signup"]) && isset($_SESSION["password-signup"]) && isset($_SESSION["password-signup-confirm"])) {
      if ($_SESSION["password-signup"] === $_SESSION["password-signup-confirm"]) {
        $username = $_SESSION["username-signup"];
        $password = hash("sha256", $_SESSION["password-signup"]);

        if ($username === "" || $password === "") {
          unsetSignUpVariables();
          echo "
            el usuario o la contraseña están vacíos
            <a href = \"views/registro.view.php\"><button>intentar de nuevo</button></a>
            <a href = \"index.php\"><button>landing page</button></a>
          ";
        }else {
          if ($username === "test" && $password === hash("sha256", "test")) {
            echo "
              el usuario ya existe
              <a href = \"login.php\"><button>iniciar sesión</button></a>
              <a href = \"index.php\"><button>landing page</button></a>
            ";
          } else {
            unsetSignUpVariables();
            echo "
              usuario no disponible
              <a href = \"views/registro.view.php\"><button>intentar de nuevo</button></a>
              <a href = \"index.php\"><button>landing page</button></a>
            ";
          }
        }
      } else {
        unsetSignUpVariables();
        echo "
          las contraseñas no coinciden
          <a href = \"views/registro.view.php\"><button>intentar de nuevo</button></a>
          <a href = \"index.php\"><button>landing page</button></a>
        ";
      }
    } else {
      header("Location: views/registro.view.php");
    }
  } else {
    echo "
      ya hay una sesión iniciada
      <a href = \"contenido.php\"><button>ir al contenido</button></a>
      <a href = \"cerrarsesion.php\"><button>cerrar sesión</button></a>
    ";
  }
?>