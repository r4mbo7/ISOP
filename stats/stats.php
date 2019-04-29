<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/OTR/xhtml11/DTD/xhtml11.dtd">
<Html xml:lang="fr" dir:"ltr" xmlns="http://www.w3.org/1999/xhtml">
<Head>
<title>Stats membres</title>
<link rel="shortcut icon" type="image/x-icon" href="../images/Logo2.ico" />
<style type="text/css">
	body
	{
		color: #000080;
		background-image: url(../images/a.png);
		background-repeat: no-repeat;
	}
	body strong
	{
		color: maroon;
	}
</style>
</head>
<body>
<?php
	if(empty($_SESSION['prenom'])) {
	echo "<script type='text/javascript'>history.go(-1);</script>";
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
			
			$id=$_GET['id'];
			$reponse = $bdd->query("SELECT * FROM membre WHERE id='$id'");
			$donnees = $reponse->fetch();
			
			?>
				<div class="stats">
				<strong><?php echo $donnees['prenom']; ?></strong><br />
				Nombre de connections: <?php 
											if ($donnees['nb_connex'] == '0')
											{
												$connex = '1';
											}
											else
											{
												$connex = $donnees['nb_connex'];
											}
									echo $connex; ?> 
				<BR />
				<?php 
				if($donnees['classe'] == 'autre')// ne pas affiché le nombre de voix pour les "autre"
				{}
				else
				{
				?>
				<BR />
				Nombre de voix : <?php echo $donnees['cool'] .', ' .$donnees['sexy'] .', ' .$donnees['sape'] .', ' .$donnees['dejante'];?>
				<?php
				}
				?>
				<BR />
				<i>Nombre de commentaire: <?php echo $donnees['nb_message']; ?></i>
				<BR />
				<i>Nombre de news libre: <?php echo $donnees['nb_news'];?></i>
				</div>
<?php
			$reponse->closeCursor();
	}
 ?>
 </body>
 </html>