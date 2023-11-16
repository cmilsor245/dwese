<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8" />
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
    <title>Gestclient</title>
    <link rel = "stylesheet" href = "css/style.css" />
  </head>
  <body>
    <h1 id = "title">gestclient</h1>
    <h2 id = "subtitle">gestión de clientes de certibank</h2>

    <form action = "index.php" method = "get">
      <input type = "text" name = "dni" value = "<?=  $_GET["dni"] ?>">
      <input type = "text" name = "name" value = "<?=  $_GET["name"] ?>">
      <input type = "text" name = "address" value = "<?=  $_GET["address"] ?>">
      <input type = "text" name = "phone" value = "<?=  $_GET["phone"] ?>">
      <input type = "hidden" name = "previous-dni" value = "<?=  $_GET["dni"] ?>">
      <input type = "hidden" name = "action" value = "modify">
      <br><br>
      <input type = "submit" value = "aceptar">
      <a href = "index.php"><button>cancelar</button></a>
    </form>
  </body>
</html>