<?
  class Bookstore {
    private $connection;

    public function __construct($connection) {
      $this -> connection = $connection;
    }

    public function getConnection() {
      return $this -> connection;
    }
  }
?>