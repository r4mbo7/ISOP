<?php
	session_start();
	$id_s=$_SESSION['id'];
	$id_topic=$_GET['id'];
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_forum', 'lisopfr', 'hRkrKDkDy6');
	$bdd->exec("DELETE FROM favorie WHERE id_mbr = $id_s AND id_topic = $id_topic");
	echo "<script type='text/javascript'>history.go(-1);</script>";
?>