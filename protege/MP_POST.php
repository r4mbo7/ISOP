<?php
	session_start();
	$adm = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
	$prenom = $_SESSION['prenom'];
	$ver = $adm->query("SELECT adm FROM membre WHERE prenom = '$prenom'");
	$modo = $ver->fetch();
	if ( $modo['adm'] == '2' OR $modo['adm'] == '3')
	{
?>
	<style type="text/css">
	body
	{
		background-image: url(images/a.png);
	}
	</style>
	</head>
	<body>
	<?php
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		}
		catch (Exeption $e)
		{
			die('Erreur :' .$e->getMessage());
		}
		if($modo['adm'] == '3')
		{
		$auteur= "Admin";
		}
		elseif($modo['adm'] == '2')
		{
		$auteur= "Modo";
		}
		else
		{
		$auteur= $_SESSION['prenom'];
		}
		$destinataire= $_POST['destinataire'];
		$MP=$_POST['MP'];
		$bdd->exec("INSERT INTO MP(auteur, destinataire, MP, time, date) VALUES('$auteur', '$destinataire', '$MP', CURTIME(), CURDATE())");
		?>
	<p>Ton message a était correctement envoy&eacute </p>
	<a href="index.php">Retour</a>
	<a href="..\index.php">Accueil</a>
	<meta http-equiv="Refresh" content="2;URL=index.php">
	</body>
</html>
<?php }
else {}?>