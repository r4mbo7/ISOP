<?php
	session_start();
	if(empty($_POST['mp'])){
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
	#msg{
		text-indent:10px;
	}
	#lien_rep{
		margin-left:20px;
		color:#FF0094;
		font-size:13px;
		text-decoration:none;
	}
	#lien_rep:hover{
		text-decoration:underline;
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
		<b id="titre">Message</b>
			<div id="coeur">
		<?php
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
		$id=$_SESSION['id'];
		$bdd->exec("UPDATE MP SET vue=1 WHERE id_destinataire=$id");
		$reponse = $bdd->query("SELECT id, id_auteur, MP, DATE_FORMAT(date, '%d/%m/%Y') AS date FROM MP WHERE id_destinataire=$id ORDER BY id DESC");
		while ($donnees = $reponse->fetch())
		{
		$id_auteur=$donnees['id_auteur'];
		$l=$bdd->query("SELECT prenom FROM membre2 WHERE id=$id_auteur");
		$info=$l->fetch();
		if($id_auteur!=0){
		?>
		<div id="msg">
		<a href="perso.php?id=<?php echo $id_auteur;?>" style="color:#8000FF"><?php echo $info['prenom'];?></a> <i>[<?php echo $donnees['date'];?>]</i>
			<?php
		}
		else{
		echo "Info <i>le " .$donnees['date'] ."</i> : ";
		}
					if (preg_match("#<|>#i", $donnees['MP']))
					{
						?>
							<p><?php echo nl2br(htmlspecialchars(stripslashes($donnees['MP']))); ?><br/><a href="message.php?id=<?php echo $id_auteur;?>" id="lien_rep" title="Repondre">Repondre</a></p>
						<?php
					}
					else
					{ 
					$commentaire=$donnees['MP'];
					include("smiley.php");
						?>
							<p><?php echo nl2br(stripslashes($commentaire)); ?><br/><a href="message.php?id=<?php echo $id_auteur;?>" id="lien_rep" title="Repondre">Repondre</a></p>
						<?php
					}
					?>
			<a href="supr_mp.php?id=<?php echo $donnees['id']?>" style="text-decoration:none;color:black;font-size:13px"><i>//Supprimer</i></a></p><br>
			</div>
		<?php
		}
		?>
		<a href="message.php?id=a" style="color:blue">Envoyer un mp</a><br>
	<?php 
	if(!empty($_GET['id'])){
	?>
		<form action="message.php" method="post">
			<fieldset>
			<legend>Envoyer un mp</legend>
			<label for="destinataire">Destinataire : </label>
				<select name="destinataire" id="destinataire">
					<?php
					if(!empty($_GET['id']) AND $_GET['id'] != 'a'){
					$desti=$_GET['id'];
					$p = $bdd->query("SELECT id, prenom FROM membre2 WHERE id=$desti");
					$perso = $p->fetch();
					?>
					<option value="<?php echo $perso['id'];?>">
						<?php
						echo $perso['prenom'];
						?>
					</option>
					<?php
					}
					$req = $bdd->query("SELECT id, prenom FROM membre2 ORDER BY prenom ASC");
					while ($liste = $req->fetch())
					{?>
					<option value="<?php echo $liste['id'];?>">
						<?php
						echo $liste['prenom'];
						?>
					</option>
					<?php
					}
					?>
				</select><br>
			<textarea name="mp" rows="4" cols="75">
			</textarea><br>
			<input type="image" src="icon/envoyer.png" title="Poster" />
			</fieldset>
		</form>
	<?php
	}
	elseif(!empty($_GET['ok'])){
	?>
	<i>Message envoyé</i>
	<?php
	}
	?>
		</div>
	</div>
</body>
</html>
<?php
	}
	else{
		$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		$id_auteur=$_SESSION['id'];
		$id_destinataire=$_POST['destinataire'];
		$mp=$_POST['mp'];
		$bdd->exec("INSERT INTO MP(id_auteur, id_destinataire, MP, date) VALUES($id_auteur, $id_destinataire, '$mp', NOW())");
		header('Location: message.php?ok=1');
	}
?>