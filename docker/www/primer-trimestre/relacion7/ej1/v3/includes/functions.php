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

  /* ---------------------------------------------------------------------------------------------------------------- */

  function login($username, $password) {
    $conn = connectToDatabase();

    $statement = $conn -> prepare("SELECT * FROM user WHERE username = ? AND password = ? LIMIT 1");
    $statement -> bind_param("ss", $username, $password);
    $statement -> execute();
    $resultado = $statement -> get_result() -> fetch_assoc();

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
  }

  function connectToDatabase() {
    $host = "db";
    $dbUsername = "root";
    $dbPassword = "test";
    $dbName = "first_db";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
    if ($conn -> connect_error) {
      die("connection failed: " . $conn -> connect_error);
    }
    return $conn;
  }

  function getUserByUsername($conn, $username) {
    $statement = $conn -> prepare("SELECT * FROM user WHERE username = ? LIMIT 1");
    $statement -> bind_param("s", $username);
    $statement -> execute();
    $resultado = $statement -> get_result() -> fetch_assoc();
    return $resultado;
  }

  function insertUser($conn, $username, $password) {
    $statement = $conn -> prepare("INSERT INTO user (username, password) VALUES (?, ?)");
    $statement -> bind_param("ss", $username, $password);
    $statement -> execute();
  }

  function getUserByUsernameAndPassword($conn, $username, $password) {
    $statement = $conn -> prepare("SELECT * FROM user WHERE username = ? AND password = ? LIMIT 1");
    $statement -> bind_param("ss", $username, $password);
    $statement -> execute();
    $resultado = $statement -> get_result() -> fetch_assoc();
    return $resultado;
  }
?>