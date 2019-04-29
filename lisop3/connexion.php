<?php
	session_start();
	if($_POST['souvenir']==1){
	setcookie('lisop_prenom', $_POST['prenom'], time() + 365*24*3600, null, null, false, true); // On écrit un cookie
	setcookie('lisop_pass', $_POST['pass'], time() + 365*24*3600, null, null, false, true);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/OTR/xhtml11/DTD/xhtml11.dtd">
<Html xml:lang="fr" dir:"ltr" xmlns="http://www.w3.org/1999/xhtml">
<Head>
	<link rel="shortcut icon" type="image/x-icon" href="images/Logo2.ico" />
	<meta name="Author" content="Constantin DE LA ROCHE" /> 
	<meta name="decription" content="ISOP, le site entre lycéens de Jean-Gi, forum, news et vote."> 
	<meta http-equiv="Content-Type" content="text/html" /> 
	<meta name="keywords" content="isop, ISOP, lisop, jean-gi, jean-giraudoux, lycée, lycéens, forum, news, vote" /> 
<title>Lisop</title>
<style type="text/css">
	body{
		background-color:#CCCCCC;
	}
	#corp{
		border-radius: 10px 10px; -moz-border-radius: 10px;
		width:90%;
		height:1000px;
		padding-top: 25px;
		margin-left:5%;
		background-image:url(images/f_1.png);
		background-repeat: no-repeat;
		background-color:#FFFFFF;
	}
	#contenu{
		margin-left:15%;
		margin-right:5%;
	}
	#contenu h3{
		text-align:center;
		color:#1A1A1A;
	}
</style>
</head>
<body>
<?php
	if(empty($_SESSION)){
	if(empty($_POST['prenom'])){
?>
<div id="corp">
	<div id="menu">
		<?php include('menu.php');?>
	</div>
	<div id="contenu">
		<h3>Connexion</h3>
		
		<form action="connexion.php" method="post">
			<fieldset>
			<legend>Connexion</legend>
			<label for="prenom">Prenom et nom : </label><br>
			<input type="text" name="prenom" id="prenom" size="100"/><br>
			<label for="pass">Ton mot de passe :</label><br>
			<input type="password" name="pass" id="pass" size="100"/><br>
				<input type="submit" value="Connexion" />
			</fieldset>
		</form>
	</div>
</div>
<?php
	}
	else{
	
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');
		}
		catch (Exeption $e)
		{
			die('Erreur :' .$e->getMessage());
		}
		
		$pass = $_POST['pass'];
		$prenom = $_POST['prenom'];
		
		$req = $bdd->query("SELECT * FROM membre2 WHERE prenom = '$prenom' AND pass = '$pass'");
		$resultat = $req->fetch();
		$req->closeCursor();
		
		if (!$resultat)
		{
			echo "<script type='text/javascript'>history.go(-1);</script>";
		}
		else
		{
		$_SESSION['id'] = $resultat['id'];
		$_SESSION['prenom'] = $resultat['prenom'];
		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
		$id = $resultat['id'];
		$ip = $_SERVER['REMOTE_ADDR'];
		$bdd->exec("UPDATE membre2 SET nb_connex = nb_connex +1, ip = '$ip' WHERE id = '$id' ");
		$bdd->exec("UPDATE compteur_visite SET nb_connex = nb_connex+1 WHERE id=1 ");?>
		<script type="text/javascript">
		function redirection(page)
		  {window.location=page;}
		setTimeout('redirection("index.php")',1);
		</script>
	<?php
		}
	}
			}// SI L'INTERNAUTE EST DECO
	else{
		session_unset();
		session_destroy();?>
<script type="text/javascript">
function redirection(page)
  {window.location=page;}
setTimeout('redirection("index.php")',1);
</script>
<?php
	}
?>
</body>
</html>