<?php	session_start();
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$prenom = $_SESSION['prenom'];
	$ver = $adm->query("SELECT adm FROM membre WHERE prenom = '$prenom'");
	$modo = $ver->fetch();
	if ($modo['adm'] == '3')
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/OTR/xhtml11/DTD/xhtml11.dtd">
<Html xml:lang="fr" dir:"ltr" xmlns="http://www.w3.org/1999/xhtml">
<Head>	
	<meta name="keywords" content="vote; jean-gi; jean-giraudoux; chateauroux; lycee" />	
	<link rel="shortcut icon" type="image/x-icon" href="Logo2.ico" />	
	<meta name="decription" content="Site entre lyceen">
	<title>Bouton ROUGE</title>
	<style type="text/css">
	body
	{
		background-color:black;
		color:red;
	}
	</style>
</head>
<body>
<h1>/!!\ATTENTION TU ES SUR LE POINT DE REMETTRE TOUT LES VOTES A ZERO/!!\</h1>
<a href="btn_rouge_rouge.php">COMFIRMER</a></br>
<a href="index.php">Retour page admin</a>
</body>
</html>
<?php 
	}
	else 
	{
		header('Location: index.php');
	}
?>