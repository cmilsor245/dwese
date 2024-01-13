<?
  session_start();

  if (isset($_SESSION["username-login"])) {
    echo "
      <p>usuario correcto: " . $_SESSION["username-login"]. "</p>
      <p>contraseña correcta: " . $_SESSION["password-login"]. "</p>
      <a href = \"views/contenido.view.php\"><button>content page</button></a>
      <a href = \"index.php\"><button>landing page</button></a>
    ";
  } else {
    echo "
      <p>no hay usuario</p>
      <a href = \"views/login.view.php\"><button>login</button></a>
      <a href = \"views/registro.view.php\"><button>sign up</button></a>
      <a href = \"index.php\"><button>landing page</button></a>
    ";
  }
?>