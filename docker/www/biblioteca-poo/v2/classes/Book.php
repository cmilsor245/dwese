<?
  class Book {
    public $book_id;
    public $title;
    public $genre;
    public $country;
    public $year_published;
    public $num_pages;

    public function __construct($book_id, $title, $genre, $country, $year_published, $num_pages) {
      $this -> book_id = $book_id;
      $this -> title = $title;
      $this -> genre = $genre;
      $this -> country = $country;
      $this -> year_published = $year_published;
      $this -> num_pages = $num_pages;
    }
  }
?>