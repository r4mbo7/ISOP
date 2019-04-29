<?php 
	session_start();
	if(empty($_SESSION['prenom']))
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Connection</title>
		<link rel="shortcut icon" type="image/x-icon" href="images/Logo2.ico" />
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<style type="text/css">
		body
		{
			color:blue;
			background-image: url(images/a.png);
			background-repeat: no-repeat;
		}
		#connect
		{
			text-align:center;
			position:absolute;
			top:10%;
			left:5%;
			width: 250px;
			border: 5px ridge blue;
			color:blue;
			background-color: #D5FFF6
		}
		#inscr
		{
			position:absolute;
			top:10%;
			right:5%;
			text-align:center;
			width: 200px;
			color: red;
			background-color: #FFAACC;
			border: 5px ridge red;
			padding-bottom: 15px;
		}
		#inscr a
		{
			color:red;
		}
		#inscr a:hover
		{
			color:#800000;
		}
		</style>
	</head>
   
	<body>
	<?php
	if($_GET['verif'] == 1)
	{
	echo 'Prenom, nom ou mot de passe incorect <a href="modif_pswd.php">Changer son mot de passe</a>';
	}
	else
	{
	}
	?>
	<div id="connect">
		<h2>Connexion</h2>
		<form method="post" action="connection2.php<?php if(!empty($_GET['index'])) { echo "?index=1";} else {} ?>">
			<p>
				<label for="prenom">Ton prenom et ton nom :</label>
				<input type="text" name="prenom" id="prenom" /><br />			   
				<label for="pass">Ton mot de passe :</label><br />
				<input type="password" name="pass" id="pass" /><br /><br />
				<input type="submit" value="Connexion" />
			</p>
		</form>
	</div>
	<div id="inscr">
		<h3> Pas encore inscrit? </h3>
		<a href="inscription1.php">Inscription</a>
	</div>
	</body>
</html>
<?php
	}
	else
	{
	header('Location: index.php');
	}
?>