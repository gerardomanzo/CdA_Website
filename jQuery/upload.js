$(document).ready(function()
{
	//To preview image 
	$('#upload').click(function(e)
	{
		var name = $(":file").val();
		if(!name)
		{
			alert("Selezionare almeno un immagine");
			e.preventDefault();
		}
	});
});