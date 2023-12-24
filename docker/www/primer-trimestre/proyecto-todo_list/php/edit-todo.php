<?
  session_start();

  include "includes/connection-functions.php";

  if (!isset($_SESSION["logged_in"])) {
    $_SESSION["logged_in"] = false;
  }

  if ($_SESSION["logged_in"]) {
    if (isset($_POST["todo-title"]) && isset($_POST["todo-description"]) && isset($_POST["todo-id"])) {
      if ($_POST["todo-title"] === "") {
        displayEmptyNewTodoInputErrorPage();
      } elseif (strlen($_POST["todo-title"]) > 20) {
        displayLongTitleErrorPage();
      } elseif (strlen($_POST["todo-description"]) > 200) {
        displayLongDescriptionErrorPage();
      } else {
        $new_todo_title = $_POST["todo-title"];
        $new_todo_description = $_POST["todo-description"];
        $todo_id = $_POST["todo-id"];

        updateTodo($todo_id, $new_todo_title, $new_todo_description);
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