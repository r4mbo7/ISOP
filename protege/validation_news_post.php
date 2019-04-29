<?
	session_start();
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$prenom = $_SESSION['prenom'];
	$ver = $adm->query("SELECT adm FROM membre WHERE prenom = '$prenom'");
	$modo = $ver->fetch();
	if ( $modo['adm'] == '2' OR $modo['adm'] == '3')
	{
		if (empty($_GET['id']))
		{}
		else
		{
				try //connection a la bdd news sous $bdd
					{
						$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_news', 'lisopfr', 'hRkrKDkDy6');
					}
				catch(Exception $e)
					{
						die('Erreur : '.$e->getMessage());
					}
				try	//connection a la bdd membre sous $abdd
					{	
						$abdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');	
					}
				catch (Exception $e)				
					{
						die('Erreur : ' . $e->getMessage());	
					}
				$id = $_GET['id']; //id de la news validé dans la variable $id
				$reponse = $bdd->query("SELECT * FROM exp_lb WHERE id=$id ");//Selection de la validée
				$donnees = $reponse->fetch();
				$auteur= $donnees['auteur'];
				$id_auteur= $donnees['id_auteur'];
				$resultat = $abdd->query("SELECT nb_news FROM membre WHERE id='$id_auteur' ");//Selection du nombre de news postée par l'auteur
				$titre = $resultat->fetch();
			if ($titre['nb_news'] < 10)
			{
			$titre_auteur = "";
			}
			elseif ($titre['nb_news'] < 25)
			{
			$titre_auteur = "Newseur habitué";
			}
			elseif ($titre['nb_news'] < 50)
			{
			$titre_auteur = "Newseur expérimenté";
			}
			elseif ( 50< $titre['nb_news'] )
			{
			$titre_auteur = "Newseur PRO";
			}
			else
			{
			$titre_auteur = "";
			} //a partir d'ici la $ titre _auteur a une valeur
			
	$message=$_POST['message'];
	
			if($_POST['validation'] == 'oui')
			{
				$bdd->exec("UPDATE exp_lb SET message='$message', validation='oui', titre_auteur='$titre_auteur' WHERE id=$id "); //modifiquation de la validation et insertion du titre de l'auteur
				$abdd->exec("UPDATE membre SET nb_news=nb_news+1 WHERE id='$id_auteur' "); // +1 dans le champs nb_news dans la table membre
			}
			elseif($_POST['validation'] == 'non')
			{
				$bdd->exec("DELETE FROM exp_lb WHERE id=$id");
			}
			else
			{}
		}
	header("Location: validation_news.php");
	
	}
else {}
?>