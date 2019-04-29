<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" > 
	<head> 
		<title>Topic favoris</title> 
		<link rel="shortcut icon" type="image/x-icon" href="../images/Logo2.ico" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style type="text/css">
		<?php
		if(empty($_SESSION['theme']) OR $_SESSION['theme']==1)
		{?>
		body 
		{
			background-image: url(fond_forum.png);
			background-color: #FFFFFF;
			background-repeat: no-repeat;
		}
		a
		{
			color: #000000;
		}
		a:hover
		{
			color: blue;
			font-size: 18px;
		}
		#favori
		{
			position:absolute;
			top: 100px;
			left: 220px;
		}
		#supr a
		{
			color: #9FA1A4;
			text-decoration: none;
		}
		i
		{
			text-decoration: none;
		}
		i:hover
		{
			font-size: 15px;
			color: red;
		}
		<?php
		}
		else
		{?>
		body 
		{
			background-image: url(fond_forum2.png);
			background-color: #FFFFFF;
			background-repeat: no-repeat;
		}
		a
		{
			color: #000000;
		}
		a:hover
		{
			color: red;
			font-size: 18px;
		}
		#favori
		{
			position:absolute;
			top: 100px;
			left: 220px;
		}
		#supr a
		{
			color: #9FA1A4;
			text-decoration: none;
		}
		i
		{
			text-decoration: none;
		}
		i:hover
		{
			font-size: 15px;
			color: blue;
		}
		<?php
		}
		?>
		</style>
	</head>
	<body>
	<div id="favori">
<?php
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');			
		}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
	
	$id_auteur=$_SESSION['id'];
	
	$nb_fav = $bdd->query("SELECT COUNT(*) AS id FROM favori_topic WHERE id_auteur='$id_auteur' "); //nombre de commentaires sur le topic
	$nombre_fav = $nb_fav->fetch();
	
	if($nombre_fav['id']==0)
	{
		echo "<spam>Aucun topic favori<spam> <br>";
	}
	else
	{
	$bddf = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
	$reponse=$bdd->query("SELECT * FROM favori_topic WHERE id_auteur='$id_auteur'");
		
	while ($donnees=$reponse->fetch())
{
	$id_billet=$donnees['id_billet'];
	if (preg_match("#ea#", $donnees['url']))
	{
		$nb_com = $bddf->query("SELECT COUNT(*) AS commentaire FROM commentaires_ea WHERE id_billet = '$id_billet' "); //nombre de commentaires sur le topic
		$nombre_comment = $nb_com->fetch();
	}
	elseif (preg_match("#bahu#", $donnees['url']))
	{
		$nb_com = $bddf->query("SELECT COUNT(*) AS commentaire FROM commentaires_bahut WHERE id_billet = '$id_billet' "); //nombre de commentaires sur le topic
		$nombre_comment = $nb_com->fetch();
	}
	elseif(preg_match("#reste#", $donnees['url']))
	{
		$nb_com = $bddf->query("SELECT COUNT(*) AS commentaire FROM commentaires_reste WHERE id_billet = '$id_billet' "); //nombre de commentaires sur le topic
		$nombre_comment = $nb_com->fetch();
	}
	else
	{
		$nb_com = $bddf->query("SELECT COUNT(*) AS commentaire FROM commentaires WHERE id_billet = '$id_billet' "); //nombre de commentaires sur le topic
		$nombre_comment = $nb_com->fetch();
	}
?>
		<a href="<?php echo $donnees['url'];?>"><?php echo htmlentities(stripslashes($donnees['titre'])); ?></a> : <?php echo $nombre_comment['commentaire'] ." commentaires";?> <div id="supr" ><a href="supr_favori.php?id=<?php echo $donnees['id'];?>"> <i>suprimer</i></a></div><BR />
		
<?php
}
	}
?>
	<a href="index_forum.php">Retour au forum</a>
	</div>
	</body>
</html>