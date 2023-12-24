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

      <form action = "index.php" method = "get">
        <div id = "modify-inputs-container">
          <label for = "dni-change-input">dni:</label>
          <input type = "text" id = "dni-change-input" name = "dni" value = "<?=  $_GET["dni"] ?>">

          <label for = "name-change-input">nombre:</label>
          <input type = "text" id = "name-change-input" name = "name" value = "<?=  $_GET["name"] ?>">

          <label for = "address-change-input">dirección:</label>
          <input type = "text" id = "address-change-input" name = "address" value = "<?=  $_GET["address"] ?>">

          <label for = "phone-change-input">teléfono:</label>
          <input type = "text" id = "phone-change-input" name = "phone" value = "<?=  $_GET["phone"] ?>">

          <input type = "hidden" name = "previous-dni" value = "<?=  $_GET["dni"] ?>">
          <input type = "hidden" name = "action" value = "modify">
        </div>

        <br><br>

        <div id = "modify-page-buttons-wrapper">
          <input class = "modify-page-button" type = "submit" value = "aceptar">
        </div>
      </form>

      <a href = "index.php"><button class = "modify-page-button">cancelar</button></a>
    </div>
  </body>
</html>