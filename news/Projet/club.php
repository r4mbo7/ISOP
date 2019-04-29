<?php
	session_start ();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" > 
<head> 
	<title>News</title> 
<style type="text/css">
body 
{
	background-image: url(../images/fond_news.png);
	background-repeat: no-repeat;
	background-color:blue;
}
a
{
	text-decoration: none;
}
#titre
{
	text-indent: 30px; 
	position: absolute;
	top: 100px;
	left: 300px;
	width: 40%;
	min-width:200px;
	max-width:425px;
	background-image: url(../images/exp_lb.png);
	color:blue;
}
#titre h2
{
	text-align: center;
	color: red;
}
#titre2
{
	text-indent: 30px; 
	position: absolute;
	top: 100px;
	left: 750px;
	background-image: url(../images/exp_lb.png);
	width: 30%;
	min-width:200px;
	max-width:400px;
	color:blue;
}
#titre2 h2
{
	text-align: center;
	color: red;
}
.com
{
	text-indent: 15px;
}
</style>
<body>
<?php 
	include("new.php"); 
	include("menu.php");
?>
<div id="titre">
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_news', 'lisopfr', 'hRkrKDkDy6');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
if(empty($_GET['index']))
{	
	$reponse = $bdd->query("SELECT * FROM club ORDER BY ID DESC LIMIT 0,1");
}
else
{
	$index=$_GET['index'];
	$reponse = $bdd->query("SELECT * FROM club WHERE club=$index ORDER BY ID DESC LIMIT 0,1");
}
while ($donnees = $reponse->fetch())
{
?>
	<a href="club.php?index=<?php echo $donnees['club'];?>"><h2><?php echo htmlentities(stripslashes($donnees['titre'])); ?></h2></a>
	<p><?php echo nl2br(htmlentities(stripslashes($donnees['message']))); ?></p><BR />
	<a href="club_liste.php?index=<?php echo $donnees['club'];?>">Voir toutes les news du club</a>
<?php
}
$reponse->closeCursor();
?>
</div>
<div id="titre2">
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_news', 'lisopfr', 'hRkrKDkDy6');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
if(empty($_GET['index']))
{	
	$reponse = $bdd->query("SELECT * FROM club ORDER BY ID DESC LIMIT 1,1");
}
else
{
	$index=$_GET['index'];
	$reponse = $bdd->query("SELECT * FROM club WHERE club=$index ORDER BY ID DESC LIMIT 1,1");
}
while ($donnees = $reponse->fetch())
{
?>
	<a href="club.php?index=<?php echo $donnees['club'];?>"><h2><?php echo htmlentities(stripslashes($donnees['titre'])); ?></h2></a>
	<p><?php echo nl2br(htmlentities(stripslashes($donnees['message']))); ?></p><BR />
<?php
if(empty($_GET['index']))
{?>
	<a href="club_liste.php?index=<?php echo $donnees['club'];?>">Voir toutes les news du club</a>
<?
}
else
{}
}
$reponse->closeCursor();
?>
</div>
</body>
</html>
