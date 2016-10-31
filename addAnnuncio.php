<?php
if(isset($_POST['submit']))
{
	$mysqli = new mysqli('localhost', 'root', '', 'consorzio_dell_agro');

	if($mysqli->connect_errno)
		die('Errore di connessione (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);

	$query = $mysqli->prepare("INSERT INTO news(testo, data_ora) VALUES(?, NOW())");
	
	$query->bind_param("s", $messaggio);
	$messaggio = $_POST['messaggio_news'];

	$query->execute();
	
	header("location: areaprivata.php");
}
?>