<?php
	session_start();
	$id_s = $_SESSION['id'];
	
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
	
	$ver = $adm->query("SELECT adm FROM membre WHERE id = $id_s");
	$modo = $ver->fetch();
	

	if(!empty($_GET['id'])){
		if ($modo['adm'] == 3 OR $modo['adm'] ==2)
		{
			$id = $_GET['id'];
			
			$req=$bdd->query("SELECT * FROM commentaires2 WHERE id = $id");
			$img=$req->fetch();
	
			$id_auteur=$img['id_auteur'];
			if(!empty($img['image']))
			{
			$image=$img['image'];
			unlink("images/$image");
			}
			$adm->exec("UPDATE membre2 SET nb_commentaire = nb_commentaire-1 WHERE id=$id_auteur");	
			
			$bdd->exec("DELETE FROM commentaires2 WHERE id = '$id'");
			echo "<script type='text/javascript'>history.go(-1);</script>";

		}
	}
	elseif(!empty($_GET['topic'])){
		if ($modo['adm'] == 3)
		{
			$id=$_GET['topic'];
			
			$req=$bdd->query("SELECT * FROM commentaires2 WHERE id_topic = $id");
			while($img=$req->fetch()){
			$id_auteur=$img['id_auteur'];
			if(!empty($img['image']))
			{
			$image=$img['image'];
			unlink("images/$image");
			}
			$adm->exec("UPDATE membre2 SET nb_commentaire = nb_commentaire-1 WHERE id=$id_auteur");	
			}
			
			$im=$bdd->query("SELECT image FROM topic WHERE id = $id");
			$top=$im->fetch();
	
			if(!empty($top['image']))
			{
			$image=$top['image'];
			unlink("images/$image");
			}
			
			$bdd->exec("DELETE FROM commentaires2 WHERE id_topic = '$id'");
			
			$bdd->exec("DELETE FROM topic WHERE id = '$id'");
			
			echo "<script type='text/javascript'>history.go(-1);</script>";
		}
	}
	
	else
	{
		echo "<script type='text/javascript'>history.go(-1);</script>";
	}
?>