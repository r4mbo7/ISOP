<?php
	session_start();
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$pseudo='Admin';	 
$req = $bdd->prepare('INSERT INTO minichat (pseudo, message, temps) VALUES(?, ?, CURTIME())');
$req->execute(array($pseudo, $_POST['message'] ));
header("Location: index.php");
?>