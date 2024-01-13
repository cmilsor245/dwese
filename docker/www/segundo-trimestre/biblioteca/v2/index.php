<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8" />
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
    <title>bookstore v2</title>
    <link rel = "stylesheet" href = "css/style.css" />
    <link rel = "preconnect" href = "https://fonts.googleapis.com">
    <link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
    <link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap">
  </head>
  <body>
    <?
      include "includes/functions.php";
      include "classes/Book.php";
      include "classes/Author.php";

      if (isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
      } else {
        $action = "showBookList";
      }

      const HOST = "db";
      const USER = "root";
      const PASS = "test";
      const DB_NAME = "bookstore_v2_2trimestre";

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
            <form method = \"get\" action = \"index.php\">
              <label for = \"search\">filtrar por un elemento concreto</label>
              <input id = \"search\" type = \"text\" name = \"search-title\" autofocus autocomplete = \"off\" onfocus = \"this.select()\" />

              <input type = \"hidden\" name = \"action\" value = \"searchBook\" />

              <input type = \"submit\" value = \"buscar\" />
            </form>

            <table>
              <thead>
                <tr>
                  <th>título</th>
                  <th>género</th>
                  <th>autor/autores</th>
                  <th>país</th>
                  <th>año de publicación</th>
                  <th>número de páginas</th>
                  <th class = \"empty-th\"><img src = \"icons/down-arrow.png\" width = \"20\" height = \"20\" /></th>
                  <th class = \"empty-th\"><img src = \"icons/down-arrow.png\" width = \"20\" height = \"20\" /></th>
                </tr>
              </thead>
              <tbody>
          ";

          while ($book_data = $result_books_exist -> fetch_object()) {
            $book = new Book(
              $book_data -> book_id,
              $book_data -> title,
              $book_data -> genre,
              $book_data -> country,
              $book_data -> year_published,
              $book_data -> num_pages
            );

            echo "
              <tr>
                <td>" . $book -> getTitle() . "</td>
                <td>" . $book -> getGenre() . "</td>
                <td>
            ";

            $book_id = $book -> getBookId();

            $result_authors_linked = getEveryAuthorInLinkTable($connection, $book_id);

            while ($author = $result_authors_linked -> fetch_object()) {
              echo $author -> name . " " . $author -> last_name . "<br />";
            }

            echo "
                </td>
                <td>" . $book -> getCountry() . "</td>
                <td>" . $book -> getYear() . "</td>
                <td>" . $book -> getPages() . "</td>
                <td><a href = \"index.php?action=modifyBookForm&book_id=" . $book -> getBookId() . "\"><img src = \"icons/settings.png\" width = \"20\" height = \"20\" /></a></td>
                <td><a href = \"index.php?action=removeBook&book_id=" . $book -> getBookId() . "\"><img src = \"icons/trash.png\" width = \"20\" height = \"20\" /></a></td>
              </tr>
            ";
          }

          echo "
              </tbody>
            </table>

            <div class = \"button-container\">
              <a href = \"index.php?action=insertBookForm\"><button>insertar libro</button></a>
              <a href = \"index.php?action=insertAuthorForm\"><button>insertar autor</button></a>
              <a href = \"index.php?action=removeAuthorForm\"><button>eliminar autor</button></a>
            </div>
          ";
        } else {
          $result_authors_exist = getEveryRow($connection, "author");

          if ($result_authors_exist -> num_rows !== 0) {
            echo "
              <h3 id = \"no-books-h3\">no existen libros en la base de datos</h3>
              <div class = \"button-container\">
                <a href = \"index.php?action=insertBookForm\"><button>insertar libro</button></a>
                <a href = \"index.php?action=insertAuthorForm\"><button>insertar autor</button></a>
                <a href = \"index.php?action=removeAuthorForm\"><button>eliminar autor</button></a>
              </div>
            ";
          } else {
            echo "
              <h3 id = \"no-authors-h3\">no existen autores en la base de datos</h3>
              <h6>Es necesario insertar al menos un autor antes de insertar un libro</h6>
              <div class = \"button-container\"><a href = \"index.php?action=insertAuthorForm\"><button>insertar autor</button></a></div>
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

          <div class = \"button-container\"><a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a></div>
        ";
      }

      function insertAuthor($connection) {
        $new_author_name = $_GET["name"];
        $new_author_last_name = $_GET["last_name"];

        if ($_GET["name"] !== "" && $_GET["last_name"] !== "") {
          $author_list = getAuthorList($connection);

          while ($author_data = $author_list -> fetch_object()) {
            $author = new Author(
              $author_data -> author_id,
              $author_data -> name,
              $author_data -> last_name
            );

            if ($author -> getName() === $new_author_name && $author -> getLastName() === $new_author_last_name) {
              echo "
                <h3>el autor ya existe</h3>
                <div class = \"button-container\">
                  <a class = \"retry-button\" href = \"index.php?action=insertAuthorForm&name=$new_author_name&last_name=$new_author_last_name\"><button>intentarlo de nuevo</button></a>
                  <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
                </div>
              ";
              return;
            }
          }

          $new_author = new Author(
            null,
            $new_author_name,
            $new_author_last_name
          );

          $success = insertNewAuthor($connection, $new_author -> getName(), $new_author -> getLastName());

          if ($success) {
            echo "
              <h3>autor insertado correctamente</h3>
              <div  class = \"button-container\">
                <a class = \"accept-button\" href = \"index.php\"><button>aceptar</button></a>
                <a class = \"one-more-button\" href = \"index.php?action=insertAuthorForm\"><button>insertar otro autor</button></a> 
              </div>
            ";
          } else {
            echo "
              <h3>ha habido un error al insertar el autor</h3>
              <div class = \"button-container\">
                <a class = \"retry-button\" href = \"index.php?action=insertAuthorForm&name=$new_author_name&last_name=$new_author_last_name\"><button>intentarlo de nuevo</button></a>
                <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
              </div>
            ";
          }
        } else {
          echo "
            <h3>deben proporcionarse tanto el nombre como el apellido del autor</h3>
            <div class = \"button-container\">
              <a class=\"retry-button\" href=\"index.php?action=insertAuthorForm&name=$new_author_name&last_name=$new_author_last_name\"><button>intentarlo de nuevo</button></a>
              <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
            </div>
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

            <label for = \"genre\" type = \"text\">genero</label>
            <input id = \"genre\" type = \"text\" name = \"genre\" value = \"$new_book_genre\" autocomplete = \"off\" onfocus = \"this.select()\" />

            <label for = \"country\" type = \"text\">pais</label>
            <input id = \"country\" type = \"text\" name = \"country\" value = \"$new_book_country\" autocomplete = \"off\" onfocus = \"this.select()\" />

            <label for = \"year_published\" type = \"number\">ano de publicacion</label>
            <input id = \"year_published\" type = \"number\" name = \"year_published\" value = \"$new_book_year_published\" autocomplete = \"off\" onfocus = \"this.select()\" />

            <label for = \"num_pages\" type = \"number\">numero de paginas</label>
            <input id = \"num_pages\" type = \"number\" name = \"num_pages\" value = \"$new_book_num_pages\" autocomplete = \"off\" onfocus = \"this.select()\" />

            <label for = \"author\" type = \"number\">autor</label>
            <select id = \"author\" name = \"author[]\" multiple>
        ";

        $author_list = $connection -> query("SELECT * FROM author");

        while ($author_data = $author_list -> fetch_object()) {
          $author = new Author(
            $author_data -> author_id,
            $author_data -> name,
            $author_data -> last_name
          );

          $author_id = $author -> getAuthorId();
          $author_name = $author -> getName();
          $author_last_name = $author -> getLastName();
          echo "<option value = \"$author_id\">$author_name $author_last_name</option>";
        }

        echo "
            </select>

            <input type = \"hidden\" name = \"action\" value = \"insertBook\" />

            <input type = \"submit\" value = \"insertar libro\" />
          </form>

          <div class = \"button-container\"><a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a></div>
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

          while ($book_data = $books_list -> fetch_object()) {
            $book = new Book(
              $book_data -> book_id,
              $book_data -> title,
              $book_data -> genre,
              $book_data -> country,
              $book_data -> year_published,
              $book_data -> num_pages
            );

            if ($book -> getTitle() === $new_book_title && $book -> getGenre() === $new_book_genre && $book -> getCountry() === $new_book_country && $book -> getYear() === $new_book_year_published && $book -> getPages() === $new_book_num_pages) {
              echo "
                <h3>el libro ya existe</h3>
                <div class = \"button-container\">
                  <a class = \"retry-button\" href = \"index.php?action=insertBookForm&title=$new_book_title&genre=$new_book_genre&country=$new_book_country&year_published=$new_book_year_published&num_pages=$new_book_num_pages\"><button>intentarlo de nuevo</button></a>
                  <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
                </div>
              ";
              return;
            }
          }

          $new_book = new Book(
            null,
            $new_book_title,
            $new_book_genre,
            $new_book_country,
            $new_book_year_published,
            $new_book_num_pages
          );

          $book_success = insertNewBook($connection, $new_book -> getTitle(), $new_book -> getGenre(), $new_book -> getCountry(), $new_book -> getYear(), $new_book -> getPages());

          $book_id = $connection -> insert_id;

          $linked_author_book_success = insertLinkedAuthorAndBook($connection, $selected_authors, $book_id);

          if ($book_success && $linked_author_book_success -> affected_rows > 0) {
            echo "
              <h3>libro insertado correctamente</h3>
              <div class = \"button-container\">
                <a class = \"accept-button\" href = \"index.php\"><button>aceptar</button></a>
                <a class = \"one-more-button\" href = \"index.php?action=insertBookForm\"><button>insertar otro libro</button></a>
              </div>
            ";
          } else {
            echo "
              <h3>no se insertó el libro</h3>
              <div class = \"button-container\">
                <a class = \"retry-button\" href = \"index.php?action=insertBookForm&title=$new_book_title&genre=$new_book_genre&country=$new_book_country&year_published=$new_book_year_published&num_pages=$new_book_num_pages\"><button>intentarlo de nuevo</button></a>
                <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
              </div>
            ";
          }
        } else {
          echo "
            <h3>deben proporcionarse todos los datos del libro</h3>
            <div class = \"button-container\">
              <a class = \"retry-button\" href = \"index.php?action=insertBookForm&title=$new_book_title&genre=$new_book_genre&country=$new_book_country&year_published=$new_book_year_published&num_pages=$new_book_num_pages\"><button>intentarlo de nuevo</button></a>
              <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
            </div>
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
            <div class = \"button-container\"><a class = \"accept-button\" href = \"index.php\"><button>aceptar</button></a></div>
          ";
        } else {
          echo "
            <h3>ha ocurrido un error al eliminar el libro</h3>
            <div class \"button-container\"><a class = \"cancel-button\" href = \"index.php\"><button>volver</button></a></div>
          ";
        }
      }

      /* ----------------------------------------------------------------------------------------------------------------------------- */

      function removeAuthorForm($connection) {
        echo "
          <h1>eliminar autor</h1>

          <form method = \"get\" action = \"index.php\">
            <select name = \"author_id\">
              <option value = \"no_author_selected\" disabled selected>Selecciona un autor</option>
        ";

        $author_list = getAuthorList($connection);

        while ($author_data = $author_list -> fetch_object()) {
          $author = new Author(
            $author_data -> author_id,
            $author_data -> name,
            $author_data -> last_name
          );

          echo "
            <option value = \"" . $author -> getAuthorId() . "\">" . $author -> getName() . " " . $author -> getLastName() . "</option>
          ";
        }

        echo "
            </select>

            <input type = \"hidden\" name = \"action\" value = \"removeAuthor\" />

            <input type = \"submit\" value = \"eliminar autor\" />
          </form>

          <div class = \"button-container\"><a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a></div>
        ";
      }

      function removeAuthor($connection) {
        if (isset($_GET["author_id"])) {
          $author_id = $_GET["author_id"];

          $result_linked_rows = getEveryRowInLinkTableWithAnAuthor($connection, $author_id);

          if ($result_linked_rows -> num_rows !== 0) {
            echo "
              <h3>no se puede eliminar el autor porque tiene libros asociados</h3>
              <div class = \"button-container\">
                <a class = \"retry-button\" href = \"index.php?action=removeAuthorForm\"><button>intentarlo de nuevo</button></a>
                <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
              </div>
            ";
            return;
          }

          $stmt_delete_author = deleteSpecificAuthor($connection, $author_id);

          if ($stmt_delete_author -> affected_rows === 1) {
            echo "
              <h3>autor eliminado correctamente</h3>
              <div class = \"button-container\"><a class = \"accept-button\" href = \"index.php\"><button>aceptar</button></a></div>
            ";

            $author_list = getAuthorList($connection);

            if ($author_list -> num_rows !== 0) {
              echo "
              <div class = \"button-container\"><a class = \"one-more-button\" href = \"index.php?action=removeAuthorForm\"><button>eliminar otro autor</button></a></div>
              ";
            }
          } else {
            echo "
              <h3>ha ocurrido un error a la hora de eliminar el autor</h3>
              <div class = \"button-container\">
                <a class = \"retry-button\" href = \"index.php?action=removeAuthorForm\"><button>intentarlo de nuevo</button></a>
                <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
              </div>
            ";
          }
        } else {
          echo "
            <h3>se debe seleccionar un autor para eliminar</h3>
            <div class = \"button-container\">
              <a class = \"retry-button\" href = \"index.php?action=removeAuthorForm\"><button>volver a intentarlo</button></a>
              <a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a>
            </div>
          ";
        }
      }

      /* ----------------------------------------------------------------------------------------------------------------------------- */

      function modifyBookForm($connection) {
        $book_id = $_GET["book_id"];

        $specific_book = getSpecificBook($connection, $book_id);

        $stmt_get_book_details = $specific_book -> fetch_object();

        $book_to_be_modified = new Book(
          $stmt_get_book_details -> book_id,
          $stmt_get_book_details -> title,
          $stmt_get_book_details -> genre,
          $stmt_get_book_details -> country,
          $stmt_get_book_details -> year_published,
          $stmt_get_book_details -> num_pages
        );

        $book_title = $book_to_be_modified -> getTitle();
        $book_genre = $book_to_be_modified -> getGenre();
        $book_country = $book_to_be_modified -> getCountry();
        $book_year_published = $book_to_be_modified -> getYear();
        $book_num_pages = $book_to_be_modified -> getPages();

        echo "
          <h1>modificar libro</h1>

          <form method = \"get\" action = \"index.php\">
            <label for = \"title\">título</label>
            <input id = \"title\" type = \"text\" name = \"title\" value = \"$book_title\" autofocus autocomplete = \"off\" onfocus = \"this.select()\" />

            <label for = \"genre\">género</label>
            <input id = \"genre\" type = \"text\" name = \"genre\" value = \"$book_genre\" autocomplete = \"off\" onfocus = \"this.select()\" />

            <label for = \"country\">país</label>
            <input id = \"country\" type = \"text\" name = \"country\" value = \"$book_country\" autocomplete = \"off\" onfocus = \"this.select()\" />

            <label for = \"year_published\">año de publicación</label>
            <input id = \"year_published\" type = \"number\" name = \"year_published\" value = \"$book_year_published\" autocomplete = \"off\" onfocus = \"this.select()\" />

            <label for = \"num_pages\">número de páginas</label>
            <input id = \"num_pages\" type = \"number\" name = \"num_pages\" value = \"$book_num_pages\" autocomplete = \"off\" onfocus = \"this.select()\" />

            <label for = \"author\" type = \"number\">autor</label>
            <select id = \"author\" name = \"author[]\" multiple>
        ";

        $author_list = getAuthorList($connection);

        while ($author_data = $author_list -> fetch_object()) {
          $author = new Author(
            $author_data -> author_id,
            $author_data -> name,
            $author_data -> last_name
          );

          $author_id = $author -> getAuthorId();
          $author_name = $author -> getName();
          $author_last_name = $author -> getLastName();

          echo "
            <option value = \"$author_id\">$author_name $author_last_name</option>
          ";
        }

        echo "
            <input type = \"hidden\" name = \"book_id\" value = \"$book_id\" />

            <input type = \"hidden\" name = \"action\" value = \"modifyBook\" />

            <input type = \"submit\" value = \"modificar libro\" />
          </form>

          <div class = \"button-container\"><a class = \"cancel-button\" href = \"index.php\"><button>cancelar</button></a></div>
        ";
      }

      function modifyBook($connection) {
        $book_id = $_GET["book_id"];
        $book_title = $_GET["title"];
        $book_genre = $_GET["genre"];
        $book_country = $_GET["country"];
        $book_year_published = $_GET["year_published"];
        $book_num_pages = $_GET["num_pages"];
        $selected_authors = isset($_GET["author"]) ? $_GET["author"] : [];

        $update_book_query = "UPDATE book SET title = ?, genre = ?, country = ?, year_published = ?, num_pages = ? WHERE book_id = ?";
        $stmt_update_book = $connection -> prepare($update_book_query);
        $stmt_update_book -> bind_param("sssssi", $book_title, $book_genre, $book_country, $book_year_published, $book_num_pages, $book_id);
        $stmt_update_book -> execute();

        $stmt_update_author = updateBookAuthors($connection, $selected_authors, $book_id);

        if ($stmt_update_author -> affected_rows !== 0) {
          echo "
            <h3>libro modificado</h3>
            <div class = \"button-container\"><a class = \"accept-button\" href = \"index.php\"><button>aceptar</button></a></div>
          ";
        } else {
          echo "
            <h3>ha ocurrido un error al modificar el libro</h3>
            <div class = \"button-container\"><a class = \"accept-button\" href = \"index.php\"><button>aceptar</button></a></div>
          ";
        }
      }

      /* ----------------------------------------------------------------------------------------------------------------------------- */

      function searchBook($connection) {
        $book_title = strtolower($_GET["search-title"]);

        echo "
          <h1>filtro de libros</h1>

          <h3>búsqueda realizada: <span class = \"search-book-title-span\">$book_title</span></h3>
        ";

        $result_book_exists = searchSpecificBook($connection, $book_title);

        if ($result_book_exists -> num_rows !== 0) {
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
                  <th class = \"empty-th\"><img src = \"icons/down-arrow.png\" width = \"20\" height = \"20\" /></th>
                  <th class = \"empty-th\"><img src = \"icons/down-arrow.png\" width = \"20\" height = \"20\" /></th>
                </tr>
              </thead>
              <tbody>
          ";

          while ($book_data = $result_book_exists -> fetch_object()) {
            $book = new Book(
              $book_data -> book_id,
              $book_data -> title,
              $book_data -> genre,
              $book_data -> country,
              $book_data -> year_published,
              $book_data -> num_pages
            );

            echo "
              <tr>
                <td>" . $book -> getTitle() . "</td>
                <td>" . $book -> getGenre() . "</td>
                <td>
            ";

            $book_id = $book -> getBookId();

            $result_authors_linked = getEveryAuthorInLinkTable($connection, $book_id);

            while ($author = $result_authors_linked -> fetch_object()) {
              echo $author -> name . " " . $author -> last_name . "<br />";
            }

            echo "
                </td>
                <td>" . $book -> getCountry() . "</td>
                <td>" . $book -> getYear() . "</td>
                <td>" . $book -> getPages() . "</td>
                <td><a href = \"index.php?action=modifyBookForm&book_id=" . $book -> getBookId() . "\"><img src = \"icons/settings.png\" width = \"20\" height = \"20\" /></a></td>
                <td><a href = \"index.php?action=removeBook&book_id=" . $book -> getBookId() . "\"><img src = \"icons/trash.png\" width = \"20\" height = \"20\" /></a></td>
              </tr>
            ";
          }

          echo "
              </tbody>
            </table>

            <div class = \"button-container\"><a class = \"accept-button\" href = \"index.php\"><button>volver</button></a></div>
          ";
        } else {
          echo "
            <h3>no se ha encontrado un libro con el criterio de búsqueda</h3>
            <div class = \"button-container\"><a class = \"accept-button\" href = \"index.php\"><button>volver</button></a></div>
          ";
        }
      }

      $connection -> close();
    ?>
  </body>
</html>