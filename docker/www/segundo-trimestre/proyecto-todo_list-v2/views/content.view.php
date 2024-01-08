<?
  session_start();

  include "../php/includes/connection-functions.php";

  if (!isset($_SESSION["logged_in"])) {
    $_SESSION["logged_in"] = false;
  }
?>

<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8" />
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
    <title>TODO LIST</title>
    <link rel = "stylesheet" href = "../css/general.css" />
    <link rel = "stylesheet" href = "../css/content.css" />
    <link rel = "stylesheet" href = "../css/method-error.css" />
  </head>
  <body>
    <div class = "navbar">
      <div class = "navbar-side-left">
        <?
          if ($_SESSION["logged_in"]) {
            echo "
              <a href = \"create-new-todo.html\"><img src = \"../icons/add.svg\" alt = \"sign out icon\" /></a>
              <a href = \"create-new-todo.html\"><span class = \"navbar-side-text\">crear nueva tarea</span></a>
            ";
          }
        ?>
      </div>

      <h1 class = "page-title">todo list</h1>

      <div class = "navbar-side">
        <?
          if ($_SESSION["logged_in"]) {
            echo "
            <a href = \"../php/sign-out.php\"><img src = \"../icons/sign-out.svg\" alt = \"sign out icon\" /></a>
            <a href = \"../php/sign-out.php\"><span class = \"navbar-side-text\">cerrar sesión</span></a>
            ";
          }
        ?>
      </div>
    </div>

    <?
      if ($_SESSION["logged_in"]) {
        $user_name = obtainUserName($_SESSION["user_id"]);

        echo "<h2 class = \"page-subtitle\">bienvenid@, $user_name</h2>";

        displayPersonalTodoList($_SESSION["user_id"]);
      } else {
        displayNoSessionErrorPage();
      }
    ?>
  </body>
</html>