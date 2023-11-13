<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8" />
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
    <title>Gestclient</title>
  </head>
  <body>
    <div>
      <div>
        <h1>GESTCLIENT</h1>
        <h2>Client Management for CertiBank</h2>

        <?
          // database connection

          // get the action of the button pressed in the form

          // delete a client
          if (isset($_GET["action"]) && $_GET["action"] == "delete") {
            // make the appropriate database query
          }

          // create a client
          if (isset($_GET["action"]) && $_GET["action"] == "create") {
            // make the appropriate database query
          }

          // modify a client
          if (isset($_GET["action"]) && $_GET["action"] == "modify") {
            // make the appropriate database query
          }

          // list
          // this list is always displayed
          // make the appropriate database query for the list of clients
          $consulta;
        ?>

        <table>
          <tr>
            <th>DNI</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th></th>
          </tr>

          <form action = "index.php" method = "GET">
            <tr>
              <td><input type = "text" name = "dni" /></td>
              <td><input type = "text" name = "name" /></td>
              <td><input type = "text" name = "address" /></td>
              <td><input type = "text" name = "phone" /></td>
              <input type = "hidden" name = "action" value = "create" />
              <td><input type = "submit" value = "add" /></td>
            </tr>
          </form>

          <?
            // display the clients from the database in the table
            while ($registro = array()) { // modify the array and replace it with the appropriate code
              echo "<tr>
                <td>" . $registro["dni"] . " </td>
                <td>" . $registro["name"] . " </td>
                <td>" . $registro["address"] . " </td>
                <td>" . $registro["phone"] . " </td>
                <td>
                  <a href = \"modify.php?&dni=" . $registro['dni'] . "&name=" . $registro['name'] . "&address=" . $registro['address'] . "&phone=" . $registro['phone'] . " \">
                    <button>Modify</button>
                  </a>
                </td>
                <td>
                  <a href = \"index.php?action=delete&dni=" . $registro["dni"]."\">
                    <button>
                      <img width = \"20px\" src = \"img/papelera.png\" >
                    </button>
                  </a>
                </td>
              </tr>";
            }
          ?>
        </table>
      </div>
    </div>
  </body>
</html>