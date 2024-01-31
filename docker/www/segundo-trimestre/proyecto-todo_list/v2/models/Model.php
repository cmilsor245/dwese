<?
  require_once 'controllers/Db.php';

  class Model {
    protected $table;
    protected $id_column;
    protected $db;

    public function __construct() {
      $this -> db = new Db();
    }

    public function getAll() {
      return $this -> db -> dataQuery("SELECT * FROM $this -> table");
    }

    public function get($id) {
      $record = $this -> db -> dataQuery('SELECT * FROM ' . $this -> table . ' WHERE ' . $this -> id_column . " = $id");
      return $record;
    }
  }