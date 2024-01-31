<?
  require_once 'controllers/TodoList.php';

  if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
  } else {
    $action = 'checkLogin';
  }

  $main = new TodoList();
  $main -> $action();