<?php
	$mysqli = new mysqli('localhost', 'root', '', 'consorzio_dell_agro');

	if($mysqli->connect_errno)
		die('Errore di connessione (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);

	$query = $mysqli->prepare("DELETE FROM news WHERE id = ?");
	
	$query->bind_param("i", $id);
	$id = $_GET['id'];

	$query->execute();
	
	header("location: index2.php");
?>