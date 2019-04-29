<?php
	session_start();
	
	if($_POST['prenom'] == '1' OR $_POST['modo'] == '1')
	{
		$prenom=$_SESSION['prenom'] ."Masqué";
	}
	elseif ($_POST['modo'] == '2')
	{
		$prenom="Modérateur";
	}
	elseif($_POST['modo'] == '3')	//formulaire pour admin
	{
		$prenom="Administrateur";
	}
	else
	{
		$prenom=$_SESSION['prenom'];
	}
if (preg_match("#batard|batarde|salop|salope|salopard|connard|connasse|enfoiré|pute|pd|connar|bite|enculé|putin#i", $_POST['titre']))
	{
	echo "<script type='text/javascript'>history.go(-1);</script>";
	}
else
{
	if (preg_match("#batard|batarde|salop|salope|salopard|connard|connasse|enforé|pute#i", $_POST['contenu']))
	{
	echo "<script type='text/javascript'>history.go(-1);</script>";
	}
	elseif ($_GET['id'] == '1' AND preg_match("#[a-z]{4,}#i", $_POST['titre'])) 
	{
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}
	if(!empty($_FILES['image']['name'])){
	list($width, $height, $type, $attr) = getimagesize($_FILES['image']['tmp_name']);
		if($width>700 || $height>700) // si superieur à 300x300
		{}
		else{
		$source=$_FILES['image']['tmp_name'];
		$destination= 'images/'.$_FILES['image']['name'];
		if($_FILES['image']['error']>0){
		die("erreur lors de transmission du fichier");
		}
		if(!move_uploaded_file($source, $destination)) {
		die("erreur lors de déplacement du fichier");
		}
		$image=$_FILES['image']['name'];
		}
	}
	else {
	$image='';
	}
		$req = $bdd->prepare("INSERT INTO billet (titre, contenu, image, date_creation, auteur) VALUES(:titre, :contenu, :image, NOW(), :auteur)" );
		$req->execute(array(
			'titre' => $_POST['titre'],
			'contenu' => $_POST['contenu'],
			'image' => $image,
			'auteur' => $prenom		
			));
		header("Location: index_forum.php");
	}
	elseif ($_GET['id'] == '2' AND preg_match("#[a-z]{4,}#i", $_POST['titre'])) 
	{
		try
		{ 
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
		}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
		if(!empty($_FILES['image']['name'])){
		$source=$_FILES['image']['tmp_name'];
		$destination= 'images/'.$_FILES['image']['name'];
		if($_FILES['image']['error']>0){
		die("erreur lors de transmission du fichier");
		}
		if(!move_uploaded_file($source, $destination)) {
		die("erreur lors de déplacement du fichier");
		}
		$image=$_FILES['image']['name'];
		}
		else {
		$image='';
		}
		$req = $bdd->prepare("INSERT INTO billet_bahut (titre, contenu, image, date_creation, auteur) VALUES(:titre, :contenu, :image, NOW(), :auteur)" );
		$req->execute(array(
				'titre' => $_POST['titre'],
				'contenu' => $_POST['contenu'],
				'image' => $image,
				'auteur' => $prenom		
				));
		header("Location: index_forum_bahu.php");
	}
	elseif ($_GET['id'] == '3' AND preg_match("#[a-z]{4,}#", $_POST['titre'])) 
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
		}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
		if(!empty($_FILES['image']['name'])){
		$source=$_FILES['image']['tmp_name'];
		$destination= 'images/'.$_FILES['image']['name'];
		if($_FILES['image']['error']>0){
		die("erreur lors de transmission du fichier");
		}
		if(!move_uploaded_file($source, $destination)) {
		die("erreur lors de déplacement du fichier");
		}
		$image=$_FILES['image']['name'];
		}
		else {
		$image='';
		}
		$req = $bdd->prepare("INSERT INTO billet_reste (titre, contenu, image, date_creation, auteur) VALUES(:titre, :contenu, :image, NOW(), :auteur)" );
		$req->execute(array(
				'titre' => $_POST['titre'],
				'contenu' => $_POST['contenu'],
				'image' => $image,
				'auteur' => $prenom		
				));
		header("Location: index_forum_reste.php");
	}
	elseif ($_GET['id'] == '4' AND preg_match("#[a-z]{4,}#", $_POST['titre'])) 
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
		}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
		if(!empty($_FILES['image']['name'])){
		$source=$_FILES['image']['tmp_name'];
		$destination= 'images/'.$_FILES['image']['name'];
		if($_FILES['image']['error']>0){
		die("erreur lors de transmission du fichier");
		}
		if(!move_uploaded_file($source, $destination)) {
		die("erreur lors de déplacement du fichier");
		}
		$image=$_FILES['image']['name'];
		}
		else {
		$image='';
		}
		$req = $bdd->prepare("INSERT INTO billet_ea (titre, contenu, image, date_creation, auteur) VALUES(:titre, :contenu, :image, NOW(), :auteur)" );
		$req->execute(array(
				'titre' => $_POST['titre'],
				'contenu' => $_POST['contenu'],
				'image' => $image,
				'auteur' => $prenom		
				));
		header("Location: index_forum_ea.php");
	}
	else 
	{
		echo "<script type='text/javascript'>history.go(-1);</script>"; 
	}
		if(empty($_SESSION['topic']))	//Controle du nombre de topic par connexion
		{ 
			$_SESSION['topic']=1;
		}
		else
		{
			$_SESSION['topic']= $_SESSION['topic']+1;
		}
}
?>