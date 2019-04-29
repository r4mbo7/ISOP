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
		$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
		$abdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}
	if(!empty($_FILES['image']['name'])){
	list($width, $height, $type, $attr) = getimagesize($_FILES['image']['tmp_name']);
		if($width>700 || $height>700)
		{}
		else
		{
		$source=$_FILES['image']['tmp_name'];
		$destination= 'images/'.$_FILES['image']['name'];
		if($_FILES['image']['error']>0){
		die("erreur lors de transmission de le l'image");
		}
		if(!move_uploaded_file($source, $destination)) {
		die("erreur lors de déplacement de l'image");
		}
		$image=$_FILES['image']['name'];
		}
	}
	else {
	$image='';
	}
	$id_auteur=$_SESSION['id'];
	$commentaire=$_POST['commentaire'];
	$id_topic=$_GET['topic'];
	
	$t = $bdd->query("SELECT titre FROM topic WHERE id = $id_topic");
	$info_top = $t->fetch();
	$titre_topic = $info_top['titre'];
	
	$fv = $bdd->query("SELECT * FROM favorie WHERE id_topic = $id_topic AND id_mbr != $id_auteur ORDER BY id DESC");
	while($test_fav = $fv->fetch()){
		$id_destinataire = $test_fav['id_mbr'];
		$mp = "Votre topic favori : :i::b:" .$titre_topic .":/b::/i:" ." à était commenté!";
		$abdd->exec("INSERT INTO MP(id_auteur, id_destinataire, MP, date) VALUES(0,'$id_destinataire', '$mp', NOW())");
	}
	$req = $bdd->prepare("INSERT INTO commentaires2(id_topic, id_auteur, commentaire, image, date) VALUES(:id_topic, :id_auteur, :commentaire, :image, NOW())" );
	$req->execute(array(
			'id_topic' => $id_topic, 
			'id_auteur' => $id_auteur,
			'commentaire' => $commentaire,
			'image' => $image
			));
		
	$abdd->exec("UPDATE membre2 SET nb_commentaire = nb_commentaire +1 WHERE id = '$id_auteur' ");
		
	$_SESSION['commentaire'] = 1;
	
	header('Location: commentaire.php?topic=' .$id_topic .'&page=' .$_GET['page']);
}
?>