<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" > <head> 		<link rel="shortcut icon" type="image/x-icon" href="../images/Logo2.ico" />
<title>Programe TI</title>

<style type="text/css">

		body
 		{
		color: #FFFFFF;
		background-image: url(fond_prgm.png);
		background-color: #000000;
		background-repeat: no-repeat;
		}	
		body h2	
		{			
		color: #FFFFFF;
		}
		a
		{	
		color: blue;
		}
		a:hover
		{	
		color: red;
		}
		#describ	
		{			
		text-indent: 30px;
		}	
		#code
		{			
		border: 2px ridge #FFFFFF;
		font-size: 18px;	
		padding-left: 10px;	
		padding-right: 10px;			
		padding-top: 10px;	
		padding-bottom: 10px;			
		color: red;		
		background-color: black;	
		}
		#code:hover
		{			
		color:#FFFFFF;
		border:2px solid blue;	
		}	
		</style>
		
		</head>
		<body>
		<?php	
		try	{
		$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_prog', 'lisopfr', 'hRkrKDkDy6');
		}	
		catch(Exception $e)	
		{		die('Erreur : '.$e->getMessage());	}
		$id=$_GET['id'];
		$bdd->exec("UPDATE Visite SET nb_vue = nb_vue+1 WHERE id_programe = $id ");	
		$ti=$bdd->query("SELECT * FROM Ti WHERE id = $id ");	$prog = $ti->fetch();
		?>
		
		<h2><?php echo htmlentities($prog['titre']); ?></h2>	
		
		<p id="describ">
		
		<?php echo htmlentities($prog['describ']); ?>
		
		</p>	
		<p id="code">
		<?php echo nl2br($prog['code']); ?>	
		</p> 
		Par: <?php echo htmlentities($prog['auteur']); ?>	
		
		<BR /><BR />
		
		<?php		
		$id_Ti = $_GET['id'];
		$aime = $bdd->query("SELECT COUNT(*) AS fan FROM aime WHERE id_Ti = $id_Ti ");
		$nb_aime = $aime->fetch();		
		$v=$bdd->query("SELECT nb_vue FROM Visite WHERE id_programe = $id_Ti ");
		$vue = $v->fetch();
		echo "Vue : " .$vue['nb_vue'] ."fois <br />" .$nb_aime['fan'] ." personnes recommande ce programme.";
		$fan = $_SESSION['prenom'];		
		$aime = $bdd->query("SELECT COUNT(*) AS fan FROM aime WHERE id_Ti = $id_Ti AND fan = '$fan' ");
		$nb_aime = $aime->fetch();
		if ($nb_aime['fan'] == 1)
		{}		
		else
		{
		echo "<a href='aime.php?id=" .$id_Ti ."'><i>Recommender</i></a>";
		}
		?>
		<BR />
		
		<a href="index.php">Retour</a>
		
	</body>
</html>