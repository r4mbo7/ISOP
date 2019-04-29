<?php
	session_start();
	if(empty($_SESSION['prenom']))
	{
		$auteur="Inconnu";
	}
	else
	{
		$auteur=$_SESSION['prenom'];
	}
try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_prog', 'lisopfr', 'hRkrKDkDy6');
	}
catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	$catego = $_POST['catego'];
	$titre = $_POST['titre'];
	$describ = $_POST['describ'];
	$code = $_POST['code'];
$bdd->exec("INSERT INTO Ti(catego, titre, describ, code, auteur, validation) VALUES ( $catego, '$titre', '$describ', '$code', '$auteur', 'non')");
header('Location: index.php?id=1');
?>