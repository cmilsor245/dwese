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
      include "includes/functions.php";
      include "classes/Bookstore.php";
      include "classes/Book.php";
      include "classes/Author.php";

      if (isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
      } else {
        $action = "showBookList";
      }

      const HOST = "db";
      const USER = "root";
      const PASS = "test";
      const DB_NAME = "bookstore_v3_2trimestre";

      $connection = new mysqli(HOST, USER, PASS, DB_NAME);

      $bookstore = new Bookstore($connection);

      switch ($action) {
        case "showBookList":
          $bookstore -> showBookList();
          break;
        case "insertAuthorForm":
          $bookstore -> insertAuthorForm();
          break;
        case "insertAuthor":
          $bookstore -> insertAuthor();
          break;
        case "insertBookForm":
          $bookstore -> insertBookForm();
          break;
        case "insertBook":
          $bookstore -> insertBook();
          break;
        case "removeBook":
          $bookstore -> removeBook();
          break;
        case "removeAuthorForm":
          $bookstore -> removeAuthorForm();
          break;
        case "removeAuthor":
          $bookstore -> removeAuthor();
          break;
        case "modifyBookForm":
          $bookstore -> modifyBookForm();
          break;
        case "modifyBook":
          $bookstore -> modifyBook();
          break;
        case "searchBook":
          $bookstore -> searchBook();
          break;
      }

      $connection -> close();
    ?>
  </body>
</html>