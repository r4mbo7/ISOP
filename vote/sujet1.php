<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" > 
	<head> 
		<title>Vote!</title> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<style type="text/css">
	body
	{
		background-image: url(images/fond_votele.png);
		background-repeat: no-repeat;
	}
	body a
	{
		font-size: 40px;
		color: black;
		position: absolute;
		bottom: 5px;
	}
	#tcool
	{
		position: absolute;
		top: 150px;
		left: 125px;
		color: blue;
	}
	#cool
	{
		color: blue;
		border: 10px outset blue;
		position: absolute;
		top: 200px;
		left: 100px;
		width: 250px;
		text-align: center;
		background-color: #FFFFFF;
		height: 85px;
	}
	#btncool
	{
		position: absolute;
		top: 215px;
		left: 300px;
	}
	#tsexy
	{
		position: absolute;
		top: 150px;
		left: 625px;
		color: pink;
	}
	#sexy
	{
		color: red;
		border: 10px outset pink;
		position: absolute;
		top: 200px;
		left: 600px;
		width: 250px;
		text-align: center;
		background-color: #FFFFFF;
		height: 85px;
	}
	#btnsexy
	{
		position:absolute;
		top: 215px;
		left:800px;
	}
	#tclass
	{
		position: absolute;
		top: 300px;
		left: 125px;
		color: #4400AA;
	}
	#class
	{
		border: 10px outset #4400AA;
		position: absolute;
		top: 355px;
		left: 100px;
		width: 250px;
		text-align: center;
		background-color: #FFFFFF;
		height: 85px;
	}
	#btnsape
	{
		position: absolute;
		top: 405px;
		left: 300px;
	}
	#tdej
	{
		position: absolute;
		top: 300px;
		left: 625px;
		color: red;
	}
	#dej
	{
		height: 85px;
		color: red;
		border: 10px outset red;
		position: absolute;
		top: 355px;
		left: 600px;
		width: 250px;
		text-align: center;
		background-color: #FFFFFF;
	}
	#btndejante
	{
		position:absolute;
		top: 405px;
		left: 800px;
	}
	</style>
	</head> 
	<body>
			<p>
				<div id="tcool">
				<form method="post" action="vote_g_cool.php"> 
				<label for="election">Vote pour le plus cool.</label> 
				</div>
				<select name="cool" id="cool"> 
				<?php
				if ($_GET['verif_cool'] == 1)
				{
					echo "<option>Merci d'avoir vot&eacute</option>";
				}
				elseif ($_GET['verif_cool'] == 2)
				{
					echo "<option>Tu as deja vot&eacute cette semaine!</option>";
				}
				else
				{
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
				}
				catch(Exception $e)
				{
						die('Erreur : '.$e->getMessage());
				}
				$reponse = $bdd->query("SELECT prenom FROM membre WHERE sexe='Homme' AND classe='2nd' OR sexe='Homme' AND classe='1ere'  OR sexe='Homme' AND classe='Term' ORDER BY ID DESC");
				while ($donnees = $reponse->fetch())
				{ ?>
				<option>
				<?php
				echo htmlentities($donnees['prenom']);
				?>
				</option>
				<?php
				}
				$reponse->closeCursor();
				}
				?>
				</select> 
			   	<input type="submit" value="Valider" id="btncool"/>
				</form>
			</p>
			<p> 
				<div id="tsexy">
				<form method="post" action="vote_g_sexy.php"> 
				<label for="election">Vote pour le plus sexy.</label>
				</div>
				<select name="sexy" id="sexy"> 
				<?php
				if ($_GET['verif_sexy'] == 1)
				{
					echo "<option>Merci d'avoir vot&eacute</option>";
				}
				elseif ($_GET['verif_sexy'] == 2)
				{
					echo "<option>Tu as deja vot&eacute cette semaine!</option>";
				}
				else
				{
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
				}
				catch(Exception $e)
				{
						die('Erreur : '.$e->getMessage());
				}
				$reponse = $bdd->query("SELECT prenom FROM membre WHERE sexe='Homme' AND classe='2nd' OR sexe='Homme' AND classe='1ere'  OR sexe='Homme' AND classe='Term' ORDER BY ID DESC");
				while ($donnees = $reponse->fetch())
				{ ?>
				<option>
				<?php
				echo htmlentities($donnees['prenom']);
				?>
				</option>
				<?php
				}
				$reponse->closeCursor();
				}
				?>
				</select> 
			   	<input type="submit" value="Valider" id="btnsexy"/>
				</form>
			</p>
			<p> 
				<div id="tclass">
				<form method="post" action="vote_g_sape.php"> 
				<label for="election">Vote pour le plus class.</label>
				</div>
				<select name="sape" id="class"> 
				<?php
				if ($_GET['verif_sape'] == 1)
				{
					echo "<option>Merci d'avoir vot&eacute</option>";
				}
				elseif ($_GET['verif_sape'] == 2)
				{
					echo "<option>Tu as deja vot&eacute cette semaine!</option>";
				}
				else
				{
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
				}
				catch(Exception $e)
				{
						die('Erreur : '.$e->getMessage());
				}
				$reponse = $bdd->query("SELECT prenom FROM membre WHERE sexe='Homme' AND classe='2nd' OR sexe='Homme' AND classe='1ere'  OR sexe='Homme' AND classe='Term' ORDER BY ID DESC");
				while ($donnees = $reponse->fetch())
				{ ?>
				<option>
				<?php
				echo htmlentities($donnees['prenom']);
				?>
				</option>
				<?php
				}
				$reponse->closeCursor();
				}
				?>
				</select>
				<input type="submit" value="Valider" id="btnsape"/>
				</form>
			</p>
			<p> 
				<div id="tdej">
				<form method="post" action="vote_g_dejante.php"> 
				<label for="election">Vote pour le plus d&eacutejant&eacute.</label>
				</div>
				<select name="dejante" id="dej"> 
				<?php
				if ($_GET['verif_dejante'] == 1)
				{
					echo "<option>Merci d'avoir vot&eacute</option>";
				}
				elseif ($_GET['verif_dejante'] == 2)
				{
					echo "<option>Tu as deja vot&eacute cette semaine!</option>";
				}
				else
				{
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
				}
				catch(Exception $e)
				{
					die('Erreur : '.$e->getMessage());
				}
				$reponse = $bdd->query("SELECT prenom FROM membre WHERE sexe='Homme' AND classe='2nd' OR sexe='Homme' AND classe='1ere'  OR sexe='Homme' AND classe='Term' ORDER BY ID DESC");
				while ($donnees = $reponse->fetch())
				{ ?>
				<option>
				<?php
				echo htmlentities($donnees['prenom']);
				?>
				</option>
				<?php
				}
				$reponse->closeCursor();
				}
				?>
				</select>
				<input type="submit" value="Valider" id="btndejante"/>
				</form>
			</p>
		</br></br>
		<a href="sujet2.php">Maintenant vote pour la...<a>
	</body> 
</html> 