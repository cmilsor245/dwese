<?
  echo '
    <h2>registrarse</h2>

    <form action = "index.php" method = "post">
      <input type = "hidden" name = "action" value = "signup">
      <label for = "signup-username">username:</label>
      <input type = "text" id = "signup-username" name = "signup-username" onclick = "this.select()" autocomplete = "off" autofocus required maxlength = "50">
      <br />
      <label for = "signup-password">password:</label>
      <input type = "password" id = "signup-password" name = "signup-password" onclick = "this.select()" autocomplete = "off" required maxlength = "200">
      <br />
      <label for = "signup-password2">confirma la password:</label>
      <input type = "password" id = "signup-password2" name = "signup-password2" onclick = "this.select()" autocomplete = "off" required maxlength = "200">
      <br />
      <input class = "submit-button" type = "submit" value = "confirmar" />
    </form>

    <p><a class = "login-link" href = "index.php?action=checkLogin">login</a></p>
  ';