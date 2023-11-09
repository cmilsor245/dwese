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
        } else {
          try {
            $host = "db";
            $dbUsername = "root";
            $dbPassword = "test";
            $dbName = "first_db";
            $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $statement = $conn -> prepare("SELECT * FROM user WHERE username = :username LIMIT 1");
            $statement -> execute(array(":username" => $username));
            $resultado = $statement -> fetch();

            if ($resultado) {
              unsetSignUpVariables();
              echo "
                usuario ya existente
                <a href = \"views/registro.view.php\"><button>intentar de nuevo</button></a>
                <a href = \"index.php\"><button>landing page</button></a>
              ";
            } else {
              $statement = $conn -> prepare("INSERT INTO user(username, password) values (:username, :password)");
              $statement -> execute(array(
                ":username" => $username,
                ":password" => $password
              ));

              // Verifica las credenciales en la base de datos y, si son válidas, inicia sesión.
              $statement = $conn -> prepare("SELECT * FROM user WHERE username = :username AND password = :password LIMIT 1");
              $statement -> execute(array(":username" => $username, ":password" => $password));
              $resultado = $statement -> fetch();

              if ($resultado) {
                $_SESSION["correct_credentials"] = true;
                $_SESSION["username-login"] = $username;
                header("Location: contenido.php");
              } else {
                echo "error inesperado al iniciar sesión después del registro.";
              }
            }
          } catch (PDOException $e) {
            echo "error: " . $e -> getMessage();
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