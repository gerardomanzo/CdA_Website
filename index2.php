<?php
	session_start();
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
	<nav class="menu">
		<ul>
			<li class="uno"><a href="index2.php">Home</a></li>
			<li class="due"><a href="#">Storico</a></li>
			<li class="tre"><a href="chisiamo.php">Chi siamo</a></li>
			<li class="quattro"><a href="dovesiamo.php">Mappa</a></li>
			<li class="cinque"><a href="contatti.php">Contatti</a></li>
			<li class="sei"><a href="areaprivata.php">Area Privata</a></li>
			<hr style="margin: 4px 0 0 0" />
		</ul>
	</nav>
	<div class="centra">
		<section class="container">
			<div class="annunci">
				<h1 class="titolo"><img src="./images/news.png">Bacheca</h1>
				
				<?php
					$mysqli = new mysqli('localhost', 'root', '', 'consorzio_dell_agro');

					if($mysqli->connect_errno)
						die('Errore di connessione (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
					
					$query = "SELECT * FROM news ORDER BY data_ora";
					$result = $mysqli->query($query);

					if($result->num_rows)
						while($row = $result->fetch_assoc())
						{
							$id = $row['id'];
							$timestamp = strtotime($row['data_ora']);

							$giorno = date('d',$timestamp);
							$mese = date('M',$timestamp);
							$anno = date('Y',$timestamp);
							$ora = date('H', $timestamp);
							$minuti = date('i', $timestamp);;

							echo "
								<div class=\"riga_annunci\">
									<div class=\"dataora\">
										<p class=\"data\">".
											$giorno ." " . $mese . " " . $anno ."
										</p>
										<p class=\"ora\">".
											$ora . ":" . $minuti ."
										</p>
									</div>
									<div class=\"descrizione\">
										<p>".
											$row['testo']."
										</p>
									</div>";
							if(isset($_SESSION['loggato']))
								echo "<a href='cancellaAnnuncio.php?id=".$id."'>X</a>";
							echo "</div>";

						}

					/* close result set */
					$result->close();

					/* close connection */
					$mysqli->close();
				?>

			</div>
			<div class="eventi">
				<h1 class="titolo"><img src="./images/calendar.png"> Eventi</h1>
				
				<?php
					$mysqli = new mysqli('localhost', 'root', '', 'consorzio_dell_agro');

					if($mysqli->connect_errno)
						die('Errore di connessione (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
					
					$query = "SELECT * FROM eventi ORDER BY data_ora";
					$result = $mysqli->query($query);

					if($result->num_rows)
						while($row = $result->fetch_assoc())
						{
							$id = $row['id'];
							$timestamp = strtotime($row['data_ora']);

							$giorno = date('d',$timestamp);
							$mese = date('M',$timestamp);
							$anno = date('Y',$timestamp);
							$ora = date('H', $timestamp);
							$minuti = date('i', $timestamp);;

							echo "
								<div class=\"riga_eventi\">
									<div class=\"data_eventi\">
										<div class=\"calendario\">
											<div class=\"giorno\">".
												$mese."
											</div>
											<div class=\"mese\">".
												$giorno."
											</div>
										</div>
										<div class=\"orario\">
											10:23
										</div>
									</div>
									
									<div class=\"event\">
										<div class=\"descrizione_eventi\">
											<p>".
												$row['titolo']."
											</p>
										</div>
										<div class=\"dove\">
											<p>".
												$row['luogo']."
											</p>
										</div>
									</div>";
								if(isset($_SESSION['loggato']))
									echo "<a href='cancellaEvento.php?id=".$id."'>X</a>";
								echo "</div>";
						}

					/* close result set */
					$result->close();

					/* close connection */
					$mysqli->close();
				?>

			</div>	
		</section>
	</div>	
	
	<script type="text/javascript" src="./jQuery/shorten.js"></script>
	
</body>
</html>