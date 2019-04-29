<?php
	session_start();
	if(empty($_GET['confirm'])){
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
		background-color:#CCCCCC;
	}
	#corp{
		border-radius: 10px 10px; -moz-border-radius: 10px;
		width:90%;
		min-height:1000px;
		padding-top: 25px;
		margin-left:5%;
		background-image:url(images/f_1.png);
		background-repeat: no-repeat;
		background-color:#FFFFFF;
	}
	#contenu{
		margin-left:15%;
		margin-right:5%;
	}
	#contenu h3{
		text-align:center;
		color:#1A1A1A;
	}
</style>
</head>
<body>
<div id="corp">
	<div id="menu">
		<?php include('menu.php');?>
	</div>
	<div id="contenu">
		<h3>Quitter lisop</h3>
		<p>Attention, vous êtes sur le point de quitter lisop! Cette action entraînera la suppression de toutes vos données sur le site.</p>
		<center><a href="quitter.php?confirm=1" onclick="if(confirm('Attention, vous êtes sur le point de quitter lisop!\n Derniere confirmation avant suppression de vos données...')==true){ return true;} else{return false;}" style="color:red;">Confirmer</a></center>
	</div>
</div>
</body>
</html>
<?php
	}
	else{
	$id=$_SESSION['id'];
	try
		{
			$bddm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
			$bddf = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
			$bddn = new PDO('mysql:host=localhost;dbname=lisopfr_news', 'lisopfr', 'hRkrKDkDy6');
		}		
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
		$av=$bddm->query("SELECT avatar FROM membre2 WHERE id = $id");
		$avtr=$av->fetch();
		if($avtr['avatar']!=''){
		$avatar=$avrt['avatar'];
		unlink("avatars/$avatar");
		}
		$bddm->exec("DELETE FROM membre2 WHERE id = $id");
		$bddm->exec("DELETE FROM MP WHERE id_destinataire = $id");
		$bddm->exec("DELETE FROM MP WHERE id_auteur = $id");
		$bddm->exec("DELETE FROM vote WHERE id_elut = $id");
		$req=$bddf->query("SELECT id, image FROM topic WHERE id_auteur = $id");
		while($img=$req->fetch()){
		if(!empty($img['image']))
		{
		$image=$img['image'];
		unlink("images/$image");
		}
		$id_topic=$img['id'];
		$bddf->exec("DELETE FROM commentaires2 WHERE id_topic = $id_topic");
		}
		$bddf->exec("DELETE FROM topic WHERE id_auteur = $id");
		$bddf->exec("DELETE FROM commentaires2 WHERE id_auteur = $id");
		$bddn->exec("DELETE FROM news WHERE id_auteur = $id");
		session_unset();
		session_destroy();
	?>
	<script type="text/javascript">
		function redirection(page)
		  {window.location=page;}
		setTimeout('redirection("index.php")',1);
		</script>
	<?php
	}
?>