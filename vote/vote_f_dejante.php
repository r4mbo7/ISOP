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
$prenom = $_SESSION['prenom'];
$prenomcool = $_POST['dejante'];
$verif = $bdd->query("SELECT adejante_f FROM membre WHERE prenom = '$prenom' ");
$si = $verif->fetch();
if ( 0 == $si['adejante_f'])
{
$bdd->exec("UPDATE membre SET adejante_f = 1, a_vote= a_vote+1 WHERE prenom = '$prenom' ");
$bdd->exec("UPDATE membre SET dejante = dejante+1, dejante_def=dejante_def+1 WHERE prenom = '$prenomcool' ");
header('Location: sujet2.php?verif_dejante=1');}
else {
header('Location: sujet2.php?verif_dejante=2');
}
$verif->closeCursor();
?>