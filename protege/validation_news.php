<?
	session_start();
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$prenom = $_SESSION['prenom'];
	$ver = $adm->query("SELECT adm FROM membre WHERE prenom = '$prenom'");
	$modo = $ver->fetch();
	if ( $modo['adm'] == '2' OR $modo['adm'] == '3')
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/OTR/xhtml11/DTD/xhtml11.dtd">
<Html xml:lang="fr" dir:"ltr" xmlns="http://www.w3.org/1999/xhtml">
<Head>
	<title>Validation des news</title>
	<style type="text/css">
	Body
	{
		background-image: url(../images/a.png);
	}
	a
	{
		color:balck;
		text-decoration:none;
	}
	a strong
	{
		color:red;
	}
	a:hover
	{
		color:blue;
		text-decoration:underline;
	}
	b
	{
		color:blue;
	}
	</style>
</head>
	<body>
	<?php 
	try //connection a la bdd news sous $bdd
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_news', 'lisopfr', 'hRkrKDkDy6');
		}
	catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
	try	//connection a la bdd membre sous $abdd
		{		
			$abdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');	
		}	
	catch (Exception $e)	
		{		
			die('Erreur : ' . $e->getMessage());	
		}
	$rep = $bdd->query("SELECT COUNT(*) AS id FROM exp_lb WHERE  validation='non' ");
	$reponse = $rep->fetch();
		if($reponse['id'] == 0)
		{
			echo 'Pas de news libre a valider.';
		}
		else
		{
	$reponse = $bdd->query("SELECT * FROM exp_lb WHERE validation='non' ORDER BY ID");//Selection de toute les news non validée
	$donnees = $reponse->fetch();
	$auteur= $donnees['auteur'];
	$resultat = $abdd->query("SELECT nb_news FROM membre WHERE prenom='$auteur' ");//Selection du nombre de news postée
	$nbnews = $resultat->fetch();
	?>
	<form action="validation_news_post.php?id=<?php echo $donnees['id'];?>" method="post">
        <p>
		Titre: "<?php echo htmlspecialchars($donnees['titre']);?>"<BR />
		auteur: <?php echo htmlspecialchars($donnees['auteur']);?> ( <?php echo $nbnews['nb_news'];?> )<BR />
		<label for="message">Message : </label>Ne changer aucun mot! Coriger les éventuelles fautes.<BR />
		<textarea name="message" id="message" rows="8" cols="48" >
		<?php echo $donnees['message'];?>
		</textarea>
		<a href="validation_news.php">Annuler, revenir text original.</a><br />
		<input type="radio" name="validation" value="oui" id="oui" /> <label for="oui">Valider</label><br />
		<input type="radio" name="validation" value="non" id="non" /> <label for="non">Suprimer</label><br /><br />
		<input type="submit" value="Ok" />
		</p>
	</form>
		<?php
		}
		?>
	<BR />
	<BR />
	<a href="index.php">Zone admin</a><BR />
	<a href="../news/news.php">News</a>
	</body>
</html>
<?php
	}
	else {}
?>