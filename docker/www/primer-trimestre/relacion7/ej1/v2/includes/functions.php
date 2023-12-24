<?
  function unsetLoginVariables() {
    unset($_SESSION["username-login"]);
    unset($_SESSION["password-login"]);
  }

  function unsetSignUpVariables() {
    unset($_SESSION["username-signup"]);
    unset($_SESSION["password-signup"]);
    unset($_SESSION["password-signup-confirm"]);
  }

  function checkLoginFormVariables() {
    if (isset($_POST["username-login"]) && isset($_POST["password-login"])) {
      $_SESSION["username-login"] = $_POST["username-login"];
      $_SESSION["password-login"] = $_POST["password-login"];
    }
  }

  function checkSignUpFormVariables() {
    if (isset($_POST["username-signup"]) && isset($_POST["password-signup"]) && isset($_POST["password-signup-confirm"])) {
      $_SESSION["username-signup"] = $_POST["username-signup"];
      $_SESSION["password-signup"] = $_POST["password-signup"];
      $_SESSION["password-signup-confirm"] = $_POST["password-signup-confirm"];
    }
  }
?>