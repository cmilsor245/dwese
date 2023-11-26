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

        $result_books_exist = getEveryRow($connection, "book");

        if ($result_books_exist -> num_rows !== 0) {
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

          while ($book = $result_books_exist -> fetch_assoc()) {
            echo "
              <tr>
                <td>" . $book["title"] . "</td>
                <td>" . $book["genre"] . "</td>
                <td>
            ";

            $book_id = $book["book_id"];

            $result_authors_linked = getEveryAuthorInLinkTable($connection, $book_id);

            while ($author = $result_authors_linked -> fetch_assoc()) {
              echo $author["name"] . " " . $author["last_name"] . "<br />";
            }

            echo "
                </td>
                <td>" . $book["country"] . "</td>
                <td>" . $book["year_published"] . "</td>
                <td>" . $book["num_pages"] . "</td>
                <td><a href = \"index.php?action=modifyBookForm&book_id=" . $book["book_id"] . "\">modificar</a></td>
                <td><a href = \"index.php?action=removeBook&book_id=" . $book["book_id"] . "\">borrar</a></td>
              </tr>
            ";
          }

          echo "
              </tbody>
            </table>

            <a href = \"index.php?action=insertBookForm\"><button>insertar libro</button></a>
            <a href = \"index.php?action=insertAuthorForm\"><button>insertar autor</button></a>
            <a href = \"index.php?action=removeAuthorForm\"><button>eliminar autor</button></a>
          ";
        } else {
          $result_authors_exist = getEveryRow($connection, "author");

          if ($result_authors_exist -> num_rows !== 0) {
            echo "
              <h3 id = \"no-books-h3\">no existen libros en la base de datos</h3>
              <a href = \"index.php?action=insertBookForm\"><button>insertar libro</button></a>
              <a href = \"index.php?action=insertAuthorForm\"><button>insertar autor</button></a>
              <a href = \"index.php?action=removeAuthorForm\"><button>eliminar autor</button></a>
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

      /* ----------------------------------------------------------------------------------------------------------------------------- */

      function insertAuthorForm() {
        echo "<h1>insertar autor</h1>";

        $new_author_name = isset($_GET["name"]) ? $_GET["name"] : "";
        $new_author_last_name = isset($_GET["last_name"]) ? $_GET["last_name"] : "";

        echo "
          <form method = \"get\" action = \"index.php\">
            <label for = \"name\">nombre</label>
            <input id = \"name\" type = \"text\" name = \"name\" value = \"$new_author_name\" autofocus autocomplete = \"off\" onfocus = \"this.select()\" />

            <label for = \"last_name\">apellido</label>
            <input id = \"last_name\" type = \"text\" name = \"last_name\" value = \"$new_author_last_name\" autocomplete = \"off\" onfocus = \"this.select()\" />

            <input type = \"hidden\" name = \"action\" value = \"insertAuthor\" />

            <input type = \"submit\" value = \"insertar autor\" />
          </form>

          <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
        ";
      }    

      function insertAuthor($connection) {
        $new_author_name = $_GET["name"];
        $new_author_last_name = $_GET["last_name"];

        if ($_GET["name"] !== "" && $_GET["last_name"] !== "") {
          $author_list = getAuthorList($connection);

          while ($author = $author_list -> fetch_assoc()) {
            if ($author["name"] === $new_author_name && $author["last_name"] === $new_author_last_name) {
              echo "
                <h3>el autor ya existe</h3>
                <a class = \"retry-button\" href = \"index.php?action=insertAuthorForm&name=$new_author_name&last_name=$new_author_last_name\"><button>intentarlo de nuevo</button></a>
                <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
              ";
              return;
            }
          }

          $stmt_insert_author = insertNewAuthor($connection, $new_author_name, $new_author_last_name);

          if ($stmt_insert_author -> affected_rows !== 0) {
            echo "
              <h3>autor insertado correctamente</h3>
              <a class = \"accept-button\" href = \"index.php\"><button>aceptar</button></a>
              <a class = \"one-more-button\" href = \"index.php?action=insertAuthorForm\"><button>insertar otro autor</button></a> 
            ";
          } else {
            echo "
              <h3>ha habido un error al insertar el autor</h3>
              <a class = \"retry-button\" href = \"index.php?action=insertAuthorForm&name=$new_author_name&last_name=$new_author_last_name\"><button>intentarlo de nuevo</button></a>
              <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
            ";
          }

          $stmt_insert_author -> close();
        } else {
          echo "
            <h3>deben proporcionarse tanto el nombre como el apellido del autor</h3>
            <a class=\"retry-button\" href=\"index.php?action=insertAuthorForm&name=$new_author_name&last_name=$new_author_last_name\"><button>intentarlo de nuevo</button></a>
            <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
          ";
        }
      }

      /* ----------------------------------------------------------------------------------------------------------------------------- */

      function insertBookForm($connection) {
        echo "<h1>insertar libro</h1>";

        $new_book_title = isset($_GET["title"]) ? $_GET["title"] : "";
        $new_book_genre = isset($_GET["genre"]) ? $_GET["genre"] : "";
        $new_book_country = isset($_GET["country"]) ? $_GET["country"] : "";
        $new_book_year_published = isset($_GET["year_published"]) ? $_GET["year_published"] : "";
        $new_book_num_pages = isset($_GET["num_pages"]) ? $_GET["num_pages"] : "";

        echo "
          <form method = \"get\" action = \"index.php\">
            <label for = \"title\">titulo</label>
            <input id = \"title\" type = \"text\" name = \"title\" value = \"$new_book_title\" autofocus autocomplete = \"off\" onfocus = \"this.select()\" />

            <label for = \"genre\" type = \"text\">género</label>
            <input id = \"genre\" type = \"text\" name = \"genre\" value = \"$new_book_genre\" autocomplete = \"off\" onfocus = \"this.select()\" />

            <label for = \"country\" type = \"text\">país</label>
            <input id = \"country\" type = \"text\" name = \"country\" value = \"$new_book_country\" autocomplete = \"off\" onfocus = \"this.select()\" />

            <label for = \"year_published\" type = \"number\">año de publicación</label>
            <input id = \"year_published\" type = \"number\" name = \"year_published\" value = \"$new_book_year_published\" autocomplete = \"off\" onfocus = \"this.select()\" />

            <label for = \"num_pages\" type = \"number\">número de páginas</label>
            <input id = \"num_pages\" type = \"number\" name = \"num_pages\" value = \"$new_book_num_pages\" autocomplete = \"off\" onfocus = \"this.select()\" />

            <label for = \"author\" type = \"number\">autor</label>
            <select id = \"author\" name = \"author[]\" multiple>
        ";

        $author_list = $connection -> query("SELECT * FROM author");

        while ($author = $author_list -> fetch_assoc()) {
          $author_id = $author["author_id"];
          $selected = in_array($author_id, isset($_GET["author"]) ? $_GET["author"] : []) ? "selected" : "";
          echo "<option value = \"$author_id\" $selected>" . $author["name"] . " " . $author["last_name"] . "</option>";
        }

        echo "
            </select>

            <input type = \"hidden\" name = \"action\" value = \"insertBook\" />

            <input type = \"submit\" value = \"insertar libro\" />
          </form>

          <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
        ";
      }

      function insertBook($connection) {
        $new_book_title = $_GET["title"];
        $new_book_genre = $_GET["genre"];
        $new_book_country = $_GET["country"];
        $new_book_year_published = $_GET["year_published"];
        $new_book_num_pages = $_GET["num_pages"];
        $selected_authors = isset($_GET["author"]) ? $_GET["author"] : [];

        if ($new_book_title !== "" && $new_book_genre !== "" && $new_book_country !== "" && $new_book_year_published !== "" && $new_book_num_pages !== "" && isset($_GET["author"]) && !empty($_GET["author"])) {
          $books_list = getBookList($connection);

          while ($book = $books_list -> fetch_assoc()) {
            if ($book["title"] === $new_book_title && $book["genre"] === $new_book_genre && $book["country"] === $new_book_country && $book["year_published"] === $new_book_year_published && $book["num_pages"] === $new_book_num_pages) {
              echo "
                <h3>el libro ya existe</h3>
                <a class = \"retry-button\" href = \"index.php?action=insertBookForm&title=$new_book_title&genre=$new_book_genre&country=$new_book_country&year_published=$new_book_year_published&num_pages=$new_book_num_pages\"><button>intentarlo de nuevo</button></a>
                <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
              ";
              return;
            }
          }

          $stmt_insert_book = insertNewBook($connection, $new_book_title, $new_book_genre, $new_book_country, $new_book_year_published, $new_book_num_pages);

          $book_id = $connection -> insert_id;

          $stmt_insert_author = insertLinkedAuthorAndBook($connection, $selected_authors, $book_id);

          if ($stmt_insert_book -> affected_rows === 1 && $stmt_insert_author -> affected_rows > 0) {
            echo "
              <h3>libro insertado correctamente</h3>
              <a class = \"accept-button\" href = \"index.php\"><button>aceptar</button></a>
              <a class = \"one-more-button\" href = \"index.php?action=insertBookForm\"><button>insertar otro libro</button></a>
            ";
          } else {
            echo "
              <h3>no se insertó el libro</h3>
              <a class = \"retry-button\" href = \"index.php?action=insertBookForm&title=$new_book_title&genre=$new_book_genre&country=$new_book_country&year_published=$new_book_year_published&num_pages=$new_book_num_pages\"><button>intentarlo de nuevo</button></a>
              <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
            ";
          }

          $stmt_insert_book -> close();
          $stmt_insert_author -> close();
        } else {
          echo "
            <h3>deben proporcionarse todos los datos del libro</h3>
            <a class = \"retry-button\" href = \"index.php?action=insertBookForm&title=$new_book_title&genre=$new_book_genre&country=$new_book_country&year_published=$new_book_year_published&num_pages=$new_book_num_pages\"><button>intentarlo de nuevo</button></a>
            <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
          ";
        }
      }

      /* ----------------------------------------------------------------------------------------------------------------------------- */

      function removeBook($connection) {
        $book_id = $_GET["book_id"];

        $stmt_delete_book = deleteSpecificBook($connection, $book_id);

        $stmt_delete_linked_book = deleteLinkedBook($connection, $book_id);

        if ($stmt_delete_book -> affected_rows === 1 && $stmt_delete_linked_book -> affected_rows > 0) {
          echo "
            <h3>libro eliminado correctamente</h3>
            <a class = \"accept-button\" href = \"index.php\"><button>aceptar</button></a>
          ";
        } else {
          echo "
            <h3>ha ocurrido un error al eliminar el libro</h3>
            <a class = \"cancel-button\" href = \"index.php\"><button>volver</button></a>
          ";
        }
      }

      /* ----------------------------------------------------------------------------------------------------------------------------- */

      function removeAuthorForm($connection) {
        echo "
          <h1>eliminar autor</h1>

          <form method = \"get\" action = \"index.php\">
            <select name = \"author_id\">
              <option value = \"no_author_selected\" disabled selected>selecciona un autor</option>
        ";

        $author_list = getAuthorList($connection);

        while ($author = $author_list -> fetch_assoc()) {
          echo "
            <option value = \"$author[author_id]\">$author[name] $author[last_name]</option>
          ";
        }

        echo "
            </select>

            <input type = \"hidden\" name = \"action\" value = \"removeAuthor\" />

            <input type = \"submit\" value = \"eliminar autor\" />
          </form>

          <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
        ";
      }

      function removeAuthor($connection) {
        if (isset($_GET["author_id"])) {
          $author_id = $_GET["author_id"];

          $result_linked_rows = getEveryRowInLinkTable($connection);

          if ($result_linked_rows -> num_rows !== 0) {
            echo "
              <h3>no se puede eliminar el autor porque tiene libros asociados</h3>
              <a class = \"cancel-button\" href = \"index.php\"><button>volver</button></a>
            ";
            return;
          }

          $stmt_delete_author = deleteSpecificAuthor($connection, $author_id);

          if ($stmt_delete_author -> affected_rows === 1) {
            echo "
              <h3>autor eliminado correctamente</h3>
              <a class = \"accept-button\" href = \"index.php\"><button>aceptar</button></a>
            ";

            $author_list = getAuthorList($connection);

            if ($author_list -> num_rows !== 0) {
              echo "
              <a class = \"one-more-button\" href = \"index.php?action=removeAuthorForm\"><button>eliminar otro autor</button></a>
              ";
            }
          } else {
            echo "
              <h3>ha ocurrido un error a la hora de eliminar el autor</h3>
              <a class = \"cancel-button\" href = \"index.php\"><button>volver</button></a>
            ";
          }
        } else {
          echo "
            <h3>se debe seleccionar un autor para eliminar</h3>
            <a class = \"retry-button\" href = \"index.php?action=removeAuthorForm\"><button>volver a intentarlo</button></a>
            <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
          ";
        }
      }

      /* ----------------------------------------------------------------------------------------------------------------------------- */

      function modifyBookForm($connection) {
        
      }

      function modifyBook($connection) {
        
      }

      /* ----------------------------------------------------------------------------------------------------------------------------- */

      function searchBook($connection) {
        
      }

      $connection -> close();
    ?>
  </body>
</html>