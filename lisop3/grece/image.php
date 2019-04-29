<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/OTR/xhtml11/DTD/xhtml11.dtd">
<Html xml:lang="fr" dir:"ltr" xmlns="http://www.w3.org/1999/xhtml">
<Head>
	<link rel="shortcut icon" type="image/x-icon" href="images/Logo2.ico" />
	<meta name="Author" content="Constantin DE LA ROCHE" /> 
	<meta name="decription" content="ISOP, le site entre lycéens de Jean-Gi, forum, news et vote."> 
	<meta http-equiv="Content-Type" content="text/html" /> 
	<meta name="keywords" content="isop, ISOP, lisop, jean-gi, jean-giraudoux, lycée, lycéens, forum, news, vote" /> 
<title>Lisop</title>
<style type="text/css">
	body{
		background-image:url(../images/fond.png);
	}
	#tete{
		position:absolute;
		top:0px;
		left:0px;
		width:100%;
		height: 50px;
		background-image:url(../images/lisop.png);
		background-repeat: no-repeat;
		background-color:#000000;
		color: #FFFFFF;
	}
	#menu{
		position:absolute;
		top:16px;
		left:300px;
		border-spacing:10px;
	}
	#l_menu{
		border-radius: 10px 0px; -moz-border-radius: 10px;
		border-top: 2px solid #FFFFFF;
		border-left: 2px solid #FFFFFF;
		width: 75px;
		text-align:center;
		text-indent: 5px;
	}
	#l_menu a{
		color:#FFFFFF;
		text-decoration:none;
	}
	#l_menu a:hover{
		color:#F2F2F2;
		text-decoration:underline;
	}
	#corp{
		width:90%;
		padding-top: 10px;
		min-height:1000px;
		padding-bottom:50px;
		margin-left:5%;
		margin-top: 50px;
		background-color:#FFFFFF;
		text-align:center;
	}
	#prece{
		float:left;
	}
	#suiv{
		float:right;
	}
	#img{
		margin-top:50px;
		border:1px ridge gray;
		min-width:100px;
		max-width:90%;
		min-height:100px;
	}
	#describ{
		padding:5px;
		text-align:left;
		border-radius: 0px 10px; -moz-border-radius: 10px;
		border: 2px ridge gray;
		width:40%;
	}
	#tab_com{
		width:80%;
		margin-left:10%;
		border-collapse:collapse;
	}
	#info_auteur{
		margin-top:2px;
		width:20%;
		background-color: rgba(240, 240, 240, 0.75);
	}
	#id_auteur{
		color:black;
		text-decoration:none;
		font-size:12px;
	}
	#commentaire{
		margin-top:2px;
		width:80%;
		background-color: rgba(240, 240, 240, 0.75);
	}
	#form_com{
		font-size:12px;
		color:gray;
		width:90%;
	}
	#form_com:focus {
	  border-color: rgba(100, 100, 250, 1);
	  -moz-box-shadow: 10 0 8px rgba(100, 100, 250, 0.5);
	  -webkit-box-shadow: 10 0 8px rgba(100, 100, 250, 0.5);
	  box-shadow: 10 0 8px rgba(100, 100, 250, 0.5);
	  color:black;
	}
</style>
<script type="text/javascript">
	function verif()
	{
		if(document.getElementById('form_com').value=='' || document.getElementById('form_com').value=='Rédiger un commentaire...'){
			alert("Vous ne pouvez pas poster un commentaire vide...");
		}
		else{
			document.getElementById('form').submit();
		}
	}
	</script>
</head>
<body>
<div id="tete">
		<table id="menu">
			<tr>
				<td id="l_menu"><a href="../index.php">Accueil</a></td>
				<td id="l_menu"><a href="../news.php">News</a></td>
				<td id="l_menu"><a href="../forum.php">Forum</a></td>
			</tr>
		</table>
</div>
	<div id="corp">
<?php
	try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_images', 'lisopfr', 'hRkrKDkDy6', $pdo_options);
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
		
	$mbr = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	
	$id=$_GET['id'];
	$id_suv=$_GET['id']+1;
	$id_prec=$_GET['id']-1;
	$req=$bdd->query("SELECT * FROM image WHERE id=$id");
	$img=$req->fetch();
?>
<a href="image.php?id=<?php echo $id_prec;?>" id="prece">Image précedente</a>
<a href="image.php?id=<?php echo $id_suv;?>" id="suiv">Image suivante</a>
		
		<img id="img" alt="image" src="images/<?php echo $img['url'];?>" />
		<p id="describ"><?php echo $img['commentaire'];?></p>
	<table id="tab_com">
	<?php
		$c=$bdd->query("SELECT * FROM commentaire WHERE id_image=$id");
		while($donnees=$c->fetch()){
		$id_auteur=$donnees['id_auteur'];
		$if_auteur=$mbr->query("SELECT * FROM membre2 WHERE id=$id_auteur");
		$donnees_auteur=$if_auteur->fetch();
	?>
		<tr id="ligne">
			<td id="info_auteur" align="left" valign="top">
					<b><a href="perso.php?id=<?php echo $id_auteur;?>" id="id_auteur"><?php echo htmlspecialchars(stripslashes($donnees_auteur['prenom']));?></a></b><br>
					<div id="avatar">
						<?php
							if(empty($donnees_auteur['avatar']))
							{
						?>
						<img src="../avatars/none.png" width="50"/>
						<?php
							}
							else
							{
						?>
						<img src="../avatars/<?php echo $donnees_auteur['avatar'];?>" width="50"/>
						<?php
							}
						?>
					</div>
			</td>
			<td id="commentaire" align="left" valign="top">
					<?php
					if (preg_match("#<|>#i", $donnees['commentaire']))
					{
					?>
							<p><?php echo nl2br(htmlspecialchars(stripslashes($donnees['commentaire']))); ?></p>
					<?php
					}
					else
					{
					$commentaire=$donnees['commentaire'];
					include("smiley.php");
					?>
							<p><?php echo nl2br(stripslashes($commentaire)); ?></p>
					<?php
					}
					?>
			</td>
		</tr>
	<?php
		}
		if(isset($_SESSION['id'])){
		$id_auteur=$_SESSION['id'];
		$if_auteur=$mbr->query("SELECT prenom, avatar FROM membre2 WHERE id=$id_auteur");
		$donnees_auteur=$if_auteur->fetch();
	?>
		<tr>
			<td id="info_auteur" align="left" valign="top">
					<b><a href="perso.php?id=<?php echo $id_auteur;?>" id="id_auteur"><?php echo htmlspecialchars(stripslashes($donnees_auteur['prenom']));?></a></b><br>
					<div id="avatar">
						<?php
							if(empty($donnees_auteur['avatar']))
							{
						?>
						<img src="../avatars/none.png" width="50"/>
						<?php
							}
							else
							{
						?>
						<img src="../avatars/<?php echo $donnees_auteur['avatar'];?>" width="50"/>
						<?php
							}
						?>
					</div>
			</td>
			<td id="commentaire">
				<form action="commentaire.php" method="post" id="form">
					<input type="hidden" name="id_img" value="<?php echo $id;?>">
					<input type="text" name="commentaire" id="form_com" title="Taper ici votre commentaire"/><br>
				</form>
			</td>
		</tr>
	<?php 
		}
	?>
	</table>
	</div>
</body>
</html>