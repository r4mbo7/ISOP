<?php	session_start();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/OTR/xhtml11/DTD/xhtml11.dtd"><Html xml:lang="fr" dir:"ltr" xmlns="http://www.w3.org/1999/xhtml"><Head>	<link rel="shortcut icon" type="image/x-icon" href="images/Logo2.ico" />	<meta name="Author" content="Constantin DE LA ROCHE" /> 	<meta name="decription" content="ISOP, le site entre lyc�ens de Jean-Gi, forum, news et vote."> 	<meta http-equiv="Content-Type" content="text/html" /> 	<meta name="keywords" content="isop, ISOP, lisop, jean-gi, jean-giraudoux, lyc�e, lyc�ens, forum, news, vote" /> <title>Lisop</title><style type="text/css">	body{		background-image:url(images/fond.png);	}	#tete{		position:absolute;		top:0px;		left:0px;		width:100%;		height: 50px;		background-image:url(images/lisop.png);		background-repeat: no-repeat;		background-color:#000000;		color: #FFFFFF;	}	#menu{		position:absolute;		top:16px;		left:300px;		border-spacing:10px;	}	#l_menu{		border-radius: 10px 0px; -moz-border-radius: 10px;		border-top: 2px solid #FFFFFF;		border-left: 2px solid #FFFFFF;		width: 75px;		text-align:center;		text-indent: 5px;	}	#l_menu a{		color:#FFFFFF;		text-decoration:none;	}	#l_menu a:hover{		color:#F2F2F2;		text-decoration:underline;	}	#corp{		width:90%;		padding-top: 10px;		min-height:1000px;		margin-left:5%;		margin-top: 50px;		background-color:#FFFFFF;	}	#info_auteur{		border-right:1px solid #E6E6E6;		border-top:2px ridge #E8E8FF;		text-align:center;		width:20%;	}	#commentaire{		border-top:2px ridge #E8E8FF;	}	#id_auteur{		color:black;		text-decoration:none;	}	#id_auteur:hover{		color:blue;	}	#re{		background-color:#E8E8FF;		float:top;		width:100%;	}	#post{		width:95%;	}	#form_com{		color:#0C2033;	}</style><script type="text/javascript">	function verif()	{		if(document.getElementById('form_com').value=='' || document.getElementById('form_com').value=='Taper ici votre commentaire'){			alert("Vous ne pouvez pas poster un commentaire vide...");		}		else{			document.getElementById('form').submit();		}	}	</script></head><body>	<div id="tete">		<table id="menu">			<tr>				<td id="l_menu"><a href="index.php">Accueil</a></td>				<td id="l_menu"><a href="news.php">News</a></td>				<td id="l_menu"><a href="forum.php">Forum</a></td>			</tr>		</table>	</div>	<div id="corp">		<?php		try		{			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6', $pdo_options);			$mbr = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6', $pdo_options);		}		catch(Exception $e)		{			die('Erreur : '.$e->getMessage());		}				$id_s=$_SESSION['id'];				if(!empty($_SESSION['id']))		{		$ver = $mbr->query("SELECT adm FROM membre2 WHERE id = $id_s");		$modo = $ver->fetch();		$adm = $modo['adm'];		$ver->closeCursor();		}		else		{		$adm = 0;		}		if(!empty($_GET['topic'])){			$id_topic=$_GET['topic'];		}		else{			$id_topic=0;		}						$req=$bdd->query("SELECT id, type, id_auteur, titre, contenu, image, DATE_FORMAT(date_creation, \"%d/%m/%Y � %Hh%i\") AS date_fr FROM topic WHERE id=$id_topic");			$donnees_topic=$req->fetch();			if(!$donnees_topic['id']){			echo "Aucun topic trouv�";			}			else{			$id_auteur=$donnees_topic['id_auteur'];						$if_mb = $mbr->query("SELECT * FROM membre2 WHERE id=$id_auteur");			$donnees_auteur = $if_mb->fetch();						if(!empty($_SESSION['id'])){						$fv=$bdd->query("SELECT id_mbr, id_topic FROM favorie WHERE id_topic=$id_topic AND id_mbr=$id_s");			$test_fav=$fv->fetch();						if($_SESSION['id']==$test_fav['id_mbr']){			echo "<img src='icon/etoile.png'/> <i style='color:#FFBB1A'>Topic favori</i> <a href='supr_fav.php?id=" .$_GET['topic'] ."' style='color:red;text-decoration:none'>X</a>";			}			else{		?>			<a href="favorie.php?topic=<?php echo $id_topic;?>" id="lien_favori">Mettre ce topic en favori</a>			<?php			}			}?>		<table width="100%">			<CAPTION>			<h4><i><?php echo htmlspecialchars(stripslashes($donnees_topic['titre']));?></i></h4>			</CAPTION>			<tr>				<td id="info_auteur" align="left" valign="top">					<b><a href="perso.php?id=<?php echo $id_auteur;?>" id="id_auteur"><?php echo htmlspecialchars(stripslashes($donnees_auteur['prenom']));?></a></b><br>					<div id="avatar">						<?php							if(empty($donnees_auteur['avatar']))							{						?>						<img src="avatars/none.png" width="100"/>						<?php							}							else							{						?>						<img src="avatars/<?php echo $donnees_auteur['avatar'];?>" width="100"/>						<?php							}						?>					</div>					<i style="font-size:14px;">					<?php					if($donnees_auteur['adm']==3){					echo "<b>Administrateur</b><br>";					}					elseif($donnees_auteur['adm']==2){					echo "Mod�rateur<br>";					}					else{					$nb_commentaire=$donnees_auteur['nb_commentaire'];					$sexe=$donnees_auteur['sexe'];					include("grade.php");					echo $grade ."<br>";					}					?>					Nb commentaires : <?php echo $donnees_auteur['nb_commentaire'];?>					</i>					<?php					if($adm==3)					{					?>						<br><a href="supr_commentaire.php?topic=<?php echo $donnees_topic['id'];?>" style="text-decoration:none;color:black" title="Supprimer le topic">Supprimer</a>					<?php						}					?>				</td>				<td id="commentaire" align="left" valign="top">					<div id="re"><?php echo htmlspecialchars(stripslashes($donnees_topic['titre']));?> <i style="font-size:13px">[<?php echo $donnees_topic['date_fr'];?>]</i></div>					<?php					if (preg_match("#<|>#i", $donnees_topic['contenu']))					{						?>							<p><?php echo nl2br(htmlspecialchars(stripslashes($donnees_topic['contenu']))); ?></p>							<?php						if(!empty($donnees_topic['image']))						{?>						<img src="images/<?php echo $donnees_topic['image'];?>" />						<?php						}					}					else					{ 					$commentaire=$donnees_topic['contenu'];					include("smiley.php");						?>							<p><?php echo nl2br(stripslashes($commentaire)); ?></p>						<?php						if(!empty($donnees_topic['image']))						{?>						<img src="images/<?php echo $donnees_topic['image'];?>" />						<?php						}					}					?>				</td>			</tr>			<?php			if(empty($_GET['page'])){			$page = 1;			}			else{			$page=$_GET['page'];			}			$fin = $page*20;			$debut = $fin-20;						$dd = $bdd->query("SELECT id, id_auteur, commentaire, image, DATE_FORMAT(date, \"%d/%m/%Y � %Hh%i\") AS date_commentaire_fr FROM commentaires2 WHERE id_topic = $id_topic ORDER BY date LIMIT $debut,$fin ");			while ($donnees = $dd->fetch())			{				$id_auteur=$donnees['id_auteur'];				$if_mb = $mbr->query("SELECT * FROM membre2 WHERE id=$id_auteur");				$donnees_a = $if_mb->fetch();				?>			<tr>				<td id="info_auteur" align="left" valign="top">				<b><a href="perso.php?id=<?php echo $donnees_a['id'];?>" id="id_auteur"><?php echo htmlspecialchars(stripslashes($donnees_a['prenom']));?></a></b><br>					<div id="avatar">						<?php							if(empty($donnees_a['avatar']))							{						?>						<img src="avatars/none.png" width="100"/>						<?php							}							else							{						?>						<img src="avatars/<?php echo $donnees_a['avatar'];?>" width="100"/>						<?php							}						?>					</div>					<i style="font-size:14px;">					<?php					if($donnees_a['adm']==3){					echo "Administrateur<br>";					}					elseif($donnees_a['adm']==2){					echo "Mod�rateur<br>";					}					else{					$nb_commentaire=$donnees_a['nb_commentaire'];					$sexe=$donnees_a['sexe'];					include("grade.php");					echo $grade ."<br>";					}					?>					Nb commentaires : <?php echo $donnees_a['nb_commentaire'];?>					</i>					<?php					if($adm==3)					{					?>						<br><a href="supr_commentaire.php?id=<?php echo $donnees['id'];?>" style="text-decoration:none;color:black" onclick="if(confirm('Comfirmer la suppression ce commentaire ?')==true){ return true;} else{return false;}" title="Supprimer">Supprimer</a>					<?php						}					?>				</td>				<td id="commentaire" align="left" valign="top">					<div id="re"><?php echo htmlspecialchars(stripslashes($donnees_topic['titre']));?> <i style="font-size:13px">[<?php echo $donnees['date_commentaire_fr'];?>]</i></div>					<?php					if (preg_match("#<|>#i", $donnees['commentaire']))					{						?>							<p><?php echo nl2br(htmlspecialchars(stripslashes($donnees['commentaire']))); ?></p>					<?php						if(!empty($donnees['image']))						{?>						<img src="images/<?php echo $donnees['image'];?>" />					<?php						}					}					else					{					$commentaire=$donnees['commentaire'];					include("smiley.php");						?>							<p><?php echo nl2br(stripslashes($commentaire)); ?></p>					<?php						if(!empty($donnees['image']))						{?>						<img src="images/<?php echo $donnees['image'];?>" />					<?php						}					}					?>				</td>			</tr>			<?php			}?>		</table>		<?php			$n_com=$bdd->query("SELECT COUNT(*) AS id FROM commentaires2 WHERE id_topic=$id_topic");			$nb_com=$n_com->fetch();			if($nb_com['id']==0)			{			$nb_comment=1;			}			else			{			$nb_comment=$nb_com['id'];			}			$rep = $nb_comment / 20;			while($rep > $nb_page)			{				$nb_page++;			}			if($page==$nb_page)			{				if(empty($_SESSION['prenom']))				{					echo htmlentities("Connectes toi pour commenter");				}				else				{		?>		<div id="post">					<form action="commentaire_post.php?topic=<?php echo $_GET['topic'];?>&amp;page=<?php echo $page;?>" method="post" enctype="multipart/form-data" id="form">			<fieldset>				<legend>Commenter</legend>			<textarea name="commentaire" rows="4" COLS="80" id="form_com" title="Taper ici votre commentaire"></textarea><br>				<input type="button" title="commenter" value="commenter" onClick="verif()"/><br>				<label for="image">Image : </label>				<input type="file" name="image" id="image" /><br/>			</fieldset>			</form>		<a href="forum.php?id=<?php echo $donnees_topic['type'];?>" style="color:blue;font-size:13px;float:right"><i>Retour</i></a>		</div>		Page :		<?php				}			}			$num_page=0;			while($nb_page>$num_page)			{			$num_page++;			if($num_page==$page)				{				?>					<a href="#" style="color:black"><?php echo $num_page;?></a> - 				<?php				}			else				{				?>					<a href="commentaire.php?topic=<?php echo $id_topic;?>&amp;page=<?php echo $num_page;?>" style="color:blue"><?php echo $num_page;?></a> - 				<?php				}			}		}			?>	</div></body></html>