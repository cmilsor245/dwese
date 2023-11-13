<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8" />
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
    <title>Gestclient</title>
  </head>
  <body>
    <h1>GESTCLIENT</h1>
    <h2>Client Management for CertiBank</h2>
    <form action = "index.php" action = "GET">
      <input type = "text" name = "dni" value = "<?=  $_GET["dni"] ?>">
      <input type = "text" name = "name" value = "<?=  $_GET["name"] ?>">
      <input type = "text" name = "address" value = "<?=  $_GET["address"] ?>">
      <input type = "text" name = "phone" value = "<?=  $_GET["phone"] ?>">
      <input type = "hidden" name = "dniAntiguo" value = "<?=  $_GET["dni"] ?>">
      <input type = "hidden" name = "action" value = "modify">
      <br /><br />
      <input type = "submit" value = "accept">
      <a href = "index.php">
        <button type = "button">cancel</button>
      </a>
    </form>
  </body>
</html>