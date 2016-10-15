<!DOCTYPE html>
	<head>
		<title>Consorzio dell'Agro ONLUS</title>
		<link rel="stylesheet" type="text/css" href="css/style2.css">
		<link href="https://fonts.googleapis.com/css?family=Pontano+Sans" rel="stylesheet"> 
	</head>
<body>
	
	<?php
		include("./header.html");
	?>

	<div class="centra">
		<section class="container">
			<div class="annunci">
				<h1 class="titolo">&raquo; Annunci</h1>

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
								<div class=\"riga gray\">
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
				<h1 class="titolo">&raquo; Eventi</h1>
				
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
								<div class=\"riga\">
									<div class=\"calendario\">
										<div class=\"giorno\">".
											$mese."
										</div>
										<div class=\"mese\">".
											$giorno."
										</div>
									</div>
									<div class=\"descrizione\">
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
						}

					/* close result set */
					$result->close();

					/* close connection */
					$mysqli->close();
				?>

			</div>	
		</section>
	</div>	
	
	<?php
		include("./footer.html");
	?>

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="./jQuery/shorten.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".annunci .descrizione").shorten({
				showChars: 100,
				moreText: "Leggi altro",
				lessText: "Chiudi"
			});
	 	});
	</script>
</body>
</html>