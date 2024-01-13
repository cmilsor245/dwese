<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8" />
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
    <title>bookstore v3</title>
    <link rel = "stylesheet" href = "css/style.css" />
    <link rel = "preconnect" href = "https://fonts.googleapis.com">
    <link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
    <link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap">
  </head>
  <body>
    <?
      require_once "includes/functions.php";
      require_once "classes/Bookstore.php";

      if (isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
      } else {
        $action = "showBookList";
      }

      const HOST = "db";
      const USER = "root";
      const PASS = "test";
      const DB_NAME = "bookstore_v4_2trimestre";

      $connection = new mysqli(HOST, USER, PASS, DB_NAME);

      $bookstore = new Bookstore($connection);

      $bookstore -> $action();

      $connection -> close();
    ?>
  </body>
</html>