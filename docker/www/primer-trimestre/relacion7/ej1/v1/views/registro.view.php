<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8" />
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
    <title>sign up</title>
  </head>
  <body>
    <form action = "../registro.php" method = "POST" name = "login">

      <input type = "text" name = "username-sign-up" placeholder = "user">
      <input type = "password" name = "password-sign-up" placeholder = "password">
      <input type = "password" name = "password2-sign-up" placeholder = "confirm password">
      <input type = "submit" value = "submit">
    </form>

    <p>¿tienes cuenta?</p>
    <a href = "login.view.php"><button>login</button></a>
    <a href = "../index.php"><button>landing page</button></a>
  </body>
</html>