<?php 
	session_start ();
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
		#comment
		{
			position:absolute;
			top: 75px;
			left: 220px;
			width: 70%;
			min-width: 450px;
			overflow: hidden;
			color:blue;
		}
		.titre
		{
			border-bottom: 1px ridge black;
		}
		.titre p
		{
			color:black;
		}
		.titre a
		{
			color:black;
			font-size:12px;
		}
		.titre a:hover
		{
			color:red;
			font-size:14px;
		}
		.commentaire
		{
			margin-top: 20px;
			min-height:150px;
		}
		.re
		{
			height: 20px;
			color:balck;
			background-color:#E9F6FD;
			border-top:2px ridge blue;
			padding-bottom:0px;
		}
		.info_auteur
		{
			color:#718AB9;
			border-right:1px solid #F0F0F0;
			width:20%;
			float:left;
			font-size:12px;
		}
		.info_auteur a
		{
			font-size:16px;
			color:#284B72;
		}
		.texte_com
		{
			color:black;
			margin-left: 20%;
			border-left:1px ridge #F0F0F0;
		}
		#img_com
		{
		}
		.admin u
		{
			color: #4400AA;
			font-size: 18;
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
		#comment
		{
			position:absolute;
			top: 75px;
			left: 220px;
			width: 70%;
			min-width: 450px;
			overflow: hidden;
			color:red;
		}
		.titre
		{
			border-bottom: 1px ridge black;
		}
		.titre p
		{
			color:black;
		}
		.titre a
		{
			color:black;
			font-size:12px;
		}
		.titre a:hover
		{
			color:red;
			font-size:14px;
		}
				.commentaire
		{
			margin-top: 20px;
			min-height:150px;
		}
		.re
		{
			height: 20px;
			color:black;
			background-color:#FFAAAA;
			border-top:2px ridge red;
			padding-bottom:0px;
		}
		.info_auteur
		{
			color:#FF2A2A;
			border-right:1px solid #CCCCCC;
			width:20%;
			float:left;
			font-size:12px;
		}
		.info_auteur a
		{
			font-size:16px;
			color:#550000;
		}
		.texte_com
		{
			color:black;
			margin-left: 20%;
			border-left:1px ridge #CCCCCC;
		}
		.admin u
		{
			color: #4400AA;
			font-size: 18;
		}
		<?php
		}?>
		</style>
    </head>
    <body>
<?php 
include("menu.php");
include("co.php");
?>
 <div id="comment">
