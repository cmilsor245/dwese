<?
  class Author {
    private $author_id;
    private $name;
    private $last_name;

    public function __construct($author_id, $name, $last_name) {
      $this -> author_id = $author_id;
      $this -> name = $name;
      $this -> last_name = $last_name;
    }

    public function getAuthorId() {
      return $this -> author_id;
    }

    public function getName() {
      return $this -> name;
    }

    public function getLastName() {
      return $this -> last_name;
    }

    public function setName($name) {
      $this -> name = $name;
    }

    public function setLastName($last_name) {
      $this -> last_name = $last_name;
    }
  }
?>