<?php 
	session_start ();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" > 
<head> 
	<title>News libre</title> 
	<link rel="shortcut icon" type="image/x-icon" href="../images/Logo2.ico" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<style type="text/css">
		body 
		{
			background-image: url(../images/fond_news.png);
			background-repeat: no-repeat;
			background-color:blue;
		}
		a
		{
		text-decoration:none;
		}
		#nl
		{
		text-indent: 30px; 
		position: absolute;
		top: 100px;
		left: 300px;
		max-width: 70%;
		min-width: 50%;
		background-image: url(../images/exp_lb.png);
		}
		.titre
		{
		text-indent: 10px;
		color: red;
		}
		.titre i 
		{
			color:black;
			font-size:12px;
		}
		.titre:hover
		{
			font-size: 20px;
		}
	</style>
</head>
<body>
<?php 
	include("new.php"); 
	include("menu.php"); 
?>
<div id="nl">
	<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_news', 'lisopfr', 'hRkrKDkDy6');
	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}
	$reponse = $bdd->query("SELECT * FROM exp_lb WHERE validation='oui' ORDER BY ID DESC LIMIT 0,10");
	while ($donnees = $reponse->fetch())
	{
	?>
		<a href="exp_lb2.php?id=<?php echo $donnees['id'];?>">
			<h4 class="titre"><?php echo htmlentities(stripslashes($donnees['titre'])); ?>
				<i>
				<?php 
				if(preg_match("#masque#", $donnees['auteur'])) //Si l'auteur ne souhaite pas afficher son nom
				{
				echo htmlentities($donnees['titre_auteur']);
				}
				else
				{
				echo htmlentities($donnees['auteur']);
				}
				?>
				</i>
			</h4>
		</a>
		<p><?php echo htmlentities(stripslashes($donnees['message'])); ?></p>
	<?php
	}
	$reponse->closeCursor();
	?>
</div>
</body>
</html>