<?
  extract($data);

  if (isset($task)) {   
    echo '<h2>modificación de tarea</h2>';
  } else {
    echo '<h2>inserción de tarea</h2>';
  }

  $task_id = $task -> id ?? '';
  $title = $task -> titulo ?? '';
  $description = $task -> descripcion ?? '';

  echo '
    <form action = "index.php" method = "get">
      <input type = "hidden" name = "task_id" value = ' . $task_id . '>
      <label for = "title">título:</label> <input id = "title" class = "task-title" type = "text" name = "title" value = "' . $title . '" onclick = "this.select()" autofocus required maxlength = "20">
      <br />
      <label for = "description">descripción:</label> <textarea id = "description" class = "task-description" name = "description" maxlength = "200">' . $description . '</textarea>
  ';

  if (isset($task)) {
    echo '
        <input type = "hidden" name = "action" value = "modifyTask" />
    ';
  } else {
    echo '
        <input type = "hidden" name = "action" value = "insertTask" />
    ';
  }

  echo '
      <input class = "submit-button" type = "submit" value = "confirmar" />
    </form>

    <p><a class = "back-link" href = "index.php">cancelar</a></p>
  ';