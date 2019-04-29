<?php
	session_start ();
	$ban = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$ip = $_SERVER['REMOTE_ADDR'];
	$test=$ban->query("SELECT ip, motif FROM banis WHERE ip='$ip'");
	$reponce=$test->fetch();
	if(!empty($reponce['ip']))
	{
		echo "Cette ip a était banni. <br />Motif : " .htmlentities($reponce['motif']);
	}
	else
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
    <head>
        <title>Forum ISOP</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="shortcut icon" type="image/x-icon" href="Logo2.ico" />
		<meta name="decription" content="Site entre lyceen">
		<style type="text/css">
		<?php
		if(empty($_SESSION['theme']) OR $_SESSION['theme']==1)
		{?>
		body
		{
		background-image: url(fond_forum.png);
		background-repeat: no-repeat;
		height: 98%;
		width: 98%;		
		}
		#topic
		{
			position:absolute;
			top: 75px;
			left: 220px;
			width: 70%;
			min-width: 450px;
			overflow: hidden;
		}
		.titre
		{
			margin-top: 10px;
			margin-bottom: 20px;
			margin-left: 5px;
			margin-right: 5px;
			border-bottom: 2px ridge #C0C0C0;
			color: #0000AA;
		}
		.titre:hover
		{
			border: 2px ridge #C0C0C0;
			color:blue;
			background-color: #FFFFFF;
		}
		.titre a
		{
			color:blue;
		}
		.titre a:hover
		{
			color:red;
		}
		.modo
		{
			color:#4400AA;
		}
		.modo:hover
		{
			color:#00AA00;
		}
		.pages a
		{
			color: blue;
			text-decoration: none;
			text-aling: center;
		}
		.pages a:hover
		{
		color: red;
		text-decoration: underline;
		}
		.lien
		{
			color:blue;
			text-align:right;
		}
		<?php
		}
		else
		{?>
		body
		{
		background-image: url(fond_forum2.png);
		background-repeat: no-repeat;
		height: 98%;
		width: 98%;		
		}
		#topic
		{
			position:absolute;
			top: 75px;
			left: 220px;
			width: 70%;
			min-width: 450px;
			overflow: hidden;
		}
		.titre
		{
			margin-top: 10px;
			margin-bottom: 20px;
			margin-left: 5px;
			margin-right: 5px;
			border-bottom: 1px ridge #FFFFFF;
			color: black;
		}
		.titre a
		{
			color:red;
		}
		.titre a:hover
		{
			color:#333333;
		}
		.modo
		{
			color:#4400AA;
		}
		.modo:hover
		{
			color:#00AA00;
		}
		.pages a
		{
			color: red;
			text-decoration: none;
			text-aling: center;
		}
		.pages a:hover
		{
		color: blue;
		text-decoration: underline;
		}
		.lien
		{
			color:red;
			text-align:right;
		}
		<?php
		}?>
		</style>
    </head>
        
    <body>
<?php
include('co.php');
include('menu.php');
?>
	<div id="topic">
		<h3>Le reste :</h3>
