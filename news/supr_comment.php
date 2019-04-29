<?php
	session_start();
		$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		$prenom = $_SESSION['prenom'];
		$ver = $adm->query("SELECT adm FROM membre WHERE prenom = '$prenom'");
		$modo = $ver->fetch();
		if ($modo['adm'] == 3)
		{
				try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_news', 'lisopfr', 'hRkrKDkDy6');
			}
			catch(Exception $e)
			{
					die('Erreur : '.$e->getMessage());
			}
			$id=$_GET['id'];
			$bdd->exec("DELETE FROM commentaires_news WHERE id=$id");
			echo "<script type='text/javascript'>history.go(-1);</script>";
		}
		else
		{
			header('Location: news.php ');
		}
?>