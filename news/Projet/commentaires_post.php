<?php
	session_start();
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_news', 'lisopfr', 'hRkrKDkDy6');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
if(empty($_SESSION['prenom'])) {
$pseudo=$_POST['auteur'];
$pseudo='Visiteur';
}	 
else{
$pseudo=$_POST['auteur'];
$pseudo=$_SESSION['prenom'];
}
$id=$_GET['id'];
$message=$_POST['message'];
$bdd->exec("INSERT INTO commentaires_news (id_news, auteur, message, date) VALUES('$id', '$pseudo', '$message', CURDATE())");
header('Location: titre1.php?id=' .$id);
?>