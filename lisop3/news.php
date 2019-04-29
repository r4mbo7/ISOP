<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_news', 'lisopfr', 'hRkrKDkDy6');
	$bddm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$bddf = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
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
	#nw{
		border-radius: 10px 10px; -moz-border-radius: 10px;
		padding: 3px;
		background-color: #D5F6FF;
		text-indent: 30px;
	}
	td{
		width:50%;
		text-align:center;
	}
	li{
		list-style-type: none;
	}
	#l_nw{
		color:blue;
		text-decoration:none;
	}
	#l_nw:hover{
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
		<b id="titre"><a href="news.php" style="text-decoration:none;color:black">News</a></b>
		<div id="coeur">
		<?php
			$nl=$bdd->query("SELECT * FROM news WHERE genre=0 ORDER BY ID DESC");
			$ni=$bdd->query("SELECT * FROM news WHERE genre=1 ORDER BY ID DESC");
			if(empty($_GET['id']))
			{
			$dn=$bdd->query("SELECT *, DATE_FORMAT(date, \"%d/%m/%Y\") AS date_fr FROM news ORDER BY ID DESC");
			$n=$dn->fetch();
			}
			else{
			$id=$_GET['id'];
			$dn=$bdd->query("SELECT *, DATE_FORMAT(date, \"%d/%m/%Y\") AS date_fr FROM news WHERE id=$id");
			$n=$dn->fetch();
			}
			$titre=$n['titre'];
			$contenu=$n['news'];
			$fr=$bddf->query("SELECT id FROM topic WHERE titre='$titre' ");
			$lien=$fr->fetch();
			$id_a=$n['id_auteur'];
			$a=$bddm->query("SELECT prenom FROM membre2 WHERE id=$id_a ");
			$aut=$a->fetch();
		?>
		
	<div id="nw">
		<h4 style="color:blue"><?php echo htmlspecialchars(stripslashes($n['titre']));?></h4>
		<p>
		<?php 
		echo nl2br(htmlspecialchars(stripslashes($n['news']))) .'<br/><br/><i>' .$aut['prenom'] .' le ' .$n['date_fr'] .'</i>';
		if(!empty($lien['id'])){
		?><br/>
		<a href="commentaire.php?topic=<?php echo $lien['id'];?>" style="color:blue;font-size:14px;text-decoration:none" title="Redirection vers le forum"><i>Réagir</i></a>
		<?php 
			}
		?>
		</p>
	</div>
	<table width="100%">
	<?php
		if(!empty($_SESSION['id'])){
	?>
		<caption>
	<a href="exp.php" id="l_nw"><i>Poster une annonce</i></a>
		<caption>
	<?php
		}
	?>
	<tr>
		<td><h4><i>Les dernieres news lisop</i></h4></td>
		<td><h4><i>Les dernieres annonces</i></h4></td>
	</tr>
	<tr>
		<td><ul>
			<?php
			while($nis=$ni->fetch()){
		?>
			<a id="l_nw" href="news.php?id=<?php echo $nis['id'];?>"><li><?php echo htmlspecialchars(stripslashes($nis['titre']));?></li></a>
		<?php
			}
		?>
		</ul></td>
		<td><ul>
		<?php
			if(!empty($_SESSION['id'])){
			while($n_lb=$nl->fetch()){
		?>
			<a id="l_nw" href="news.php?id=<?php echo $n_lb['id'];?>"><li><?php echo htmlspecialchars(stripslashes($n_lb['titre']));?></li></a>
		<?php
			}
			}
			else{
				echo "Réservé aux membres co.";
			}
		?>
		</ul></td>
	</tr>
	</div>
</div>
</body>
</html>