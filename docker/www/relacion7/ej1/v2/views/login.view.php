<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8" />
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
    <title>login</title>
  </head>
  <body>
    <form method = "post" action = "../login.php">
      <input type = "text" name = "username-login" placeholder = "username" autofocus />
      <input type = "password" name = "password-login" placeholder = "password" />
      <input type = "submit" value = "log in" />
    </form>

    <br />

    <p>¿no tienes cuenta? <a href = "../registro.php"><button>registrarse</button></a></p>

    <br />

    <a href = "../index.php"><button>landing page</button></a>
  </body>
</html>