<?
  session_start();

  include "includes/connection-functions.php";

  if (!isset($_SESSION["logged_in"])) {
    $_SESSION["logged_in"] = false;
  }

  if ($_SESSION["logged_in"]) {
    if (isset($_GET["todo_id"])) {
      $todo_id = $_GET["todo_id"];

      if (!checkTodoPermission($_SESSION["user_id"], $todo_id)) {
        displayRemovingTodoPermissionDeniedErrorPage();
      } else {
        removeTodo($todo_id);
      }
    }
  } else {
    echo "
      <!DOCTYPE html>
      <html lang = \"en\">
        <head>
          <meta charset = \"utf-8\" />
          <meta name = \"viewport\" content = \"width = device-width, initial-scale = 1.0\" />
          <title>TODO LIST</title>
          <link rel = \"stylesheet\" href = \"../css/general.css\" />
          <link rel = \"stylesheet\" href = \"../css/method-error.css\" />
        </head>
        <body>
          <div class = \"navbar\">
            <div class = \"empty-navbar-div\"></div>

            <h1 class = \"page-title\">todo list</h1>

            <div class = \"empty-navbar-div\"></div>
          </div>
    ";

    if (!isset($_GET["todo_id"])) {
      displayNoTodoIdErrorPage();
    } else {
      displayNoSessionErrorPage();
    }

    echo "
        </body>
      </html>
    ";
  }
?>