<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 19/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: pasa de decimal a binario
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 5</title>
    </head>
    <body>
      <form method = "post">
        <label for = "num">número en decimal <input type = "number" name = "num" required /></label>
        <input type = "submit" value = "submit" />
      </form>

      <?
        if (isset($_POST["num"])) {
          $num = $_POST["num"];

          echo "<p>el número en decimal es: " . decbin($num); "</p>";
        }
      ?>
    </body>
  </html>