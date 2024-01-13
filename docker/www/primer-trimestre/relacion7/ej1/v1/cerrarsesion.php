<?
  session_start();

  session_destroy();

  echo "
    <p>sesión cerrada</p>
    <a href = \"index.php\"><button>landing page</button></a>
  ";
?>