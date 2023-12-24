<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8" />
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
    <title>login</title>
  </head>
  <body>
    <form action = "../login.php" method = "post" name = "login">
      <input type = "text" name = "username-login" placeholder = "user" />
      <input type = "password" name = "password-login" placeholder = "password" />
      <input type = "submit" value = "submit" />
    </form>

    <p>¿no tienes cuenta?</p>
    <a href = "registro.view.php"><button>sign up</button></a>
    <a href = "../index.php"><button>landing page</button></a>
  </body>
</html>