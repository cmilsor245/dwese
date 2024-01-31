<?
  require_once 'Model.php';

  class Task extends Model {
    public function __construct() {
      $this -> table = 'tarea';
      $this -> id_column = 'id';
      parent::__construct();
    }

    public function getAllTasksForUser($user_id) {
      $list = $this -> db -> dataQuery("SELECT tarea.* FROM tarea INNER JOIN usuarios_tarea ON tarea.id = usuarios_tarea.tarea WHERE usuarios_tarea.usuario = $user_id");
      return $list;
    }

    // return last id inserted
    public function getMaxId() {
      $result = $this -> db -> dataQuery('SELECT MAX(id) AS lastTaskInserted FROM tarea');
      return $result[0] -> lastTaskInserted;
    }

    public function insert($title, $description, $user_id) {
      $this -> db -> dataManipulation("INSERT INTO tarea (titulo, descripcion) VALUES ('$title', '$description')");
      $last_task_id = $this -> getMaxId();
      $this -> db -> dataManipulation("INSERT INTO usuarios_tarea (tarea, usuario) VALUES ('$last_task_id', '$user_id')");
    }

    public function update($task_id, $title, $description) {
      $action = $this -> db -> dataManipulation("UPDATE tarea SET titulo = '$title', descripcion = '$description' WHERE id = '$task_id'");
      return $action;
    }

    public function search($search_term, $user_id) {
      $result = $this -> db -> dataQuery("SELECT * FROM tarea INNER JOIN usuarios_tarea ON tarea.id = usuarios_tarea.tarea WHERE usuarios_tarea.usuario = $user_id AND (tarea.titulo LIKE '%$search_term%' OR tarea.descripcion LIKE '%$search_term%') ORDER BY tarea.titulo");
      return $result;
    }

    public function getUserId($task_id) {
      $result = $this -> db -> dataQuery("SELECT usuario FROM usuarios_tarea WHERE tarea = $task_id");
      return $result;
    }

    public function delete($id) {
      $this -> db -> dataManipulation('DELETE FROM usuarios_tarea WHERE tarea = ' . $id);
      $result = $this -> db -> dataManipulation('DELETE FROM ' . $this -> table . ' WHERE ' . $this -> id_column . " = $id");
      return $result;
    }
  }