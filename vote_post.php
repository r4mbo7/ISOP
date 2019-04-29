<?php
	session_start ();
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		}
		catch (Exeption $e)
		{
			die('Erreur :' .$e->getMessage());
		}
		if ($_POST['cool'] == 'cool' ){
		$bdd->exec('UPDATE preli SET cool = cool+1 WHERE id = 1');
		}
		if ($_POST['beau'] == 'beau' ){
		$bdd->exec('UPDATE preli SET beau = beau+1 WHERE id = 1');
		}
		if ($_POST['sape'] == 'sape' ){
		$bdd->exec('UPDATE preli SET sape = sape+1 WHERE id = 1');
		}
		if ($_POST['dejante'] == 'dejante' ){
		$bdd->exec('UPDATE preli SET dejante = dejante+1 WHERE id = 1');
		}
		if ($_POST['simpa'] == 'simpa' ){
		$bdd->exec('UPDATE preli SET simpa = simpa+1 WHERE id = 1');
		}
		if ($_POST['intel'] == 'intel' ){
		$bdd->exec('UPDATE preli SET intel = intel+1 WHERE id = 1');
		}
		if ($_POST['seduc'] == 'seduc' ){
		$bdd->exec('UPDATE preli SET mignon =mignon+1 WHERE id = 1');
		}
		if ($_POST['ouf'] == 'ouf' ){
		$bdd->exec('UPDATE preli SET sadick = sadick+1 WHERE id = 1');
		}
		else
		{ header('Location: Categos.php'); }
		header('Location: Categos.php');
		$_SESSION['vote'] = 2;
?>