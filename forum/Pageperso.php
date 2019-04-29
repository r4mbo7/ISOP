<?php 
	session_start ();
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
    <head>
        <title>Forum ISOP</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="shortcut icon" type="image/x-icon" href="Logo2.ico" />
		<meta name="decription" content="Site entre lyceen">
		<style type="text/css">
		<?php
		if(empty($_SESSION['theme']) OR $_SESSION['theme']==1)
		{?>
		body
		{
		background-image: url(fond_forum.png);
		background-repeat: no-repeat;
		height: 98%;
		width: 98%;	
		}
		#comment
		{
			position:absolute;
			top: 75px;
			left: 220px;
			width: 70%;
			min-width: 450px;
			overflow: hidden;
			color:blue;
		}
		<?php
		}
		else
		{?>
		body
		{
		background-image: url(fond_forum2.png);
		background-repeat: no-repeat;
		height: 98%;
		width: 98%;	
		}
		#comment
		{
			position:absolute;
			top: 75px;
			left: 220px;
			width: 70%;
			min-width: 450px;
			overflow: hidden;
			color:black;
		}
		<?php
		}?>
		</style>
    </head>
    <body>
<?php 
include("menu.php");
include("co.php");
?>
<div id="comment">
	<?php 
	if (empty($_SESSION['prenom']))
	{
	echo htmlentities("Réservé aux connéctés");
	}
	else
	{
		if(empty($_GET['id']))
		{
			echo 'Aucune personne selectionnée';
		}
		else
		{
			$perso = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
			$id = $_GET['id'];
			$personne = $perso->query("SELECT * FROM membre WHERE id='$id' ");
			$membre = $personne->fetch();
			?>
			<h3><?php echo htmlspecialchars($membre['prenom']);?></h3>
			Nombre de commentaire sur le Forum : <?php echo $membre['nb_message'];?><BR />
			<?php
			if ( $membre['nb_message'] < 5 AND $membre['sexe'] == 'Homme')
				{
				$titre_auteur= "Nouveau";
				}
				elseif ( $membre['nb_message'] < 5 AND $membre['sexe'] == 'Femme')
				{
				$titre_auteur= "Nouvelle";
				}
				elseif( $membre['nb_message'] < 15 AND $membre['sexe'] == 'Homme' )
				{
				$titre_auteur= "Initié";
				}
				elseif( $membre['nb_message'] < 15 AND $membre['sexe'] == 'Femme')
				{
				$titre_auteur= "Initiée";
				}
				elseif( $membre['nb_message'] < 50 AND $membre['sexe'] == 'Homme')
				{
				$titre_auteur= "Habitué";
				}
				elseif( $membre['nb_message'] < 50 AND $membre['sexe'] == 'Femme')
				{
				$titre_auteur= "Habituée";
				}
				elseif( $membre['nb_message'] < 150 AND $membre['sexe'] == 'Homme')
				{
				$titre_auteur= "Expérimenté";
				}
				elseif( $membre['nb_message'] < 150 AND $membre['sexe'] == 'Femme')
				{
				$titre_auteur= "Expérimentée";
				}
				elseif( $membre['nb_message'] < 350 AND $membre['sexe'] == 'Homme')
				{
				$titre_auteur= "Pro";
				}
				elseif( $membre['nb_message'] < 350 AND $membre['sexe'] == 'Femme')
				{
				$titre_auteur= "Pro";
				}
				elseif( $membre['nb_message'] < 800 AND $membre['sexe'] == 'Homme')
				{
				$titre_auteur= "Boss";
				}
				elseif( $membre['nb_message'] < 800 AND $membre['sexe'] == 'Femme')
				{
				$titre_auteur= "Boss";
				}
				elseif( $membre['nb_message'] < 2000 AND $membre['sexe'] == 'Homme')
				{
				$titre_auteur= "Demi-Dieu";
				}
				elseif( $membre['nb_message'] < 2000 AND $membre['sexe'] == 'Femme')
				{
				$titre_auteur= "Demi-Déesse";
				}	
				elseif( 2000 < $membre['nb_message'] AND $membre['sexe'] == 'Homme')
				{
				$titre_auteur= "DIEU";
				}
				elseif( 2000 < $membre['nb_message'] AND $membre['sexe'] == 'Femme')
				{
				$titre_auteur= "Déesse";
				}
				else
				{ 
				$titre_auteur= "";
				}
			?>
			Statut : <?php echo htmlentities($titre_auteur);?><BR />
			<?php
			if($mebre['id']!=$_SESSION['id'])
			{
			if( $_GET['envoy'] == 1 )
			{
			echo htmlentities("Ton message a bien été envoyé");
			}
			else
			{
			?>
			<form method="post" action="envoy_mp.php?id=<?php echo $id;?>"> 
					<label for="MP">Envoyer un message à <?php echo $membre['prenom'];?>: </label><BR/>
					<textarea name="MP" rows="4" cols="70"></textarea> 
					<input type="submit" value="Envoyer"/>
			</form>
		<?php
			}
			}
			else //Visteur = membre
			{}
		}
	}
	?>
</div>
</body>
</html>