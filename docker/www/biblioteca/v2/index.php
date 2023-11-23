<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8" />
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
    <title>bookstore v2</title>
    <link rel = "stylesheet" href = "css/style.css" />
  </head>
  <body>
    <?
      if (isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
      } else {
        $action = "showBookList";
      }

      const HOST = "db";
      const USER = "root";
      const PASS = "test";
      const DB_NAME = "bookstore_v2";

      $CONN = new mysqli(HOST, USER, PASS, DB_NAME);

      switch ($action) {
        case "showBookList":
          showBookList($CONN);
          break;
        case "insertBookForm":
          insertBookForm($CONN);
          break;
        case "insertBook":
          insertBook($CONN);
          break;
        case "removeBookForm":
          removeBookForm($CONN);
          break;
        case "removeBook":
          removeBook($CONN);
          break;
        case "removeAuthorForm":
          removeAuthorForm($CONN);
          break;
        case "removeAuthor":
          removeAuthor($CONN);
          break;
        case "modifyBookForm":
          modifyBookForm($CONN);
          break;
        case "modifyBook":
          modifyBook($CONN);
          break;
        case "insertAuthorForm":
          insertAuthorForm($CONN);
          break;
        case "insertAuthor":
          insertAuthor($CONN);
          break;
        case "searchBook":
          searchBook($CONN);
          break;
      }

      function showBookList($CONN) {
        echo "<h1>biblioteca</h1>";

        $books = $CONN -> query("SELECT * FROM book");
        $authors = $CONN -> query("SELECT * FROM book_author JOIN author ON book_author.author_id = author.author_id");

        if ($books -> num_rows !== 0) {
          echo "
            <table>
              <thead>
                <tr>
                  <th>título</th>
                  <th>género</th>
                  <th>autor</th>
                  <th>país</th>
                  <th>año de publicación</th>
                  <th>número de páginas</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
          ";

          while ($book = $books -> fetch_assoc()) {
            echo "
              <tr>
                <td>" . $book["title"] . "</td>
                <td>" . $book["genre"] . "</td>
                <td>
            ";

            while ($author = $authors -> fetch_assoc()) {
              if ($author["book_id"] === $book["book_id"]) {
                echo $author["name"] . " " . $author["last_name"] . "<br />";
              }
            }

            echo "
                </td>
                <td>" . $book["country"] . "</td>
                <td>" . $book["year_published"] . "</td>
                <td>" . $book["num_pages"] . "</td>
                <td><a href \"index.php?action=modifyBookForm&book_id=" . $book["book_id"] . "\">modificar</a></td>
                <td><a href \"index.php?action=removeBookForm&book_id=" . $book["book_id"] . "\">borrar</a></td>
              </tr>
            ";
          }
        }
      }

      /* --------------------------------------------------------------------------------- */

      function insertBookForm($CONN) {
        
      }

      function insertBook($CONN) {
        
      }

      /* --------------------------------------------------------------------------------- */

      function removeBookForm($CONN) {
        echo "test remove";
      }

      function removeBook($CONN) {
        
      }

      /* --------------------------------------------------------------------------------- */

      function removeAuthorForm($CONN) {
        
      }

      function removeAuthor($CONN) {
        
      }

      /* --------------------------------------------------------------------------------- */

      function modifyBookForm($CONN) {
        echo "test modify";
      }

      function modifyBook($CONN) {
        
      }

      /* --------------------------------------------------------------------------------- */

      function insertAuthorForm($CONN) {
        
      }

      function insertAuthor($CONN) {
        
      }

      /* --------------------------------------------------------------------------------- */

      function searchBook($CONN) {
        
      }
    ?>
  </body>
</html>