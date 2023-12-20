<?
  class Author {
    public $author_id;
    public $name;
    public $last_name;

    public function __construct($author_id, $name, $last_name) {
      $this -> author_id = $author_id;
      $this -> name = $name;
      $this -> last_name = $last_name;
    }
  }
?>