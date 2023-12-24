<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8" />
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
    <title>bookstore</title>
    <link rel = "stylesheet" href = "css/style.css" />
  </head>
  <body>
    <?
      if (isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
      } else {
        $action = "showBookList";
      }

      switch ($action) {
        case "showBookList":
          showBookList();
          break;
        case "insertBookForm":
          insertBookForm();
          break;
        case "insertBook":
          insertBook();
          break;
        case "removeBookForm":
          removeBookForm();
          break;
        case "removeBook":
          removeBook();
          break;
        case "removeAuthorForm":
          removeAuthorForm();
          break;
        case "removeAuthor":
          removeAuthor();
          break;
        case "modifyBookForm":
          modifyBookForm();
          break;
        case "modifyBook":
          modifyBook();
          break;
        case "searchBook":
          searchBook();
          break;
        case "insertAuthorForm":
          insertAuthorForm();
          break;
        case "insertAuthor":
          insertAuthor();
          break;
      }

      function showBookList() {
        echo "<h1>biblioteca</h1>";

        $db = new mysqli("db", "root", "test", "bookstore");
        $result = $db -> query("SELECT * FROM books");
        if ($result -> num_rows !== 0) {
          echo "
            <table>
              <thead>
                <tr>
                  <th>título</th>
                  <th>género</th>
                  <th>país</th>
                  <th>año</th>
                  <th>número de páginas</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
          ";

          while ($row = $result -> fetch_assoc()) {
            echo "
              <tr>
                <td>$row[title]</td>
                <td>$row[genre]</td>
                <td>$row[country]</td>
                <td>$row[year_published]</td>
                <td>$row[num_pages]</td>
                <td><a href = \"index.php?action=modifyBookForm&book=$row[book_id]\"><svg id = \"modify-book-gear\" xmlns = \"http://www.w3.org/2000/svg\" class = \"icon icon-tabler icon-tabler-settings\" width = \"24\" height = \"24\" viewBox = \"0 0 24 24\" stroke-width = \"2\" stroke = \"currentColor\" fill = \"none\" stroke-linecap = \"round\" stroke-linejoin = \"round\"><path stroke = \"none\" d = \"M0 0h24v24H0z\" fill = \"none\"/><path d = \"M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z\" /><path d = \"M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0\" /></svg></a></td>
              </tr>
            ";
          }

          echo "
              </tbody>
            </table>
          ";

          echo "<div class = \"button-container\"><a href = \"index.php?action=removeBookForm\"><button>eliminar libro</button></a></div>";
        } else {
          echo "<h3>no hay libros disponibles</h3>";
        }

        $result = $db -> query("SELECT * FROM authors");

        if ($result -> num_rows !== 0) {
          echo "<div class = \"button-container\"><a href = \"index.php?action=removeAuthorForm\"><button>eliminar un autor</button></a></div>";
        }

        echo "<div class = \"button-container\"><a href = \"index.php?action=insertAuthorForm\"><button>añadir nuevo autor</button></a></div>";

        echo "<div class = \"button-container\"><a href = \"index.php?action=insertBookForm\"><button>añadir nuevo libro</button></a></div>";
      }

      function insertBookForm() {
        $db = new mysqli("db", "root", "test", "bookstore");

        $result = $db -> query("SELECT * FROM authors");
        if ($result -> num_rows !== 0) {
          echo "<h1>registro de libros</h1>";

          echo "
            <form action = \"index.php\" method = \"get\">
              <label for = \"title\">título </label><br /><input autocomplete = \"off\" id = \"title\" type = \"text\" name = \"title\" autocomplete = \"off\" onfocus = \"this.select()\" required autofocus /><br />
              <label for = \"genre\">género </label><br /><input autocomplete = \"off\" id = \"genre\" type = \"text\" name = \"genre\" autocomplete = \"off\" onfocus = \"this.select()\" required /><br />
              <label for = \"country\">país </label><br /><input autocomplete = \"off\" id = \"country\" type = \"text\" name = \"country\" autocomplete = \"off\" onfocus = \"this.select()\" required /><br />
              <label for = \"year\">año </label><br /><input autocomplete = \"off\" id = \"year\" type = \"text\" name = \"year\" autocomplete = \"off\" onfocus = \"this.select()\" required /><br />
              <label for = \"num-pages\">número de páginas </label><br /><input autocomplete = \"off\" id = \"num-pages\" type = \"text\" name = \"num-pages\" autocomplete = \"off\" onfocus = \"this.select()\" required /><br />
          ";

          $result = $db -> query("SELECT * FROM authors");

          echo "<label for = \"author-select\">autor</label><br />";
          echo "<select id = \"author-select\" name = \"author\" required>";
          echo "<option id = \"invalid-option\" disabled selected>selecciona un autor</option>";

          while ($row = $result -> fetch_assoc()) {
            echo "<option value = \"" . $row["author_id"] . "\">" . $row["name"] . " " . $row["last_name"] . "</option>";
          }

          echo "</select><br />";

          echo "
              <input autocomplete = \"off\" type = \"hidden\" name = \"action\" value = \"insertBook\">
              <button type = \"submit\">insertar</button>
            </form>
          ";

          
        } else {
          echo "<h3 id = \"no-authors-h3\">no hay autores disponibles</h3>";
        }
        echo "<br /><div class = \"button-container\"><a href = \"index.php?action=insertAuthorForm\"><button>añadir nuevo autor</button></a></div><br />";
        echo "<div class = \"button-container\"><a href = \"index.php\"><button>cancelar</button></a></div>";
      }

      function insertBook() {
        echo "<h1>alta de libros</h1>";

        $title = $_GET["title"];
        $genre = $_GET["genre"];
        $country = $_GET["country"];
        $year = $_GET["year"];
        $numPages = $_GET["num-pages"];

        $db = new mysqli("db", "root", "test", "bookstore");
        $query = "INSERT INTO books (title, genre, country, year_published, num_pages) VALUES (\"$title\", \"$genre\", \"$country\", \"$year\", \"$numPages\")";
        $result = $db -> query($query);

        if ($result) {
          $author_id = $_GET["author"];

          $query = "INSERT INTO books_authors (book_id, author_id) VALUES (LAST_INSERT_ID(), $author_id)";

          $result = $db -> query($query);

          if ($result) {
            echo "<h3 class = \"success\">libro insertado con éxito</h3>";
          } else {
            echo "<h3>ha ocurrido un error al insertar el autor</h3>";
          }
        } else {
          echo "<h3>ha ocurrido un error al insertar el libro</h3>";
        }
        echo "<div class = \"button-container\"><a href = \"index.php\"><button>volver</button></a></div>";
      }

      function removeBookForm() {
        echo "<h1>eliminar libro</h1>";

        $db = new mysqli("db", "root", "test", "bookstore");

        $result = $db -> query("SELECT * FROM books");

        if ($result -> num_rows > 0) {
          echo "<form action = \"index.php\" method = \"get\">";
          echo "<label for = \"book-select\">libro</label><br />";
          echo "<select id = \"book-select\" name = \"book\" required>";
          echo "<option id = \"invalid-option\" disabled selected>selecciona un libro</option>";

          while ($row = $result -> fetch_assoc()) {
            echo "<option value = \"" . $row["book_id"] . "\">" . $row["title"] . "</option>";
          }

          echo "</select><br />";

          echo "
              <input autocomplete = \"off\" type = \"hidden\" name = \"action\" value = \"removeBook\">
              <button type = \"submit\">borrar</button>
            </form>
          ";
        } else {
          echo "<h3 id = \"no-books-h3\">no hay libros disponibles</h3>";
          echo "<div class = \"button-container\"><a href = \"index.php?action=insertBookForm\"><button>añadir nuevo libro</button></a></div>";
        }
        echo "<br /><div class = \"button-container\"><a href = \"index.php\"><button>cancelar</button></a></div>";
      }

      function removeBook() {
        echo "<h1>eliminar libro</h1>";

        $db = new mysqli("db", "root", "test", "bookstore");

        $book_id = $_GET["book"];

        $query = "DELETE FROM books WHERE book_id = $book_id";

        $result = $db -> query($query);

        if ($result) {
          echo "<h3 class = \"success\">libro borrado con éxito</h3>";
        } else {
          echo "<h3>ha ocurrido un error al borrar el libro</h3>";
        }
        echo "<div class = \"button-container\"><a href = \"index.php\"><button>volver</button></a></div>";
      }

      function modifyBookForm() {
        echo "<h1>modificar de libros</h1>";

        $db = new mysqli("db", "root", "test", "bookstore");

        $book_id = $_GET["book"];

        $result = $db -> query("SELECT b.*, a.name AS author_name, a.last_name AS author_last_name FROM books b JOIN books_authors ba ON b.book_id = ba.book_id JOIN authors a ON ba.author_id = a.author_id WHERE b.book_id = $book_id");

        if ($result -> num_rows > 0) {
          $row = $result -> fetch_assoc();

          echo "
            <form action = \"index.php\" method = \"get\">
              <label for = \"title\">título</label><br />
              <input autocomplete = \"off\" id = \"title\" type = \"text\" name = \"title\" value = \"" . $row["title"] . "\" required onfocus = \"this.select()\" autofocus><br />

              <label for = \"genre\">género</label><br />
              <input autocomplete = \"off\" id = \"genre\" type = \"text\" name = \"genre\" value = \"" . $row["genre"] . "\" required onfocus = \"this.select()\"><br />

              <label for = \"country\">país</label><br />
              <input autocomplete = \"off\" id = \"country\" type = \"text\" name = \"country\" value = \"" . $row["country"] . "\" required onfocus = \"this.select()\"><br />

              <label for = \"year\">año</label><br />
              <input autocomplete = \"off\" id = \"year\" type = \"text\" name = \"year\" value = \"" . $row["year_published"] . "\" required onfocus = \"this.select()\"><br />

              <label for = \"num-pages\">número de páginas</label><br />
              <input autocomplete = \"off\" id = \"num-pages\" type = \"text\" name = \"num-pages\" value = \"" . $row["num_pages"] . "\" required onfocus = \"this.select()\"><br />

              <label for = \"author-select\">autor</label><br />
              <select id = \"author-select\" name = \"author\" required>
                <option selected>" . $row["author_name"] . " " . $row["author_last_name"] . "</option>
          ";

          $result_authors = $db -> query("SELECT * FROM authors");

          while ($row_author = $result_authors -> fetch_assoc()) {
            $selected = ($row_author["author_id"] == $row["author_id"]) ? "selected" : "";
            echo "<option value=\"" . $row_author["author_id"] . "\" $selected>" . $row_author["name"] . " " . $row_author["last_name"] . "</option>";
          }

          echo "
              </select><br />

              <input autocomplete = \"off\" type=\"hidden\" name=\"book\" value=\"" . $row["book_id"] . "\">
              <input autocomplete = \"off\" type=\"hidden\" name=\"action\" value=\"modifyBook\">
              <button type=\"submit\">modificar</button>
            </form>
          ";
        }

        echo "<div class=\"button-container\"><a href=\"index.php\"><button>Volver</button></a></div>";
      }   

      function modifyBook() {
        echo "<h1>modificar libros</h1>";

        $db = new mysqli("db", "root", "test", "bookstore");

        $book_id = $_GET["book"];

        $title = $_GET["title"];
        $genre = $_GET["genre"];
        $country = $_GET["country"];
        $year = $_GET["year"];
        $numPages = $_GET["num-pages"];
        $author = $_GET["author"];

        $query = "UPDATE books SET title = \"$title\", genre = \"$genre\", country = \"$country\", year_published = \"$year\", num_pages = \"$numPages\" WHERE book_id = $book_id";

        $result = $db -> query($query);

        if ($result) {
          $update_author_query = "UPDATE books_authors SET author_id = $author WHERE book_id = $book_id";
          $result_author = $db -> query($update_author_query);

          if ($result_author) {
            echo "<h3 class=\"success\">libro modificado con éxito</h3>";
          } else {
            echo "<h3>ha ocurrido un error al modificar el autor del libro</h3>";
          }
        } else {
          echo "<h3>ha ocurrido un error al modificar el libro</h3>";
        }

        echo "<div class=\"button-container\"><a href=\"index.php\"><button>volver</button></a></div>";
      }    

      function searchBook() {
        /* // recuperamos el texto de búsqueda de la variable de formulario
        echo "<h1>resultados de la búsqueda: \"$textoBusqueda\"</h1>";

        // buscamos los libros de la biblioteca que coincidan con el texto de búsqueda
        if(){
          // la consulta se ha ejecutado con éxito. Vamos a ver si contiene registros
          if ($result -> num_rows != 0) {
            // la consulta ha devuelto registros: vamos a mostrarlos
            // primero, el formulario de búsqueda

            // después, la tabla con los datos
          } else {
            // la consulta no contiene registros
            echo "No se encontraron datos";
          }
        } else {
          // la consulta ha fallado
          echo "error al tratar de recuperar los datos de la base de datos. por favor, inténtalo de nuevo más tarde";
        }
        echo "<p><a href = \"index.php?action = insertBookForm\">nuevo</a></p>";
        echo "<div class = \"button-container\"><a href = \"index.php\"><button>volver</button></a></div>"; */
      }

      function insertAuthorForm() {
        echo "<h1>insertar autores</h1>";

        echo "
          <form action = \"index.php\" method = \"get\">
            <label for = \"name\">nombre</label><br /><input autocomplete = \"off\" id = \"name\" type = \"text\" name = \"name\" required onfocus = \"this.select()\" autofocus><br />
            <label for = \"last-name\">apellidos</label><br /><input autocomplete = \"off\" id = \"last-name\" type = \"text\" name = \"last-name\" required onfocus = \"this.select()\"><br />
        ";

        echo "
            <input autocomplete = \"off\" type = \"hidden\" name = \"action\" value = \"insertAuthor\">
            <button type = \"submit\">crear</button>
          </form>
        ";
        echo "<div class = \"button-container\"><a href = \"index.php\"><button>volver</button></a></div>";
      }

      function insertAuthor() {
        echo "<h1>alta de autores</h1>";

        $db = new mysqli("db", "root", "test", "bookstore");

        $query = $db -> query("INSERT INTO authors (name, last_name) VALUES (\"" . $_GET["name"] . "\", \"" . $_GET["last-name"] . "\")");

        if ($query) {
          echo "<h3 class = \"success\">autor insertado con éxito</h3>";
        } else {
          echo "<h3>ha ocurrido un error al insertar el autor</h3>";
        }
        echo "<div class = \"button-container\"><a href = \"index.php\"><button>volver</button></a></div>";
      }

      function removeAuthorForm() {
        echo "<h1>eliminar autor</h1>";

        $db = new mysqli("db", "root", "test", "bookstore");

        $query = $db -> query("SELECT * FROM authors");

        echo "
          <form action = \"index.php\" method = \"get\">
            <label for = \"authors-select\">autor a eliminar</label><br />
            <select id = \"authors-select\" name = \"author\" required>
              <option id = \"invalid-option\" disabled selected>selecciona un autor</option>
        ";

        while ($row = $query -> fetch_assoc()) {
          echo "<option value = \"" . $row["author_id"] . "\">" . $row["name"] . " " . $row["last_name"] . "</option>";
        }

        echo "
            </select><br />
            <input autocomplete = \"off\" type = \"hidden\" name = \"action\" value = \"removeAuthor\">
            <button type = \"submit\">borrar</button>
          </form>
        ";

        echo "<div class = \"button-container\"><a href = \"index.php\"><button>volver</button></a></div>";
      }

      function removeAuthor() {
        echo "<h1>eliminando autor</h1>";

        $db = new mysqli("db", "root", "test", "bookstore");

        $query = $db -> query("DELETE FROM authors WHERE author_id = " . $_GET["author"]);

        if ($query) {
          echo "<h3 class = \"success\">autor eliminado con éxito</h3>";
        } else {
          echo "<h3>ha ocurrido un error al borrar el autor</h3>";
        }

        echo "<div class = \"button-container\"><a href = \"index.php\"><button>volver</button></a></div>";
      }
    ?>
  </body>
</html>