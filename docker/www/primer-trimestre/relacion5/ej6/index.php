<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 11/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: mini-diccionario español-inglés que contiene, al menos, 20 palabras (con su traducción). se utiliza un array asociativo para almacenar las parejas de palabras. el programa pide una palabra en español y devuelve la correspondiente traducción en ingles (el array de palabras en español se muestra antes para ver las disponibles para pedir)
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 6</title>
    </head>
    <body>
      <?
        $diccionario = [
          "hola" => "hello",
          "adios" => "bye",
          "buenos dias" => "good morning",
          "buenas tardes" => "good afternoon",
          "buenas noches" => "good evening",
          "estoy bien" => "I am fine",
          "estoy enfermo" => "I am ill",
          "estoy cansado" => "I am tired",
          "hamburguesa" => "hamburger",
          "perro caliente" => "hot dog",
          "pizza" => "pizza",
          "papas fritas" => "french fries",
          "ensalada" => "salad",
          "sopa" => "soup",
          "pescado" => "fish",
          "pollo" => "chicken",
          "carne" => "meat",
          "arroz" => "rice",
          "frijoles" => "beans",
          "huevos" => "eggs",
          "leche" => "milk",
          "pan" => "bread",
          "queso" => "cheese",
          "mantequilla" => "butter",
          "azúcar" => "sugar",
          "sal" => "salt",
          "pimienta" => "pepper",
          "agua" => "water"
        ];

        /* ---------------------------------- */

        $i = 0;
        echo "<table><tr>";
        foreach ($diccionario as $palabra => $traduccion) { // es necesario el "$traduccion" para que se muestre la palabra en español únicamente
          if ($i % 2 == 0) {
            echo "</tr><tr>";
          }
          echo "<td>" . $palabra . "</td>";
          $i++;
        }
        echo "</tr></table>";

        echo "
          <hr />
          <form method = \"post\">
            <label for = \"palabra\">palabra a traducir: <input type = \"text\" name = \"palabra\" /></label>
            <input type = \"submit\" value = \"submit\" />
          </form>
        ";

        /* ---------------------------------- */

        if (isset($_POST["palabra"])) {
          $palabra = $_POST["palabra"];

          $encontrado = false;

          foreach ($diccionario as $key => $value) {
            if ($key == $palabra) {
              echo "<p style = \"color: rgb(0, 199, 17)\">" . $value . "</p>";
              $encontrado = true;
              break;
            }
          }

          if (!$encontrado) {
            echo "<p style = \"color: red\">La palabra no se encuentra en el diccionario</p>";
          }
        }
      ?>
    </body>
  </html>