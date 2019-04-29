<?php	
session_start();
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$prenom = $_SESSION['prenom'];
	$ver = $adm->query("SELECT adm FROM membre WHERE prenom = '$prenom'");
	$modo = $ver->fetch();
	if ($modo['adm'] == '3')
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		}
		catch (Exeption $e)
		{
			die('Erreur :' .$e->getMessage());
		}
	$bdd->exec("UPDATE membre SET acool_g = 0, asexy_g = 0, asape_g = 0, adejante_g = 0, acool_f = 0, asexy_f = 0, asape_f = 0, adejante_f = 0 ");
	}
	else 
	{}
	header('Location: index.php');
?>