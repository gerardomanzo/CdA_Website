<?php
if(isset($_POST['submit']))
{
	$mysqli = new mysqli('localhost', 'root', '', 'consorzio_dell_agro');
	if($mysqli->connect_errno)
		die('Errore di connessione (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	
	$query = $mysqli->prepare("INSERT INTO storico(titolo, descrizione, data) VALUES(?, ?, ?)");
	
	$query->bind_param("sss", $nome_storico, $descrizione_storico, $data_storico);
	$nome_storico = $_POST['nome_storico'];
	$descrizione_storico = $_POST['descrizione_storico'];
	$data_storico = $_POST['data_storico'];
	$query->execute();

	//Variable for indexing uploaded image
	$j = 0; 
	
	//Declaring Path for uploaded images
	$target_path = "images/".$mysqli->insert_id."/";

	mkdir($target_path);

	//loop to get individual element from the array
	for($i = 0; $i < count($_FILES['file']['name']); $i++)
	{
		//Extensions which are allowed
		$validextensions = array("jpeg", "jpg", "png");

		//explode file name from dot(.)
		$ext = explode('.', basename($_FILES['file']['name'][$i]));

		//store extensions in the variable
		$file_extension = end($ext);
		
		//set the target path with a new name of image
		$target_path_img = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];
		
		//increment the number of uploaded images according to the files in array
		$j++;
	
		if(in_array($file_extension, $validextensions))
		{
			//if file moved to uploads folder
			if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path_img))
			{
				echo $j.'° immagine, caricata!<br>';
			}
			//if file was not moved
			else
			{
				echo $j.'° immagine: non caricata!<br>';
			}
		}
		else
		{
			//if file size and file type was incorrect.
			echo $j.'° immagine, formato non valido!<br>';
		}
	}
}
?>