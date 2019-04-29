<?php
	session_start ();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" > 
<head> 
	<title>News</title> 
	<link rel="shortcut icon" type="image/x-icon" href="../images/Logo2.ico" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body 
{
	background-image: url(../images/fond_news.png);
	background-repeat: no-repeat;
	background-color:blue;
}
#titre
{
	text-indent: 30px; 
	position: absolute;
	top: 100px;
	left: 300px;
	width: 40%;
	min-width:200px;
	background-image: url(../images/exp_lb.png);
	color: blue;
}
#titre h2
{
	text-align: center;
	color: red;
}
#titre:hover
{
	font-size: 20px;
	width: 50%;
}
#titre:hover #reaction
{
	display: block;
}
#reaction
{
	border-top: 2px ridge blue;
	color: black;
	display: none;
}
#reaction i
{
	color: black;
	font-size: 24px;
}
.comments
{
	text-align:center;
	font-size: 14px;
}

</style>
</head>
<body>
<?php 
	include("new.php");
	include("menu.php"); ?>
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
$id = $_GET['id'];
$reponse = $bdd->query("SELECT titre, news, id FROM news WHERE ID = '$id' ORDER BY ID DESC LIMIT 0,1");
while ($donnees = $reponse->fetch())
{
?>
	<h2><?php echo htmlentities(stripslashes($donnees['titre'])); ?></h2>
	<p><?php echo nl2br(htmlentities(stripslashes($donnees['news']))); ?></p>
<?php
}
$reponse->closeCursor();
?>
	<BR />
	<BR />
<div id="reaction">
	<BR />
	<i>commentaires : </i>
	<BR />
	<BR />
	<div class="comments">
	<?php
		$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		$prenom = $_SESSION['prenom'];
		$ver = $adm->query("SELECT adm FROM membre WHERE prenom = '$prenom'");
		$modo = $ver->fetch();
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_news', 'lisopfr', 'hRkrKDkDy6');
		}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
		
			$comments = $bdd->query("SELECT id, auteur, message, DATE_FORMAT(date, '%d/%m/%Y') AS date FROM commentaires_news WHERE id_news = '$id' ORDER BY ID DESC LIMIT 0,28");
			while ($com = $comments->fetch())
			{
				
				if($modo['adm'] == 3)
				{
					echo "<p><a href='supr_comment.php?id=" .$com['id'] ."'><strong style='color: blue'>" .htmlentities(stripslashes($com['auteur'])) . '</strong></a> : ' . htmlspecialchars(stripslashes($com['message'])) .' -' .$com['date'] .'</p>';
				}
				else
				{
					echo '<p><strong style="color: blue">' .htmlentities(stripslashes($com['auteur'])) . '</strong> : ' . htmlspecialchars(stripslashes($com['message'])) .' -' .$com['date'] .'</p>';
				}
			
			}
			$comments->closeCursor();
	?>
	<form action="commentaires_post.php?id=<?php echo $id; ?>" method="post"> 
	<p>        
	<label for="auteur">Statut</label> : 
		<?php 	
		if(empty($_SESSION['prenom'])) 
		{
			echo htmlentities('Visiteur(non connecté)') ."<BR /><a href='../connection1.php'>Se connecter</a>";
		}
		else 
		{
			echo "<strong style='color: blue'>" .htmlentities(stripslashes($_SESSION['prenom'])) ."</strong>";
		?>
			<br /> 
			
			<textarea name="message" rows="2" cols="30"></textarea>
			<br />
			
			<input type="submit" value="Commenter" />	
		<?php
		}
		?>
	</p>    
	</form>
	</div>
</div>
</div>
</body>
</html>