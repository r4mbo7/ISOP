<?php
session_start();
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$prenom = $_SESSION['prenom'];
	$ver = $adm->query("SELECT adm FROM membre WHERE prenom = '$prenom'");
	$modo = $ver->fetch();
	if ( $modo['adm'] == '2' OR $modo['adm'] == '3')
	{
		$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
		$id = $_GET['id'];
		$req=$bdd->query("SELECT image FROM billet_ea WHERE id = '$id'");
		$img=$req->fetch();
		if(!empty($img['image']))
		{
		$image=$img['image'];
		unlink("../forum/images/$image");
		}
		$bdd->exec("DELETE FROM billet_ea WHERE id = '$id'");
		$bdd->exec("DELETE FROM commentaires_ea WHERE id_billet = '$id'");
		header('Location: gestion_forum.php');
	}
else {}
?>