<?php
	session_start();
	if(!empty($_GET['topic']) AND !empty($_SESSION['prenom'])){
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
			$id_mbr=$_SESSION['id'];
			$topic=$_GET['topic'];
			$bdd->exec("INSERT INTO favorie(id_mbr, id_topic) VALUES('$id_mbr', '$topic')");
			header('Location: commentaire.php?topic=' .$topic);
	}
	else{
	echo "<script type='text/javascript'>history.go(-1);</script>";
	}
?>