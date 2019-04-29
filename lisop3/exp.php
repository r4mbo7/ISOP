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
		<b id="titre"><a href="news.php" style="text-decoration:none;color:black">Nouvelle annonce</a></b>
		<div id="coeur">
		<?php if(empty($_SESSION['id']))
		{
			echo "Reservé aux membres connectés";
		}
		else
		{
		$mbr = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		$id=$_SESSION['id'];
		$ver = $mbr->query("SELECT adm FROM membre2 WHERE id = $id");
		$modo = $ver->fetch();
		?>
		<form action="exp.php" method="post">
			<fieldset>
				<legend>Ajout d'une news</legend>
			<label for="titre">Le titre (court et précis) :</label>
			<input type="text" name="titre" id="titre" autocomplete="off" /><br/><br />
			<textarea name="news" rows="6" cols="80"></textarea><br>
			<?php
				if($modo['adm']==3){?>
			<input type="checkbox" name="modo" id="modo" /> <label for="modo">News lisop</label><br>
			<?php
			}
			?>
			<input type="image" src="icon/envoyer.png" title="Poster" />
			</fieldset>
		</form><br />
			<i>Merci à toi de ne pas intégrer des propos insultants</i>
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
	if(preg_match("#batard|batarde|salop|salope|salopard|connard|connasse|enforé|pute#i", $_POST['news']))
	{
	echo "<script type='text/javascript'>history.go(-1);</script>";
	}
	elseif(preg_match("#[a-z]{2,}#i", $_POST['titre'])) 
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_news', 'lisopfr', 'hRkrKDkDy6');
			$bddf = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
		}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
		if(empty($_POST['modo'])){
		$genre=0;
		}
		else{
		$genre=1;
		}
		$id_auteur = $_SESSION['id'];
		$titre = $_POST['titre'];
		$news = $_POST['news'];

			$bdd->exec("INSERT INTO news(genre, id_auteur, titre, news, date) VALUES('$genre', '$id_auteur', '$titre', '$news', NOW())" );
			$bddf->exec("INSERT INTO topic(type, id_auteur, titre, contenu, date_creation) VALUES(4, '$id_auteur', '$titre', '$news', NOW())");
			header('Location: news.php');
		}
	else
	{
	echo "<script type='text/javascript'>history.go(-1);</script>";
	}
}
}
?>