<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
	$bdd2 = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$bdd3 = new PDO('mysql:host=localhost;dbname=lisopfr_news', 'lisopfr', 'hRkrKDkDy6');
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
		z-index:0;
	}
	#co{
		z-index:90;
		float:right;
		text-align:right;
	}
	#news{
		z-index:10;
		width:60%;
		border-radius: 10px 10px; -moz-border-radius: 10px;
		border: 5px solid blue;
		padding: 10px;
	}
	#nw{
		z-index:15;
		padding: 5px;
		color: #00002B;
		background-color:#D7EEF4;
		border-radius: 0px 10px; -moz-border-radius: 10px;
	}
	#forum{
		margin-top:50px;
	}
	#table{
		width:100%;
	}
	#table td{
		text-align:center;
	}
	#table li{
		list-style-type: decimal;
	}
</style>
<script type="text/javascript">
	function redirection()
		  {window.location="inscription.php";}
</script>
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
		<b id="titre">Accueil</b>
		<div id="co">
			<?php
			if(isset($_COOKIE['prenom'])){
				}
			if(empty($_SESSION['id'])){
			?>
			<form action="connexion.php" method="post">
			<fieldset>
			<legend><input type="button" value="Inscription" onClick="redirection()"/> /-/ <input type="submit" value="Connexion" /></legend>
			<input type="checkbox" value="1" name="souvenir"/>
			<label for="prenom">Prenom et nom : </label><br>
			<input type="text" name="prenom" id="prenom" size="50" <?php if(isset($_COOKIE['lisop_prenom'])){ echo "value='" .$_COOKIE['lisop_prenom'] ."'";}?>/><br>
			<label for="pass">Ton mot de passe :</label><br>
			<input type="password" name="pass" id="pass" size="50" <?php if(isset($_COOKIE['lisop_pass'])){ echo "value='" .$_COOKIE['lisop_pass'] ."'";}?>/><br>
			</fieldset>
			</form>
			<?php
			}
			else{
			echo "<a href='perso.php' style='color:black'>" .$_SESSION['prenom'] ."</a>";
			$id_s=$_SESSION['id'];
			$nb = $bdd2->query("SELECT COUNT(*) AS id FROM MP WHERE id_destinataire=$id_s AND vue=0");
			$nb_mp = $nb->fetch();
			echo "<br/> <a href='message.php' style='text-decoration:none;color:black'>Messages</a> : " .$nb_mp['id'] ."<br/><a href='connexion.php' style='color:red;text-decoration:none'><i>Deco.</i></a>";
			}
			?>
		</div>
		<div id="coeur">
			<div id="news">
			<a href="news.php" style="color:blue;font-size:20px;text-decoration:none">Dernière news</a> : 
				<div id="nw">
				<?php
					if(empty($_SESSION['id'])){
					$nws = $bdd3->query("SELECT titre, news, id_auteur, DATE_FORMAT(date, \"%d/%m/%Y\") AS date_fr FROM news WHERE genre=1 ORDER BY date DESC");
					}
					else{
					$nws = $bdd3->query("SELECT titre, news, id_auteur, DATE_FORMAT(date, \"%d/%m/%Y\") AS date_fr FROM news ORDER BY date DESC");
					}
					$nw = $nws->fetch();
					$id_a=$nw['id_auteur'];
				?>
					<h3><?php echo $nw['titre']; ?></h3>
				<p>
				<?php
					echo $nw['news'];
				?>
				</p>
				<i>
					<?php
					$a = $bdd2->query("SELECT prenom FROM membre2 WHERE id=$id_a");
					$pr = $a->fetch();				
					echo $pr['prenom'] ." le " .$nw['date_fr'];
					?>
				</i>
				</div>
			</div>
			<div id="forum">
			<table id="table">
				<caption><a href="forum.php" style="color:red;font-size:20px;text-decoration:none">Activitées du forum</a></caption>
					<tr>
					<td><ul>
						Derniers sujets commentés :
						<?php 
						$com = $bdd->query("SELECT * FROM commentaires2 ORDER BY date DESC LIMIT 0,5");
						while($comm=$com->fetch()){
							$id_t=$comm['id_topic'];
							$if_t = $bdd->query("SELECT * FROM topic WHERE id=$id_t");
							$donne=$if_t->fetch();
					?>
						<li><a href="commentaire.php?topic=<?php echo $donne['id'];?>"><?php echo htmlspecialchars(stripslashes($donne['titre']));?></a></li>
					<?php
						}
					?>
					</ul></td>
					<td><ul>
						Derniers sujets :
						<?php 
						$topic = $bdd->query("SELECT * FROM topic ORDER BY date_creation DESC LIMIT 0,5");
						while($t=$topic->fetch()){
					?>
						<li><a href="commentaire.php?topic=<?php echo $t['id'];?>"><?php echo htmlspecialchars(stripslashes($t['titre']));?></a></li>
					<?php
						}
					?>
					</ul></td>
			</table>
			</div>
		</div>
	</div>
</body>
</html>