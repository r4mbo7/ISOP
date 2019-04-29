<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/OTR/xhtml11/DTD/xhtml11.dtd">
<html xml:lang="fr" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Inscription</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/Logo2.ico" />
<style type="text/css">
body
{
	background-image: url(images/a.png);
	background-repeat: no-repeat;
}
body h1
{
	color:red;
}
#inscr
{
	text-align: center;
	color: green;
	background-color: black;
	width: 200px;
	border: 20px ridge #808080;
}
#inscr a
{
	color: #FFFFFF;
}
a
{
	color: blue;
}
b:hover
{
	color: blue;
}
</style>
<SCRIPT LANGUAGE="JScript">
function Retour()
	{
	history.go(-2);
	}
</script>
</head>
<body>
<center><h1><u>/!\ Remplis attentivement le formulaire d'inscription /!\</u></h1>
<div id="inscr">
	<h2 style="color:red">Inscription</h2>
		<form action="inscription2.php" method="post">
	<p>
		<label for="prenom"><u>P</u>renom et <u>N</u>om <BR />(Initiales en maj.) :</label>
		<input type="text" name="prenom" /> <br />
		
		<label for="nom"><u>Confirme ton Nom</u> :</label>
		<input type="text" name="nom" /> <br />
		
		<label for="classe"><u>Ta classe</u> :</label>
		<select name="classe" id="classe">
		<option value="2nd">2nd</option>
		<option value="1ere">1ere</option>
		<option value="Term">Term</option>
		<option value="autre">autre</option>
		</select><br />
				
		<label for="sexe"><u>Ton genre</u> :</label><br />
		<select name="sexe" id="sexe">
		<option value="Homme">Homme</option>
		<option value="Femme">Femme</option>
		</select><br />

		
		<label for="email">Ton email :</label>
		<input type="text" name="email" /> <br />
		
		<label for="motDePasse1"><u>Mot de passe</u> :</label>
		<input type="password" name="motDePasse1" /> <br />
		
		<label for="motDePasse2">Confirme ton mot de passe:</label>
		<input type="password" name="motDePasse2" /> <br /><br />

		<input type="submit" value="Valider" />		
		<b onclick="Retour()" >Annuler</b>
	</p>
	</form>
</div>
<?php 
	if(isset($_GET['faux']) AND $_GET['faux'] == 1)
	{
?>
		<p style="color: red;">Les mots de passe ne correspondent pas.</p>
<?php
	}
	elseif(isset($_GET['faux']) AND $_GET['faux'] == 2)
	{
?>
		<p style="color: red;">Entre ton VRAI nom! Et n'oublie pas les Majuscules.</p>
<?php
	}
	elseif(isset($_GET['faux']) AND $_GET['faux'] == 3)
	{
?>
		<p style="color: red;">Désolé, mais ce nom et ce prénom sont déjà utilisés. Si tu n'es pas déjà inscrit <a href="Mides.php">envoye nous un message</a> pour nous le signaler.</p>
<?php
	}
	else
	{
		echo " ";
	}
?>
</center>
</body>

</html>