<?
  class Book {
    public $title;
    public $genre;
    public $author;
    public $country;
    public $year;
    public $pages;

    public function __construct($title, $genre, $author, $country, $year, $pages) {
      $this -> title = $title;
      $this -> genre = $genre;
      $this -> author = $author;
      $this -> country = $country;
      $this -> year = $year;
      $this -> pages = $pages;
    }
  }
?>