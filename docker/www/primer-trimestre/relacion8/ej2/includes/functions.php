<?
  function createConnection() {
    $host = "db";
    $dbUsername = "root";
    $dbPassword = "test";
    $dbName = "bank";
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
  }

  function displayError($message) {
    echo "<script>alert(\"$message\");</script>";
  }

  function createClient($conn) {
    $dni = $_GET["dni"];
    $name = $_GET["name"];
    $address = $_GET["address"];
    $phone = $_GET["phone"];

    $checkIfExistsQuery = "SELECT COUNT(*) AS count FROM client WHERE dni = :dni";
    $checkStmt = $conn->prepare($checkIfExistsQuery);
    $checkStmt -> bindParam(":dni", $dni);
    $checkStmt -> execute();
    $result = $checkStmt -> fetch(PDO::FETCH_ASSOC);

    if ($result["count"] > 0) {
      displayError("el dni ya existe en la base de datos");
      return;
    }

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

  function removeClient($conn) {
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

  function modifyClient($conn) {
    $new_dni = $_GET["dni"];
    $name = $_GET["name"];
    $address = $_GET["address"];
    $phone = $_GET["phone"];
    $previous_dni = $_GET["previous-dni"];

    $checkIfExistsQuery = "SELECT COUNT(*) AS count FROM client WHERE dni = :new_dni AND dni != :previous_dni";
    $checkStmt = $conn -> prepare($checkIfExistsQuery);
    $checkStmt -> bindParam(":new_dni", $new_dni);
    $checkStmt -> bindParam(":previous_dni", $previous_dni);
    $checkStmt -> execute();
    $result = $checkStmt -> fetch(PDO::FETCH_ASSOC);

    if ($result["count"] > 0) {
      displayError("el nuevo dni ya existe en la base de datos");
      return;
    }

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

  function searchForClients($conn) {
    $sql = "SELECT dni, name, address, phone FROM client";

    $stmt = $conn -> prepare($sql);

    $stmt -> execute();

    $clients = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    displayClients($clients);
  }

  function displayClients($clients) {
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
  }
?>