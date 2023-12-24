<?
  session_start();

  include "includes/connection-functions.php";

  $connection = generateDBConnection();

  if (isset($_POST["signup-username"]) && isset($_POST["signup-password"]) && isset($_POST["repeat-password"])) {
    if ($_POST["signup-username"] === "" || $_POST["signup-password"] === "" || $_POST["repeat-password"] === "") {
      displayEmptySignUpInputErrorPage();
    }else if (strlen($_POST["signup-username"]) > 50) {
      displayLongUsernameErrorPage();
    } else if (strlen($_POST["signup-password"]) > 200) {
      displayLongPasswordErrorPage();
    } else {
      if ($_POST["signup-password"] !== $_POST["repeat-password"]) {
        displayPasswordsDontMatchErrorPage();
      } else {
        $username = $_POST["signup-username"];
        $password = hash("sha256", $_POST["signup-password"]);

        signUp($connection, $username, $password);
      }
    }
  } else {
    displayIncorrectSignUpCredentialsErrorPage();
  }
?>