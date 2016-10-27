<?php
if(isset($_POST['submit']))
{
	//Variable for indexing uploaded image
	$j = 0; 
	
	//Declaring Path for uploaded images
	$target_path = "uploads/";

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
		$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];
		
		//increment the number of uploaded images according to the files in array
		$j++;
	
		if(in_array($file_extension, $validextensions))
		{
			//if file moved to uploads folder
			if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path))
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