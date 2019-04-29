<?php
	session_start ();
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		}
		catch (Exeption $e)
		{
			die('Erreur :' .$e->getMessage());
		}
		
		$pass_hache = sha1($_POST['pass']);
		$req = $bdd->prepare('SELECT id, classe, prenom, adm FROM membre WHERE prenom = :prenom AND pass = :pass');
		$req->execute(array(
			'prenom' => $_POST['prenom'],
			'pass'=> $pass_hache
			));
		$resultat = $req->fetch();
		$req->closeCursor();
		
		if (!$resultat)
		{
		header('Location: connection1.php?verif=1');
		}
		else
		{
		$_SESSION['id']=$resultat['id'];
		$_SESSION['classe']=$resultat['classe'];
		$_SESSION['prenom']=$resultat['prenom'];
		$_SESSION['ip']=$_SERVER['REMOTE_ADDR'];
		$id= $resultat['id'];
		$ip = $_SERVER['REMOTE_ADDR'];
		$bdd->exec("UPDATE membre SET nb_connex = nb_connex +1, ip = '$ip' WHERE id = '$id' ");
		$bdd->exec("UPDATE compteur_visite SET nb_connex = nb_connex +1 WHERE id=1 ");
	
		if (empty($_GET['index']))
		{
			echo "<script type='text/javascript'>history.go(-2);</script>";
		}
		else
		{
			header('Location: index.php');
		}
		}
?>