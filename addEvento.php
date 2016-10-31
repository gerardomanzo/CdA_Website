<?php
if(isset($_POST['submit']))
{
	$mysqli = new mysqli('localhost', 'root', '', 'consorzio_dell_agro');

	if($mysqli->connect_errno)
		die('Errore di connessione (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);

	$query = $mysqli->prepare("INSERT INTO eventi(titolo, data_ora, luogo) VALUES(?, ?, ?)");
	
	$query->bind_param("sss", $titolo, $data_ora, $luogo);
	$titolo = $_POST['titolo_evento'];
	$data_ora = $_POST['data_ora_evento'];
	$luogo = $_POST['luogo_evento'];

	$query->execute();

	header("location: areaprivata.php");
}
?>