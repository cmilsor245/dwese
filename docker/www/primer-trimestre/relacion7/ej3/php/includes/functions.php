<?
  function inputDisplay($action_page, $name_type, $name_type_text, $location) {
    echo "
      <form action = $action_page method = \"post\">
        <label for = \"$name_type\">introduce $name_type_text: <input id = \"$name_type\" type = \"text\" name = \"$name_type\"></label>
        <input type = \"submit\" value = \"send\">
      </form>
    ";
    backToIndexButton($location);
  }

  function backToIndexButton($location) {
    echo "
      <a href = \"$location\"><button>volver</button></a>
    ";
  }

  function headerBackToIndex($location) {
    header("Location: $location");
  }

  function checkingVariables() {
    if (isset($_SESSION["name"]) && isset($_SESSION["last_name"])) {
      echo "el nombre del usuario es el siguiente ➡️ " . $_SESSION["name"] . " " . $_SESSION["last_name"];
    } else if (isset($_SESSION["name"]) && !isset($_SESSION["last_name"])) {
      echo "el nombre del usuario es el siguiente ➡️ " . $_SESSION["name"] . " <span>{apellidos no introducidos todavía}</span>";
    } else if (!isset($_SESSION["name"]) && isset($_SESSION["last_name"])) {
      echo "el nombre del usuario es el siguiente ➡️ " . "<span>{nombre no introducido todavía}</span> " . $_SESSION["last_name"];
    } else {
      echo "<span>no se ha introducido nombre o apellidos todavía</span>";
    }
  }
?>