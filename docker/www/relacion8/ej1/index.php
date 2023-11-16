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
        $host = "db";
        $dbUsername = "root";
        $dbPassword = "test";
        $dbName = "bank";
        $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
          if (isset($_GET["action"]) && $_GET["action"] == "create") {
            $dni = $_GET["dni"];
            $name = $_GET["name"];
            $address = $_GET["address"];
            $phone = $_GET["phone"];

            $sql = "INSERT INTO client (dni, name, address, phone) VALUES (:dni, :name, :address, :phone)";

            $stmt = $conn -> prepare($sql);

            $stmt -> bindParam(":dni", $dni);
            $stmt -> bindParam(":name", $name);
            $stmt -> bindParam(":address", $address);
            $stmt -> bindParam(":phone", $phone);

            try {
              $stmt -> execute();
            } catch (PDOException $e) {
              displayError("error al añadir cliente: " . $e -> getMessage());
            }
          }

          /* --------------------------------------------------------------------------- */

          if (isset($_GET["action"]) && $_GET["action"] == "remove") {
            $dni = $_GET["dni"];

            $sql = "DELETE FROM client WHERE dni = :dni";

            $stmt = $conn -> prepare($sql);

            $stmt -> bindParam(":dni", $dni);

            try {
              $stmt -> execute();
            } catch (PDOException $e) {
              displayError("error al eliminar cliente: " . $e -> getMessage());
            }
          }

          /* --------------------------------------------------------------------------- */

          if (isset($_GET["action"]) && $_GET["action"] == "modify") {
            $new_dni = $_GET["dni"];
            $name = $_GET["name"];
            $address = $_GET["address"];
            $phone = $_GET["phone"];
            $previous_dni = $_GET["previous-dni"];

            $sql = "UPDATE client SET dni = :new_dni, name = :name, address = :address, phone = :phone WHERE dni = :previous_dni";

            $stmt = $conn -> prepare($sql);

            $stmt -> bindParam(":new_dni", $new_dni);
            $stmt -> bindParam(":name", $name);
            $stmt -> bindParam(":address", $address);
            $stmt -> bindParam(":phone", $phone);
            $stmt -> bindParam(":previous_dni", $previous_dni);

            try {
              $stmt -> execute();
            } catch (PDOException $e) {
              displayError("error al modificar cliente: " . $e -> getMessage());
            }
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
            $sql = "SELECT dni, name, address, phone FROM client";

            $stmt = $conn -> prepare($sql);

            $stmt -> execute();

            $clients = $stmt -> fetchAll(PDO::FETCH_ASSOC);

            foreach ($clients as $client) {
              echo "
                <tr>
                  <td class = \"client-td\">" . $client["dni"] . "</td>
                  <td class = \"client-td\">" . $client["name"] . "</td>
                  <td class = \"client-td\">" . $client["address"] . "</td>
                  <td id = \"last-client-td\" class = \"client-td\">" . $client["phone"] . "</td>
                  <td>
                    <a href = \"modificar.php?&dni=" . $client["dni"] . "&name=" . $client["name"] . "&address=" . $client["address"] . "&phone=" . $client["phone"] . "\">
                      <button>modificar</button>
                    </a>
                  </td>
                  <td>
                    <a href = \"index.php?action=remove&dni=" . $client["dni"] . "\">
                      <button id = \"remove-button\">
                        <img width = \"20px\" src = \"img/papelera.png\" />
                      </button>
                    </a>
                  </td>
                </tr>
              ";
            }
          } catch(PDOException $e) {
            displayError("error al obtener clientes: " . $e -> getMessage());
          }
        ?>
      </table>
    </div>
  </body>
</html>

<?
  function displayError($message) {
    echo "<script>alert(\"$message\");</script>";
    echo "<a href = \"index.php\"><button>volver</button></a>";
  }
?>