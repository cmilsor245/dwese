<?
  require_once 'Model.php';

  class User extends Model {
    public function __construct() {
      $this -> table = 'usuarios';
      $this -> id_column = 'id';
      parent::__construct();
    }

    public function getUsers() {
      return $this -> db -> dataQuery("SELECT id, usuario FROM usuarios");
    }

    public function validate($user, $password) {
      return $this -> db -> dataManipulation("SELECT * FROM usuarios WHERE usuario = '$user' AND password = '$password'");
    }

    public function getId($usuario) {
      return $this -> db -> dataQuery("SELECT id FROM usuarios WHERE usuario = '$usuario' LIMIT 1");
    }

    public function checkExists($user) {
      return $this -> db -> dataManipulation("SELECT * FROM usuarios WHERE usuario = '$user'");
    }

    public function insert($user, $password) {
      if ($this -> checkExists($user) == 0) {
        $this -> db -> dataManipulation("INSERT INTO usuarios (usuario, password) VALUES ('$user', '$password')");
        return true;
      } else {
        return false;
      }
    }
  }