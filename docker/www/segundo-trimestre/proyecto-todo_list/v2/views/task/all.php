<?
  $todo_list = $data['todo_list'];

  echo '
    <form action = "index.php">
      <input type = "hidden" name = "action" value = "searchTask">
      <input type = "text" name = "search_term" onclick = "this.select()" autofocus required>
      <input class = "submit-button search-button" type = "submit" value = "buscar">
    </form>
    <br />
  ';

  if (count($todo_list) == 0) {
    echo '<p class = "error-p">no hay datos</p>';
  } else {
    echo '<div class = "task-list">';
    foreach ($todo_list as $task) {
      echo '
        <div class = "task-item">
          <div class = "task-title">' . $task -> titulo . '</div>
          <div class = "task-description">' . $task -> descripcion . '</div>
          <div class = "task-actions">
            <a href = "index.php?action=modifyTaskForm&task_id=' . $task -> id . '"><img class = "modify-button" src = "assets/icons/edit.svg" alt = "edit"></a>
            <a href = "index.php?action=deleteTask&task_id=' . $task -> id . '"><img class = "delete-button" src = "assets/icons/trash.svg" alt = "delete"></a>
          </div>
        </div>
      ';
    }
    echo '</div>';
  }

  echo '
    <p><a class = "new-task-link" href = "index.php?action=insertTaskForm">nueva tarea</a></p>
    <p><a class = "logout-link" href = "index.php?action=logout">logout</a></p>
  ';