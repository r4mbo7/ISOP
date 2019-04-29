<?php
	session_start ();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/OTR/xhtml11/DTD/xhtml11.dtd">
<Html xml:lang="fr" dir:"ltr" xmlns="http://www.w3.org/1999/xhtml">	
<Head>
<link rel="shortcut icon" type="image/x-icon" href="../images/Logo2.ico" />
<title>Poste ta news</title>	
	<style type="text/css">
	body 
	{
	background-image: url(../images/fond_news.png);
	background-repeat: no-repeat;
	background-color:blue;
	}
	#titre	
	{
	color: red;	
	}
	#form
	{
	position:absolute;
	top: 100px;
	left: 300px;
	}
	</style>
	<script type="text/javascript">	
	function Retour()	
	{		
		history.go(-1);
	}
	</script>
</head>
<body>
<?php 
	include("new.php"); 
	include("menu.php");
?>
	<div id="form">
<?	
	if(empty($_SESSION['prenom'])) 
	{
	echo '<H2 id="titre">Poste ta news</H2><a id="connexion" href="../connection1.php">Connexion</a><BR /> Deviens membre pour poster une news libre.<BR />';
	} 
	else{
	if(empty($_GET['ok']))
	{
	try	
	{		
	$bdd = new PDO('mysql:host=localhost;dbname=lisopfr_membre', 'lisopfr', 'hRkrKDkDy6');	
	}	
	catch (Exception $e)	
	{		
	die('Erreur : ' . $e->getMessage());	
	}
	$prenom=$_SESSION['prenom'];
	$reponse = $bdd->query("SELECT nb_news FROM membre WHERE prenom='$prenom'");
	$titre = $reponse->fetch();
	if ($titre['nb_news'] < 10)
	{
	$titre_auteur = "";
	}
	elseif ($titre['nb_news'] < 20)
	{
	$titre_auteur = " Ton statut : Newseur habitué";
	}
	elseif ($titre['nb_news'] < 40)
	{
	$titre_auteur = "Ton statut : Newseur expérimenté";
	}
	elseif ( 40< $titre['nb_news'] )
	{
	$titre_auteur = "Ton statut : Newseur Pro";
	}
	else
	{
	$titre_auteur = "";
	}
	echo "<H2 id='titre'>Poste ta news</H2><BR /><u>" .htmlentities($titre_auteur) ."</u>";
	$reponse ->closeCursor();
?>
<form action="expression_lb_post.php" method="post">	
<p>	
	Entre le titre de ta news :<br />	
	<input type="text" name="titre" autocomplete="off" />(Le plus court possible)<br />
	Entre ta news :<br/>	
	<textarea name="message" rows="8" cols="45">	
	</textarea>
	<BR/>
	<input type="radio" name="masque" value="0" id="0" checked="checked"/> 
	<label for="0">Afficher mon nom comme auteur de la news</label>
	<br />
	<input type="radio" name="masque" value="1" id="1" /> 
	<label for="1">Masquer mon nom</label><br />
	<input type="submit" value="Valider" />	
</p>
<?php 
	}
	if( $_GET['id'] == 1)
	{
		echo htmlentities("Ta news comporte des propos insultants, elle n'a pas été envoyée") ."<br /><input type='button' value='Recuperer son text' onClick='javascript:Retour()'>";
	}
	else
	{
	echo '';
	}
	}
	if ($_GET['ok'] == 2)
	{
		echo htmlentities("Ta news sera bientôt affichée");
	}
?>
</div>	
</form>
</html>