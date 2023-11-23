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

        $stmt = $CONN -> prepare("SELECT * FROM book");
        $stmt -> execute();
        $result = $stmt -> get_result();

        if ($result -> num_rows !== 0) {
          echo "
            <table>
              <thead>
                <tr>
                  <th>título</th>
                  <th>género</th>
                  <th>autor/autores</th>
                  <th>país</th>
                  <th>año de publicación</th>
                  <th>número de páginas</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
          ";

          while ($book = $result -> fetch_assoc()) {
            echo "
              <tr>
                <td>" . $book["title"] . "</td>
                <td>" . $book["genre"] . "</td>
                <td>
            ";

            $stmt_authors = $CONN -> prepare("SELECT author.name, author.last_name FROM book_author JOIN author ON book_author.author_id = author.author_id WHERE book_author.book_id = ?");
            $stmt_authors -> bind_param("i", $book["book_id"]);
            $stmt_authors -> execute();
            $result_authors = $stmt_authors -> get_result();

            while ($author = $result_authors -> fetch_assoc()) {
              echo $author["name"] . " " . $author["last_name"] . "<br />";
            }

            echo "
                </td>
                <td>" . $book["country"] . "</td>
                <td>" . $book["year_published"] . "</td>
                <td>" . $book["num_pages"] . "</td>
                <td><a href = \"index.php?action=modifyBookForm&book_id=" . $book["book_id"] . "\">modificar</a></td>
                <td><a href = \"index.php?action=removeBookForm&book_id=" . $book["book_id"] . "\">borrar</a></td>
              </tr>
            ";
          }

          echo "
              </tbody>
            </table>
          ";
        } else {
          echo "<h3 id = \"no-books-h3\"></h3>";
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