<?php
session_start();
if(!empty($_SESSION['prenom'])){
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
	
	$prenom = $_SESSION['prenom'];
	$topic=$_GET['topic'];
	$id=$_GET['id'];
	
	$ver = $adm->query("SELECT adm FROM membre WHERE prenom = '$prenom'");
	$modo = $ver->fetch();
	
	if ($id==1)
	{
		$n_com=$bdd->query("SELECT COUNT(*) AS id FROM commentaires WHERE id_billet = '$topic'"); //Supression du topic
		$nb_com=$n_com->fetch();
		
		if($nb_com['id']==0 OR $modo['adm']==3)
		{
		$req=$bdd->query("SELECT image FROM billet WHERE id = '$topic'");
		$img=$req->fetch();
		if(!empty($img['image']))
		{
		$image=$img['image'];
		unlink("images/$image");
		}
		$bdd->exec("DELETE FROM billet WHERE id = '$topic'");
		$bdd->exec("DELETE FROM commentaires WHERE id_billet = '$topic'");
		}
		header('Location: index_forum.php');
	}
	elseif ($id==2)
	{
		$n_com=$bdd->query("SELECT COUNT(*) AS id FROM commentaires_bahut WHERE id_billet = '$topic'"); //Supression du topic
		$nb_com=$n_com->fetch();
		
		if($nb_com['id']==0 OR $modo['adm']==3)
		{
		$req=$bdd->query("SELECT image FROM billet_bahut WHERE id = '$topic'");
		$img=$req->fetch();
		if(!empty($img['image']))
		{
		$image=$img['image'];
		unlink("images/$image");
		}
		$bdd->exec("DELETE FROM billet_bahut WHERE id = '$topic'");
		$bdd->exec("DELETE FROM commentaires_bahut WHERE id_billet = $topic ");
		}
		header('Location: index_forum_bahu.php');
	}
	elseif ($id==3)
	{
		$n_com=$bdd->query("SELECT COUNT(*) AS id FROM commentaires_reste WHERE id_billet= '$topic'"); //Supression du topic
		$nb_com=$n_com->fetch();
		
		if($nb_com['id']==0 OR $modo['adm']==3)
		{
		$req=$bdd->query("SELECT image FROM billet_reste WHERE id = $topic ");
		$img=$req->fetch();
		if(!empty($img['image']))
		{
		$image=$img['image'];
		unlink("images/$image");
		}
		$bdd->exec("DELETE FROM billet_reste WHERE id = '$topic'");
		$bdd->exec("DELETE FROM commentaires_reste WHERE id_billet = $topic ");
		header('Location: index_forum_reste.php');
		}
	}
	elseif ($id==4)
	{
		$n_com=$bdd->query("SELECT COUNT(*) AS id FROM commentaires_ea WHERE id_billet= '$topic'"); //Supression du topic
		$nb_com=$n_com->fetch();
		
		if($nb_com['id']==0 OR $modo['adm']==3)
		{
		$req=$bdd->query("SELECT image FROM billet_ea WHERE id = $topic");
		$img=$req->fetch();
		if(!empty($img['image']))
		{
		$image=$img['image'];
		unlink("images/$image");
		}
		$bdd->exec("DELETE FROM billet_ea WHERE id = $topic");
		$bdd->exec("DELETE FROM commentaires_ea WHERE id_billet = $topic");
		header('Location: index_forum_ea.php');
		}
	}
	else
	{
	echo "<script type='text/javascript'>history.go(-1);</script>";
	}
}
else
{
echo "<script type='text/javascript'>history.go(-1);</script>";
}
?>