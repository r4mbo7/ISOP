<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->query('SELECT pseudo, message, temps FROM minichat ORDER BY ID DESC LIMIT 0, 5');
while ($donnees = $reponse->fetch())
{
	$prenom=$donnees['pseudo'];
	if (preg_match("#Visiteur#i", $prenom))
	{}
	else
	{
	$id_auteur = $bdd->query("SELECT id FROM membre WHERE prenom='$prenom'");
	$id=$id_auteur->fetch();
	}
	if (preg_match("#<|>#i", $donnees['message']))
	{
		if (preg_match("#Visiteur#i", $prenom))
		{
			echo "<p><strong>" . htmlspecialchars($prenom) . '</strong> : ' . htmlspecialchars(stripslashes($donnees['message'])). ' <strong style="color: #C0C0C0; font-size:13px">(' .$donnees['temps'] .')</strong></p>';
		}
		else
		{
			echo "<p><a href='Pageperso.php?id=" .$id['id'] ."'><strong>" . htmlspecialchars($prenom) . '</a></strong> : ' . stripslashes($commentaire). ' <strong style="color: #C0C0C0; font-size:13px">(' .$donnees['temps'] .')</strong></p>';
		}
	}
	else
	{
	$commentaire=$donnees['message'];
	include("smiley.php");
	if (preg_match("#Visiteur#i", $prenom))
		{
			echo "<p><strong>" . htmlspecialchars($prenom) . '</strong> : ' . htmlspecialchars(stripslashes($donnees['message'])). ' <strong style="color: #C0C0C0; font-size:13px">(' .$donnees['temps'] .')</strong></p>';
		}
	else
		{
			echo "<p><a href='Pageperso.php?id=" .$id['id'] ."'><strong>" . htmlspecialchars($prenom) . '</a></strong> : ' . stripslashes($commentaire). ' <strong style="color: #C0C0C0; font-size:13px">(' .$donnees['temps'] .')</strong></p>';
		}
	}
}
$reponse->closeCursor();
?>