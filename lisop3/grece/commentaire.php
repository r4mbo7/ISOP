<?php
	session_start();
if (preg_match("#batard|batarde|salop|salope|salopard|connard|connasse|enfoiré|pute|pd|connar|bite|enculé|putin#i", $_POST['commentaire']))
{
echo "<script type='text/javascript'>history.go(-1);</script>";
}
else
{
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_images', 'lisopfr', 'hRkrKDkDy6');
	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}
	
	$req = $bdd->prepare("INSERT INTO commentaire(id_image, id_auteur, commentaire, date) VALUES(:id_image, :id_auteur, :commentaire, NOW())" );
	$req->execute(array(
			'id_image' => $_POST['id_img'], 
			'id_auteur' => $_SESSION['id'],
			'commentaire' => $_POST['commentaire']
			));
	
	header('Location: image.php?id=' .$_POST['id_img']);
}
?>