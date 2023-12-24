<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ejercicio 2</title>
    <style>
      table {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <?
      $horario = [
        "lunes" => [
          "15:15" => "dwecl",
          "16:15" => "dwecl",
          "17:15" => "dwecl",
          "18:15" => "dwese",
          "19:15" => "dwese",
          "20:15" => "dwese"
        ],
        "martes" => [
          "15:15" => "dwecl",
          "16:15" => "dwecl",
          "17:15" => "dwecl",
          "18:15" => "daweb",
          "19:15" => "daweb",
          "20:15" => "daweb"
        ],
        "miércoles" => [
          "15:15" => "dwese",
          "16:15" => "dwese",
          "17:15" => "diweb",
          "18:15" => "diweb",
          "19:15" => "diweb",
          "20:15" => "einem"
        ],
        "jueves" => [
          "15:15" => "dwese",
          "16:15" => "dwese",
          "17:15" => "dwese",
          "18:15" => "einem",
          "19:15" => "einem",
          "20:15" => "einem"
        ],
        "viernes" => [
          "15:15" => "diweb",
          "16:15" => "diweb",
          "17:15" => "diweb",
          "18:15" => "dwecl",
          "19:15" => "dwecl",
          "20:15" => "dwecl"
        ]
      ];

      echo "<table>";
      echo "<tr><th>hora</th><th>lunes</th><th>martes</th><th>miércoles</th><th>jueves</th><th>viernes</th></tr>";

      $horas = ["15:15", "16:15", "17:15", "18:15", "19:15", "20:15"];
      foreach ($horas as $hora) {
        echo "<tr><td>$hora</td>";
        foreach ($horario as $dia => $clases) {
          echo "<td>" . $clases[$hora] . "</td>";
        }
        echo "</tr>";
      }

      echo "</table>";
    ?>
  </body>
</html>