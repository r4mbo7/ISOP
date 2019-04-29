<?php
	session_start();
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$prenom = $_SESSION['prenom'];
	$ver = $adm->query("SELECT adm FROM membre WHERE prenom = '$prenom'");
	$modo = $ver->fetch();
	if ( $modo['adm'] == '2' OR $modo['adm'] == '3')
	{
try
		{
		$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		}
catch(Exception $e)
		{
		die('Erreur : '.$e->getMessage());
		}
	
	echo $_POST['victime'] ." est maintenant banni!";
	
	$prenom=$_POST['victime'];
	
	$reponse = $bdd->query("SELECT ip FROM membre WHERE prenom = '$prenom'");
	$ip=$reponse->fetch();
	
	$ip=$ip['ip'];
	$motif=$_POST['motif'];
	
	$bdd->exec("INSERT INTO banis VALUES('', '$ip', '$prenom', '$motif', NOW()) ");
	}
	else {}
?>