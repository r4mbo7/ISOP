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
	try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_prog', 'lisopfr', 'hRkrKDkDy6');
		}
	catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
	$reponse = $bdd->query("SELECT * FROM Ti WHERE validation='non' ORDER BY ID DESC");
	$donnees = $reponse->fetch();
	if(!empty($donnees['validation']))
	{
	?>
	<h3 style="color:red"> Retire tout les "BR"!</h3>
	<form action="validation_prog_post.php?id=<?php echo $donnees['id'];?>" method="post">
        <p>
		Titre: "<?php echo htmlspecialchars($donnees['titre']);?>"<BR />
		Categorie: "<?php if($donnees['catego'] == 1){echo'Jeux';} else{echo"utilitaires";}?>"<BR />
		Description: "<?php echo htmlspecialchars(htmlentities($donnees['describ']));?>"<BR />
		<label for="code">Code : </label><BR />
		<textarea name="code" id="code" rows="12" cols="10" >
		<?php echo nl2br(htmlentities($donnees['code']));?>
		</textarea><br />
		Auteur: <?php echo htmlspecialchars(htmlentities($donnees['auteur']));?><br />
		<input type="radio" name="validation" value="oui" id="oui" /> <label for="oui">Valider</label><br />
		<input type="radio" name="validation" value="non" id="non" /> <label for="non">Refuser</label><br />
		<input type="submit" value="Valider" />
		</p>
	<BR />
	<BR />
	<a href="index.php">Zone admin</a><BR />
	<a href="../prog/index.php">News</a>
	</body>
</html>
<?php
	}
	else
	{
		echo "Plus de prog a valider ...";
	}
	
	}
	else{}
?>