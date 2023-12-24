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
    <link rel = "stylesheet" href = "../css/todo-details.css" />
    <link rel = "stylesheet" href = "../css/method-error.css" />
  </head>
  <body>
    <div class = "navbar">
      <div class = "empty-navbar-div"></div>

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
        if (isset($_GET["todo_id"])) {
          $todo_id = $_GET["todo_id"];

          $todo_details = obtainTodoDetails($todo_id);

          if (!checkTodoPermission($_SESSION["user_id"], $todo_id)) {
            displayTodoPermissionDeniedErrorPage();

            // ! código para implementar un control del tipo de error al acceder a una tarea diferente - no implementado
            /* $permission_error_type = checkTodoPermissionDeniedErrorType($todo_id);

            if ($permission_error_type) {
              displayTodoPermissionDeniedErrorPage("permission denied");
            } else {
              displayTodoPermissionDeniedErrorPage("todo not found");
            } */
          } else {
            displayTodoDetails($todo_details);
          }
        } else {
          displayNoTodoIdErrorPage();
        }
      } else {
        displayNoSessionErrorPage();
      }
    ?>
  </body>
</html>