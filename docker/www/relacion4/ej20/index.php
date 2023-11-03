<!--
  @file: index.php
  @author: Christian Millán Soria
  @created: 14/10/2023
  @license: MIT
  @contact: christiaanmillaan1313@gmail.com
  @info: igual que el ejercicio anterior, pero este programa genera una pirámide hueca
-->

<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 20</title>
    </head>
    <body>
      <form method = "post">
        <label for = "altura">altura: <input type = "number" name = "altura" min = "1" max = "60" required /></label> <!-- he puesto un máximo ya que si es muy alta la imagen no se ve bien -->
        <label for = "imagen">selecciona una imagen:</label>
        <select name = "imagen" required>
          <option value = "" disabled selected>selecciona una opción</option>
          <option value = "bolitas">bolitas</option>
          <option value = "ladrillos">ladrillos</option>
          <option value = "estrellas">estrellas</option>
          <option value = "corazones">corazones</option>
          <option value = "flores">flores</option>
        </select>
        <input type = "submit" value = "submit" />
      </form>

      <?
        if (isset($_POST["altura"])) {
          $altura = $_POST["altura"];
          $imagen = $_POST["imagen"];

          $img_size = "30px";
          $img_tag = "<img src = \"./img/$imagen.png\" alt = \"$imagen\" width = \"$img_size\" height = \"$img_size\" />";

          for ($i = 1; $i <= $altura; $i++) {
            for ($j = 1; $j <= $altura - $i; $j++) {
              echo "&nbsp;&nbsp;&nbsp;&nbsp;"; // se generan los espacios correspondientes
            }

            // ! no funciona correctamente
            for ($j = 1; $j <= $i; $j++) {
              if ($i == 1 || $i == $altura || $j == 1 || $j == $i) {
                echo $img_tag;
              } else {
                echo "&nbsp;&nbsp;&nbsp;&nbsp;";
              }
            }
            echo "<br />";
          }
        }
      ?>
    </body>
  </html>