<?php
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if($_POST["username"] == "admin" && $_POST["password"] == "admin")
		{
			$_SESSION["loggato"] = true;
		}
		else
		{
			echo "Errore login";
			//header("location: error.php");
		}
	}
?>

<!DOCTYPE html>
<head>
<title>Consorzio dell'Agro ONLUS</title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link href="https://fonts.googleapis.com/css?family=Pontano+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Coming+Soon" rel="stylesheet">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>

	<?php
		include("./header.html");
	?>

	<div class="centra">
		<section class="container">
			<?php
				if(!isset($_SESSION["loggato"]))
				{?>
					<form method="POST" action="areaprivata.php">
						<input type="text" id="username" name="username" placeholder="username">
						<input type="password" id="password" name="password" placeholder="password">
						<input type="submit" value="Entra">
					</form>
					<?php
				}
				else
				{?>
					<div class="form">
						<h1 class="titolo">Pubblica una news</h1>
						<form method="POST" action="addAnnuncio.php">
							<label>Titolo news:</label>
							<input name="titolo_news" type="text">
							<label>Messaggio (max 500 caratteri):</label>
							<textarea name="messaggio_news" noresize></textarea>
							<input type="submit" value="Pubblica news">
						</form>
					</div>

					<div class="form">
						<h1 class="titolo">Crea un evento</h1>
						<form method="POST" action="addEvento.php">
							<label>Titolo evento:</label>
							<input name="titolo_evento" type="text">
							<label>Luogo:</label>
							<input name="luogo_evento" type="text">
							<label>Data:</label>
							<input name="data_evento" type="text">
							<input type="submit" value="Crea evento">
						</form>
					</div>
					<?php
				}?>
		</section>
	</div>	

	<!-- <?php
		include("./footer.html");
	?> -->

</body>
</html>