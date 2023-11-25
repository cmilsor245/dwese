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
      include "includes/functions.php";

      if (isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
      } else {
        $action = "showBookList";
      }

      const HOST = "db";
      const USER = "root";
      const PASS = "test";
      const DB_NAME = "bookstore_v2";

      $connection = new mysqli(HOST, USER, PASS, DB_NAME);

      switch ($action) {
        case "showBookList":
          showBookList($connection);
          break;
        case "insertAuthorForm":
          insertAuthorForm();
          break;
        case "insertAuthor":
          insertAuthor($connection);
          break;
        case "insertBookForm":
          insertBookForm($connection);
          break;
        case "insertBook":
          insertBook($connection);
          break;
        case "removeBookForm":
          removeBookForm($connection);
          break;
        case "removeBook":
          removeBook($connection);
          break;
        case "removeAuthorForm":
          removeAuthorForm($connection);
          break;
        case "removeAuthor":
          removeAuthor($connection);
          break;
        case "modifyBookForm":
          modifyBookForm($connection);
          break;
        case "modifyBook":
          modifyBook($connection);
          break;
        case "searchBook":
          searchBook($connection);
          break;
      }

      function showBookList($connection) {
        echo "<h1>biblioteca</h1>";

        $books_exist = checkTableData($connection, "book");
        $authors_exist = checkTableData($connection, "author");

        if ($books_exist -> num_rows !== 0) {
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
                  <th />
                  <th />
                </tr>
              </thead>
              <tbody>
          ";

          while ($book = $books_exist -> fetch_assoc()) {
            echo "
              <tr>
                <td>" . $book["title"] . "</td>
                <td>" . $book["genre"] . "</td>
                <td>
            ";

            $stmt_authors_linked_book = $connection -> prepare("SELECT author.name, author.last_name FROM book_author JOIN author ON book_author.author_id = author.author_id WHERE book_author.book_id = ?");
            $stmt_authors_linked_book -> bind_param("i", $book["book_id"]);
            $stmt_authors_linked_book -> execute();
            $result_authors_linked = $stmt_authors_linked_book -> get_result();

            while ($author = $result_authors_linked -> fetch_assoc()) {
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

            <a href = \"index.php?action=insertBookForm\"><button>insertar libro</button></a>
            <a href = \"index.php?action=insertAuthorForm\"><button>insertar autor</button></a>
          ";
        } else {
          if ($authors_exist -> num_rows !== 0) {
            echo "
              <h3 id = \"no-books-h3\">no existen libros en la base de datos</h3>
              <a href = \"index.php?action=insertBookForm\"><button>insertar libro</button></a>
              <a href = \"index.php?action=insertAuthorForm\"><button>insertar autor</button></a>
            ";
          } else {
            echo "
              <h3 id = \"no-authors-h3\">no existen autores en la base de datos</h3>
              <h6>es necesario insertar al menos un autor antes de insertar un libro</h6>
              <a href = \"index.php?action=insertAuthorForm\"><button>insertar autor</button></a>
            ";
          }
        }
      }

      /* --------------------------------------------------------------------------------- */

      function insertAuthorForm() {
        echo "<h1>insertar autor</h1>";

        if (isset($_GET["name"]) && isset($_GET["last_name"]) && $_GET["name"] !== "" && $_GET["last_name"] !== "") {
          $new_author_name = $_GET["name"];
          $new_author_last_name = $_GET["last_name"];

          echo "
            <form method = \"get\" action = \"index.php\">
              <label for = \"name\">nombre</label>
              <input id = \"name\" type = \"text\" name = \"name\" value = \"$new_author_name\" autofocus autocomplete = \"off\" />

              <label for = \"last_name\">apellido</label>
              <input id = \"last_name\" type = \"text\" name = \"last_name\" value = \"$new_author_last_name\" autocomplete = \"off\" />

              <input type = \"hidden\" name = \"action\" value = \"insertAuthor\" />

              <input type = \"submit\" value = \"insertar autor\" />
            </form>
          ";
        } else {
          echo "
            <form method = \"get\" action = \"index.php\">
              <label for = \"name\">nombre</label>
              <input id = \"name\" type = \"text\" name = \"name\" autofocus autocomplete = \"off\" />

              <label for = \"last_name\">apellido</label>
              <input id = \"last_name\" type = \"text\" name = \"last_name\" autocomplete = \"off\" />

              <input type = \"hidden\" name = \"action\" value = \"insertAuthor\" />

              <input type = \"submit\" value = \"insertar autor\" />
            </form>
          ";
        }
      }

      function insertAuthor($connection) {
        $new_author_name = $_GET["name"];
        $new_author_last_name = $_GET["last_name"];

        if ($_GET["name"] !== "" && $_GET["last_name"] !== "") {
          $authors_list = $connection -> query("SELECT * FROM author");

          while ($author = $authors_list -> fetch_assoc()) {
            if ($author["name"] === $new_author_name && $author["last_name"] === $new_author_last_name) {
              echo "
                <h3>el autor ya existe</h3>
                <a class = \"retry-button\" href = \"index.php?action=insertAuthorForm\"><button>intentarlo de nuevo</button></a>
                <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
              ";
              return;
            }
          }

          $stmt_insert_author = $connection -> prepare("INSERT INTO author (name, last_name) VALUES (?, ?)");
          $stmt_insert_author -> bind_param("ss", $new_author_name, $new_author_last_name);
          $stmt_insert_author -> execute();

          if ($stmt_insert_author -> affected_rows !== 0) {
            echo "
              <h3>autor insertado correctamente</h3>
              <a class = \"accept-button\" href = \"index.php\"><button>aceptar</button></a>
              <a class = \"one-more-button\" href = \"index.php?action=insertAuthorForm\"><button>insertar otro autor</button></a> 
            ";
          }
        } else {
          echo "
            <h3>deben proporcionarse tanto el nombre como el apellido del autor</h3>
            <a class=\"retry-button\" href=\"index.php?action=insertAuthorForm&name=$new_author_name&last_name=$new_author_last_name\"><button>intentarlo de nuevo</button></a>
            <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
          ";
        }
      }

      /* --------------------------------------------------------------------------------- */

      function insertBookForm($connection) {
        echo "
          <h1>insertar libro</h1>

          <form method = \"get\" action = \"index.php\">
            <label for = \"title\">titulo</label>
            <input id = \"title\" type = \"text\" name = \"title\" autofocus autocomplete = \"off\" />

            <label for = \"genre\" type = \"text\">género</label>
            <input id = \"genre\" type = \"text\" name = \"genre\" autocomplete = \"off\" />

            <label for = \"country\" type = \"text\">país</label>
            <input id = \"country\" type = \"text\" name = \"country\" autocomplete = \"off\" />

            <label for = \"year_published\" type = \"number\">año de punblicación</label>
            <input id = \"year_published\" type = \"number\" name = \"year_published\" autocomplete = \"off\" />

            <label for = \"num_pages\" type = \"number\">número de páginas</label>
            <input id = \"num_pages\" type = \"number\" name = \"num_pages\" autocomplete = \"off\" />

            <label for = \"author\" type = \"number\">autor</label>
            <select id = \"author\" name = \"author[]\" multiple>
        ";

        $authors_list = $connection -> query("SELECT * FROM author");

        while ($author = $authors_list -> fetch_assoc()) {
          echo "
            <option value = \"" . $author["author_id"] . "\">" . $author["name"] . " " . $author["last_name"] . "</option>
          ";
        }

        echo "
            </select>

            <input type = \"hidden\" name = \"action\" value = \"insertBook\" />

            <input type = \"submit\" value = \"insertar libro\" />
          </form>
        ";
      }

      function insertBook($connection) {
        if (isset($_GET["title"]) && isset($_GET["genre"]) && isset($_GET["country"]) && isset($_GET["year_published"]) && isset($_GET["num_pages"]) && isset($_GET["author[]"]) && $_GET["title"] !== "" && $_GET["genre"] !== "" && $_GET["country"] !== "" && $_GET["year_published"] !== "" && $_GET["num_pages"] !== "" && $_GET["author[]"] !== "") {
          $new_book_title = $_GET["title"];
          $new_book_genre = $_GET["genre"];
          $new_book_country = $_GET["country"];
          $new_book_year_published = $_GET["year_published"];
          $new_book_num_pages = $_GET["num_pages"];
        } else {
          echo "
            <h3>deben proporcionarse todos los datos del libro</h3>
            <a class = \"retry-button\" href = \"index.php?action=insertBookForm\"><button>intentarlo de nuevo</button></a>
            <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
          ";
          return;
        }
      }

      /* --------------------------------------------------------------------------------- */

      function removeBookForm($connection) {
        
      }

      function removeBook($connection) {
        
      }

      /* --------------------------------------------------------------------------------- */

      function removeAuthorForm($connection) {
        
      }

      function removeAuthor($connection) {
        
      }

      /* --------------------------------------------------------------------------------- */

      function modifyBookForm($connection) {
        
      }

      function modifyBook($connection) {
        
      }

      /* --------------------------------------------------------------------------------- */

      function searchBook($connection) {
        
      }
    ?>
  </body>
</html>