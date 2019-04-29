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
		if (empty($_SESSION['prenom']))
		{
		$auteur= 'Visiteur';
		}
		else
		{
		$auteur= $_SESSION['prenom'];
		}
		$id=$_GET['id'];
		$desti = $bdd->query("SELECT prenom FROM membre WHERE id='$id'");
		$des = $desti->fetch();
		$destinataire = $des['prenom'];
		$MP=$_POST['MP'];
		$bdd->exec("INSERT INTO MP(auteur, destinataire, MP, time, date) VALUES('$auteur', '$destinataire', '$MP', 	CURTIME(), CURDATE())");
		header("Location: Pageperso.php?id=" .$id ."&envoy=1");
?>