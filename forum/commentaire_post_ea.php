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
	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}	
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$prenom = $_SESSION['prenom'];
	$ver = $adm->query("SELECT adm FROM membre WHERE prenom = '$prenom'");
	$modo = $ver->fetch();
	if($modo['adm'] == 2 AND $_POST['modo'] == 2 OR $modo['adm'] == 3 AND $_POST['modo'] == 2)
	{
	$prenom = "Modérateur";
	$titre_auteur = $_SESSION['prenom'];
	$classe = "xxx";
	}
	elseif($modo['adm'] == 3 AND $_POST['modo'] == 3)
	{
	$prenom = "Administrateur";
	$titre_auteur = $_SESSION['prenom'];
	$classe = "xxx";
	}
	else
	{}
	
	if(!empty($_FILES['image']['name'])){
	list($width, $height, $type, $attr) = getimagesize($_FILES['image']['tmp_name']);
		if($width>700 || $height>700) // si superieur à 300x300
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
	$id_auteur= $_SESSION['id']; //Récupération des infos sur l'auteur et du POST
	$classe=$_SESSION['classe'];
	$commentaire=$_POST['commentaire'];
	$id_billet=$_GET['billet'];

	$req = $bdd->prepare("INSERT INTO commentaires_ea (id_billet, auteur, id_auteur, classe, commentaire, image, date_commentaire) VALUES(:id_billet, :auteur, :id_auteur, :classe, :commentaire, :image, NOW())" );
	$req->execute(array(
			'id_billet' => $id_billet, 
			'auteur' => $prenom,
			'id_auteur' => $id_auteur,
			'classe' => $classe,
			'commentaire' => $commentaire,
			'image' => $image
			));
		try
		{
			$abdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		}
		catch (Exeption $e)
		{
			die('Erreur :' .$e->getMessage());
		}
		
		$abdd->exec("UPDATE membre SET nb_message = nb_message +1 WHERE prenom = '$prenom' ");
		
	$_SESSION['commentaire'] = 1; //Variable de session pour la supression de son dernier comment.
	
	header('Location: commentaires_ea.php?billet=' .$id_billet .'&page=' .$_GET['page']);
}
?>