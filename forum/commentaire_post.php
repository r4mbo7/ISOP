<?php
	session_start();
if (preg_match("#batard|batarde|salop|salope|salopard|connard|connasse|enfoiré|pute|pd|connar|bite|enculé|putin#i", $_POST['commentaire']))
{
echo "<script type='text/javascript'>history.go(-1);</script>";
}
else
{
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}
	$prenom=$_SESSION['prenom'];
		try
		{
			$abdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		}
		catch (Exeption $e)
		{
			die('Erreur :' .$e->getMessage());
		}
		$reponse = $abdd->query("SELECT nb_message, sexe FROM membre WHERE prenom = '$prenom' ");
		$nb_message = $reponse->fetch();
		if ( $nb_message['nb_message'] < 5 AND $nb_message['sexe'] == 'Homme')
		{
		$titre_auteur= "Nouveau";
		}
		elseif ( $nb_message['nb_message'] < 5 AND $nb_message['sexe'] == 'Femme')
		{
		$titre_auteur= "Nouvelle";
		}
		elseif( $nb_message['nb_message'] < 15 AND $nb_message['sexe'] == 'Homme' )
		{
		$titre_auteur= "Initié";
		}
		elseif( $nb_message['nb_message'] < 15 AND $nb_message['sexe'] == 'Femme')
		{
		$titre_auteur= "Initiée";
		}
		elseif( $nb_message['nb_message'] < 50 AND $nb_message['sexe'] == 'Homme')
		{
		$titre_auteur= "Habitué";
		}
		elseif( $nb_message['nb_message'] < 50 AND $nb_message['sexe'] == 'Femme')
		{
		$titre_auteur= "Habituée";
		}
		elseif( $nb_message['nb_message'] < 150 AND $nb_message['sexe'] == 'Homme')
		{
		$titre_auteur= "Expérimenté";
		}
		elseif( $nb_message['nb_message'] < 150 AND $nb_message['sexe'] == 'Femme')
		{
		$titre_auteur= "Expérimentée";
		}
		elseif( $nb_message['nb_message'] < 350 AND $nb_message['sexe'] == 'Homme')
		{
		$titre_auteur= "Pro";
		}
		elseif( $nb_message['nb_message'] < 350 AND $nb_message['sexe'] == 'Femme')
		{
		$titre_auteur= "Pro";
		}
		elseif( $nb_message['nb_message'] < 800 AND $nb_message['sexe'] == 'Homme')
		{
		$titre_auteur= "Boss";
		}
		elseif( $nb_message['nb_message'] < 800 AND $nb_message['sexe'] == 'Femme')
		{
		$titre_auteur= "Boss";
		}
		elseif( $nb_message['nb_message'] < 2000 AND $nb_message['sexe'] == 'Homme')
		{
		$titre_auteur= "Demi-Dieu";
		}
		elseif( $nb_message['nb_message'] < 2000 AND $nb_message['sexe'] == 'Femme')
		{
		$titre_auteur= "Demi-Déesse";
		}	
		elseif( 2000 < $nb_message['nb_message'] AND $nb_message['sexe'] == 'Homme')
		{
		$titre_auteur= "DIEU";
		}
		elseif( 2000 < $nb_message['nb_message'] AND $nb_message['sexe'] == 'Femme')
		{
		$titre_auteur= "Déesse";
		}
		else
		{ 
		echo "";
		}
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$prenom = $_SESSION['prenom'];
	$ver = $adm->query("SELECT adm FROM membre WHERE prenom = '$prenom'");
	$modo = $ver->fetch();
	if($modo['adm'] == 2 AND $_POST['modo'] == 2 OR $modo['adm'] == 3 AND $_POST['modo'] == 2)
	{
	$prenom = "Modérateur";
	$titre_auteur = $_SESSION['prenom'];
	$classe = "xxx";
	}
	elseif($modo['adm'] == 3 AND $_POST['modo'] == 3)
	{
	$prenom = "Administrateur";
	$titre_auteur = $_SESSION['prenom'];
	$classe = "xxx";
	}
	else
	{}

	$id_auteur= $_SESSION['id']; //Récupération des infos sur l'auteur et du POST
	$classe=$_SESSION['classe'];
	$commentaire=$_POST['commentaire'];
	$id_billet=$_GET['billet'];

	$req = $bdd->prepare("INSERT INTO commentaires (id_billet, auteur, id_auteur, titre_auteur, classe, commentaire, date_commentaire) VALUES(:id_billet, :auteur, :id_auteur, :titre_auteur, :classe, :commentaire, NOW())" );
	$req->execute(array(
			'id_billet' => $id_billet, 
			'auteur' => $prenom,
			'id_auteur' => $id_auteur,
			'titre_auteur' => $titre_auteur,
			'classe' => $classe,
			'commentaire' => $commentaire));
		try
		{
			$abdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		}
		catch (Exeption $e)
		{
			die('Erreur :' .$e->getMessage());
		}
		
		$abdd->exec("UPDATE membre SET nb_message = nb_message +1 WHERE prenom = '$prenom' ");
		
	$_SESSION['commentaire'] = 1; //Variable de session pour la supression de son dernier comment.
	
	header('Location: commentaires.php?billet=' .$id_billet .'&page=' .$_GET['page']);
}
?>