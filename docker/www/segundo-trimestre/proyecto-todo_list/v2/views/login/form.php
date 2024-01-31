<?
  echo '
    <h2>login</h2>

    <form action = "index.php" method = "post">
      <input type = "hidden" name = "action" value = "login">
      <label for = "login-username">username:</label>
      <input type = "text" id = "login-username" name = "login-username" onclick = "this.select()" autocomplete = "off" autofocus required maxlength = "50">
      <br />
      <label for = "login-password">password:</label>
      <input type = "password" id = "login-password" name = "login-password" onclick = "this.select()" autocomplete = "off" required maxlength = "200">
      <br />
      <input class = "submit-button" type = "submit" value = "login" />
    </form>

    <p><a class = "signup-link" href = "index.php?action=showMainSignupPage">registrarse</a></p>
  ';