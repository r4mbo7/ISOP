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
$prenomcool = $_POST['sape'];
$verif = $bdd->query("SELECT asape_f FROM membre WHERE prenom = '$prenom' ");
$si = $verif->fetch();
if ( 0 == $si['asape_f'])
{
$bdd->exec("UPDATE membre SET asape_f = 1, a_vote= a_vote+1  WHERE prenom = '$prenom' ");
$bdd->exec("UPDATE membre SET sape = sape+1, sape_def=sape_def+1 WHERE prenom = '$prenomcool' ");
header('Location: sujet2.php?verif_sape=1');}
else {
header('Location: sujet2.php?verif_sape=2');
}
$verif->closeCursor();
?>