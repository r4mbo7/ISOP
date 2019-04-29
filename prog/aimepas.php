<?php
	session_start();
	
	if (!empty($_SESSION['prenom']))
	{
		$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_prog', 'lisopfr', 'hRkrKDkDy6');
		
		$fan=$_SESSION['prenom'];
		$id_exp_lb=$_GET['id'];
		$aime = $bdd->query("SELECT COUNT(*) AS fan FROM aime WHERE id_Ti = $id_Ti AND fan = '$fan' ");
		$nb_aime = $aime->fetch();
		if ($nb_aime['fan'] == 1)
		{
			$bdd->exec("DELETE FROM aime WHERE id_Ti = $id_Ti AND fan = '$fan' ");
		}
		else
		{}
	}
	else
	{}
	header('Location: programe.php?id=' .$_GET['id']);
?>