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
			<div class="annunci">
				<h1 class="titolo"><img src="./images/news.png"> News e Annunci</h1>
				
				<?php
					$mysqli = new mysqli('localhost', 'root', '', 'consorzio_dell_agro');

					if($mysqli->connect_errno)
						die('Errore di connessione (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
					
					$query = "SELECT * FROM news ORDER BY data_ora";
					$result = $mysqli->query($query);
					if($result->num_rows)
						while($row = $result->fetch_assoc())
						{
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
									</div>
								</div>";
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
							$timestamp = strtotime($row['data_ora']);

							$giorno = date('d',$timestamp);
							$mese = date('M',$timestamp);
							$anno = date('Y',$timestamp);
							$ora = date('H', $timestamp);
							$minuti = date('i', $timestamp);;

							echo "
								<div class=\"riga_eventi\">
									<div class=\"calendario\">
										<div class=\"giorno\">".
											$mese."
										</div>
										<div class=\"mese\">".
											$giorno."
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
									</div>
								</div>";
						}

					/* close result set */
					$result->close();

					/* close connection */
					$mysqli->close();
				?>

			</div>	
		</section>
	</div>	
	
	<!-- <?php
		include("./footer.html");
	?> -->

	<script type="text/javascript" src="./jQuery/shorten.js"></script>
	
</body>
</html>