<?php
	session_start ();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" > 
<head> 
	<title>News ISOP</title> 
	<link rel="shortcut icon" type="image/x-icon" href="../images/Logo2.ico" />
	<meta name="Author" content="Constantin DE LA ROCHE" />
	<meta name="author" content="Gauthier Jolly" />
	<meta name="keywords" lang="fr" content="isop; lisop; jean-gi; news; lycéen; chateauroux; lycee" />
	<meta name="decription" content="Les news ISOP, site entre lycéens de Jean-Gi">
	<meta http-equiv="Content-Type" content="text/html" />
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
</head>
<body>
<?php 
	include("new.php"); 
	include("menu.php"); 
?>
<div id="titre">
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=news', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->query("SELECT titre, news, id FROM news ORDER BY ID DESC LIMIT 0,1");
while ($donnees = $reponse->fetch())
{
	$id=$donnees['id'];
	$nb = $bdd->query("SELECT COUNT(*) AS id FROM commentaires_news WHERE id_news = '$id' ");
	$comment = $nb->fetch();
?>
	<a href="titre1.php?id=<?php echo $donnees['id'];?>"><h2><?php echo htmlentities(stripslashes($donnees['titre'])); ?></h2></a>
	<p><?php echo nl2br(htmlentities(stripslashes($donnees['news']))); ?></p><BR />
	<div class="com"><a href="titre1.php?id=<?php echo $donnees['id'];?>"><i>commentaires : <?php echo $comment['id']; ?>.</i></a></div>
<?php
}
$reponse->closeCursor();
?>
</div>
<div id="titre2">
<?php
$reponse = $bdd->query("SELECT titre, news, id FROM news ORDER BY ID DESC LIMIT 1,1");
while ($donnees = $reponse->fetch())
{
	$id=$donnees['id'];
	$nb = $bdd->query("SELECT COUNT(*) AS id FROM commentaires_news WHERE id_news = '$id' ");
	$comment = $nb->fetch();
?>
	<a href="titre1.php?id=<?php echo $donnees['id'];?>"><h2><?php echo htmlentities(stripslashes($donnees['titre'])); ?></h2></a>
	<p><?php echo nl2br(htmlentities(stripslashes($donnees['news']))); ?></p>
	<div class="com"><a href="titre1.php?id=<?php echo $donnees['id'];?>"><i>commentaires : <?php echo $comment['id']; ?>.</i></a></div>
<?php
}
$reponse->closeCursor();
?>
</div>
</body>
</html>