<?php
	session_start();
	
	if (!empty($_SESSION['prenom']))
	{
		$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_prog', 'lisopfr', 'hRkrKDkDy6');
		
		$fan = $_SESSION['prenom'];
		$id_Ti = $_GET['id'];
		$aime = $bdd->query("SELECT COUNT(*) AS fan FROM aime WHERE id_Ti = $id_Ti AND fan = '$fan' ");
		$nb_aime = $aime->fetch();
		if ($nb_aime['fan'] == 1)
		{}
		else
		{
			$bdd->exec("INSERT INTO aime(id_Ti, fan) VALUES($id_Ti, '$fan') ");
		}
	}
	else
	{}
	header('Location: programe.php?id=' .$_GET['id']);
?>