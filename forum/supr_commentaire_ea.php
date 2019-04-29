<?php
	session_start();
	
	$id = $_GET['id'];
	$prenom = $_SESSION['id'];
	
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');	//connex a la bdd site	
	
	$ver = $adm->query("SELECT adm FROM membre WHERE id = '$prenom'");
	$modo = $ver->fetch();
	
	$test = $bdd->query("SELECT auteur, id_auteur FROM commentaires_ea WHERE id = $id ");	 //recupération de l'auteur et son id
	$x = $test->fetch();
	
	$auteur = $x['auteur'];
	$id_auteur = $x['id_auteur'];
	
	if ( $modo['adm'] == '2' OR $modo['adm'] == '3' OR $prenom == $id_auteur AND $_SESSION['commentaire'] == 1)
	{
		
		if ($auteur != "Modérateur" AND $auteur != "Administrateur")
		{
			$req=$bdd->query("SELECT image FROM commentaires_ea WHERE id = '$id'");
			$img=$req->fetch();
			if(!empty($img['image']))
			{
			$image=$img['image'];
			unlink("images/$image");
			}
			$adm->exec("UPDATE membre SET nb_message = nb_message -1 WHERE id='$id_auteur'"); //-1 a l'auteur du comment	
			
			$bdd->exec("DELETE FROM commentaires_ea WHERE id = '$id'");	//supression du comment
			echo "<script type='text/javascript'>history.go(-1);</script>";
		}
		elseif ($auteur == "Modérateur")
		{
			$req=$bdd->query("SELECT image FROM commentaires_ea WHERE id = '$id'");
			$img=$req->fetch();
			if(!empty($img['image']))
			{
			$image=$img['image'];
			unlink("images/$image");
			}
			$bdd->exec("DELETE FROM commentaires_ea WHERE id = '$id'");
			echo "<script type='text/javascript'>history.go(-1);</script>";
		}
		elseif ($auteur == "Administrateur" AND $modo['adm'] == '3')
		{
			$bdd->exec("DELETE FROM commentaires_ea WHERE id = '$id'");
			echo "<script type='text/javascript'>history.go(-1);</script>";
		}
		else
		{
			echo "Tu ne peux pas suprimer ce commentaire";
		}
		$_SESSION['commentaire'] = 0; 
	}
	else
	{
		echo "<script type='text/javascript'>history.go(-1);</script>";
	}
?>