<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
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
		background-image:url(images/fond.png);
	}
	#tete{
		position:absolute;
		top:0px;
		left:0px;
		width:100%;
		height: 50px;
		background-image:url(images/lisop.png);
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
		text-indent: 5px;
		text-align:center;
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
		margin-left:5%;
		margin-top: 50px;
		background-color:#FFFFFF;
	}
	#titre{
		position:relative;
		top:15px;
		left:25px;
		font-size:30px;
	}
	#coeur{
		position:relative;
		top:50px;
		padding:20px;
	}
	#perso{
		width:75%;
		margin-left:10%;
		margin-top:20px;
		border-top: 1px solid #E6E6E6;
		border-left: 1px solid #E6E6E6;
		padding:10px;
	}
	#nom{
		text-indent:30px;
	}
</style>
</head>
<body>
	<div id="tete">
		<table id="menu">
			<tr>
				<td id="l_menu"><a href="index.php">Accueil</a></td>
				<td id="l_menu"><a href="news.php">News</a></td>
				<td id="l_menu"><a href="forum.php">Forum</a></td>
			</tr>
		</table>
	</div>
	<div id="corp">
		<b id="titre">Page perso</b>
		
		<div id="perso">
		<?php
		
		if(!empty($_GET['id']))
		$id=$_GET['id'];
		else{
		$id=$_SESSION['id'];
		}
		
		$req = $bdd->query("SELECT * FROM membre2 WHERE id=$id");
		$resultat = $req->fetch();
		$req->closeCursor();
		
		$dat = $bdd->query("SELECT DATE_FORMAT(date, '%d/%m/%Y %H:%i') AS date FROM membre2 WHERE id=$id");
		$date = $dat->fetch();
		$dat->closeCursor();
		
		$dm=$bdd->query("SELECT * FROM vote WHERE id_elut=$id");
		$voix=$dm->fetch();
		
		if($_SESSION['id'] == $id)
		{?>
		<h4 id="nom"><?php if(empty($resultat['prenom'])){echo "Non reseigné";}else{echo $resultat['prenom'];}?></h4>
		<div id="avatar">
			<?php
				if(empty($resultat['avatar']))
				{
			?>
			<img src="avatars/none.png" width="100"/>
			<?php
				}
				else
				{
			?>
			<img src="avatars/<?php echo $resultat['avatar'];?>" width="100"/>
			<?php
				}
			?>
		</div>
		<form action="modif_perso.php" method="post" enctype="multipart/form-data">
				<label for="image">Changer son avatar, <u>attention à la taille (taille optimal 100x100 pixels) et à l'extension (.gif, .jpg ou .png)</u>: </label>
				<input type="file" name="image" id="image"/>(La taille de l'image est proportionelle au temps de chargement)<br/>
				<input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
				Lycée : <input type="text" name="lycee" value="<?php echo $resultat['lycee'];?>"/><br>
				Préciser sa classe : <?php echo $resultat['classe'];?><input type="text" name="sc" value="<?php echo $resultat['sc'];?>" size="1"/><br>
				<?php	if(empty($resultat['mail'])){?>
				Adresse mail :<input type="text" name="mail"/><br>
				<?php 
				}
						else{?>
				Adresse mail :<input type="text" name="mail" value="<?php echo $resultat['mail'];?>" /><br>
				<?php
				}?>
				Date d'inscription : <i><?php if(empty($date['date'])){echo "Non reseigné";}else{echo $date['date'];}?></i><br>
				Nombre de commentaire : <i><?php if(empty($resultat['nb_commentaire'])){echo "Non reseigné";}else{echo $resultat['nb_commentaire'];}?></i><br>
				Nombre de connexion : <i><?php echo $resultat['nb_connex'];?></i><br>
				<input type="submit" value="Modifier mon profil">
		</form>
			<a href="quitter.php" title="Quitter lisop" style="font-size:13px;color:black;text-decoration:none"><i>Désactiver son compte</i></a>
		<?php
		}
		else
		{
		?>
		<h4 id="nom"><?php if(empty($resultat['prenom'])){echo "Non reseigné";}else{echo $resultat['prenom'];}?></h4>
		<div id="avatar">
			<?php
				if(empty($resultat['avatar']))
				{
			?>
			<img src="avatars/none.png" width="100"/>
			<?php
				}
				else
				{
			?>
			<img src="avatars/<?php echo $resultat['avatar'];?>" width="100"/>
			<?php
				}
			?>
		</div>
		Lycée : <i><?php if(empty($resultat['lycee'])){echo "Non reseigné";}else{echo $resultat['lycee'];}?></i><br>
		Classe : <i><?php if(empty($resultat['classe'])){echo "Non reseigné";}else{echo $resultat['classe'] .' ' .$resultat['sc'];}?></i><br>
		Email : <i><?php if(empty($resultat['mail'])){echo "Non reseigné";}else{echo $resultat['mail'];}?></i><br>
		Date d'inscription : <i><?php if(empty($date['date'])){echo "Non reseigné";}else{echo $date['date'];}?></i><br>
		Nombre de commentaire : <i><?php if(empty($resultat['nb_commentaire'])){echo "Non reseigné";}else{echo $resultat['nb_commentaire'];}?></i><br>
		Nombre de voix : <i><?php echo $voix['nb_voix'];?></i><br>
		Nombre de connexion : <i><?php echo $resultat['nb_connex'];?></i><br><br>
		<a href="message.php?id=<?php echo $id;?>" style="text-decoration:none;color:blue"> Envoyer un MP à <?php echo $resultat['prenom'];?></a>
		<?php
		}
		?>
		</div>
	</div>
</body>
</html>