<?php
// Connexion à la base de données
try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6', $pdo_options);
	
    // On récupère les 10 derniers billets
	if(empty($_GET['index'])){ //Selection de l'intervale de commentaire
	$index=1;
	}
	else{
	$index=$_GET['index'];
	}
	$fin = $index*15;
	$debut = $fin-15;

    $req = $bdd->query("SELECT id, block, signal, titre, contenu, vue, auteur, DATE_FORMAT(date_creation, \"%d/%m/%Y à %Hh%imin%ss\") AS date_creation_fr FROM billet_reste ORDER BY date_creation DESC LIMIT $debut, $fin");
    
	while ($donnees = $req->fetch())
    {
	$id = $donnees['id'];
	$nb_com = $bdd->query("SELECT COUNT(*) AS commentaire FROM commentaires_reste WHERE id_billet = '$id' "); //nombre de commentaires sur le topic
	$nombre_comment = $nb_com->fetch();
    ?>
    <li class="titre">
		<?php if($donnees['auteur'] == 'Modérateur' OR $donnees['auteur'] == 'Administrateur')
			{
		?>
			<div class="modo">
			<?php if($donnees['block'] == 1){echo " <img src='icon/block.png' alt='block' title='block'/> ";}else{}?>
			<a <?php if($donnees['block'] == 1){echo " style='color:black' ";}else{}?>href="commentaires_reste.php?billet=<?php echo $donnees['id']; ?>" title="<?php echo htmlspecialchars(stripslashes($donnees['contenu']));?>" ><?php echo htmlspecialchars(stripslashes($donnees['titre'])); ?></a>
			<i>le <?php echo $donnees['date_creation_fr'] .', ' .htmlspecialchars($donnees['auteur']); ?></i>
			<?php 
			if ($nombre_comment['commentaire'] == '0')
			{
				echo htmlentities("Pas encore de commentaire, soit le premier à commenter!");
			}
			else
			{
				echo "(" .$nombre_comment['commentaire'] ." commentaires)"; 
			}?>
			</div>
		<?php
			}
			elseif(preg_match("#Masqué#", $donnees['auteur'])) //Si l'auteur ne souhaite pas afficher son nom
			{
			?>
			<?php if($donnees['block'] == 1){echo " <img src='icon/block.png' alt='block' title='block'/> ";}else{}?>
			<a <?php if($donnees['block'] == 1){echo " style='color:black' ";}else{}?>href="commentaires_reste.php?billet=<?php echo $donnees['id']; ?>" title="<?php echo htmlspecialchars(stripslashes($donnees['contenu']));?>" ><?php echo htmlspecialchars(stripslashes($donnees['titre'])); ?></a>
		<i>le <?php echo $donnees['date_creation_fr']; ?></i>
		<?php 
				if ($nombre_comment['commentaire'] == '0')
				{
					echo htmlentities("Pas de commentaire, vien commenter!");
				}
				else
				{
					echo "(" .$nombre_comment['commentaire'] ." commentaires)"; 
				}
			}
			else
			{
		?>
		<?php if($donnees['block'] == 1){echo " <img src='icon/block.png' alt='block' title='block'/> ";}else{}?>
		<a <?php if($donnees['block'] == 1){echo " style='color:black' ";}else{}?>href="commentaires_reste.php?billet=<?php echo $donnees['id']; ?>" title="<?php echo htmlspecialchars(stripslashes($donnees['contenu']));?>" ><?php echo htmlspecialchars(stripslashes($donnees['titre'])); ?></a>
		<i>le <?php echo $donnees['date_creation_fr'] .', par ' .htmlspecialchars($donnees['auteur']); ?></i>
		<?php 
				if ($nombre_comment['commentaire'] == '0')
				{
					echo htmlentities("Pas de commentaire, vien commenter!");
				}
				else
				{
					echo "(" .$nombre_comment['commentaire'] ." commentaires)"; 
				}
			}
			
	if($donnees['vue']<25)
	{
	echo " <img src='icon/0.png' alt='nombre_vue' title='vue : " .$donnees['vue'] ." fois'/>";
	}
	elseif($donnees['vue']<50)
	{
	echo " <img src='icon/1.png' alt='nombre_vue' title='vue : " .$donnees['vue'] ." fois'/>";
	}
	elseif($donnees['vue']<100)
	{
	echo " <img src='icon/2.png' alt='nombre_vue' title='vue : " .$donnees['vue'] ." fois'/>";
	}
	elseif($donnees['vue']<150)
	{
	echo " <img src='icon/3.png' alt='nombre_vue' title='vue : " .$donnees['vue'] ." fois'/>";
	}
	elseif($donnees['vue']>150)
	{
	echo " <img src='icon/4.png' alt='nombre_vue' title='vue : " .$donnees['vue'] ." fois'/>";
	}
	else
	{}
			
	$titre = $donnees['titre'];
	$id_prenom = $_SESSION['id'];
	
	$bddfavori = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	
	$fav = $bddfavori->query("SELECT COUNT(*) AS id FROM favori_topic WHERE titre = '$titre' AND id_auteur = '$id_prenom' ");
	$resultats_favori = $fav->fetch();
	
	if ($resultats_favori['id'] == 0 )
	{}
	else
	{
		echo "<img src='icon/etoile.png' alt='topic favorie' title='topic favori'/>";
	}
			
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$id_prenom = $_SESSION['id'];
	$ver = $adm->query("SELECT adm FROM membre WHERE id = '$id_prenom'");
	$modo = $ver->fetch();
	
	if($modo['adm'] == 2 AND $donnees['block'] == 1 OR $modo['adm'] == 3 AND $donnees['block'] == 1) //Débloquer un topic
	{
		echo " <a href='block.php?id=".$donnees['id'] ."&amp;index=3'>Débloquer</a>";
	}
	elseif($modo['adm'] == 2 AND $donnees['block'] != 1 OR $modo['adm'] == 3 AND $donnees['block'] != 1) //Bloquer un topic
	{ ?>
	<a style='color:#978EF7' href='block.php?id=<?php echo $donnees['id'] ?>&amp;index=3' onclick="if(confirm('Bloquer ce topic ?')==true){ return true;} else{return false;}" >Bloquer</a>
	<?
	}
	else{} //Fin du stystéme de bloquage
	if($modo['adm'] == 1 AND $donnees['signal'] == 0 OR $modo['adm'] == 3 AND $donnees['signal'] == 0) //Signaler un topic
	{ ?>
	 // <a style='color:#8000FF' href='signal.php?id=<?php echo $donnees['id'] ?>&amp;index=3' onclick="if(confirm('Signaler ce topic ?')==true){ return true;} else{return false;}">Signaler</a>
	<?php
	}
	elseif($modo['adm'] == 2 AND $donnees['signal'] == 1)
	{
		echo "<u style='color:red'>Topic signalé</u>";
	}
	elseif($modo['adm'] == 1 AND $donnees['signal'] == 1 OR $modo['adm'] == 3 AND $donnees['signal'] == 1) //Topic signalé + lien pour "désignaler"
	{?>
	 // <a style='color:#8000FF' href='signal.php?id=<?php echo $donnees['id'] ?>&amp;index=3'><u style='color:red'>topic signalé</u></a>
	<?php
	}
	else
	{} //Fin du stystéme de signalement
	?>
    </li>
    <?php
    } // Fin de la boucle des billets
    $req->closeCursor();
    
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
		$req = $bdd->query("SELECT COUNT(*) AS titre FROM billet_reste");
		$reponse = $req->fetch();
		
		$rep = $reponse['titre'] / 20;
		while($rep > $nb_index)
		{
			$nb_index++;
		}
		
		?>
	<div class="pages">
	<?php 
		while($nb_index>$num_index)
		{
		$num_index++;
		if($num_index==$index) // Si c'est la page actuel
			{
			?>
				<a href="#" style="color:blue"><?php echo $num_index;?></a> - 
			<?php
			}
		else
			{
			?>
				<a href="index_forum_reste.php?index=<?php echo $num_index;?>"><?php echo $num_index;?></a> - 
			<?php
			}
		}//fin de la boucle
		?>
	</div>
	<div class="lien">
			<?php
			if(empty($_SESSION['prenom'])) {
			echo '';
			}	 
			else{
			?>
			<a href="nouveau_billet.php?id=3"><img src="icon/post.png" alt="Poster" title="Poster un topic" /></a>
			<?php
			}
			?>
	</div>
	</div>
</body>
</html>
<?php
	}
?>