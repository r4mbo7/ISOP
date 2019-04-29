<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
	$bdd2 = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
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
	#forum{
		border-collapse:collapse;
		width:100%;
	}
	#forum td{
		border:1px solid black;
	}
	#lien_epingle{
		color:green;
	}
	#lien_forum{
		color:blue;
	}
	#n_t{
		color:black;
		float:right;
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
		<b id="titre"><a href="forum.php" style="text-decoration:none;color:black">Forum</a></b>
		<div id="coeur">
		<?php
		if(!empty($_SESSION['id'])){
		?>
			<a href="nouveau_topic.php" id="n_t">Nouveau sujet</a>
		<?php
		}
		if(empty($_GET['id'])){?>
		<table id="forum">
			<tr>
				<td WIDTH="50%">Thémes</td>
				<td WIDTH="25%">Sujets</td>
				<td WIDTH="25%">Reponces</td>
			</tr>
			<tr>
				<td WIDTH="50%"><a href="forum.php?id=1" id="lien_forum">Le site</a></td>
				<td WIDTH="25%">
				<?php
				$nb_suj = $bdd->query("SELECT COUNT(*) AS id FROM topic WHERE type=1");
				$nb_s = $nb_suj->fetch();
				echo $nb_s['id'];
				?>
				</td>
				<td WIDTH="25%">
				<?php
				$tt_suj = $bdd->query("SELECT id FROM topic WHERE type=1");
				while($tt_s = $tt_suj->fetch()){
				$id_topic=$tt_s['id'];
				$nb_com = $bdd->query("SELECT id FROM commentaires2 WHERE id_topic=$id_topic");
				while($nb_c = $nb_com->fetch()){
				$tt_com++;
				}
				}
				echo $tt_com;
				$tt_com=0;
				?>
				</td>
			</tr>
			<tr>
				<td WIDTH="50%"><a href="forum.php?id=2" id="lien_forum">Le lycée</a></td>
				<td WIDTH="25%">
				<?php
				$nb_suj = $bdd->query("SELECT COUNT(*) AS id FROM topic WHERE type=2");
				$nb_s = $nb_suj->fetch();
				echo $nb_s['id'];
				?>
				</td>
				<td WIDTH="25%">
				<?php
				$tt_suj = $bdd->query("SELECT id FROM topic WHERE type=2");
				while($tt_s = $tt_suj->fetch()){
				$id_topic=$tt_s['id'];
				$nb_com = $bdd->query("SELECT id FROM commentaires2 WHERE id_topic=$id_topic");
				while($nb_c = $nb_com->fetch()){
				$tt_com++;
				}
				}
				echo $tt_com;
				$tt_com=0;
				?>
				</td>
			</tr>
			<tr>
				<td WIDTH="50%"><a href="forum.php?id=5" id="lien_forum">Technologie</a></td>
				<td WIDTH="25%">
				<?php
				$nb_suj = $bdd->query("SELECT COUNT(*) AS id FROM topic WHERE type=5");
				$nb_s = $nb_suj->fetch();
				echo $nb_s['id'];
				?>
				</td>
				<td WIDTH="25%">
				<?php
				$tt_suj = $bdd->query("SELECT id FROM topic WHERE type=5");
				while($tt_s = $tt_suj->fetch()){
				$id_topic=$tt_s['id'];
				$nb_com = $bdd->query("SELECT id FROM commentaires2 WHERE id_topic=$id_topic");
				while($nb_c = $nb_com->fetch()){
				$tt_com++;
				}
				}
				echo $tt_com;
				$tt_com=0;
				?>
				</td>
			</tr>
			<tr>
				<td WIDTH="50%"><a href="forum.php?id=6" id="lien_forum">Sport</a></td>
				<td WIDTH="25%">
				<?php
				$nb_suj = $bdd->query("SELECT COUNT(*) AS id FROM topic WHERE type=6");
				$nb_s = $nb_suj->fetch();
				echo $nb_s['id'];
				?>
				</td>
				<td WIDTH="25%">
				<?php
				$tt_suj = $bdd->query("SELECT id FROM topic WHERE type=6");
				while($tt_s = $tt_suj->fetch()){
				$id_topic=$tt_s['id'];
				$nb_com = $bdd->query("SELECT id FROM commentaires2 WHERE id_topic=$id_topic");
				while($nb_c = $nb_com->fetch()){
				$tt_com++;
				}
				}
				echo $tt_com;
				$tt_com=0;
				?>
				</td>
			</tr>
			<tr>
				<td WIDTH="50%"><a href="forum.php?id=4" id="lien_forum">News</a></td>
				<td WIDTH="25%">
				<?php
				$nb_suj = $bdd->query("SELECT COUNT(*) AS id FROM topic WHERE type=4");
				$nb_s = $nb_suj->fetch();
				echo $nb_s['id'];
				?>
				</td>
				<td WIDTH="25%">
				<?php
				$tt_suj = $bdd->query("SELECT id FROM topic WHERE type=4");
				while($tt_s = $tt_suj->fetch()){
				$id_topic=$tt_s['id'];
				$nb_com = $bdd->query("SELECT id FROM commentaires2 WHERE id_topic=$id_topic");
				while($nb_c = $nb_com->fetch()){
				$tt_com++;
				}
				}
				echo $tt_com;
				$tt_com=0;
				?>
				</td>
			</tr>
			<tr>
				<td WIDTH="50%"><a href="forum.php?id=3" id="lien_forum">Entre-aide</a></td>
				<td WIDTH="25%">
				<?php
				$nb_suj = $bdd->query("SELECT COUNT(*) AS id FROM topic WHERE type=3");
				$nb_s = $nb_suj->fetch();
				echo $nb_s['id'];
				?>
				</td>
				<td WIDTH="25%">
				<?php
				$tt_suj = $bdd->query("SELECT id FROM topic WHERE type=3");
				while($tt_s = $tt_suj->fetch()){
				$id_topic=$tt_s['id'];
				$nb_com = $bdd->query("SELECT id FROM commentaires2 WHERE id_topic=$id_topic");
				while($nb_c = $nb_com->fetch()){
				$tt_com++;
				}
				}
				echo $tt_com;
				$tt_com=0;
				?>
				</td>
			</tr>
			<tr>
				<td WIDTH="50%"><a href="forum.php?id=t" id="lien_forum">Espace détente</a></td>
				<td WIDTH="25%">
				<?php
				$nb_suj = $bdd->query("SELECT COUNT(*) AS id FROM topic WHERE type=0");
				$nb_s = $nb_suj->fetch();
				echo $nb_s['id'];
				?>
				</td>
				<td WIDTH="25%">
				<?php
				$tt_suj = $bdd->query("SELECT id FROM topic WHERE type=0");
				while($tt_s = $tt_suj->fetch()){
				$id_topic=$tt_s['id'];
				$nb_com = $bdd->query("SELECT id FROM commentaires2 WHERE id_topic=$id_topic");
				while($nb_c = $nb_com->fetch()){
				$tt_com++;
				}
				}
				echo $tt_com;
				$tt_com=0;
				?>
				</td>
			</tr>
		</table>
		<?php
		}
		else{?>
		<table id="forum">
			<caption>
			<?php 
			if($_GET['id']==1){
			echo "Le site";
			}
			elseif($_GET['id']==2){
			echo "Le lycée";
			}
			elseif($_GET['id']==3){
			echo "Entre-aide";
			}
			elseif($_GET['id']==4){
			echo "News";
			}
			elseif($_GET['id']==5){
			echo "Technologie";
			}
			elseif($_GET['id']==6){
			echo "Sport";
			}
			elseif($_GET['id']=='t'){
			echo "Espace détente";
			}
			else{
			}
			?>
			</caption>
			<tr>
				<td WIDTH="50%">Sujets</td>
				<td WIDTH="25%">Commentaires</td>
				<td WIDTH="25%">Dernier com.</td>
			</tr>
			<?php
			$type=$_GET['id'];
			if($type=='t'){
			$type=0;
			}
			$ep = $bdd->query("SELECT id, block, titre, contenu, DATE_FORMAT(date_creation, \"%d/%m/%Y à %Hh%i \") AS date_creation_fr FROM topic WHERE block=1 AND type=$type ORDER BY date_creation DESC");
			while($epingle=$ep->fetch())
			{
				$id=$epingle['id'];
				$nb = $bdd->query("SELECT COUNT(*) AS id FROM commentaires2 WHERE id_topic=$id");
				$nb_com = $nb->fetch();
				$dr = $bdd->query("SELECT id_auteur, DATE_FORMAT(date, \"%d/%m/%Y à %Hh%i \") AS date_fr FROM commentaires2 WHERE id_topic=$id ORDER BY id DESC");
				$dr_com = $dr->fetch();
				$id_a=$dr_com['id_auteur'];
				if(!empty($id_a)){
				$dr_n = $bdd2->query("SELECT prenom FROM membre2 WHERE id=$id_a");
				$a_com = $dr_n->fetch();
				}
				?>
			<tr>
				<td WIDTH="50%"><a href="commentaire.php?topic=<?php echo $epingle['id'];?>" id="lien_epingle"><?php echo htmlspecialchars(stripslashes($epingle['titre']));?></a></td>
				<td WIDTH="25%"><?php echo $nb_com['id'];?></td>
				<td WIDTH="25%"><?php if(!empty($id_a)){echo "<i>" .$a_com['prenom'] ."</i> (" .$dr_com['date_fr'] .")";}else{echo " - " .$epingle['date_creation_fr'];}?></td>
			</tr>
			<?php
			}
			$rep = $bdd->query("SELECT id, block, titre, contenu, DATE_FORMAT(date_creation, \"%d/%m/%Y à %Hh%i \") AS date_creation_fr FROM topic WHERE block=0 AND type=$type ORDER BY date_creation DESC");
			while($donnees=$rep->fetch())
			{
				$id=$donnees['id'];
				$nb = $bdd->query("SELECT COUNT(*) AS id FROM commentaires2 WHERE id_topic=$id");
				$nb_com = $nb->fetch();
				$dr = $bdd->query("SELECT id_auteur, DATE_FORMAT(date, \"%d/%m/%Y à %Hh%i \") AS date_fr FROM commentaires2 WHERE id_topic=$id ORDER BY id DESC");
				$dr_com = $dr->fetch();
				$id_a=$dr_com['id_auteur'];
				if(!empty($id_a)){
				$dr_n = $bdd2->query("SELECT prenom FROM membre2 WHERE id=$id_a");
				$a_com = $dr_n->fetch();
				}
				?>
			<tr>
				<td WIDTH="50%"><a href="commentaire.php?topic=<?php echo $donnees['id'];?>" id="lien_forum"><?php echo htmlspecialchars(stripslashes($donnees['titre']));?></a></td>
				<td WIDTH="25%"><?php echo $nb_com['id'];?></td>
				<td WIDTH="25%"><?php if(!empty($id_a)){echo "<i>" .$a_com['prenom'] ."</i> (" .$dr_com['date_fr'] .")";}else{echo " - " .$donnees['date_creation_fr'];}?></td>
			</tr>
			<?php
			}?>
		</table>
		<?php
		}?>
		</div>
	</div>
</body>
</html>