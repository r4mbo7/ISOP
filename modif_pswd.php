<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/OTR/xhtml11/DTD/xhtml11.dtd">
<html xml:lang="fr" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Modification de mot de passe</title>
<link rel="shortcut icon" type="image/x-icon" href="images/Logo2.ico" /><style type="text/css">
	body{	
	color: blue;	
	background-image: 
	url(images/a.png);}
	body strong
	{	
	color: green;
	}
	a
	{
	color: blue;
	text-decoration: none;
	}
	a:hover
	{	
	color: red;
	text-decoration: underline;
	}
</style>
</head>
<body>
	<h2>Modification de mot de passe</h2>
		<form action="modif_pswd_post.php" method="post">
	<p>
		
		<?php
		if(empty($_SESSION['prenom']))
		{?>
		<label for="nom">Ton nom</u> :</label>
		<input type="text" name="nom" /> <br />
		<?php
		}
		else {}
		?>
		
		<label for="pass">Entre ton mot de passe actuel:</label>
		<input type="password" name="pass" id="pass"/><br/>
		
		<label for="pass1">Entre ton nouveau mot de passe:</label>
		<input type="password" name="pass1" id="pass1"/> <br />
		
		<label for="pass12">Réentre ton nouveau mot de passe:</label>
		<input type="password" name="pass12" id="pass12"/> <br /><br />

		<input type="submit" value="Valider" /> 
	</p>
		</form>
	<BR />

<?php
	if($_GET['faux']==1)
	{
		echo "Les deux mots de pass ne comprespondes pas";
	}
	elseif($_GET['faux']==2)
	{
		echo htmlentities("Le mot de pass actuel est érroné");
	}
	elseif($_GET['faux']==3)
	{
		echo "<u>" .htmlentities("Ton mot de passe a bien été changé") ."</u><BR />";
		
		if(empty($_SESSION['prenom']))
		{
			echo "<a href='connection1.php'>Connexion</a>";
		}
		else
		{
			echo "<a href='index.php'>Accueil</a>";
		}
	}
	else
	{}
?>
	
</body>
</html>