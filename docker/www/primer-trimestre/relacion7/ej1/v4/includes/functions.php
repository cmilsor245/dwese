<?
  function unsetLoginVariables() {
    unset($_SESSION["username-login"]);
    unset($_SESSION["password-login"]);
  }

  function unsetSignUpVariables() {
    unset($_SESSION["username-signup"]);
    unset($_SESSION["password-signup"]);
    unset($_SESSION["password-signup-confirm"]);
  }

  function checkLoginFormVariables() {
    if (isset($_POST["username-login"]) && isset($_POST["password-login"])) {
      $_SESSION["username-login"] = $_POST["username-login"];
      $_SESSION["password-login"] = $_POST["password-login"];
    }
  }

  function checkSignUpFormVariables() {
    if (isset($_POST["username-signup"]) && isset($_POST["password-signup"]) && isset($_POST["password-signup-confirm"])) {
      $_SESSION["username-signup"] = $_POST["username-signup"];
      $_SESSION["password-signup"] = $_POST["password-signup"];
      $_SESSION["password-signup-confirm"] = $_POST["password-signup-confirm"];
    }
  }

  /* ------------------------------------------------------------------------------------------------------ */

  function login($username, $password) {
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

  function registerUser($username, $password) {
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
?>