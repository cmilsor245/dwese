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
        case "removeBook":
          removeBook();
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
        } else {
          echo "<h3>no se encontraron datos</h3>";
        }
        echo "<div class = \"button-container\"><a href = \"index.php?action=insertBookForm\"><button>añadir nuevo libro</button></a></div>";
      }

      function insertBookForm() {
        echo "<h1>registro de libros</h1>";
    
        echo "
          <form action = \"index.php\" method = \"get\">
            <label for = \"title\">título: </label><input id = \"title\" type = \"text\" name = \"title\"><br />
            <label for = \"genre\">género: </label><input id = \"genre\" type = \"text\" name = \"genre\"><br />
            <label for = \"country\">país: </label><input id = \"country\" type = \"text\" name = \"country\"><br />
            <label for = \"year\">año: </label><input id = \"year\" type = \"text\" name = \"year\"><br />
            <label for = \"num-pages\">número de páginas: </label><input id = \"num-pages\" type = \"text\" name = \"num-pages\"><br />
        ";

        $db = new mysqli("db", "root", "test", "bookstore");
        $result = $db -> query("SELECT * FROM authors");

        if ($result -> num_rows !== 0) {
          echo "<label for = \"author\">autor: </label>";
          echo "<select id = \"author\" name = \"author\">";

          while ($row = $result -> fetch_assoc()) {
            echo "<option value = \"" . $row["id"] . "\">" . $row["first_name"] . "</option>";
          }

          echo "</select>";
        }
        echo "<a href = \"index.php?action=insertAuthorForm\"><button>añadir nuevo autor</button></a><br />";

        echo "
            <input type = \"hidden\" name = \"action\" value = \"insertBook\">
            <button type = \"submit\">insertar</button>
          </form>
        ";
        echo "<div class = \"button-container\"><a href = \"index.php\"><button>cancelar</button></a></div>";
    }    

      function insertBook() {
        /* echo "<h1>alta de libros</h1>";

        // vamos a procesar el formulario de alta de libros
        // primero, recuperamos todos los datos del formulario (titulo, género...)
        // lanzamos el insert contra la base de datos
        if ($db -> affected_rows == 1) {
          // si la inserción del libro ha funcionado, continuamos insertando en la tabla "authors"
          // tenemos que averiguar qué idLibro se ha asignado al libro que acabamos de insertar

          // ya podemos insertar todos los autores junto con el libro en "authors"

          echo "libro insertado con éxito";
        } else {
          // si la inserción del libro ha fallado, mostramos mensaje de error
          echo "ha ocurrido un error al insertar el libro. por favor, inténtalo de nuevo más tarde";
        }
        echo "<p><a href = \"index.php\">volver</a></p>"; */
      }

      function removeBook() {
        /* echo "<h1>Borrar libros</h1>";

        // recuperamos el id del libro y lanzamos el delete contra la base de datos
        // mostramos mensaje con el resultado de la operación
        if ($db -> affected_rows == 0) {
          echo "ha ocurrido un error al borrar el libro. por favor, inténtalo de nuevo";
        } else {
          echo "libro borrado con éxito";
        }
        echo "<p><a href = \"index.php\">volver</a></p>"; */
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
        /* echo "<h1>insertar autores</h1>";

        echo "
          <form action = \"index.php\" method = \"get\">
            <label for = \"name\">nombre:<input id = \"name\" type = \"text\" name = \"name\"><br />
            <label for = \"last-name\">apellidos:<input id = \"last-name\" type = \"text\" name = \"last-name\"><br />
        ";

        // finalizamos el formulario
        echo "
            <input type='hidden' name='action' value='insertAuthor'>
            <input type='submit'>
          </form>
        ";
        echo "<p><a href = \"index.php\">volver</a></p>"; */
      }

      function insertAuthor() {
        /* echo "<h1>alta de autores</h1>";

        // vamos a procesar el formulario de alta de libros
        // primero, recuperamos todos los datos del formulario (nombre, apellido)


        // lanzamos el INSERT contra la base de datos.


        if ($db -> affected_rows == 1) {
          echo "autor insertado con éxito";
        } else {
          // si la inserción del libro ha fallado, mostramos mensaje de error
          echo "ha ocurrido un error al insertar el autor. por favor, inténtalo de nuevo más tarde.";
        }
        echo "<p><a href = \"index.php\">volver</a></p>"; */
      }
    ?>
  </body>
</html>