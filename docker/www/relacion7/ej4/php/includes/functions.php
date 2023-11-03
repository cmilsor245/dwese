<?
  function initializeSessionVariables($variable_name, $value) {
    if (!isset($_SESSION[$variable_name])) {
      $_SESSION[$variable_name] = $value;
    }
  }

  function goBackToIndex($location) {
    header("Location: $location");
  }
?>