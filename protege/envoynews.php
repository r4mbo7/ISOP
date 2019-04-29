<?php 
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/OTR/xhtml11/DTD/xhtml11.dtd">
<Html xml:lang="fr" dir:"ltr" xmlns="http://www.w3.org/1999/xhtml">
<Head>
<title>Ajouter news</title>
<link rel="shortcut icon" type="image/x-icon" href="../images/Logo2.ico" />
</head>
<body> 
<?php
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$prenom = $_SESSION['prenom'];
	$ver = $adm->query("SELECT adm FROM membre WHERE prenom = '$prenom'");
	$modo = $ver->fetch();
	if ($modo['adm'] == '3')
	{
?>

	<form action="envoynews_post.php" method="post">
	<p>
	Titre de la news :<br />
	<input type="text" name="titre" /><br />
	Entre ta news :<br/>
    <textarea name="news" rows="8" cols="45">
	</textarea><br/>
    <input type="submit" value="Valider" />
	</p>
	</form>
<?php
	}
	else
	{
	echo "Tu nas pas le droit...";
	}
?>
</body>
</html>