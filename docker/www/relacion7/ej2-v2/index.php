<?
	session_start();

	if (!isset($_SESSION["number"])) {
		$_SESSION["number"] = rand(1, 100);
	}

	if (!isset($_SESSION["attempts"])) {
		$_SESSION["attempts"] = 0;
	}

	$attempts = (int)$_SESSION["attempts"];
	$guess = "";

	if (isset($_POST["guess"])) {
		$guess = (int)$_POST["guess"];
		$attempts++;

		$_SESSION["attempts"] = $attempts;

		if ($guess > $_SESSION["number"]) {
			$message = "mi número es MENOR";
		} elseif ($guess < $_SESSION["number"]) {
			$message = "mi número es MAYOR";
		} else {
			$message = "¡ENHORABUENA, HAS ACERTADO!";
			session_destroy();
		}
	} else {
		$message = "adivina mi número:";
	}

	if (isset($_POST["reset"])) {
		setcookie("number", rand(1, 100), time() + 3600);
		setcookie("attempts", 0, time() + 3600);
		$attempts = 0;
		$message = "adivina mi número:";
		$guess = "";
		session_destroy();
	}
?>

<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
		<title>juego del número secreto</title>
	</head>
	<body>
		<h1><? echo $message; ?></h1>
		<p>intentos: <? echo $attempts; ?></p>
		<form method = "post">
			<input type = "number" name = "guess" value = "<? echo $guess; ?>" placeholder = "introduce un número" autofocus onfocus = "this.select();" />
			<input type = "submit" value = "adivinar" />
			<input type = "submit" name = "reset" value = "reiniciar juego" />
		</form>
	</body>
</html>