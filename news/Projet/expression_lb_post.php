<?php	
	session_start ();
	if($_POST['masque'] == '0')
	{
		$prenom=$_SESSION['prenom'];
	}
	elseif($_POST['masque'] == '1')
	{
		$prenom=$_SESSION['prenom'] ."masque";
	}
	else
	{
		$prenom=$_SESSION['prenom'];
	}
	if (preg_match("#batard|batarde|salop|salope|salopard|connard|connasse|enfoiré|pute|pd|connar|bite|enculé|putin#i", $_POST['message']))
	{
	header('Location: expression_lb.php?id=1');
	}
	else
	{
	try	
	{		
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_news', 'lisopfr', 'hRkrKDkDy6');	
	}	
	catch (Exception $e)	
	{		
	die('Erreur : ' . $e->getMessage());	
	}	
	
	$req = $bdd->prepare("INSERT INTO exp_lb(titre, message, auteur, id_auteur, validation, date) VALUES(:titre, :message, :auteur, :id_auteur, 'non', CURDATE())");	
	$req->execute(array(		
	'titre' => $_POST['titre'],		
	'message' => $_POST['message'],		
	'auteur' => $prenom,
	'id_auteur' => $_SESSION['id']
	));	
	header('Location: expression_lb.php?ok=2');
	}
?>