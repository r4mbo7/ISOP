<?php
	session_start();
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		}
		catch (Exeption $e)
		{
			die('Erreur :' .$e->getMessage());
		}
		$auteur= $_SESSION['prenom'];
		$destinataire= $_POST['destinataire'];
		$MP=$_POST['MP'];
		$bdd->exec("INSERT INTO MP(auteur, destinataire, MP, time, date) VALUES('$auteur', '$destinataire', '$MP', 	CURTIME(), CURDATE())");
		header("Location: LECMP.php?message=1")
?>