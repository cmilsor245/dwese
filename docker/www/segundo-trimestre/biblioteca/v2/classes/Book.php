<?
  class Book {
    private $book_id;
    private $title;
    private $genre;
    private $country;
    private $year_published;
    private $num_pages;

    public function __construct($book_id, $title, $genre, $country, $year, $pages) {
      $this -> book_id = $book_id;
      $this -> title = $title;
      $this -> genre = $genre;
      $this -> country = $country;
      $this -> year_published = $year;
      $this -> num_pages = $pages;
    }

    public function getBookId() {
      return $this -> book_id;
    }

    public function getTitle() {
      return $this -> title;
    }

    public function getGenre() {
      return $this -> genre;
    }

    public function getCountry() {
      return $this -> country;
    }

    public function getYear() {
      return $this -> year_published;
    }

    public function getPages() {
      return $this -> num_pages;
    }

    public function setTitle($title) {
      $this -> title = $title;
    }

    public function setGenre($genre) {
      $this -> genre = $genre;
    }

    public function setCountry($country) {
      $this -> country = $country;
    }

    public function setYear($year) {
      $this -> year_published = $year;
    }

    public function setPages($pages) {
      $this -> num_pages = $pages;
    }
  }
?>