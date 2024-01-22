<?
  require_once('../models/Model.php');

  class Model {
    protected $table;
    protected $id_column;
    protected $db;

    public function __construct() {
      $this -> db = new Db();
    }

    public function getAll() {
      $list = $this -> db -> dataQuery('SELECT * FROM ' . $this -> table);
      return $list;
    }
  }
?>