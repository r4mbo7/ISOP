<?php
	session_start();
	
	if (!empty($_SESSION['prenom']))
	{
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_news', 'lisopfr', 'hRkrKDkDy6');
	
	$fan=$_SESSION['prenom'];
	$id_exp_lb=$_GET['id'];
	$aime = $bdd->query("SELECT COUNT(*) AS fan FROM exp_lb_aime WHERE id_exp_lb = $id_exp_lb AND fan = '$fan' ");
	$nb_aime = $aime->fetch();
	if ($nb_aime['fan'] == 1)
	{
	$bdd->exec("DELETE FROM exp_lb_aime WHERE id_exp_lb = $id_exp_lb AND fan = '$fan' ");
	}
	else
	{}
	}
	else
	{}
	header('Location: exp_lb2.php?id=' .$_GET['id']);
?>