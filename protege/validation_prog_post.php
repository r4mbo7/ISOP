<?
session_start();
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$prenom = $_SESSION['prenom'];
	$ver = $adm->query("SELECT adm FROM membre WHERE prenom = '$prenom'");
	$modo = $ver->fetch();
	if ( $modo['adm'] == '2' OR $modo['adm'] == '3')
	{
	try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_prog', 'lisopfr', 'hRkrKDkDy6');
		}
	catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
$id=$_GET['id'];
$code=$_POST['code'];
if($_POST['validation'] == 'oui' )
{
$bdd->exec("UPDATE Ti SET code='$code', validation='oui' WHERE id=$id ");
$bdd->exec("INSERT INTO Visite(id_programe) VALUES($id)");
echo "<script type='text/javascript'>history.go(-1);</script>";
}
elseif ($_POST['validation'] == 'non' )
{
$bdd->exec("UPDATE Ti SET code='$code', validation='nonnon' WHERE id=$id ");
echo "<script type='text/javascript'>history.go(-1);</script>";
}
else
{
echo 'Coche Valider ou Refuser.';
echo "<script type='text/javascript'>history.go(-1);</script>";
}
echo "<script type='text/javascript'>history.go(-1);</script>";
	}
	else{}
?>