<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8" />
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
    <title>Gestclient</title>
    <link rel = "stylesheet" href = "css/style.css" />
  </head>
  <body>
    <div style = "background-color: lightblue;">
      <div>
        <h1 class = "title">gestclient</h1>
        <h2 class = "subtitle">gestión de clientes de certibank</h2>

        <?
          // conexión a la base de datos

          // obtener la acción del botón que se ha pulsado en el formulario

          // dar de baja un cliente
          if (isset($_GET["action"]) && $_GET["action"] == "remove") {
            // hacer llamada a base de datos con la consulta oportuna
          }

          // dar de alta un cliente
          if (isset($_GET["action"]) && $_GET["action"] == "create") {
            // hacer llamada a base de datos con la consulta oportuna
          }

          // modificar un cliente
          if (isset($_GET["action"]) && $_GET["action"] == "modify") {
            // hacer llamada a base de datos con la consulta oportuna
          }

          // listado
          // este listado se muestra siempre
          // hacer llamada a base de datos con la consulta del listado de clientes
          $query;
        ?>

        <table>
          <tr>
            <th>dni</th>
            <th>nombre</th>
            <th>dirección</th>
            <th>teléfono</th>
            <th></th>
          </tr>

          <form action = "index.php" method = "get">
            <tr>
              <td><input type = "text" name = "dni"></td>
              <td><input type = "text" name = "name"></td>
              <td><input type = "text" name = "address"></td>
              <td><input type = "text" name = "phone"></td>
              <input type = "hidden" name = "action" value = "create">
              <td><input type = "submit" value = "añadir"></td>
            </tr>
          </form>

          <?
            // mostrar los clientes de la base de datos en la tabla
            while ($sign_up = array()) { // hay que modificar el array y cambiarlo por el código adecuado
              echo "
                <tr>
                  <td>" . $sign_up["dni"] . "</td>
                  <td>" . $sign_up["name"] . "</td>
                  <td>" . $sign_up["address"] . "</td>
                  <td>" . $sign_up["phone"] . "</td>
                  <td>
                    <a href = \"modificar.php?&dni=" . $sign_up["dni"] . "&name=" . $sign_up["name"] . "&address=" . $sign_up["address"] . "&phone=" . $sign_up["phone"] . "\">
                      <button>modificar</button>
                    </a>
                  </td>
                  <td>
                    <a href = \"index.php?action=remove&dni=" . $sign_up["dni"] . "\">
                      <button>
                        <img width = \"20px\" src = \"img/papelera.png\" />
                      </button>
                    </a>
                  </td>
                </tr>
              ";
            }
          ?>
        </table>
      </div>
    </div>
  </body>
</html>