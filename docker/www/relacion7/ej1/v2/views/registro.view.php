<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8" />
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
    <title>sign up</title>
  </head>
  <body>
    <form method = "post" action = "../registro.php">
      <input type = "text" name = "username-signup" placeholder = "username" autofocus />
      <input type = "password" name = "password-signup" placeholder = "password" />
      <input type = "password" name = "password-signup-confirm" placeholder = "confirm password" />
      <input type = "submit" value = "sign up" />
    </form>

    <br />

    <p>¿tienes cuenta ya? <a href = "../login.php"><button>log in</button></a></p>

    <br />

    <a href = "../index.php"><button>landing page</button></a>
  </body>
</html>