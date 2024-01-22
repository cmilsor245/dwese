<?
  session_start();

  include "includes/connection-functions.php";
  require_once "classes/User.php";

  $connection = generateDBConnection();

  if (isset($_POST["login-username"]) && isset($_POST["login-password"])) {
    if ($_POST["login-username"] === "" || $_POST["login-password"] === "") {
      displayEmptyLoginInputErrorPage();
    } else {
      $username = $_POST["login-username"];

      // correct way
      $password = hash("sha256", $_POST["login-password"]);

      // for testing
      // $password = $_POST["login-password"];

      checkCredentials($connection, $username, $password);
    }
  } else {
    displayIncorrectLoginCredentialsErrorPage();
  }
?>