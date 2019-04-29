<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/OTR/xhtml11/DTD/xhtml11.dtd">
<html xml:lang="fr" dir:"ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Message</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/Logo2.ico" />
<style type="text/css">
body
{
	color: #000080;
	background-image: url(images/a.png);
	background-repeat: no-repeat;
}
body strong
{
	color: #0B280B;
}
a
{
	text-decoration: none;
}
a:hover
{
	color: black;
	text-decoration: underline;
}
#message
{
	position:absolute;
	left: 10px;
	top: 5px;
}
#message a
{
	color: blue;
}
#lien a
{
	color: #333333;
}
</style>
</head>
<body>
<div id="message">
<?php
if( $_GET['message'] == 1 )
{
	echo htmlentities('Ton message a bien été envoyé') .'<br /><br />';
}
else
{
	echo '';
}
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
	$destinataire=$_SESSION['prenom'];
	$bdd->exec("UPDATE MP SET vue=1 WHERE destinataire='$destinataire'");
	$reponse = $bdd->query("SELECT id, auteur, MP, time, DATE_FORMAT(date, '%d/%m/%Y') AS date FROM MP WHERE destinataire='$destinataire'");
if(empty($_SESSION['prenom']))
{
	echo "<a href='connection1.php'>Connecte toi</a><br />"; 
}
else
{
	while ($donnees = $reponse->fetch())
	{
	if ($donnees['auteur']=="Admin" OR $donnees['auteur']=="ISOP")
	{
		?>
			<strong style="color:red"><a href="Mides.php"><?php echo $donnees['auteur'];?></a></strong> <span style="color: olive;">(le <?php echo $donnees['date']; ?> à <?php echo $donnees['time']; ?>)</span>: <?php echo htmlspecialchars(stripslashes($donnees['MP']));?> <br /><a href="supr_mp.php?id=<?php echo $donnees['id'];?>" style="color: red;">Suprimer</a><br /><br />
		<?
	}
	else 
	{
		$pren = $donnees['auteur'];
		$personne = $bdd->query("SELECT id FROM membre WHERE prenom='$pren' "); // récuperation de l'id de l'auteur
		$membre = $personne->fetch();?>
				<strong><a href="forum/Pageperso.php?id=<?php echo $membre['id'];?>"><?php echo $donnees['auteur'];?></a></strong> <span style="color: black;">(le <?php echo $donnees['date']; ?> à <?php echo $donnees['time']; ?>)</span>: <?php echo htmlspecialchars(stripslashes($donnees['MP']));?> <br /><a href="supr_mp.php?id=<?php echo $donnees['id'];?>" style="color: red;">Suprimer</a><br /><br />
		<?php
	}
	}
$reponse->closeCursor();
?>
<div id="lien">
	<a href="index.php">Accueil</a><br />
	<a href="MP.php">Envoyer un message</a><br />
	<a href="forum/favori_topic.php">Mes topics favoris</a><br />
	<a href="modif_pswd.php" style="color: grey;">Modifis ton mot de passe</a>
</div>
</div>
<?php
}
?>
</body>
</html>