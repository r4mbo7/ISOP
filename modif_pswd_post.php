<?php
	session_start();
	
	if($_POST['pass1'] != $_POST['pass12'])
	{
		header('Location: modif_pswd.php?faux=1');
	}

	else
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		}
		catch (Exception $e)
		{
				die('Erreur : ' . $e->getMessage());
		}
		
			if(empty($_SESSION['prenom'])) //récupération du nom
			{
			$prenom=$_POST['nom'];
			}
			else
			{
			$prenom=$_SESSION['prenom'];
			}
			
		$pass_hache = sha1($_POST['pass']);
		$req = $bdd->prepare("SELECT * FROM membre WHERE pass = :pass AND nom = '$prenom' OR pass = :pass AND prenom = '$prenom' ");
		$req->execute(array(
			'pass' => $pass_hache
			));
		$resultat = $req->fetch();
		
		if(!$resultat)
		{
			header('Location: modif_pswd.php?faux=2');
		}
		
		else
		{
			$pass_hache = sha1($_POST['pass1']);
			$req = $bdd->prepare('UPDATE membre SET pass = :pass WHERE id = :id');
			$req->execute(array(
				'pass' => $pass_hache,
				'id' => $resultat['id']
				));	
			header('Location: modif_pswd.php?faux=3');
		}
	}
?>
		