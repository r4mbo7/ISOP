<?php

	session_start();
	
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$id=$_GET['id'];
	$id_auteur=$_SESSION['id'];
	$bdd->exec("DELETE FROM favori_topic WHERE id='$id' AND id_auteur='$id_auteur' ");
	
	header('Location: favori_topic.php');
?>