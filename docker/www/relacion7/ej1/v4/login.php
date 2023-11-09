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
          $host = "db";
          $dbUsername = "root";
          $dbPassword = "test";
          $dbName = "first_db";
          $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
          $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $statement = $conn -> prepare("SELECT * FROM user WHERE username = :username AND password = :password LIMIT 1");
          $statement -> execute(array(":username" => $username, ":password" => $password));
          $resultado = $statement -> fetch();

          if ($resultado) {
            $_SESSION["correct_credentials"] = true;
            $_SESSION["username-login"] = $username;
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
        } catch (PDOException $e) {
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