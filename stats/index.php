<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/OTR/xhtml11/DTD/xhtml11.dtd">
<Html xml:lang="fr" dir:"ltr" xmlns="http://www.w3.org/1999/xhtml">
<Head>

	<title>Liste des membres</title>
	<link rel="shortcut icon" type="image/x-icon" href="../images/Logo2.ico" />
	<style type="text/css">
		body
		{
			color: #000080;
			background-image: url(../images/a.png);
			background-repeat: no-repeat;
		}
		a
		{
			color: blue;
			text-decoration: none;
		}
		a:hover
		{
			color: green;
		}
	</style>

</head>
<body>
<?php
	if(empty($_SESSION['prenom']))
	{
	echo "<script type='text/javascript'>history.go(-1);</script>";
	}
	else
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
			
			$reponse = $bdd->query('SELECT id, prenom, classe FROM membre ORDER BY prenom ASC');
			while ($donnees = $reponse->fetch())
			{
?>
				<a href="stats.php?id=<?php echo $donnees['id']; ?>"><?php echo htmlentities($donnees['prenom']); ?></a> : <?php echo $donnees['classe'];?><br/>
<?php
			}
			
			$reponse->closeCursor();
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
	}?>
	<Br /><a href="..\LECMP.php" style="color: red; text-decoration: underline;">Retour aux MP</a>
	<Br /><a href="..\index.php" style="color: red; text-decoration: underline;">Retour à l'accueil</a>
</body>
</html>