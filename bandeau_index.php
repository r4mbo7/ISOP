<?php
	if(empty($_SESSION['prenom'])) 
	{
	
		echo "<a href='connection1.php?index=1'>Connexion</a><BR />Visites : ";
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
		$reponse = $bdd->query("SELECT * FROM compteur_visite WHERE id='1'");
		$donnee = $reponse->fetch();
		{
		echo $donnee['nb_visiteur'] .'<BR />Membres : ' .$donnee['nb_membre'];
		}
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
		try
		{
			$bddn = new PDO('mysql:host=localhost;dbname=lisopfr_news', 'lisopfr', 'hRkrKDkDy6');

		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
		$exp = $bddn->query("SELECT * FROM exp_lb WHERE validation='oui' ORDER BY id DESC LIMIT 0,1");
		$exp_lb = $exp->fetch();
					
			$id=$_SESSION['id'];
			$prenom=$_SESSION['prenom'];
			$reponse = $bdd->query("SELECT * FROM compteur_visite WHERE id='1'");
			$donnee = $reponse->fetch();
			$reponse = $bdd->query("SELECT * FROM membre WHERE id='$id' AND prenom='$prenom' ");
			$donnees = $reponse->fetch();		
?>
				<div class="stats">
					<strong> 
					<?php
					if( $donnees['nb_connex'] == 50)
					{
					echo htmlentities("Félicitation pour ta 50eme connexion! Nous te remercions de ta fidelité");
					}
					elseif( $donnees['nb_connex'] == 100)
					{
					echo htmlentities("Félicitation pour ta 100eme connexion! Nous te remercions de ta fidelité"); 
					}
					else
					{
					echo "Connexions : " .$donnees['nb_connex']; 
					}
					?>
					</strong> 
					<u>Total : <?php echo $donnee['nb_connex'] .' connections'; ?></u>
					<strong>
				<BR />
				Dernière news libre : 
				<a class="lien " href="news/exp_lb2.php?id=<?php echo $exp_lb['id'];?>">
				<?php echo htmlspecialchars(stripslashes($exp_lb['titre']));?>
					</strong>
				</a>
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
				<i>Tes news libre : <?php echo $donnees['nb_news']; ?>
				<?php
				if ($donnees['nb_news'] < 10)
					{
					$auteur = "";
					}
					elseif ($donnees['nb_news'] < 25)
					{
					$auteur = ", Newseur habitué";
					}
					elseif ($donnees['nb_news'] < 50)
					{
					$auteur = ", Newseur expérimenté";
					}
					elseif ( 50< $donnees['nb_news'] )
					{
					$auteur = ", Newseur PRO";
					}
					else
					{
					$auteur = "";
					}
					echo htmlentities($auteur);
				?>
				</i>
				<BR />
				<i>Tes commentaires sur le Forum : <?php echo $donnees['nb_message']; ?>, statut : "
	<? 
	if ( $donnees['nb_message'] < 5 AND $donnees['sexe'] == 'Homme')
		{
		$titre_auteur= "Nouveau";
		}
		elseif ( $donnees['nb_message'] < 5 AND $donnees['sexe'] == 'Femme')
		{
		$titre_auteur= "Nouvelle";
		}
		elseif( $donnees['nb_message'] < 15 AND $donnees['sexe'] == 'Homme' )
		{
		$titre_auteur= "Initié";
		}
		elseif( $donnees['nb_message'] < 15 AND $donnees['sexe'] == 'Femme')
		{
		$titre_auteur= "Initiée";
		}
		elseif( $donnees['nb_message'] < 50 AND $donnees['sexe'] == 'Homme')
		{
		$titre_auteur= "Habitué";
		}
		elseif( $donnees['nb_message'] < 50 AND $donnees['sexe'] == 'Femme')
		{
		$titre_auteur= "Habituée";
		}
		elseif( $donnees['nb_message'] < 150 AND $donnees['sexe'] == 'Homme')
		{
		$titre_auteur= "Expérimenté";
		}
		elseif( $donnees['nb_message'] < 150 AND $donnees['sexe'] == 'Femme')
		{
		$titre_auteur= "Expérimentée";
		}
		elseif( $donnees['nb_message'] < 350 AND $donnees['sexe'] == 'Homme')
		{
		$titre_auteur= "Pro";
		}
		elseif( $donnees['nb_message'] < 350 AND $donnees['sexe'] == 'Femme')
		{
		$titre_auteur= "Pro";
		}
		elseif( $donnees['nb_message'] < 800 AND $donnees['sexe'] == 'Homme')
		{
		$titre_auteur= "Boss";
		}
		elseif( $donnees['nb_message'] < 800 AND $donnees['sexe'] == 'Femme')
		{
		$titre_auteur= "Boss";
		}
		elseif( $donnees['nb_message'] < 2000 AND $donnees['sexe'] == 'Homme')
		{
		$titre_auteur= "Demi-Dieu";
		}
		elseif( $donnees['nb_message'] < 2000 AND $donnees['sexe'] == 'Femme')
		{
		$titre_auteur= "Demi-Déesse";
		}	
		elseif( 2000 < $donnees['nb_message'] AND $donnees['sexe'] == 'Homme')
		{
		$titre_auteur= "DIEU";
		}
		elseif( 2000 < $donnees['nb_message'] AND $donnees['sexe'] == 'Femme')
		{
		$titre_auteur= "Déesse";
		}
		else
		{ 
		echo "";
		}
			echo htmlentities($titre_auteur);?>"</i>
				</div>
<?php
			$reponse->closeCursor();
	}
 ?>