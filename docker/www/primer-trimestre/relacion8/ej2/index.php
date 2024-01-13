<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8" />
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
    <title>GestClient</title>
    <link rel = "stylesheet" href = "css/style.css" />
  </head>
  <body>
    <div id = "content-wrapper">
      <h1 id = "title">gestclient</h1>
      <h2 id = "subtitle">gestión de clientes de certibank</h2>

      <?
        include "includes/functions.php";

        $conn = createConnection();

        try {
          if (isset($_GET["action"]) && $_GET["action"] == "create") {
            createClient($conn);
          }

          /* --------------------------------------------------------------------------- */

          if (isset($_GET["action"]) && $_GET["action"] == "remove") {
            removeClient($conn);
          }

          /* --------------------------------------------------------------------------- */

          if (isset($_GET["action"]) && $_GET["action"] == "modify") {
            modifyClient($conn);
          }        
        } catch(PDOException $e) {
          displayError("error de conexión: " . $e -> getMessage());
        }
      ?>

      <table>
        <tr>
          <th class = "column-title">dni</th>
          <th class = "column-title">nombre</th>
          <th class = "column-title">dirección</th>
          <th class = "column-title">teléfono</th>
          <th></th>
        </tr>

        <form action = "index.php" method = "get">
          <tr>
            <td><input type = "text" name = "dni" required autofocus autocomplete = "off" onfocus = "this.select()"></td>
            <td><input type = "text" name = "name" required autocomplete = "off" onfocus = "this.select()"></td>
            <td><input type = "text" name = "address" required autocomplete = "off" onfocus = "this.select()"></td>
            <td><input type = "text" name = "phone" required autocomplete = "off" onfocus = "this.select()"></td>
            <input type = "hidden" name = "action" value = "create">
            <td><input type = "submit" value = "añadir"></td>
          </tr>
        </form>

        <?
          try {
            searchForClients($conn);
          } catch(PDOException $e) {
            displayError("error al obtener clientes: " . $e -> getMessage());
          }
        ?>
      </table>
    </div>
  </body>
</html>