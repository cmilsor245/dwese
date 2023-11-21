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
                  <th>número de paginas</th>
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
        } else {
          echo "<div class = \"button-container\"><a href = \"index.php?action=insertAuthorForm\"><button>añadir nuevo autor</button></a></div>";
        }

        echo "<div class = \"button-container\"><a href = \"index.php?action=insertBookForm\"><button>añadir nuevo libro</button></a></div>";
      }

      function insertBookForm() {
        $db = new mysqli("db", "root", "test", "bookstore");

        $result = $db -> query("SELECT * FROM authors");
        if ($result -> num_rows !== 0) {
          echo "<h1>registro de libros</h1>";

          echo "
            <form action = \"index.php\" method = \"get\">
              <label for = \"title\">título </label><br /><input id = \"title\" type = \"text\" name = \"title\" autocomplete = \"off\" onfocus = \"this.select()\" required /><br />
              <label for = \"genre\">género </label><br /><input id = \"genre\" type = \"text\" name = \"genre\" autocomplete = \"off\" onfocus = \"this.select()\" required /><br />
              <label for = \"country\">país </label><br /><input id = \"country\" type = \"text\" name = \"country\" autocomplete = \"off\" onfocus = \"this.select()\" required /><br />
              <label for = \"year\">año </label><br /><input id = \"year\" type = \"text\" name = \"year\" autocomplete = \"off\" onfocus = \"this.select()\" required /><br />
              <label for = \"num-pages\">número de páginas </label><br /><input id = \"num-pages\" type = \"text\" name = \"num-pages\" autocomplete = \"off\" onfocus = \"this.select()\" required /><br />
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
              <input type = \"hidden\" name = \"action\" value = \"insertBook\">
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
              <input type = \"hidden\" name = \"action\" value = \"removeBook\">
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

        // recuperamos el id del libro y lanzamos el delete contra la base de datos
        // mostramos mensaje con el resultado de la operación

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
        /* echo "<h1>modificación de libros</h1>";

        // recuperamos el id del libro que vamos a modificar y sacamos el resto de sus datos de la base de datos
        // creamos el formulario con los campos del libro
        // y lo rellenamos con los datos que hemos recuperado de la base de datos

        // vamos a añadir un selector para el id del autor o autores.
        // para que salgan preseleccionados los autores del libro que estamos modificando, vamos a buscar
        // también a esos autores.

        // vamos a convertir esa lista de autores del libro en un array de ids de personas


        // ya tenemos todos los datos para añadir el selector de autores al formulario


        // por último, un enlace para crear un nuevo autor
        echo "<a href = \"index.php?action=insertAuthorForm\">añadir nuevo</a><br />";

        // finalizamos el formulario
        echo "
            <input type = \"hidden\" name = \"action\" value = \"modifyBook\">
            <input type = \"submit\">
          </form>
        ";
        echo "<p><a href = \"index.php\">volver</a></p>"; */
      }

      function modifyBook() {
        /* echo "<h1>modificación de libros</h1>";

        // vamos a procesar el formulario de modificación de libros
        // primero, recuperamos todos los datos del formulario (idLibro, titulo....)

        // lanzamos el update contra la base de datos.


        if ($db -> affected_rows == 1) {
          // si la modificación del libro ha funcionado, continuamos actualizando la tabla "authors"
          // primero borraremos todos los registros del libro actual y luego los insertaremos de nuevo


          // ya podemos insertar todos los autores junto con el libro en "authors"

          echo "libro actualizado con éxito";
        } else {
          // si la modificación del libro ha fallado, mostramos mensaje de error
          echo "ha ocurrido un error al modificar el libro. por favor, inténtalo de nuevo más tarde.";
        }
        echo "<p><a href = \"index.php\">volver</a></p>"; */
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
        echo "<p><a href = \"index.php\">volver</a></p>"; */
      }

      function insertAuthorForm() {
        echo "<h1>insertar autores</h1>";

        echo "
          <form action = \"index.php\" method = \"get\">
            <label for = \"name\">nombre</label><br /><input id = \"name\" type = \"text\" name = \"name\"><br />
            <label for = \"last-name\">apellidos</label><br /><input id = \"last-name\" type = \"text\" name = \"last-name\"><br />
        ";

        echo "
            <input type = \"hidden\" name = \"action\" value = \"insertAuthor\">
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
            <input type = \"hidden\" name = \"action\" value = \"removeAuthor\">
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