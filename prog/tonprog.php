<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" > 
	<head> 
		<title>Programe TI</title> 
		<link rel="shortcut icon" type="image/x-icon" href="../images/Logo2.ico" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style type="text/css">
		body 
		{
			color: #FFFFFF;
			background-image: url(../images/fond_prgm.png);
			background-color: #000000;
			background-repeat: no-repeat;
		}
		</style>
	</head>
<body>
	<?php
	if(empty($_SESSION['prenom']))
	{
		echo htmlentities("Attention, tu n'es pas connécté. L'auteur affiché : 'Inconnu'") ."<a href='../connection1.php'>Connection</a>";
	}
	else
	{
		echo htmlentities("Auteur : ") .$_SESSION['prenom'];
	}
	?>
		<form action="tonprog_post.php" method="post">
        <p>
		<label for="titre">Le titre</label> : <input type="text" name="titre" id="titre" /> <br />
		
		<label for="describ"><?php echo htmlentities("Brève déscription"); ?></label> : <br />
		<textarea type="text" name="describ" id="describ"></textarea> <br />
		
		<label for="code">Code : </label><BR />
		<textarea name="code" id="code" rows="14" cols="12" ></textarea><br />
		
		<input type="radio" name="catego" value="1" id="1" /> <label for="0">Pograme jeux</label><br />
		
		<input type="radio" name="catego" value="2" id="2" checked="checked"/> <label for="2">Pograme utilitaire</label><br />
		
		<input type="submit" value="Envoyer" />
		</p>
	
</body>
</html>