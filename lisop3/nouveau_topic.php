<?php
	session_start();
	if(empty($_POST['titre'])){
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
		<b id="titre">Nouveau sujet</b>
		<div id="coeur">
		<?php if(empty($_SESSION['id']))
		{
			echo "Reservé aux membres connecté";
		}
		else
		{
		?>
		<form action="nouveau_topic.php" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend>Ajout d'un topic</legend>
			<label for="type"/>Théme : </label>
				<select name="type">
					<option value="1">Le site</option>
					<option value="2">Le lycée</option>
					<option value="5">Technologie</option>
					<option value="6">Sport</option>
					<option value="4">News</option>
					<option value="3">Entre Aide</option>
					<option value="0">Espace détente</option>
				</select><br/>
			<label for="titre">Le titre (court et précis) :</label> 
			<input type="text" name="titre" id="titre" autocomplete="off" /><br/><br />
			<textarea name="contenu" rows="6" cols="80"></textarea><br/>
			<label>Image :</label><br/>
			<input type="file" name="image"/><br/>
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
			<input type="image" src="icon/envoyer_post.png" title="Poster" />
			</fieldset>
		</form><br />
			<i><u>Merci à toi de ne pas intégrer des propos insultants</u></i>
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
if(preg_match("#batard|batarde|salop|salope|salopard|connard|connasse|enfoiré|pute|pd|connar|bite|enculé|putin#i", $_POST['titre'])){
	echo "<script type='text/javascript'>history.go(-1);</script>";
	}
else
{
	if(preg_match("#batard|batarde|salop|salope|salopard|connard|connasse|enforé|pute#i", $_POST['contenu']))
	{
	echo "<script type='text/javascript'>history.go(-1);</script>";
	}
	elseif(preg_match("#[a-z]{4,}#i", $_POST['titre'])) 
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
		}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
		if(!empty($_FILES['image']['name'])){
			$source=$_FILES['image']['tmp_name'];
			$destination= 'images/'.$_FILES['image']['name'];
			if($_FILES['image']['error']>0){
			die("erreur lors de transmission du fichier");
			}
			if(!move_uploaded_file($source, $destination)) {
			die("erreur lors de déplacement du fichier");
			}
			$image=$_FILES['image']['name'];
		}
		else {
		$image='';
		}
			$req = $bdd->prepare("INSERT INTO topic(type, id_auteur, titre, contenu, image, date_creation) VALUES(:type, :id_auteur, :titre, :contenu, :image, NOW())" );
			$req->execute(array(
				'type' => $_POST['type'],
				'id_auteur' => $_SESSION['id'],
				'titre' => $_POST['titre'],
				'contenu' => $_POST['contenu'],
				'image' => $image
				));
			header('Location: forum.php');
		}
	else
	{
	echo "<script type='text/javascript'>history.go(-1);</script>";
	}
}
}
?>