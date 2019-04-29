<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" > 
	<head> 
		<title>Programe TI</title> 
		<link rel="shortcut icon" type="image/x-icon" href="../images/Logo2.ico" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style type="text/css">
		body 
		{
			color: #FFFFFF;
			background-image: url(../images/fond_prgm.png);
			background-color: #000000;
			background-repeat: no-repeat;
		}
		body H1
		{
			color: #FFFFFF;
		}
		body ul
		{
			color: blue;
		}
		body a
		{
			color: green;
		}
		a:hover
		{
			color: #FFFFFF;
			text-decoration: none;
		}
		#lien 
		{
			position:absolute;
			top: 10px;
			right: 10px;
		}
		#lien a 
		{
			color: blue;
			text-decoration:none;
		}
		#lien a:hover
		{
			color:red;
		}
		#rch
		{
			position:absolute;
			bottom: 5px;
			color:red;
			font-size: 18px;
			border: 1px solid #FFFFFF;
		}
		#rch:hover
		{
			color: blue;
		}
		#rch a:hover
		{
			color: #FFFFFF;
		}
		</style>
	</head>
	<body>
	<center><H1>Programme TI/jeux</H1></center>
	<div id="lien">
	<a href='help.html'>Aide</a><BR/>
	<a href='../index.php'>Accueil</a><BR />
	<a href='../news/news.php'>News</a><BR />
	<a href='../forum/index_forum.php'>Forum</a><BR />
	</div>
	<?
	if( $_GET['id'] == 1)
	{
		echo htmlentities("Merci, si ton programme est valide il sera très vite affiché.") ." <a href='index.php'>Masquer</a><BR />";
	}
	else 
	{}
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_prog', 'lisopfr', 'hRkrKDkDy6');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
		
		$ti=$bdd->query("SELECT * FROM Ti WHERE catego = 1 AND validation = 'oui' ");
	?>
	Jeux:
	<ul>
	<li><a href="plusmoin.html">Le plus-moin </a>: Trouve le nombre cach&eacute. (1 ou 2 joueurs)</li>
	<?php
		while ($prog = $ti->fetch())
		{
		$id=$prog['id'];
		$v=$bdd->query("SELECT nb_vue FROM Visite WHERE id_programe = $id ");
		$vue = $v->fetch();
		?>
	<li><a href="programe.php?id=<?php echo $prog['id']?>"><?php echo $prog['titre'];?></a> <?php echo htmlspecialchars(stripslashes($prog['describ'])); ?> (vue : <?php echo $vue['nb_vue'];?> fois)</li>
		<?php
		}
		?>
	</ul></br>
	<?php
		$ti=$bdd->query("SELECT * FROM Ti WHERE catego = 2 AND validation = 'oui' ");
	?>
	Utilitaires:
	<ul>
	<?php
		while ($prog = $ti->fetch())
		{
		$id=$prog['id'];
		$v=$bdd->query("SELECT nb_vue FROM Visite WHERE id_programe = $id ");
		$vue = $v->fetch();
		?>
	<li><a href="programe.php?id=<?php echo $prog['id']?>"><?php echo $prog['titre'];?></a> <?php echo htmlspecialchars(stripslashes($prog['describ'])); ?> (vue : <?php echo $vue['nb_vue'];?> fois)</li>
		<?php
		}
		?>
	</ul></br>
	<div id="rch">
	Programmes poster par les membres. Si toi aussi tu souhaites publier un programme c'est : <a href="tonprog.php"> ICI </a>
	</div>
	</body>
</html>