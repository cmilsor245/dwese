<?
  class Db {
    private $db;

    public function __construct() {
      require_once 'config.php';
      $this -> db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

      if ($this -> db -> connect_errno) return -1; // error
      else return 0; // no error
    }

    public function close() {
      if ($this -> db) $this -> db -> close();
    }

    public function dataQuery($sql) {
      $res = $this -> db -> query($sql);
      $res_array = array();
      while ($fila = $res -> fetch_object()) {
        $res_array[] = $fila;
      }
      return $res_array;
    }

    public function dataManipulation($sql) {
      $this -> db -> query($sql);
      return $this -> db -> affected_rows;
    }
  }