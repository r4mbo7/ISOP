<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Message</title>
	<style type="text/css">
	body
	{
		background-image: url(images/a.png);
	}
	#dest
	{
		text-align: center;
	}
	h1
	{
		color: #00FF00;
	}
	</style>
	</head>
	<body>
	<div id="dest">
	<H1>Envoyer un message</H1>
		<form method="post" action="MP_POST.php"> 
			<label for="destinataire">Destinataire.</label><BR/>
				<select name="destinataire" id="destinataire"> 
				<?php
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
				}
				catch(Exception $e)
				{
						die('Erreur : '.$e->getMessage());
				}
				$reponse = $bdd->query('SELECT prenom FROM membre ORDER BY ID DESC');
				while ($donnees = $reponse->fetch())
				{ ?>
				<option>
				<?php
				echo $donnees['prenom'];
				?>
				</option>
				<?php
				}
				$reponse->closeCursor();
				?>
				</select>
				<Br/>
			<label for="MP">Entre ton message :</label><BR/>
				<textarea name="MP" rows="4" cols="90"></textarea> 
					<input type="submit" value="Valider"/>
		</form>
		<a href="index.php">Retour</a><br/>
		<a href="..\index.php">Accueil</a>
		</div>
	</body>
	
</html>