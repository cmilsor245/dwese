<?
  session_start();

  include("includes/functions.php");

  $cartas = ["c1", "c2", "c3", "c4", "c5", "c6", "c7", "c8", "c9", "c10", "d1", "d2", "d3", "d4", "d5", "d6", "d7", "d8", "d9", "d10", "dorso-rojo", "p1", "p2", "p3", "p4", "p5", "p6", "p7", "p8", 'p9', "p10", "t1", "t2", "t3", "t4", "t5", "t6", "t7", "t8", "t9", "t10"];

  if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["iniciarJuego"])) {
    $cartaJugadorA = obtenerCartaAleatoria($cartas);
    $cartaJugadorB = obtenerCartaAleatoria($cartas);

    $_SESSION["cartaJugadorA"] = $cartaJugadorA;
    $_SESSION["cartaJugadorB"] = $cartaJugadorB;

    if ($cartaJugadorA > $cartaJugadorB) {
      $ganador = "Jugador A";
    } elseif ($cartaJugadorA < $cartaJugadorB) {
      $ganador = "Jugador B";
    } else {
      $ganador = "Empate";
    }
  }
?>

<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8" />
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
    <title>jugada</title>
    <style>
      img {
        width: 100px;
        height: 150px;
      }
    </style>
  </head>
  <body>
    <div>
      <p>jugador A:</p>
      <img src="cartas/<? echo $_SESSION['cartaJugadorA']; ?>.svg" alt="Carta Jugador A">
    </div>

    <div>
      <p>jugador B:</p>
      <img src="cartas/<? echo $_SESSION['cartaJugadorB']; ?>.svg" alt="Carta Jugador B">
    </div>

    <form action = "minijuego.php" method = "post">
      <input type = "hidden" name = "iniciarJuego" value = "1">
      <input type = "submit" value = "Repetir Jugada">
    </form>

    <? if (isset($ganador) && $ganador !== "Empate") : ?>
      <p>el ganador es: <? echo $ganador; ?></p>
    <? elseif (isset($ganador) && $ganador === "Empate") : ?>
      <p>empate!</p>
    <? endif; ?>
  </body>
</html>