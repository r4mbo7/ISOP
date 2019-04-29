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
$prenomcool = html_entity_decode($_POST['sexy']);
$verif = $bdd->query("SELECT asexy_g FROM membre WHERE prenom = '$prenom' ");
$si = $verif->fetch();
if ( 0 == $si['asexy_g'])
{
$bdd->exec("UPDATE membre SET asexy_g = 1, a_vote= a_vote+1  WHERE prenom = '$prenom' ");
$bdd->exec("UPDATE membre SET sexy = sexy+1, sexy_def=sexy_def+1 WHERE prenom = '$prenomcool' ");
header('Location: sujet1.php?verif_sexy=1');}
else {
header('Location: sujet1.php?verif_sexy=2');
}
$verif->closeCursor();
?>