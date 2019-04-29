<?php
	session_start();
	if(!empty($_GET['billet']) AND !empty($_SESSION['prenom']) AND !empty($_GET['num']))
	{
		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6', $pdo_options);
				
		}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
		
		$topic=$_GET['billet'];
		$id_auteur=$_SESSION['id'];
		if ($_GET['num'] == 1)
		{
			$bddforum = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
			$req = $bddforum->query("SELECT titre FROM billet WHERE id='$topic'");
			$nom_titre = $req->fetch();
			$titre= $nom_titre['titre'];
			$url = "commentaires.php?billet=" .$topic;
			$bdd->exec("INSERT INTO favori_topic(id_auteur, titre, id_billet, url) VALUES('$id_auteur', '$titre', '$topic', '$url')");
			header('Location: commentaires.php?billet=' .$topic);
		}
		elseif ($_GET['num'] == 2)
		{
			$bddforum = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
			$req = $bddforum->query("SELECT titre FROM billet_bahut WHERE id='$topic'");
			$nom_titre = $req->fetch();
			$titre= $nom_titre['titre'];
			$url = "commentaires_bahut.php?billet=" .$topic;
			$bdd->exec("INSERT INTO favori_topic(id_auteur, titre, id_billet, url) VALUES('$id_auteur', '$titre', '$topic', '$url')");
			header('Location: commentaires_bahut.php?billet=' .$topic);
		}
		elseif ($_GET['num'] == 3)
		{
			$bddforum = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
			$req = $bddforum->query("SELECT titre FROM billet_reste WHERE id='$topic'");
			$nom_titre = $req->fetch();
			$titre= $nom_titre['titre'];
			$url = "commentaires_reste.php?billet=" .$topic;
			$bdd->exec("INSERT INTO favori_topic(id_auteur, titre, id_billet, url) VALUES('$id_auteur', '$titre', '$topic', '$url')");
			header('Location: commentaires_reste.php?billet=' .$topic);
		}
		elseif ($_GET['num'] == 4)
		{
			$bddforum = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
			$req = $bddforum->query("SELECT titre FROM billet_ea WHERE id='$topic'");
			$nom_titre = $req->fetch();
			$titre= $nom_titre['titre'];
			$url = "commentaires_ea.php?billet=" .$topic;
			$bdd->exec("INSERT INTO favori_topic(id_auteur, titre, id_billet, url) VALUES('$id_auteur', '$titre', '$topic', '$url')");
			header('Location: commentaires_ea.php?billet=' .$topic);
		}
		else
		{
			echo "<script type='text/javascript'>history.go(-1);</script>";
		}
	}
	else 
	{
		echo "<script type='text/javascript'>history.go(-1);</script>";
	}
?>