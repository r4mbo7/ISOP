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
if(empty($_SESSION['prenom'])) {
$pseudo=$_POST['pseudo'];
$pseudo='Visiteur';
}	 
else{
$pseudo=$_POST['pseudo'];
$pseudo=$_SESSION['prenom'];
}
$req = $bdd->prepare('INSERT INTO minichat (pseudo, message, temps) VALUES(?, ?, CURTIME())');
$req->execute(array($pseudo, $_POST['message'] ));
echo "<script type='text/javascript'>history.go(-1);</script>";
?>