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
			<?php
				$dirname = "./images/photo/";
				$images = glob($dirname."*.*");
				$i = 0;
				foreach($images as $image) {

					echo '<a href="storico.php?photo='.$i.'"><img class="single_photo" src="'.$image.'" /></a>';
					$i++;
				}
				
				if (isset($_GET["photo"])) {
					
					echo '
						<div class="viewer_photo">
							<a href="storico.php?photo='.($_GET["photo"]-1).'"><img class="prev" src="./images/prev.png"></a>
							<img class="photo" src="'.$images[$_GET["photo"]].'">
							<a href="storico.php?photo='.($_GET["photo"]+1).'"><img class="next" src="./images/next.png"></a>
							<a href="storico.php"><img class="close" src="./images/close.png"></a>
						</div>
						';
				}

				?>

		</section>
	</div>
	
</body>
</html>