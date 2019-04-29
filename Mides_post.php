<?php
if(preg_match("#[a-z]{2,}#", $_POST['message']))
{
	try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		}
	catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
		if(!empty($_SESSION['prenom']))
		{
		$nom=$_SESSION['prenom'];
		}
		else
		{
		$nom=$_POST['nom'];
		}
	$message=$_POST['message'];
	$bdd->exec("INSERT INTO idees(nom,message) VALUES ('$nom','$message')");
	echo '<p>Ton message a bien était envoyé, il sera lue dans la semaine.</p>';
}
else
{
	echo "<p>Ton message na pas était envoyé...</p>";
}
?>
