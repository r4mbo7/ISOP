<?php 
session_start ();
	
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
	
	$id_prenom = $_SESSION['id'];
	$id = $_GET['id'];
	
	$ver = $adm->query("SELECT adm FROM membre WHERE id = '$id_prenom'");
	$modo = $ver->fetch();
	
	if($modo['adm'] > 0)
	{
		if($_GET['index']==1)
		{
		$b = $bdd->query("SELECT signal FROM billet WHERE id = '$id'");
		$signal = $b->fetch();
			if($signal['signal']==0)
			{
				$bdd->exec("UPDATE billet SET signal=1 WHERE id = '$id'");
			}
			else
			{
				$bdd->exec("UPDATE billet SET signal=0 WHERE id = '$id'");
			}
		header("Location: index_forum.php");
		}
		elseif($_GET['index']==2)
		{
		$b = $bdd->query("SELECT signal FROM billet_bahut WHERE id = '$id'");
		$signal = $b->fetch();
			if($signal['signal']==0)
			{
				$bdd->exec("UPDATE billet_bahut SET signal=1 WHERE id = '$id'");
			}
			else
			{
				$bdd->exec("UPDATE billet_bahut SET signal=0 WHERE id = '$id'");
			}
		header("Location: index_forum_bahu.php");
		}
		elseif($_GET['index']==3)
		{
		$b = $bdd->query("SELECT signal FROM billet_reste WHERE id = '$id'");
		$signal = $b->fetch();
			if($signal['signal']==0)
			{
				$bdd->exec("UPDATE billet_reste SET signal=1 WHERE id = '$id'");
			}
			else
			{
				$bdd->exec("UPDATE billet_reste SET signal=0 WHERE id = '$id'");
			}
		header("Location: index_forum_reste.php");
		}
		else{}
	}
else {}

?>