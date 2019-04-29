<?php
	session_start();
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=membre', 'root', '');
	}
	catch (Exeption $e)
	{
		die('Erreur :' .$e->getMessage());
	}
	
	$pseudo=$_POST['pseudo'];
	$pass=$_POST['pass'];
	
	$rch = $bdd->query("SELECT * FROM membre WHERE pseudo='$pseudo' AND pass='$pass' ");
	
	if(!$rch){
		header('Location: index.php?err=1');
	}
	else{
	
		$rempl = $rch->fetch();
		
		if($_POST['souvenir']==1){
			setcookie('Pseud', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
			setcookie('Mdp', $_POST['pass'], time() + 365*24*3600, null, null, false, true);
		}
		
		$id=$rempl['id'];
		
		$bdd->exec("UPDATE membre SET nb_connex=nb_connex+1 WHERE id=$id");
		
			$_SESSION['id']=$id;
			$_SESSION['nom']=$rempl['nom'];
			$_SESSION['prenom']=$rempl['prenom'];
			$_SESSION['pseudo']=$rempl['pseudo'];
			header('Location: Accueil.php');
	}
?>