<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 1</title>
      <style>
        p {
          margin: 0; /* he tenido que poner esto porque el primer número se metía en una etiqueta "pre" */
        }
      </style>
    </head>
    <body>
      <?
        for ($i = 1; $i <= 100; $i++) {
          if ($i % 3 == 0 && $i % 5 == 0) {
            echo "<p>FizzBuzz</p>";
          } elseif ($i % 3 == 0) {
            echo "<p>Fizz</p>";
          } elseif ($i % 5 == 0) {
            echo "<p>Buzz</p>";
          } else {
            echo "<p>$i</p>";
          }
        }
      ?>
    </body>
  </html>