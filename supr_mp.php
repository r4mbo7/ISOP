<?
 session_start ();
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$id = $_GET['id'];
$prenom = $_SESSION['prenom'];
$bdd->exec("DELETE FROM MP WHERE id = '$id' AND  destinataire='$prenom' ");
header('Location: LECMP.php');
?>