<?
  class Db {
    private $db;

    public function __construct() {
      require_once('config.php');
      $this -> db = new mysqli(DB_HOST, DB_USER, DB_PASS, DBNAME);
      if ($this -> db -> connect_errno) return -1;
      else return 0;
    }

    public function closeConnection() {
      if ($this -> db) $this -> db -> close();
    }
  }
?>