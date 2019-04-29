<?php 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
    <head>
		<link rel="shortcut icon" type="image/x-icon" href="Logo2.ico" />
		<style type="text/css">
		h2
		{
			color:red;
		}
		a
		{
			color:blue;
			text-decoration: none;
		}
		a:hover
		{
			color:red;
			text-decoration: underline;
		}
		#supr_top a:hover
		{
			font-size: 20px;
			color:red;
			text-decoration: underline;
			border: 1px solid red;
		}
		</style>
	</head>
<body>
<?php
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$prenom = $_SESSION['prenom'];
	$ver = $adm->query("SELECT adm FROM membre WHERE prenom = '$prenom'");
	$modo = $ver->fetch();
	if ( $modo['adm'] == '2' OR $modo['adm'] == '3')
	{
	echo '<div id="supr_top"><H2>Suprimer un topic, Le site:</H2><BR />';
		$bddt = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
		$req = $bddt->query('SELECT id, titre, contenu FROM billet ORDER BY ID DESC LIMIT 0,15'); 
			while ($donnees = $req->fetch())
		{ 
		?>
			<a href='supr_topic.php?id=<?php echo $donnees['id'];?>' onclick="if(confirm('Suprimer ce topic ?')==true){ return true;} else{return false;}"><?php echo htmlspecialchars(stripslashes($donnees['titre'])); ?></a> <?php echo htmlspecialchars(stripslashes($donnees['contenu']));?> <BR />
		<?
		}
	echo '</div>';
		$req->closeCursor();
	echo '<div id="supr_top"><H2>Suprimer un topic, sur Le bahut:</H2><BR />';
				$bddt = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
		$req = $bddt->query('SELECT id, titre, contenu FROM billet_bahut ORDER BY ID DESC LIMIT 0,15'); 
			while ($donnee = $req->fetch())
		{ 
		?>
		<a href='supr_topic_bahu.php?id=<?php echo $donnee['id'];?>' onclick="if(confirm('Suprimer ce topic ?')==true){ return true;} else{return false;}"><?php echo htmlspecialchars(stripslashes($donnee['titre'])); ?></a> <?php echo htmlspecialchars(stripslashes($donnee['contenu']));?> <BR />
		<?
		}
	echo '</div>';
		$req->closeCursor();
	echo '<div id="supr_top"><H2>Suprimer un topic, sur Entre Aide:</H2><BR />';
				$bddt = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
		$req = $bddt->query('SELECT id, titre, contenu FROM billet_ea ORDER BY ID DESC LIMIT 0,15'); 
			while ($donnee = $req->fetch())
		{ 
		?>
		<a href='supr_topic_ea.php?id=<?php echo $donnee['id'];?>' onclick="if(confirm('Suprimer ce topic ?')==true){ return true;} else{return false;}"><?php echo htmlspecialchars(stripslashes($donnee['titre'])); ?></a> <?php echo htmlspecialchars(stripslashes($donnee['contenu']));?> <BR />
		<?
		}
	echo '</div>';
		$req->closeCursor();
	echo '<div id="supr_top"><H2>Suprimer un topic, sur Le reste:</H2><BR />';
				$bddt = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
		$req = $bddt->query('SELECT id, titre, contenu FROM billet_reste ORDER BY ID DESC LIMIT 0,15'); 
			while ($donees = $req->fetch())
		{
		?>
			<a href='supr_topic_reste.php?id=<?php echo $donees['id'];?>' onclick="if(confirm('Suprimer ce topic ?')==true){ return true;} else{return false;}"><?php echo htmlspecialchars(stripslashes($donees['titre'])); ?></a> <?php echo htmlspecialchars(stripslashes($donees['contenu']));?> <BR />
		<?}
	echo '</div>';
		$req->closeCursor();
	}
	else
	{
		echo "<script type='text/javascript'>history.go(-1);</script>";
	}
?>
</body>
</html>