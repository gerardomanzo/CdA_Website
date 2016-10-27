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
	<script src="./jQuery/upload.js"></script>
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
					<img src="./images/locked.png" alt="" class="lock">
					<div class="areaprivata">
						<h1 class="titolo" style="margin-top: 50px">AREA PRIVATA</h1>
						<form method="POST" action="areaprivata.php">
							<input class="input" type="text" id="username" name="username" placeholder="username">
							<input class="input" type="password" id="password" name="password" placeholder="password">
							<input class="button" type="submit" value="Entra">
						</form>
					</div>
					
					<?php
				}
				else
				{?>
					<img src="./images/unlocked.png" alt="" class="lock">
					<div class="areaprivata">
						<h1 class="titolo" style="margin-top: 50px">MEN&Ugrave; AREA PRIVATA</h1>
						<ul>
							<li><a href="">Inserisci News / Annuncio</a></li>
							<li><a href="">Inserisci uno Storico</a></li>
							<li><a href="logout.php">LOGOUT</a></li>
						</ul>
					</div>
					<!-- <div class="form">
						<h1 class="titolo">Pubblica una news</h1>
						<form method="POST" action="addAnnuncio.php">
							<input class="input" name="titolo_news" type="text" placeholder="Titolo news">
							<textarea class="textarea" name="messaggio_news" maxlength="500" placeholder="Messaggio (max 500 caratteri)" noresize></textarea>
							<input class="button" type="submit" value="Pubblica news">
						</form>
					</div>

					<div class="form">
						<h1 class="titolo">Crea un evento</h1>
						<form method="POST" action="addEvento.php">
							<input class="input" name="titolo_evento" type="text"  placeholder="Titolo evento">
							<input class="input" name="luogo_evento" type="text"  placeholder="Luogo evento">
							<input class="input" name="data_evento" type="text"  placeholder="Data evento">
							<input class="button" class="input" type="submit" value="Crea evento">
						</form>
					</div>

					<div class="form">
						<h1 class="titolo">Crea una storia</h1>
						<form enctype="multipart/form-data" action="addStoria.php" method="POST">
							<input name="file[]" type="file" id="file" multiple>
							<input class="button" type="submit" value="Carica immagini" name="submit" id="upload">
						</form>
					</div> -->
					<?php
				}?>
		</section>
	</div>

</body>
</html>