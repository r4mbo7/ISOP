<?php
try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	}
catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	$req = $bdd->query('SELECT nom, message FROM idees ORDER BY ID DESC'); 
	while ($donnee = $req->fetch())
	{
		echo '<strong>'.htmlspecialchars($donnee['nom']) .'</strong>:' .htmlspecialchars($donnee['message']) .'<BR />';
	}
	$req->closeCursor();
?>