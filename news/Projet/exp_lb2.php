<?php 
	session_start ();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" > 
<head> 
	<title>News libre</title> 
	<link rel="shortcut icon" type="image/x-icon" href="../images/Logo2.ico" />
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
#titre u
{
	color: black;
	font-size:12px;
}
#titre:hover
{
	font-size: 20px;
	width: 50%;
}
#titre i
{
	color: black;
	font-size: 13px;
}
.date
{
	color: black;
	font-size: 13px;
}
</style>
<script type="text/javascript">	
function Retour()	
{		
	history.go(-1);
}
</script>
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
		$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		$prenom = $_SESSION['prenom'];
		$ver = $adm->query("SELECT adm FROM membre WHERE prenom = '$prenom'");
		$modo = $ver->fetch();
		if ($modo['adm'] == 3)
		{
		echo "<a href='supression_newslb.php?id=" .$_GET['id'] ."'>Suprimer</a>";
		}
		else 
		{}
	$id = $_GET['id'];
	$aime = $bdd->query("SELECT COUNT(*) AS fan FROM exp_lb_aime WHERE id_exp_lb = '$id' ");
	$nb_fan = $aime->fetch();
	$reponse = $bdd->query("SELECT titre, auteur, titre_auteur, message, DATE_FORMAT(date, '%d/%m/%Y') AS date FROM exp_lb WHERE validation='oui' AND id=$id ORDER BY ID DESC LIMIT 0,10");
	$donnees = $reponse->fetch();
	{
	?>
		<h2><?php echo htmlentities(stripslashes($donnees['titre'])) ."<BR /><div class='date'>" .$donnees['date'] ."</div>"; ?> 
			<i> 
			<?php 
				if(preg_match("#masque#", $donnees['auteur'])) //Si l'auteur ne souhaite pas afficher son nom
				{
				echo htmlentities($donnees['titre_auteur']);
				}
				else
				{
				echo htmlentities($donnees['auteur']);
				}
			?>
			</i>
			<BR />
		</h2>
		<p><?php echo htmlentities(stripslashes($donnees['message'])); ?></p>
		<?php
			$prenom = $_SESSION['prenom'];
			$aime = $bdd->query("SELECT COUNT(*) AS fan FROM exp_lb_aime WHERE id_exp_lb = $id AND fan = '$prenom' ");
			$nb_aime = $aime->fetch();
		if ($nb_aime['fan'] == 1)
		{
			echo "<i>" .$nb_fan['fan'] .htmlentities(" personnes aimes ça ") ."</i>";
				if (!empty($_SESSION['prenom']))
				{
				echo "<a href='aimepas.php?id=" .$_GET['id'] ."'><i>Je n'aime plus</i></a>";
				}
				else
				{}
		}
		else
		{
			?>
			<i><?php echo $nb_fan['fan'] .htmlentities(" personnes aimes ça "); ?></i>
			<?php
			if (!empty($_SESSION['prenom']))
			{?>
			<a href="aime.php?id=<?php echo $_GET['id'];?>"><i>J'aime</i></a>
			<?php
			}
			else 
			{}
		}
		?>
	<?php
	}
	$reponse->closeCursor();
	?>
	<br />
	<input type="button" value="Retour" onClick="javascript:Retour()">
</div>
</body>
</html>