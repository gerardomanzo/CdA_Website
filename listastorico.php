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
			<hr style="margin: 4px 0 0 16.6%" />
		</ul>
	</nav>

	<div class="centra">
		<section class="container">
			<div class="storico">
				<h1 class="titolo">Storico</h1>
				<div>
					<?php 
						$mysqli = new mysqli('localhost', 'root', '', 'consorzio_dell_agro');

						if($mysqli->connect_errno)
							die('Errore di connessione (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
						
						$query = "SELECT * FROM storico ORDER BY data";
						$result = $mysqli->query($query);

						if($result->num_rows)
							while($row = $result->fetch_assoc())
							{
								$id = $row['id'];
								$data = strtotime($row['data']);

								$giorno = date('d',$data);
								$mese = date('M',$data);
								$anno = date('Y',$data);

								$titolo = $row['titolo'];

								echo "<div class=\"riga_storia\">
										<div class=\"calendario\" style=\"float: left\">
											<div class=\"giorno\">".
												$giorno ."
											</div>
											<div class=\"mese\">".
												$mese ."
											</div>
										</div>
										<div class=\"storia\">
											<div class=\"nome\">".
												$titolo ."
											</div>
											<a href=\"storico.php?id=" . $id ."\" class=\"link_storia\">Guarda le foto</a>
										</div>
										<a class=\"bin\" href=\"cancellaStorico.php?id=" . $id ."\"><img src=\"./images/bin.png\"></a>
									</div>";

							}
					?>

				</div>
			</div>
		</section>
	</div>	
		
</body>
</html>
