<?
  session_start();

  include "includes/connection-functions.php";

  if (isset($_POST["new-todo-title"]) && isset($_POST["new-todo-description"])) {
    if ($_POST["new-todo-title"] === "") {
      displayEmptyNewTodoInputErrorPage();
    } elseif (strlen($_POST["new-todo-title"]) > 20) {
      displayLongTitleErrorPage();
    } elseif (strlen($_POST["new-todo-description"]) > 200) {
      displayLongDescriptionErrorPage();
    } else {
      $title = $_POST["new-todo-title"];
      $description = $_POST["new-todo-description"];

      createNewTodo($title, $description, $_SESSION["user_id"]);
    }
  } else {
    displayIncorrectNewTodoInputErrorPage();
  }
?>