<?php
if(empty($_GET['billet']))
{
	echo htmlentities("Désolé mais aucun topic n'a était sélectionné.") ."<a href='index_forum.php'>Liste des topics</a>";
}
else
{
// Connexion à la base de données
try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6', $pdo_options);
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
    
    // Récupération du billet
	$billet = $_GET['billet'];
	if(empty($_GET['page']) AND !empty($_SESSION['prenom']))
	{
	$bdd->exec("UPDATE billet_ea SET vue = vue+1 WHERE id=$billet");
	}
	else
	{}
    $req = $bdd->query("SELECT id, block, titre, contenu, image, auteur, DATE_FORMAT(date_creation, \"%d/%m/%Y à %Hh%imin%ss\") AS date_creation_fr FROM billet_ea WHERE id='$billet' ");
    $donnees_topic = $req->fetch();
	
	$block=$donnees_topic['block'];
    ?>
    
    <div class="titre">
        <h3 <?php if($donnees['block']==1){echo "style='color:#C0C0C0'";} else{}?> >
            <?php echo htmlspecialchars(stripslashes($donnees_topic['titre'])); ?>
            <em>
			<?php 
			if(preg_match("#Masqué#", $donnees_topic['auteur'])) //Si l'auteur ne souhaite pas afficher son nom
			{
			echo ' le '.$donnees_topic['date_creation_fr']; 
			}
			else
			{
			echo "par " .$donnees_topic['auteur'] .' le '.$donnees_topic['date_creation_fr']; 
			}
			?>
			</em>
			
			<?php 
			// Le topic est-il deja en favori?
			$titre = $donnees_topic['titre'];
			$id_auteur = $_SESSION['id'];
			$fav = $adm->query("SELECT COUNT(*) AS id FROM favori_topic WHERE titre = '$titre' AND id_auteur = '$id_auteur' ");
			$resultats_favori = $fav->fetch();
			if ($resultats_favori['id'] == 0 )
			{?>
			<a href="favori_topic_post.php?billet=<?php echo $donnees_topic['id'];?>&amp;num=4">Ajouter ce topics aux Favoris</a>
			<?php
			}
			else
			{
			echo "<a href='favori_topic.php'><img src='icon/favorie.png' alt='topic favorie' title='topic favori'/></a>";
			}
			?>
			
		</h3>
		<?php
        if (preg_match("#<|>#i", $donnees_topic['contenu']))
		{
			?>
			<p><?php echo nl2br(htmlspecialchars(stripslashes($donnees_topic['contenu']))); ?></p>
			<?php
			if(!empty($donnees['image']))
			{?>
			<img src="images/<?php echo $donnees_topic['image']?>" />
			<?php
			}
		}
		else
		{ 
			$commentaire=$donnees_topic['contenu'];	
			include("smiley.php");
			?>
			<p><?php echo nl2br(stripslashes($commentaire)); ?></p>
			<?php
			if(!empty($donnees['image']))
			{?>
			<img src="images/<?php echo $donnees_topic['image']?>" />
			<?php
			}
		}
		
	$id = $_SESSION['id'];
	$pren=$_SESSION['prenom'];
	
	$ver = $adm->query("SELECT adm FROM membre WHERE id = '$id'"); //Recuperation de la valeur adm
	$modo = $ver->fetch();
	
	$n_com=$bdd->query("SELECT COUNT(*) AS id FROM commentaires_ea WHERE id_billet=$billet "); //Supression du topic
	$nb_com=$n_com->fetch();
	
	if($nb_com['id']==0 AND preg_match("#$pren#", $donnees_topic['auteur']) AND !empty($_SESSION['prenom']))
	{?>
	<br/>
	<a href="supr_topic.php?id=4&amp;topic=<?php echo $donnees_topic['id'];?>">Suprimer le topic</a>
	<?php
	}?>

    </div>
    <?php
    $req->closeCursor(); //on libère le curseur pour la prochaine requête
    
	if(empty($_GET['page'])){ //Selection de l'intervale de commentaire
	$page = 1;
	}
	else{
	$page=$_GET['page'];
	}
	$fin = $page*20;
	$debut = $fin-20;
	
    // Récupération des commentaires
    $req = $bdd->query("SELECT id, auteur, id_auteur, titre_auteur, classe, commentaire, image, DATE_FORMAT(date_commentaire, \"%d/%m/%Y à %Hh%imin%ss\") AS date_commentaire_fr FROM commentaires_ea WHERE id_billet = '$billet' ORDER BY date_commentaire LIMIT $debut,$fin ");

    while ($donnees = $req->fetch())
    {
	?>

	<div class="commentaire">
	
		<div class="re">Re : <?php echo htmlspecialchars(stripslashes($donnees_topic['titre'])) ." <i style='font-size:14px'>le " .$donnees['date_commentaire_fr'] .'</i>';?></div>
		
		<div class="info_auteur">
			<p>
			<?php
			$id_auteur=$donnees['id_auteur'];
			$if=$adm->query("SELECT * FROM membre WHERE id=$id_auteur");
			$info=$if->fetch();
			echo "<b><a href='Pageperso.php?id=" .$donnees['id_auteur'] ."' style='text-decoration:none'>" .htmlspecialchars(stripslashes($info['prenom'])) .'</a></b><br/>';
			include("grade.php");
			echo htmlspecialchars(stripslashes($titre_auteur)) .'<br/>';
			echo "Messages : " .$info['nb_message'];
			$id = $_SESSION['id'];
			$demande=$bdd->query("SELECT id_auteur, commentaire FROM commentaires_ea WHERE id_auteur = '$id' ORDER BY ID DESC LIMIT 0,1"); //Recuperation du dérnier commentaire
			$supr=$demande->fetch();
			if ( $modo['adm'] == '2' OR $modo['adm'] == '3' ) //Si c'est un admin, affichage du lien supr.
			{
				echo "<br/><a style='color:#C0C0C0' href='supr_commentaire_ea.php?id=" .$donnees['id'] ."'>Supprimer</a>";
			}
			elseif($donnees['commentaire'] == $supr['commentaire'] AND $_SESSION['commentaire'] == 1 AND $_SESSION['id'] == $supr['id_auteur'])
			{
				echo "<br/><a style='color:#C0C0C0' href='supr_commentaire_ea.php?id=" .$donnees['id'] ."'>Supprimer</a>";
			}
			else{}
			?>
			</p>
		</div>
		
		<div class="texte_com">
		
			<?php
			if (preg_match("#<|>#i", $donnees['commentaire']))
			{
				?>
				</p>
					<p><?php echo nl2br(htmlspecialchars(stripslashes($donnees['commentaire']))); ?></p>
			<?php
				if(!empty($donnees['image']))
				{?>
				<img src="images/<?php echo $donnees['image']?>" id="img_com"/>
				<?php
				}
			}
			else
			{ 
			$commentaire=$donnees['commentaire'];
			include("smiley.php");
				?>
					<p><?php echo nl2br(stripslashes($commentaire)); ?></p>
			<?php
				if(!empty($donnees['image']))
				{?>
				<img src="images/<?php echo $donnees['image']?>" id="img_com"/>
				<?php
				}
			}
			?>
		
		</div>
		
	</div>
	
    <?php
    } // Fin de la boucle des commentaires
    $req->closeCursor();
}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

	$n_com=$bdd->query("SELECT COUNT(*) AS id FROM commentaires_ea WHERE id_billet=$billet "); // Début de l'algorythme
	$nb_com=$n_com->fetch();
	if($nb_com['id']==0)
	{
	$nb_comment=1;
	}
	else
	{
	$nb_comment=$nb_com['id'];
	}
	$rep = $nb_comment / 20;
	while($rep > $nb_page)
	{
		$nb_page++;
	}
	if($page==$nb_page) // Si c'est la dernierre page
	{
		?>
		<div id="post">
		<?php 
		if($block==1)
		{
		echo "Topic bloqué <img src='icon/block.png' alt='block' title='block'/>";
		}
		else
		{
			if(empty($_SESSION['prenom']))
			{
				echo htmlentities("Connectes toi pour commenter");
			}
			else
			{
		?>
			<form action="commentaire_post_ea.php?billet=<?php echo $_GET['billet'];?>&amp;page=<?php echo $page;?>" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend>Rédiger un commentaire</legend>
			<textarea name="commentaire" rows="4" cols="75">
			</textarea>
			<input type="image" src="icon/envoyer.png" title="commenter" /><br/>
			<?php
			if ($modo['adm'] == 2)
			{
			?>
				<input type="radio" name="modo" value="0" id="O" checked="checked" /> <label for="0">Poster normalement</label><br />
				<input type="radio" name="modo" value="2" id="2" /> <label for="2">Poster comme Moderateur</label><br />
			<?
			}
			elseif ($modo['adm'] == 3)
			{
			?>
				<input type="radio" name="modo" value="0" id="O" /> <label for="0">Poster normalement</label><br />
				<input type="radio" name="modo" value="2" id="2" /> <label for="2">Poster comme Moderateur</label><br />
				<input type="radio" name="modo" value="3" id="3" /> <label for="3">Poster comme Administrateur</label><br />
			<?php
			} 
			else
			{}
			?><br/>
			<label for="image">Joindre une image (700x700 pixels max) : </label>
			<input type="file" name="image" id="image"/><br/>
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
			</fieldset>
			</form>
		<?php
			}
		} // Fin du else(commentaire non bloqué)
		?>
		</div>
		<?php
		while($nb_page>$num_page)
		{
			$num_page++;
			if($num_page==$page) // Si c'est la page actuel
			{
			?>
				<a href="#" style="color:blue"><?php echo $num_page;?></a> - 
			<?php
			}
			else
			{
			?>
				<a href="commentaires_ea.php?billet=<?php echo $billet;?>&amp;page=<?php echo $num_page;?>"><?php echo $num_page;?></a> -
			<?php
			}
		}
	}
	else
	{
		$num_page=0;
		while($nb_page>$num_page)
		{
		$num_page++;
		if($num_page==$page) // Si c'est la page actuel
			{
			?>
				<a href="#" style="color:blue"><?php echo $num_page;?></a> - 
			<?php
			}
		else
			{
			?>
				<a href="commentaires_ea.php?billet=<?php echo $billet;?>&amp;page=<?php echo $num_page;?>"><?php echo $num_page;?></a> - 
			<?php
			}
		}//fin de la boucle
	}
}
	?>
</div>
</div>
</body>
</html>