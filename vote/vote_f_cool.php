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
$prenomcool = $_POST['cool'];
$verif = $bdd->query("SELECT acool_f FROM membre WHERE prenom = '$prenom' ");
$si = $verif->fetch();
if ( 0 == $si['acool_f'])
{
$bdd->exec("UPDATE membre SET acool_f = 1, a_vote= a_vote+1 WHERE prenom = '$prenom' ");
$bdd->exec("UPDATE membre SET cool = cool+1, cool_def=cool_def+1 WHERE prenom = '$prenomcool' ");
header('Location: sujet2.php?verif_cool=1');}
else {
header('Location: sujet2.php?verif_cool=2');
}
$verif->closeCursor();
?>